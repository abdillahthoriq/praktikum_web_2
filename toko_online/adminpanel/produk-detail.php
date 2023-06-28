<?php
    require "session.php";
    require "../koneksi.php";

    $id = $_GET['p'];
    $query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
    $data = mysqli_fetch_array($query);

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <title>Details Produk</title>
</head>

<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-5">
        <h5>Detail Produk</h5>
        <div class="col-12 col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" class="form-control" name="nama" autocomplete="off" value="<?= $data['nama']; ?>" required>
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="<?= $data['kategori_id']; ?>"><?= $data['nama_kategori'] ?></option>
                        <?php
                        while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                            echo '<option value="' . $dataKategori['id'] . '">' . $dataKategori['nama'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="currentFoto" class="d-block">Foto Sekarang</label>
                    <img src="../image/<?= $data['foto']; ?>" alt="Foto Tidak Ditemukan" class="img-thumbnail" width="300">
                </div>
                <div class="mt-2">
                    <label for="harga">Harga</label>
                    <input type="number" value="<?= $data['harga'] ?>" id="harga" class="form-control" name="harga">
                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" class="form-control" cols="80" rows="10"><?= trim($data['detail']); ?></textarea>
                </div>
                <div>
                    <label for="ketersediaan_stok">Ketersediaan Stok</label>
                    <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                        <option value="<?= $data['ketersediaan_stok']; ?>"><?= $data['ketersediaan_stok']; ?></option>
                        <?php
                        if ($data['ketersediaan_stok'] == 'tersedia') {
                            echo '<option value="habis">habis</option>';
                        } else {
                            echo '<option value="tersedia">tersedia</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="m-3 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                </div>
            </form>
            <?php
            if (isset($_POST['simpan'])) {
                $kategori = htmlspecialchars($_POST['kategori']);
                $nama = htmlspecialchars($_POST['nama']);
                $harga = htmlspecialchars($_POST['harga']);
                $detail = htmlspecialchars($_POST['detail']);
                $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

                $target_dir = "../image/";
                $nama_file = $_FILES["foto"]["name"];
                $target_file = $target_dir . basename($nama_file);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = $_FILES['foto']['size'];
                $random_name = generateRandomString(20);
                $mergeFile = $random_name . "." . $imageFileType;

                if ($nama == '' || $kategori == '' || $harga == '') {
                    echo '<div class="alert alert-warning mt-3" role="alert">Nama, Kategori, dan Harga wajib diisi!</div>';
                } else {
                    $queryUpdate = mysqli_query($con, "UPDATE produk SET kategori_id='$kategori', nama='$nama', harga='$harga', detail='$detail', ketersediaan_stok='$ketersediaan_stok' WHERE id='$id'");

                    if ($nama_file != '') {
                        if ($image_size > 500000) { // Ubah batasan ukuran file menjadi 500 KB (500000 byte)
                            echo '<div class="alert alert-warning" role="alert">Foto tidak boleh lebih dari 500 Kb</div>';
                        } else {
                            if ($imageFileType != 'png' && $imageFileType != 'jpg' && $imageFileType != 'gif' && $imageFileType != 'jpeg') {
                                echo '<div class="alert alert-warning" role="alert">File harus memiliki ekstensi jpg, png, atau gif</div>';
                            } else {
                                if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_dir . $mergeFile)) {
                                    $queryUpdateFoto = mysqli_query($con, "UPDATE produk SET foto='$mergeFile' WHERE id='$id'");

                                    if ($queryUpdateFoto) {
                                        echo '<div class="alert alert-primary mt-5" role="alert">Foto berhasil diupdate</div>';
                                        echo '<meta http-equiv="refresh" content="2; url=produk.php">';
                                    } else {
                                        echo mysqli_error($con);
                                    }
                                } else {
                                    echo '<div class="alert alert-warning" role="alert">Terjadi kesalahan saat mengupload foto</div>';
                                }
                            }
                        }
                    }
                }
            }
            if(isset($_POST['hapus'])){
                $queryhapus = mysqli_query($con, "DELETE FROM produk WHERE id='$id'");
                
                if($queryhapus){
            ?>
                <div class="alert alert-primary" role="alert">
                        Produk Berhasil Di Hapus
                </div>
                <meta http-equiv="refresh" content="2; url=produk.php">
            <?php
                }else{
                    echo mysqli_error($con);
                }
            }
            ?>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>
