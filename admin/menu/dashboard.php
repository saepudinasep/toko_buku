<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Document</title>
</head>
<body>
    <h3>Selamat datang *ADMIN*</h3>
    <h2>Aplikasi Toko Buku</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Data Pegawai</div>
                <div class="panel-body">
                    <center>
                        <h3>
                        <span class="glyphicon glyphicon-user"></span>
                            <?php
                                $qpeg = mysqli_query($koneksi, "SELECT * FROM tb_kasir");
                                $jmlh_peg = mysqli_num_rows($qpeg);
                                echo $jmlh_peg;
                            ?>
                        </h3>
                    </center>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Data Penjualan</div>
                <div class="panel-body">
                    <center>
                        <h3>
                        <span class="glyphicon glyphicon-export"></span>
                            <?php
                                $qpnj = mysqli_query($koneksi, "SELECT * FROM tb_penjualan");
                                $jmlh_pnj = mysqli_num_rows($qpnj);
                                echo $jmlh_pnj;
                            ?>
                        </h3>
                    </center>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Data Distributor</div>
                <div class="panel-body">
                    <center>
                        <h3>
                        <span class="glyphicon glyphicon-user"></span>
                            <?php
                                $qdis = mysqli_query($koneksi, "SELECT * FROM tb_distributor");
                                $jmlh_dis = mysqli_num_rows($qdis);
                                echo $jmlh_dis;
                            ?>
                        </h3>
                    </center>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Data Buku</div>
                <div class="panel-body">
                    <center>
                        <h3>
                        <span class="glyphicon glyphicon-book"></span>
                            <?php
                                $qbuku = mysqli_query($koneksi, "SELECT * FROM tb_buku");
                                $jmlh_buku = mysqli_num_rows($qbuku);
                                echo $jmlh_buku;
                            ?>
                        </h3>
                    </center>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Riwayat Pemasukan</div>
                <div class="panel-body">
                    <center>
                        <h3>
                        <span class="glyphicon glyphicon-import"></span>
                            <?php
                                $qpasok = mysqli_query($koneksi, "SELECT * FROM tb_pasok");
                                $jmlh_pasok = mysqli_num_rows($qpasok);
                                echo $jmlh_pasok;
                            ?>
                        </h3>
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>
</html>