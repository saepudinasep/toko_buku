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
        $query = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku='$id'");
        $data = mysqli_fetch_array($query);
    ?>
    <div class="row">
        <h3>Edit Data Pegawai</h3>
        <div class="col-md-8">
            <form method="post">
                <div class="form-group">
                    <label>Judul</label>
                    <input name="judul" type="text" class="form-control" value="<?php echo $data['judul']; ?>">
                </div>
                
                <div class="form-group">
                    <label>No ISBN</label>
                    <input name="noisbn" type="text" class="form-control" value="<?php echo $data['noisbn']; ?>">
                </div>
                
                <div class="form-group">
                    <label>Penulis</label>
                    <input name="penulis" type="text" class="form-control" value="<?php echo $data['penulis']; ?>">
                </div>

                <div class="form-group">
                    <label>Penerbit</label>
                    <input name="penerbit" type="text" class="form-control" value="<?php echo $data['penerbit']; ?>">
                </div>

                <div class="form-group">
                    <label>Tahun</label>
                    <input name="tahun" type="number" class="form-control" value="<?php echo $data['tahun']; ?>">
                </div>

                <div class="form-group">
                    <label>Stok</label>
                    <input name="stok" type="number" class="form-control" value="<?php echo $data['stok']; ?>">
                </div>
                
                <div class="form-group">
                    <label>Harga Pokok</label>
                    <input name="harga_pokok" type="number" class="form-control" value="<?php echo $data['harga_pokok']; ?>">
                </div>
                
                <div class="form-group">
                    <label>Harga Jual</label>
                    <input name="harga_jual" type="number" class="form-control" value="<?php echo $data['harga_jual']; ?>">
                </div>
                
                <div class="form-group">
                    <label>PPN</label>
                    <input name="ppn" type="number" class="form-control" value="<?php echo $data['ppn']; ?>">
                </div>
                
                <div class="form-group">
                    <label>Diskon</label>
                    <input name="diskon" type="number" class="form-control" value="<?php echo $data['diskon']; ?>">
                </div>
                <div class="form-group">
                    <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
                    <a href="?menu=data_buku" class="btn btn-sm btn-danger">Kembali</a>
                </div>
            </form>
            <!-- Fungsi -->
            <?php
                if(isset($_POST['fsimpan'])){
                    $judul = $_POST['judul'];
                    $noisbn = $_POST['noisbn'];
                    $penulis = $_POST['penulis'];
                    $penerbit = $_POST['penerbit'];
                    $tahun = $_POST['tahun'];
                    $stok = $_POST['stok'];
                    $harga_pokok = $_POST['harga_pokok'];
                    $harga_jual = $_POST['harga_jual'];
                    $ppn = $_POST['ppn'];
                    $diskon = $_POST['diskon'];

                    $q = "UPDATE tb_buku SET judul='$judul', noisbn='$noisbn', penulis='$penulis', penerbit='$penerbit',
                     tahun='$tahun', stok='$stok', harga_pokok='$harga_pokok', harga_jual='$harga_jual', ppn='$ppn', diskon='$diskon' WHERE id_buku='$id'";
                    mysqli_query($koneksi, $q);
                    ?>
                        <script type="text/javascript">
                            alert(' Berhasil Merubah Data Buku !');
                            document.location.href="?menu=data_buku";
                        </script>
                    <?php
                    
                }
            ?>
        </div>
    </div>
</body>
</html>