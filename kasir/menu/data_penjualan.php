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
        <div class="col-xs-12 col-md-8">
            <h3>Data Penjualan</h3>
            <?php
                $qjumlah = mysqli_query($koneksi, "SELECT * FROM tb_jual");
                $jumlah = mysqli_num_rows($qjumlah);
            ?>
            
            <button class="btn btn-sm btn-default">Jumlah Data <span class="badge"><?php echo $jumlah; ?></span></button>
            <a href="?menu=data_penjualan" class="btn btn-sm btn-primary">Refresh</a>
        </div>
        <div class="col-xs-6 col-md-4">
            <form method="post">
                <div class="input-group">
                    <input name="inputan" type="text" class="form-control" placeholder="Cari Pegawai">
                    <span class="input-group-btn">
                        <input name="cari" class="btn btn-default" value="Cari" type="submit">
                    </span>
                </div><!-- /input-group -->
            </form>
        </div>
    </div>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kasir</th>
                <th>Total</th>
                <th>Uang Pembali</th>
                <th>Uang Kembali</th>
                <th>Tanggal</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            $inputan = $_POST['inputan'];
            if($_POST['cari']){
                if($inputan==""){
                    $q = mysqli_query($koneksi, "SELECT tb_jual.*, tb_kasir.*
                    FROM tb_jual
                    INNER JOIN tb_kasir ON tb_kasir.id_kasir=tb_jual.id_kasir");
                }
                else if($inputan!==""){
                    $q = mysqli_query($koneksi, "SELECT tb_jual.*, tb_kasir.*
                    FROM tb_jual
                    INNER JOIN tb_kasir ON tb_kasir.id_kasir=tb_jual.id_kasir WHERE judul LIKE '%$inputan%'");
                }
            }
            else{
                $q = mysqli_query($koneksi, "SELECT tb_jual.*, tb_kasir.*
                FROM tb_jual
                INNER JOIN tb_kasir ON tb_kasir.id_kasir=tb_jual.id_kasir");
            }
                $cek = mysqli_num_rows($q);

                if($cek < 1){
                    ?>
                    <tr>
                        <td colspan="7">
                            <center>
                                Data tidak tersedia !
                                <a href="" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-refresh"></span></a>
                            </center>
                        </td>
                    </tr>
                    <?php
                }
                else{
                    
            while($data = mysqli_fetch_array($q)){
                
            
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['total']; ?></td>
                <td>Rp. <?php echo $data['uang']; ?></td>
                <td><?php echo $data['kembali']; ?></td>
                <td><?php echo $data['tanggal']; ?></td>
                <td>
                    <a href="?menu=detail&id_jual=<?php echo $data['id_jual']; ?>" class="btn btn-success">Detail</a>
                    
                </td>
            </tr>
            <?php
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html>