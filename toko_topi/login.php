<?php 
session_start();
$koneksi = new mysqli("localhost","root","","toko_topi"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pelanggan</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-default">
        <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <?php if (isset($_SESSION["pelanggan"])): ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif ?>
            <li><a href="checkout.php">Checkout</a></li>
        </ul>
        </div>
    </nav>
    <div class="container">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-tittle">Login Pelanggan</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group"></div>
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button class="btn btn-primary" name="login">login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php 
    if (isset($_POST["login"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

        $akunyangcocok = $ambil->num_rows;

        if ($akunyangcocok==1)
        {
            $akun = $ambil->fetch_assoc();

            $_SESSION["pelanggan"] = $akun;

            echo "<script>alert('anda sukses login')</script>";
            echo "<script>location='checkout.php'</script>";  
        }

        else
        {
            echo "<script>alert('anda gagal login periksa akun anda')</script>";
            echo "<script>location='login.php'</script>";

        }
    }
    ?>
</body>
</html>