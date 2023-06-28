<?php
    require "koneksi.php";

    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, detail, foto FROM produk LIMIT 6");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Toko Online | Home</title>

</head>
<body>
<?php require "navbar.php"; ?>
<div class="container-fluid banner d-flex align-items-center">
    <div class="container text-center text-white">
        <h1>Toko Online Fashion</h1>
        <h3>Mau Cari Apa ?</h3>
        <form action="produk.php" method="GET">
            <div class="col-md-8 offset-2">
                <div class="input-group input-group-lg mt-4">
                    <input type="text" class="form-control" placeholder="Samase Keren" name="keyword">
                    <button type="submit" class="btn warna2">Telusuri</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container text-center">
        <h3>Kategori Terlaris</h3>
        
        <div class="row mt-5 pakaian">
            <div class="col-md-4 mb-3">
                <div class="highlighted-kategori baju1 d-flex justify-content-center align-items-center">
                    <h3 class="text-white"><a href="produk.php?kategori=camera 1">camera-1</a></h3>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="highlighted-kategori baju2 d-flex justify-content-center align-items-center">
                <h3 class="text-white"><a href="produk.php?kategori=camera 2">camera-2</a></h3>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="highlighted-kategori baju3 d-flex justify-content-center align-items-center">
                <h3 class="text-white"><a href="produk.php?kategori=camera 3">camera-3</a></h3>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Tentang Kami -->

    <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h3>Tentang kami</h3>
            <p class="fs-5 mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam maiores, expedita non quae accusamus temporibus vitae quas, quis corrupti nobis soluta sit fuga iusto iure. Totam commodi dolores quas provident dolore illo nisi, deleniti ab laudantium sit adipisci ipsum dicta optio molestias, doloribus fugit excepturi laborum aliquid? Repudiandae dolores, iure dolore obcaecati illum corrupti veniam dolorum totam quibusdam error reprehenderit numquam dolor rerum voluptate distinctio cupiditate iusto vel tenetur saepe est. Cupiditate esse alias facere suscipit ipsa vero dolores rerum iusto! Praesentium fugiat excepturi repellat consequuntur culpa natus ipsam corrupti unde consectetur voluptas delectus harum in, vitae sed, ipsum non!</p>
        </div>
    </div>
    <!-- Produk -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>
            <div class="row mt-5">
                <?php while($data = mysqli_fetch_array($queryProduk)) { ?>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card h-100 bg-body-secondary" style="width: 18rem;">
                            <div class="image-box">
                                <img src="image/<?= $data['foto']; ?>" class="card-img-top" alt="...">
                            </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?= $data['nama']; ?></h4>
                                    <p class="card-text text-truncate"><?= $data['detail']; ?></p>
                                    <p class="text-primary fs-5">Rp <?= $data['harga']; ?></p>
                                    <a href="produk-detail.php?nama=<?= $data['nama']; ?>" class="btn warna3 text-white">lihat detail</a>
                                </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a type="submit" class="btn btn-outline-primary mt-3 p-2 fs-5" href="produk.php">See more</a>
        </div>
    </div>
    <!-- Footer -->
    <?php require "footer.php"; ?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>