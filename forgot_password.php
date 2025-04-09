<?php
include("config.php");

    if(isset($_POST['email'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $query = "SELECT * FROM `tbl_user` WHERE email = '$email' ";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);

        if ($rows > 0) {
            $token = bin2hex(random_bytes(50)); // Generate Token random 50 karakter
            $expiry = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token bisa digunakan selama 1 jam

            // simpan token and masa expiry ke dalam database
            $query = "UPDATE `tbl_user` SET reset_token = '$token', token_expiry = '$expiry' WHERE email = '$email' ";
            mysqli_query($conn, $query);

            // Mengirimkan link reset password ke email pengguna
            $reset_link = "http://localhost/library/reset_password.php?token=$token";
            $subject = "Reset password";
            $message = "Copy link berikut kemudian anda paste, untuk mereset password anda: $reset_link";
            $headers = "From: no-reply@library.com";

            // Function mail() digunakan untuk mengirimkan email ke alamat email yang dituju
            if (mail($email, $subject, $message, $headers)) {
                echo ("<script>alert('Link reset password telah dikirimkan ke email anda.'); window.location.href = 'login.php'; </script>");
            } else {
                echo ("<script>alert(Gagal mengirim email!)</script>");
            }

        } else {
            echo ("<script>alert('Email anda tidak ditemukan!')</script"); 
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Styling -->
    <style>
        .forgot-form {
            text-align: center;
            margin: 100px auto;
            width: 500px;
            padding: 25px 0;
            border-radius: 8px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.3);
        }

        .forgot-form p {
            font-size: 14px;
            padding-top: 4px;
            color: #969fa4;
            font-family: Arial, sans-serif;
        }

        .navigasi {
            display: flex;
            justify-content: space-between;
            padding: 20px 40px;
            background: #f2f2f2;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .btn-group {
            gap: 26px;
            list-style: none;
        }

        .btn-group .reg {
            background: #5cb85c;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .btn-group .reg:hover {
            background:rgb(81, 158, 81);
        }

        .btn-group-1 .kirim {
            background: blue;
            color: white;
            text-decoration: none;
            padding: 9px 25px;
            border-radius: 6px;
            font-weight: bold;
            transition: background 0.3s ease;
            border: none;
        }

        .btn-group-1 .kirim:hover {
            background:rgb(11, 71, 136);
        }

        .btn-group-1 .cancel {
            background:rgb(206, 205, 205);
            text-decoration: none;
            padding: 9px 25px;
            margin-right: 10px;
            border-radius: 6px;
            font-weight: bold;
            transition: background 0.3s ease;
            border: none;
        }

        .btn-group-1 .cancel:hover {
            background: #b0b0b0;
        }

        .line {
            width: 100%;
            background: #d4d4d4;
            height: 2px;
            margin: 22px 0;
        }

        .btn-group .log {
            background: blue;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: bold;
            transition: background 0.3s ease;
        } 

        .btn-group .log:hover {
            background: #0056b3;

        }

        .inpt {
            margin: 0 30px;
            width: 440px;
            color: #969fa4;
            padding: 9px;
            border: 1px solid #969fa4;
        }

        .submit-btn {
            display: flex;
            justify-content: space-between;
            margin: 0 30px;
            padding: 4px 0;
        }

        .footer {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: grey;
            background: #f2f2f2;
            width: 100%;
            padding: 26px 0;
            bottom: 0;
            position: fixed;
            box-shadow: 0px -4px 6px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
    </style>

</head>

<body>

    <nav class="navigasi">
        <div></div>

        <div class="btn-group">
            <a href="register.php" class="reg">Sign up</a>
            <a href="login.php" class="log">Log in</a>
        </div>
    </nav>

    <form action="" method="POST" autocomplete="off" class="forgot-form">
        <h2>Lupa Password?</h2>
        <p>Tolong masukkan email anda dengan benar untuk mencari akun anda </p>

        <div class="line"></div>
            <div>
                <input type="email" name="email" class="form-control inpt" placeholder="Masukkan email anda" autocomplete="off" required="required">
            </div>
        <div class="line"></div>

            <div class="submit-btn">
                <div></div>
                <div class="btn-group-1">
                    <button class="cancel" type="submit"><a href="login.php" style="text-decoration: none; color: rgb(83, 83, 83);">Cancel</a></button>
                    <button class="kirim" type="submit">Kirim</button>
                </div>
            </div>
    </form>

    <footer class="footer">
        <div class="container text-center">
            <p>&copy; 2025 Management System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>