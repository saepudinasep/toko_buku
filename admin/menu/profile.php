<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Document</title>
</head>
<body>
    <h3>Profile Anda</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3>Informasi tentang anda !</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Nama </th> <td>:</td> <td> <?php echo $profil['nama']; ?> </td>
                        </tr>
                        <tr>
                            <th>Alamat </th> <td>:</td> <td> <?php echo $profil['alamat']; ?> </td>
                        </tr>
                        <tr>
                            <th>Telepon </th> <td>:</td> <td> <?php echo $profil['telepon']; ?> </td>
                        </tr>
                    </table>
                    <a href="?menu=edit_profile" class="btn btn-sm btn-primary">Edit data saya</a>    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3>Edit Username atau Password</h3>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <legend>Edit Username</legend>
                        <form class="form" method="post">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">User saat ini</span>
                                <input type="text" class="form-control" value="<?php echo $profil['username']; ?>" aria-describedby="basic-addon1" readonly>
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">User baru</span>
                                <input type="text" name="userbaru" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Password Anda</span>
                                <input type="password" name="pass" class="form-control" placeholder="Password Anda" aria-describedby="basic-addon1">
                            </div>
                            <br>
                                <input type="submit" name="edit_user" value="Simpan" class="btn btn-sm btn-success">
                        </form>
                    <!-- fungsi edit username -->
                    <?php
                        if(isset($_POST['edit_user'])){
                            $userbaru = $_POST['userbaru'];
                            $pass = $_POST['pass'];
                            if(md5($pass)==$profil['password']){
                                mysqli_query($koneksi, "UPDATE tb_kasir SET username='$userbaru' WHERE id_kasir='$profil[id_kasir]'");
                                ?>
                                <script type="text/javascript">
                                    alert('Username anda berhasil di Ubah ! Silahkan Login kembali.');
                                    document.location.href="../inc/keluar.php";
                                </script>
                                <?php
                            }else{
                                echo "tidak menjalankan fungsinya";
                            }
                        }
                    ?>
                    </fieldset>
                    <hr>
                    <fieldset>
                        <legend>Edit Password</legend>
                        <form class="form" method="post">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Password Baru</span>
                                <input type="password" name="pass1" class="form-control" placeholder="password baru" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Ketik Ulang Password Baru</span>
                                <input type="password" name="pass2" class="form-control" placeholder="Ketik Ulang" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Password Anda saat ini</span>
                                <input type="password" name="pass_awal" class="form-control" placeholder="password saat ini" aria-describedby="basic-addon1">
                            </div>
                            <br>
                                <input type="submit" name="edit_password" value="Simpan" class="btn btn-sm btn-success">
                        </form>
                        <!-- fungsi edit Password -->
                        <?php
                            if(isset($_POST['edit_password'])){
                                $pass1 = md5($_POST['pass1']);
                                $pass2 = md5($_POST['pass2']);
                                $pass = $_POST['pass_awal'];
                                if($pass1 != $pass2){
                                    ?>
                                    <script type="text/javascript">
                                        alert('Password konfirmasi tidak cocok !');
                                    </script>
                                    <?php
                                }else{
                                    if(md5($pass)==$profil['password']){
                                        mysqli_query($koneksi, "UPDATE tb_kasir SET password='$pass1' WHERE id_kasir='$profil[id_kasir]'");
                                        ?>
                                        <script type="text/javascript">
                                            alert('Password anda berhasil di Ubah ! Silahkan Login kembali.');
                                            document.location.href="../inc/keluar.php";
                                        </script>
                                        <?php
                                    }else{
                                        // echo "tidak menjalankan fungsinya";
                                    }
                                }
                            }
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</body>
</html>