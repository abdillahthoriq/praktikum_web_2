<?php
    require "session.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);

    $queryProduk = mysqli_query($con, "SELECT * FROM produk");
    $jumlahProduk = mysqli_num_rows($queryProduk);
    
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin rahasia</title>
</head>
<style>
    .detail:hover{
        color: #06068D !important;
        display: inline-block;

    }
</style>
<body>
    <!-- navbar yang diambil dari file navbar -->
    <?php require "navbar.php"; ?>

    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page" for="home">
                    <i class="fas fa-home" id="home"></i> Home
                </li>
            </ol>
        </nav>
        <h2>halo <?= $_SESSION['username']; ?></h2>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4 bg-success p-4 rounded-3 me-4">
                <div class="row ">
                    <div class="col-6">
                        <i class="fas fa-align-justify fa-3x text-white"></i>
                    </div>
                    <div class="col-6 text-white fs-3">
                        <h3>Kategori</h3>
                        <p><?= $jumlahKategori; ?> Kategori</p>
                        <p><a href="kategori.php" class="detail fs-6 text-decoration-none text-white">Lihat Detail</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 bg-dark p-4 rounded-3">
                <div class="row ">
                    <div class="col-6">
                        <i class="fas fa-cart-shopping fa-3x text-white"></i>
                    </div>
                    <div class="col-6 text-white fs-3">
                        <h3>Produk</h3>
                        <p><?= $jumlahProduk; ?> Produk</p>
                        <p><a href="produk.php" class="detail fs-6 text-decoration-none text-white">Lihat Detail</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

</body>
</html>