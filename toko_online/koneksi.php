<?php
    $servername = "localhost";
    $username = "root";
    $password = "nama";
    $databaseName = "toko_online";

    $con = mysqli_connect($servername,$username,$password,$databaseName);

    if(mysqli_connect_errno()) {
        echo "Koneksi gagal :".mysqli_connect_errno();
        exit();
    }

?>


