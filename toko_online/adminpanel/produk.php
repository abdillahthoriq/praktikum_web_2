<?php
    require "session.php";
    require "../koneksi.php";

    $queryProduk = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id");
    $jumlahProduk = mysqli_num_rows($queryProduk);

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");


    function generateRandomString($length = 10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for($i = 0; $i < $length; $i++){
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <title>Produk</title>
</head>
    <style>
        form div {
            margin: 15px;
        }
    </style>
<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="../adminpanel/" class="home-breadcrumb text-decoration-none text-muted"><i class="fas fa-home"></i>  Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        Produk
                    </li>
                </ol>
        </nav>
            <!-- Tambah produk -->
        <div class="my-5 col-12 col-md-6">
            <h3>Tambah Produk</h3>

            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                    <option value="">Pilih Satu</option>
                <?php
                        while($data = mysqli_fetch_array($queryKategori)){
                ?>      
                        <option value="<?= $data['id']; ?>"><?= $data['nama']; ?></option>
                <?php
                        } 
                ?>
                    </select>
                </div>

                <div>
                    <label for="harba">Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" required>
                </div>

                <div>
                    <label for="foto">Foto</label>
                    <input type="file" id="foto" name="foto" class="form-control">
                </div>
                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" cols="80" rows="10" class="form-control"></textarea>
                </div>

                <div>
                    <label for="ketesediaan_stok">ketersediaan Stok</label>
                    <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                        <option value="tersedia">tersedia</option>
                        <option value="habis">habis</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>

                <?php 
                    if(isset($_POST['simpan'])){
                        $kategori = htmlspecialchars($_POST['kategori']);
                        $nama = htmlspecialchars($_POST['nama']);
                        $harga = htmlspecialchars($_POST['harga']);
                        $detail = htmlspecialchars($_POST['detail']);
                        $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);
                        
                        $target_dir = "../image/";
                        $nama_file = basename($_FILES["foto"]["name"]);
                        $target_file = $target_dir . $nama_file;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $image_size = $_FILES['foto']['size'];
                        $random_name = generateRandomString(20);
                        $mergeFile = $random_name . "." . $imageFileType;




                        if($nama=='' || $kategori=='' || $harga==''){
                ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            Nama,Kategori Atau Harga Wajib Di isi !
                        </div>
                <?php
                        }else{
                            if($nama_file!= ''){
                                if($image_size > 100000){
                ?>
                                    <div class="alert alert-warning" role="alert">
                                        Foto Tidak Boleh Lebih dari 500 Kb
                                    </div>  
                <?php
                                }
                                else{
                                    if ($imageFileType!= 'png' && $imageFileType!= 'jpg' && $imageFileType!= 'gif' && $imageFileType!= 'jpeg'){
                ?>
                                    <div class="alert alert-warning" role="alert">
                                        File tipe berwajib jpg atau png atau gif 
                                    </div>
                <?php
                                    }
                                    else{
                                        move_uploaded_file($_FILES['foto']['tmp_name'],$target_dir . $mergeFile);
                                    }
                                }
                            }
                            $queryTambahProduk = mysqli_query($con, "INSERT INTO produk(kategori_id,nama,harga,detail,ketersediaan_stok,foto) VALUES ('$kategori','$nama', '$harga', '$detail', '$ketersediaan_stok', '$mergeFile')");


                            if($queryTambahProduk){
                ?>  
                            <div class="alert alert-primary">
                                Produk Berhasil Ditambahkan 
                            </div>
                            <meta  http-equiv="refresh" content="2; url=produk.php"/>
                <?php
                            }else{
                                echo mysqli_error($con);
                            }
                        } 
                    }
                ?>
            </form>
        </div>
        <div class="mt-5">
                <h3>List Produk</h3>
                <div class="table-responsive mt-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Katersediaan Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if($jumlahProduk==0){
                                ?>              
                                        <tr>
                                            <td colspan="6" class="text-center">Data Produk Tidak Tersedia</td>
                                        </tr>
                                <?php
                                    }else{
                                        $angka = 1; 
                                        while($data = mysqli_fetch_array($queryProduk)){
                                ?>
                                            <tr>
                                                <td><?= $angka ?></td>
                                                <td><?= $data['nama']; ?></td>
                                                <td><?= $data['nama_kategori']; ?></td>
                                                <td><?= $data['harga']; ?></td>
                                                <td><?= $data['ketersediaan_stok']; ?></td>
                                                <td>
                                                    <a href="produk-detail.php?p=<?= $data['id']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
                                                </td>
                                            </tr>
                                <?php       $angka++;
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                </div>
                
        
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>