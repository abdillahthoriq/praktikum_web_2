<?php
        require "session.php";
        require "../koneksi.php";

    $id = $_GET['p'];
    $query = mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
    $data = mysqli_fetch_array($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <title>Detail kategori</title>
</head>
<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-3">
        <h2>Detail Kategori</h2>

        <div class="col-12 col-md-6">
            <form action="" method="POST">
                <div>
                    <label for="kategor">Kategori</label>
                    <input type="text" id="kategori" name="kategori" class="form-control" value="<?= $data['nama'] ?>">
                </div>
                <div class="mt-5 mb-3 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="editBtn">Edit</button>
                    <button type="submit" class="btn btn-danger" name="deleteBtn">Delete</button>
                </div>
            </form>
            <?php 
                if(isset($_POST['editBtn'])){
                    $kategori = htmlspecialchars($_POST['kategori']);

                    if($data['nama']==$kategori){
            ?>
                            <meta http-equiv="refresh" content="0; url=http:kategori.php"/>
            <?php
                    }else{
                        $query = mysqli_query($con, "SELECT * FROM kategori WHERE nama='$kategori'");
                        $jumlahData = mysqli_num_rows($query);

                        if($jumlahData > 0 ){
            ?>
                            <div class="alert alert-info" role="alert">
                                Kategori Sudah Ada !
                            </div>
            <?php
                        }else{
                            $SimpanDataBaru = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE id='$id'"); 

                            if($SimpanDataBaru){
                                ?> 
                                <div class="alert alert-info" role="alert">
                                    Kategori Berhasil Tersimpan !
                                </div>
                                <meta http-equiv="refresh" content="1; url=kategori.php"/>
            <?php
                            }else{
                                echo mysqli_errno($con);
                            }
                        }
                    }
                }
                if(isset($_POST['deleteBtn'])){
                    $queryCheck = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$id'");
                    $queryCount = mysqli_num_rows($queryCheck);
                    if($queryCount > 0){
            ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Kategori tidak bisa dihapus karena sudah dipakai di produk 
                    </div>
                    <?php
                    die();
                    }
                    $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");

                    if($queryDelete){
            ?>
                        <div class="alert alert-info" role="alert">
                                    Kategori Berhasil Dihapus
                        </div>
                    <meta http-equiv="refresh" content="2; url=kategori.php" />
            <?php
                    }else{
                        echo mysqli_errno($con);
                    }
                }
            ?>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>