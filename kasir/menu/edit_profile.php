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
        <h3>Rubah Informasi Tentang Anda</h3>
        <div class="col-md-8">
            <form method="post">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $profil['nama']; ?>">
                </div>
                
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control"><?php echo $profil['alamat']; ?></textarea>
                </div>
                
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telp" class="form-control" value="<?php echo $profil['telepon']; ?>">
                </div>
                 
                <div class="form-group">
                    <input type="submit" name="edit_profil" class="btn btn-sm btn-success" value="Simpan">
                    <a class="btn btn-sm btn-danger" href="?menu=profile">Batal</a>
                </div>
                <!-- Fungsinya -->
                <?php
                    if(isset($_POST['edit_profil'])){
                        $nama = $_POST['nama'];
                        $alamat = $_POST['alamat'];
                        $telp = $_POST['telp'];
                        mysqli_query($koneksi, "UPDATE tb_kasir SET nama='$nama', alamat='$alamat', telepon='$telp' WHERE id_kasir='$profil[id_kasir]'");
                        ?>
                        <script type="text/javascript">
                            alert('Perubahan telah tersimpan !');
                            document.location.href="?menu=profile";
                        </script>
                        <?php
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>