<?php
require('config.php');

if (isset($_GET['token'])) {

    $token = mysqli_real_escape_string($conn, $_GET['token']);
    $query = "SELECT * FROM `tbl_user` WHERE reset_token = '$token' AND token_expiry > NOW()";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {

        if (isset($_POST['password'])) {
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $hashed_password = md5($password); // Hashing Password

            $query = "UPDATE `tbl_user` SET password = '$hashed_password', reset_token = NULL, token_expiry = NULL WHERE reset_token = '$token' ";
            mysqli_query($conn, $query);

            echo ("<script> alert('Password berhasil direset. silahkan login kembali!'); window.location.href = 'login.php'; </script>");
        }

    } else {
        echo ("<script> alert('Token tidak valid atau telah kadaluarsa!'); </script>");
    }

} else {
    echo ("<script> alert('Token anda tidak ada, mohon masukkan email anda dengan benar!'); </script>");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .reset-container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .reset-container p {
            font-size: 14px;
        }

        .reset-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .reset-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .reset-container button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .reset-container button:hover {
            background-color: #0056b3;
        }
        .reset-container .error {
            color: red;
            font-size: 14px;
            margin: 4px 0;
        }
    </style>
    <script>
        function validateForm() {
            const password = document.getElementById('password').value;
            const error = document.getElementById('error-message');
            if (password.length < 6) {
                error.textContent = "Password harus memiliki minimal 6 karakter!";
                return false;
            }
            error.textContent = "";
            return true;
        }
    </script>
</head>
<body>
<div class="reset-container">
        <h1>Reset Password</h1>
        <p>Masukkan password anda sebanyak kurang dari 6 karakter</p>
        <form action="" method="POST" onsubmit="return validateForm();" autocomplete="off">
            <input type="password" id="password" name="password" placeholder="Masukkan password baru" required>
            <div id="error-message" class="error"></div>
            <button type="submit">Reset Password</button>
        </form>
</body>
</html>