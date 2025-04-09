<?php

require('config.php');

// $_REQUEST adalah superglobal variabel yang digunakan untuk mengambil data dari form html yang dikirimkan dengan metode GET atau POST.
if (isset($_REQUEST['firstname'])) {
    
    if ($_REQUEST['password'] == $_REQUEST['confirm_password']) {
        // mysqli_real_escape_string() --> Digunakan untuk mencegah SQL Injection dengan cara menghindari karakter-karakter khusus yang dapat dimanfaatkan untuk menyisipkan perintah SQL ke dalam query.
        // stripslashes() --> Digunakan untuk menghapus karakter backslash (\) yang datanya diambil dari Database atau form html.

        $nama_awal = stripslashes($_REQUEST['firstname']);
        $nama_awal = mysqli_real_escape_string($conn, $nama_awal);

        $nama_akhir = stripslashes($_REQUEST['lastname']);
        $nama_akhir = mysqli_real_escape_string($conn, $nama_akhir);

        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn, $email);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        $trn_date = date("Y-m-d H:i:s");

        $check_email_query = "SELECT * FROM `tbl_user` WHERE email = '$email'";
        $check_email_result = mysqli_query($conn, $check_email_query);
        $check_email_rows = mysqli_num_rows($check_email_result);
        
        // Untuk mengecek kalau email sudah teraftar di database
        if ($check_email_rows > 0 ) {
            $regis_status = 'terdaftar';
        } else {
            $query = "INSERT INTO `tbl_user` (nama_awal, nama_akhir, email, password, trn_date) VALUES ('$nama_awal', '$nama_akhir', '$email', '". md5($password) ."', '$trn_date')";
            $result = mysqli_query($conn, $query);
    
            if ($result) {
                // window.location.href = 'login.php'; --> Untuk mengarahkan user ke halaman login setelah berhasil registrasi.
                // alternatif dari header("Location: index.php");
                $regis_status = 'berhasil';
            } else {
                $regis_status = 'gagal';
            }
        }

    } else {
        $regis_status = 'tidak_sesuai';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CSS Native -->
    <style>
body {
    color: #000;
    background: #f2f2f2f2;
    /* font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; */
}

.signup-form {
    /* border: 0.2px solid #969fa4; */
    width: 450px;
    margin: 75px auto;
    padding: 30px 0;
    border-radius: 8px;
    font-size: 15px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    background: #fff;
}

.form-control {
    height: 40px;
    box-shadow: none;
    color: #969fa4;
}

.form-control:focus {
    border-color: rgb(15, 105, 240);
}

.form-control, .btn {
    border-radius: 7px;
}

.signup-form h2 {
    color: #636363;
    margin-bottom: 15px;
    position: relative;
    text-align: center;
}

.signup-form h2:before,
.signup-form h2:after {
    content: "";
    height: 2px;
    width: 25%;
    background: #d4d4d4;
    position: absolute;
    top: 50%;
    z-index: 2;
}

.signup-form h2:before {
    left: 0;
}

.signup-form h2:after {
    right: 0;
}

.signup-form p {
    padding: 0 30px;
}

.signup-form .hint-text {
    color: #999;
    text-align: center;
    margin-bottom: 30px;
}

.signup-form .form-group {
    margin-bottom: 20px;
}

.signup-form input[type="checkbox"] {
    margin-top: 3px;
}

.signup-form .btn {
    font-size: 17px;
    font-weight: bold;
    width: 392px;
    outline: none !important;
    margin-left: 5px;
}

.signup-form .row div:first-child {
    padding-left: 40px;
}

.signup-form .row div:last-child {
    padding-right: 40px;
}

.signup-form a:hover {
    text-decoration: none;
} 

.signup-form form a {
    color: #5cb85c;
    text-decoration: none;
}

.signup-form form a:hover {
    text-decoration: underline;
}

.signup-form input[type="password"], input[type="email"] {
    width: 393px;
    margin: 5.6px;
    border-radius: 7px;
    padding: 15px;
    margin-left: 29px;
    height: 40px;
} 

.form-check-label {
    display: flex;
    align-items: center;
    gap: 6.5px;
    margin-left: 34px;
    color: #969fa4;
}

.teks-login {
    color: #969fa4;
    position: relative;
    bottom: 57px;
}
    </style>
</head>
<body>

    <div class="signup-form">
        <form action="" method="POST">
            <h2>Registrasi</h2>
            <p class="hint-text">Buat akunmu sekarang juga. gratis dan hanya butuh waktu menitan saja.</p>

                <div class="form-group">
                    <div class="row">
                        <div class="col"><input type="text" class="form-control" name="firstname" placeholder="Nama Awal" required="required" autocomplete="off"></div>
                        <div class="col"><input type="text" class="form-control" name="lastname" placeholder="Nama Akhir" required="required" autocomplete="off"></div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="required" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required" autocomplete="off">
                </div>

                <div class="form-group">
                    <label class="form-check-label"><input type="checkbox" required="required">I accept the <a href="#">Terms of use</a> &amp; <a href="#">Privacy Policy</a></label>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Daftar sekarang</button>
                </div>

            </form>
        </div>

        <div class="teks-login text-center">Sudah punya akun? <a class="text-success" href="login.php">Login disini bro</a></div>

</body>
<!-- Bootstrap core JavaScript -->
<script src="js/jquery.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    <?php if ($regis_status == 'terdaftar'): ?>
        Swal.fire({
            icon: 'Error',
            title: 'Oopss...',
            text: 'Mohon maaf, email sudah terdaftar!'
        });

    <?php elseif ($regis_status == 'berhasil'): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Registrasi berhasil',
        }).then(function() {
            window.location.href = 'login.php';
        })

    <?php elseif ($regis_status == 'gagal'): ?>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '',
        });

    <?php elseif ($regis_status == 'tidak_sesuai'): ?>
        Swal.fire({
            icon: 'error',
            title: 'Password tidak sesuai!',
            text: 'Mohon maaf, konfirmasi password anda tidak sesuai dengan password yang anda masukkan!',
        });

    <?php endif; ?>
    
</script>

<!-- Croppie -->
<script src="js/profile-picture.js"></script>

<!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

    <script>
        feather.replace()
    </script>

</html>