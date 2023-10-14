<?php 
  include "inc/koneksi.php";
  session_start();
  if(@$_SESSION['userweb'] != ""){
    if($_SESSION['level']=="admin"){
      header('location:admin/index.php');
    }else if($_SESSION['level']=="kasir"){
      header('location:kasir/index.php');
    }
  }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Toko Buku -> Login System</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <center>
        <div class="col-md-5 col-md-offset-3">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3>Toko Buku</h3>
              <h4><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Login System</h4>
              <p><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Jln Silopanganten, Desa Ciuyah</p>
              <p>Kec. Waled Kab. Cirebon</p>
              <p><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> 085 721 485 664</p>
            </div>
            <div class="panel-body">
            <br>
            <div class="alert alert-success">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            Masukan username dan password dengan benar !
            </div>

              <form method="post">
                <div class="col-md-11">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Username</span>
                    <input type="text" name="user" class="form-control" placeholder="Username" aria-describedby="basic-addon1" required="required">
                  </div>
                    <br>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Password</span>
                    <input type="password" name="pass" class="form-control" placeholder="Password" aria-describedby="basic-addon1" required="required">
                  </div>
                  <br>
                </div>
                    <input name="flogin" type="submit" class="btn btn-block btn-primary" value="Login">
              </form>
              <?php 
                if(isset($_POST['flogin'])){
                  $user = $_POST['user'];
                  $pass = $_POST['pass'];

                  $qlogin = mysqli_query($koneksi, "SELECT * FROM tb_kasir WHERE username='$user' AND password=md5('$pass')");
                  $cek = mysqli_num_rows($qlogin);
                  $data = mysqli_fetch_array($qlogin);
                  if($cek < 1){
                    ?>
                    <br>
                    <div class="alert alert-danger">
                      Maaf Username atau Password Tidak Cocok
                    </div>
                    <?php
                  }else{
                    if($data['status']=="nonaktif"){
                      ?>
                      <br>
                      <div class="alert alert-danger">
                        Maaf User anda belum aktif !
                      </div>
                      <?php
                    }else if($data['status']=="aktif"){
                      $_SESSION['userweb'] = $data['id_kasir'];
                      $_SESSION['level'] = $data['akses'];
                      if($data['akses']=="admin"){
                        
                        header('location:admin/index.php');
                      }else if($data['akses']=="kasir"){
                        
                        header('location:kasir/index.php');
                      }
                    }
                  }
                }
              ?>

            </div>
          </div>
        </center>
      </div>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
