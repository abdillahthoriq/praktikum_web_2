<?php 
    session_start();
    require "../koneksi.php";  
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko_online</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<style>
    .main {
        height: 100vh;
    }
    .login-box{
        width: 500px;
        height: 300px;
        box-sizing: border-box;
        border-radius: 10px;
    }
</style>
<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow"> 
            <form action="" method="POST">
                <div>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-success form-control mt-4" name="loginbtn">Login</button>
            </form>
        </div>
        <div class="mt-3" style="width: 500px;">
            <?php 
                if(isset($_POST['loginbtn'])){
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);

                    $query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
                    $countData = mysqli_num_rows($query);
                    $data =mysqli_fetch_array($query);
                    if($countData>0){
                        if(password_verify($password, $data['password'])){
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['login'] = true;
                            header('location: ../adminpanel');
                        }else{
                            ?>
                                <div class="alert alert-primary text-center" role="alert">
                                    Password salah!
                                </div>
                            <?php
                        }
                    }else{
            ?>  
                            <div class="alert alert-primary text-center" role="alert">
                                Akun Tidak Tersedia !
                            </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
    <script src="../fontawesome/css/all.min.css"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>


