<?php 
    require "koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

    // get Produk by nama produk/keyword
        if(isset($_GET['keyword'])){
            if(isset($_GET['keyword'])){
                $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
            }
            
        }
    // get produk by kategori
        else if(isset($_GET['kategori'])){
            $getProdukId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
            $kategoriId = mysqli_fetch_array($getProdukId);
            
            $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");
        }
    // get produk default
    else{
        $queryProduk = mysqli_query($con, "SELECT * FROM produk");
    }     
    $countData = mysqli_num_rows($queryProduk);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <div class="contaiiner-fluid banner-produk d-flex align-items-center">
        <div class="container ">
            <h1 class="text-white text-center">Produk</h1>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-3" >
                <h3>Kategori</h3>
                <ul class="list-group">
                    <?php while($kategori = mysqli_fetch_array($queryKategori)) { ?>
                        <a href="produk.php?kategori=<?= $kategori['nama']; ?>" class="text-decoration-none">
                            <li class="list-group-item"><?= $kategori['nama']; ?></li>  
                        </a>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-9" >
                <h3 class="text-center mb-3">Produk</h3>
                <?php if($countData < 1) {
                    ?> 
                        <h4 class="text-center mt-5">Produk yang anda cari tidak ada</h4>
                    <?php
                } ?>    

                <div class="row">
                    <?php  while($produk = mysqli_fetch_array($queryProduk)) { ?>
                        <div class="col-md-4 m-2">
                                <div class="card h-100 bg-body-secondary" style="width: 18rem;">
                                    <div class="image-box">
                                        <img src="image/<?= $produk['foto']; ?>" class="card-img-top" alt="...">
                                    </div>
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $produk['nama']; ?></h4>
                                            <p class="card-text text-truncate"><?= $produk['detail']; ?></p>
                                            <p class="text-primary fs-5"><?= $produk['harga']; ?></p>
                                            <a href="produk-detail.php?nama=<?= $produk['nama']; ?>" class="btn warna3 text-white">lihat detail</a>
                                        </div>
                                </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
        <?php require "footer.php"; ?>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>