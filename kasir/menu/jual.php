<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Document</title>
</head>
<body>
    <?php
        $id = $_GET['id_buku'];
        $qbuku = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku='$id'");
        $data = mysqli_fetch_array($qbuku);
    ?>
    <h1>Penjualan</h1>
    <div class="col-md-5">
        <form action="" class="form-horizontal" method="post">
            <label>Buku</label>
            <input class="form-control" type="text" value="<?php echo $data['judul']; ?>" readonly>
            <label>Stok</label>
            <input class="form-control" type="text" value="<?php echo $data['stok']; ?>" readonly>
            <label>Harga Pokok</label>
            <input class="form-control" type="text" value="Rp. <?php echo $data['harga_pokok']; ?>" readonly>
            <label>Jumlah</label>
            <input class="form-control" name="jumlah" type="number" placeholder="Jumlah Penjualan">
            <label>Uang Pelanggan</label>
            <input class="form-control" name="uang" type="number" placeholder="Uang Pelanggan">
            <br>
            <input type="submit" class="btn btn-success btn-block" name="proses" value="Proses">
            <a href="?menu=input_penjualan" class="btn btn-danger btn-block">Batal</a>
        </form>

        <?php
            if(isset($_POST['proses'])){
                $id_kasir = $profil['id_kasir'];
                $jumlah = $_POST['jumlah'];
                $uang = $_POST['uang'];
                $tanggal = date('Y-m-d');
                $total = $jumlah * $data['harga_pokok'];
                $kembali = $uang - $total;
                $stokupdate = $data['stok'] - $jumlah;

                mysqli_query($koneksi, "INSERT INTO tb_penjualan(id_buku, id_kasir, jumlah, total, tanggal) VALUES('$id', '$id_kasir', '$jumlah', '$total', '$tanggal')");
                mysqli_query($koneksi, "UPDATE tb_buku SET stok='$stokupdate' WHERE id_buku='$id'");
                ?>

    </div>
    <div class="col-md-6">
        <tr>
                <td>Total Bayar : <h2>Rp. <?php echo $total; ?></h2></td>
        </tr>
        <tr>
                <td> UANG BAYAR : <h2>Rp. <?php echo $uang; ?></h2></td>
        </tr>
        <tr>
                <td> KEMBALIAN : <h2>Rp. <?php echo $kembali; ?></h2></td>
        </tr>

        <a href="?menu=input_penjualan" class="btn btn-success">SELESAI</a>
        <a href="" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span></a>
    </div>
                <?php

            }
        
        ?>
</body>
</html>