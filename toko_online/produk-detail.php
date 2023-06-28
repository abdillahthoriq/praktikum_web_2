<?php 
    require "koneksi.php";
    $nama = htmlspecialchars($_GET['nama']);
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'");
    $produk = mysqli_fetch_array($queryProduk);

    // Produk Terkait

    $queryProdukTerkait = mysqli_query($con , "SELECT * FROM produk WHERE kategori_id = '$produk[kategori_id]' AND id!='$produk[id]' LIMIT 4");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Toko Online | Detail Produk</title>
</head>

<style>
    .img-thumbnail {
        width: 100%; /* Atur lebar gambar ke 100% */
        height: 100%; /* Atur tinggi gambar ke nilai tertentu, misalnya 200px */
        object-fit: cover; /* Atur bagaimana gambar harus mengisi kotak gambar dengan memotong atau memperluas gambar */
        object-position: center;
    }
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-3">
                    <img src="image/<?= $produk['foto']; ?>" class="w-100" alt="produk">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?= $produk['nama']; ?></h1>
                    <p class="fs-5"><?= $produk['detail']; ?></p>
                    <p class="fs-3 text-primary">
                        Rp <?=  $produk['harga']; ?>
                    </p>
                    <p class="fs-5">Status Ketersediaan : <strong><?= $produk['ketersediaan_stok']; ?></strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5 bg-primary">
        <div class="container">
            <h1 class="text-white text-center mb-3">Produk Terkait</h1>
            <div class="row">
                <?php while($data = mysqli_fetch_array($queryProdukTerkait) ) { ?>
                <div class="col-md-6 col-3 ">
                    <a href="produk-detail.php?nama=<?= $data['nama']; ?>">
                        <img src="image/<?= $data['foto'];?>" class="img-thumbnail w-75" alt="produk">
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php require"footer.php"; ?>
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>