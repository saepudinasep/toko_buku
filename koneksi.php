<?php
    // ("nama host", "user", "password", "nama database")
    // $koneksi = mysqli_connect("localhost", "root", "", "toko_buku");
    // if($koneksi){
    //     echo "Koneksi Berhasil !";
    // }else{
    //     echo "Koneksi Gagal !";
    // }

    $koneksi = mysqli_connect("sql100.epizy.com", "epiz_32377694", "Wr8PKWQZmJX7", "epiz_32377694_db_toko_buku");
    if($koneksi){
        // echo "Koneksi Berhasil !";
    }else{
        echo "Koneksi Gagal !";
    }
?>