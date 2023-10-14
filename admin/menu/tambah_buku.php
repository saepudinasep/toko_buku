<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Document</title>
</head>
<body>
    <div class="row">
        <h3>Tambah Buku</h3>
        
        <form method="post">
            <div class="col-md-6">
                    <label>Judul</label>
                    <input name="judul" type="text" class="form-control" placeholder="Judul Buku">
                <br>
                    <label>No ISBN</label>
                    <input name="noisbn" type="text" class="form-control" placeholder="No. ISBN">
                <br>
                    <label>Penulis</label>
                    <input name="penulis" type="text" class="form-control" placeholder="Penulis">
                <br>
                    <label>Penerbit</label>
                    <input name="penerbit" type="text" class="form-control" placeholder="Penerbit">
                <br>
                    <label>Tahun</label>
                    <input name="tahun" type="number" class="form-control" placeholder="Tahun">
                <br>
            </div>
            <div class="col-md-6">
                    <label>Stok</label>
                    <input name="stok" type="number" class="form-control" placeholder="Stok">
                <br>
                    <label>Harga Pokok</label>
                    <input name="harga_pokok" type="number" class="form-control" placeholder="Harga Pokok">
                <br>
                    <label>Harga Jual</label>
                    <input name="harga_jual" type="number" class="form-control" placeholder="Harga Jual">
                <br>
                    <label>PPN</label>
                    <input name="ppn" type="number" class="form-control" placeholder="PPN">
                <br>
                    <label>Diskon</label>
                    <input name="diskon" type="number" class="form-control" placeholder="Diskon">
                    <br>
            </div>
        
            <div class="form-group">
                    <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
                    <a href="?menu=data_buku" class="btn btn-sm btn-danger">Kembali</a>
            </div>
        </form>
        <!-- Fungsi Simpan -->
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

                    $q = "INSERT INTO tb_buku(judul, noisbn, penulis, penerbit, tahun, stok, harga_pokok, harga_jual, ppn, diskon)
                     VALUES('$judul', '$noisbn', '$penulis', '$penerbit', '$tahun', '$stok', '$harga_pokok', '$harga_jual', '$ppn', '$diskon')";
                    mysqli_query($koneksi, $q);
                    ?>
                        <script type="text/javascript">
                            alert(' Berhasil Menambah Data Buku !');
                            document.location.href="?menu=data_buku";
                        </script>
                    <?php
                }
            ?>
    </div>
</body>
</html>