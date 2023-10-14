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
    if($_GET['id_buku']==""){
        header('location:?menu=data_buku');
    }
        $id_buku = $_GET['id_buku'];
        $qbuku = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku='$id_buku'");
        $dbuku = mysqli_fetch_array($qbuku);
    ?>
    <div class="row">
        <h3>Input Pemasukan Buku</h3>
        <div class="col-md-8">
            <form method="post">
                <div class="form-group">
                    <label>Buku</label>
                    <input name="nama" type="text" class="form-control" value="<?php echo $dbuku['judul']; ?>" required="required" readonly>
                </div>
                
                <div class="form-group">
                    <label>Pilih Distributor</label>
                    <select name="id_distributor" class="form-control">
                        <?php
                            $qdis = mysqli_query($koneksi, "SELECT * FROM tb_distributor");
                            while($ddis = mysqli_fetch_array($qdis)){
                        ?>
                        <option value="<?php echo $ddis['id_distributor']; ?>">
                        <?php echo $ddis['nama_distributor']; ?>
                        </option>
                            <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Stok Awal Buku</label>
                    <input name="stok" type="text" class="form-control" value="<?php echo $dbuku['stok']; ?>" required="required" readonly>
                </div>
                
                <div class="form-group">
                    <label>Jumlah</label>
                    <input name="jumlah" type="number" class="form-control" placeholder="Jumlah Pemasukan" required="required">
                </div>

                <div class="form-group">
                    <label>Tanggal</label>
                    <input name="tanggal" type="text" class="form-control" value="<?php echo date('d-m-Y'); ?>" required="required" readonly>
                </div>

                <div class="form-group">
                    <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
                    <a href="?menu=data_pegawai" class="btn btn-sm btn-danger">Kembali</a>
                </div>
            </form>
            <!-- Fungsi Simpan -->
            <?php
                if(isset($_POST['fsimpan'])){
                    $id_distributor = $_POST['id_distributor'];
                    $jumlah = $_POST['jumlah'];
                    $tanggal = $_POST['tanggal'];
                    $stokupdate = $jumlah + $dbuku['stok'];

                    $q = "INSERT INTO tb_pasok(id_distributor, id_buku, jumlah, tanggal) VALUES('$id_distributor', '$id_buku', '$jumlah', '$tanggal')";
                    mysqli_query($koneksi, $q);
                    mysqli_query($koneksi, "UPDATE tb_buku SET stok='$stokupdate' WHERE id_buku='$id_buku'");
                    ?>
                        <script type="text/javascript">
                            alert(' Berhasil Input Pemasukan !');
                            document.location.href="?menu=data_buku";
                        </script>
                    <?php
                    
                }
            ?>
        </div>
    </div>
</body>
</html>