<?php
    $id = $_GET['id_buku'];
    $qbuku = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku='$id'");
    $buku = mysqli_fetch_array($qbuku);

    // kode otomatis
    $qkode = mysqli_query($koneksi, "SELECT MAX(id_jual) FROM tb_jual");
    $kode = mysqli_fetch_array($qkode);
    if($kode){
        $nilai = $kode[0];
        $nilai = substr($nilai, 3);
        $nilai = (int)$nilai;
        $kodebaru = $nilai + 1;
        $kode_otomatis = "PJN".str_pad($kodebaru, 4, "0", STR_PAD_LEFT);
    }
    else {
        $kode_otomatis = "PJN0001";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Document</title>
</head>
<body>
    <h4>Input Penjualan</h4>
    <p>KODE PENJUALAN = <?php echo $kode_otomatis; ?></p>
    <form action="" class="form-inline" method="post">
        <a href="?menu=load_buku" class="btn btn-info">Load Buku</a>
        <input type="text" placeholder="Pilih Buku" class="form-control" required="required" value="<?php echo $buku['judul']; ?>" readonly>
        <input type="number" name="jumlah" max="<?php echo $buku['stok']; ?>" class="form-control" placeholder="Jumlah beli max <?php echo $data['stok']; ?>">
        <input type="submit" name="tambah" value="tambah ke keranjang" class="btn btn-primary">
    </form>
    <?php
        if (isset($_POST['tambah'])) {
            $jumlah = $_POST['jumlah'];
            $id_kasir = $profil['id_kasir'];
            $jumlah_harga = $buku['harga_pokok'] * $jumlah;
            mysqli_query($koneksi, "INSERT INTO tb_keranjang(id_buku, id_kasir, jumlah, jumlah_harga)
             VALUES('$id', '$id_kasir', '$jumlah', '$jumlah_harga')");
             $updatestok = $buku['stok'] - $jumlah;
            mysqli_query($koneksi, "UPDATE tb_buku set stok='$updatestok' WHERE id_buku='$id'");

             ?>
             <div class="alert alert-success">
                Berhasil tambah keranjang !
             </div>
             <meta http-equiv="refresh" content="1; url='?menu=input_penjualan'">
             <?php
        }
    ?>
    <hr>
    <h4><span class="glyphicon glyphicon-shopping-cart"></span> keranjang</h4>
    <table class="table table-bordered">
        <tr>
            <th>No. </th>
            <th>Buku</th>
            <th>PPN</th>
            <th>Diskon</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Jumlah Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
            $qker = mysqli_query($koneksi, "SELECT tb_buku.*, tb_kasir.*, tb_keranjang.*
            FROM tb_keranjang
            INNER JOIN tb_buku ON tb_buku.id_buku=tb_keranjang.id_buku
            INNER JOIN tb_kasir ON tb_kasir.id_kasir=tb_keranjang.id_kasir");
            while ($ker = mysqli_fetch_array($qker)) {
            
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $ker['judul']; ?></td>
            <td>Rp. <?php echo number_format($ker['ppn'], 2); ?></td>
            <td>Rp. <?php echo number_format($ker['diskon'], 2); ?></td>
            <td>Rp. <?php echo number_format($ker['harga_pokok'], 2); ?></td>
            <td><?php echo $ker['jumlah']; ?></td>
            <td>Rp. <?php echo number_format($ker['jumlah_harga'], 2); ?></td>
            <td>
                <a onclick="return confirm('akan dihapus ?')" href="?menu=hapur_ker&id_keranjang=<?php echo $ker['id_keranjang']; ?>&id_buku=<?php echo $ker['id_buku']; ?>&jumlah=<?php echo $ker['jumlah']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
            </td> 
        </tr>
        <?php } ?>
        <tr>
            <th class="text-right" colspan="6">Total Harga</th>
            <td>
            RP. 
                <?php
                    $qtotal = mysqli_query($koneksi, "SELECT SUM(jumlah_harga) as total FROM tb_keranjang");
                    $total = mysqli_fetch_array($qtotal);
                    echo number_format($total['total'], 2);
                ?>
            </td>
        </tr>
    </table>
    <hr>
    <?php
        $qk = mysqli_query($koneksi, "SELECT * FROM tb_keranjang");
        $cek = mysqli_num_rows($qk);
        if ($cek > 0) {
        
    ?>
    <div class="col-md-4">
            <h1><small>Harga Total</small><br>
            Rp. <?php echo number_format($total['total'], 2); ?>
            </h1>
            <form action="" class="form-inline" method="post">
                <input type="number" name="uang" placeholder="masukkan uang pembeli" class="form-control" required="required" min="<?php echo $total['total']; ?>">
                <input type="submit" name="proses" value="Proses" class="btn btn-success">
            </form>
    </div>
    <div class="col-md-4">
    <?php
                if (isset($_POST['proses'])) {
                    $uang = $_POST['uang'];
                    $kembali = $uang - $total['total'];
                    $tanggal = date('Y-m-d');

                    mysqli_query($koneksi, "INSERT INTO tb_penjualan(id_buku, jumlah, jumlah_harga, id_jual) 
                    SELECT id_buku, jumlah, jumlah_harga, '$kode_otomatis' FROM tb_keranjang");

                    // masukkan data ke tb_jual
                    mysqli_query($koneksi, "INSERT INTO tb_jual(id_jual, total, uang, kembali, id_kasir, tanggal)
                     VALUES('$kode_otomatis', '$total[total]', '$uang', '$kembali', '$profil[id_kasir]', '$tanggal')");

                    ?>
                    <p>
                    <blockquote>
                        <h3>
                        
                            <small>UANG Pembeli</small>
                            Rp. <?php echo number_format($uang, 2); ?>
                        </h3>
                        <h2>
                            <small>UANG Kembali</small>
                            Rp. <?php echo number_format($kembali, 2); ?>
                        </h2>
                    </blockquote>
                    
    </div>
    <div class="col-md-4">
    <br><br>
                <a href="?menu=selesai" class="btn btn-success">Selesai dan bersihkan keranjang</a>
                <a href="" class="btn btn-success"><span class="glyphicon glyphicon-print"></span></a>
    </div>
    <?php } } ?>
</body>
</html>