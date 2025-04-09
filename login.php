<?php
// login.php
require('config.php');

session_start();

if (isset($_POST['email'])) {

    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn, $email);

    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);

    $query_email = "SELECT * FROM `tbl_user` WHERE email = '$email' ";
    $result_email = mysqli_query($conn, $query_email) or die(mysqli_error($conn));
    $rows_email = mysqli_num_rows($result_email);

    // Jika email tidak terdaftar di database, maka akan muncul alert yang memberitahukan bahwa email belum terdaftar.
    if ( $rows_email == 0 ) {
        $login_status = 'email_tdk_terdaftar'; // ---> Menyimpan status login ke dalam variabel $login_status untuk digunakan di sweetalert.
    } else {
        $query = "SELECT * FROM `tbl_user` WHERE email = '$email' and password = '". md5($password) ."' ";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $rows = mysqli_num_rows($result); // ---> mysqli_num_rows() adalah function untuk menghitung jumlah baris yang didapatkan dari hasil query.
    
        if ($rows == 1) {
            $_SESSION['email'] = $email; // Menyimpan data email ke dalam session agar bisa digunakan di halaman lain.

            // Untuk mengecek kalau user mencentang checkbox remember me
            if (isset($_POST['remember'])) {
                setCookie("email", $email, time() + (86400 * 30), "/"); // Data email akan disimpan di cookie selama 30 hari, jika user berhasil login dan mencentang checkbox remember me.
            } else {
                // Jika tidak mencentang checkbox remember me, maka cookie emailnya dihapus.   
                if (isset($_COOKIE['email'])) {
                    setCookie("email", "", time() - 3600, "/");
                }
            }
            $login_status = 'berhasil'; // ---> Menyimpan status login ke dalam variabel $login_status untuk digunakan di sweetalert. 
            // Jika berhasil login, maka user diarahkan ke halaman utama dari sistem.
        } else {
            $login_status = 'password_salah';
        }
    }

}

$remembered_email = isset($_COOKIE['email']) ? $_COOKIE['email'] : ""; // Mengambil data cookie email jika ada, jika tidak ada maka di set ke string kosong.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Login css -->
    <style>

        body {
            background: #f2f2f2f2;
        }
        
        .login-form {
            width: 490px;
            margin: 130px auto;
            font-size: 16px;
        }

        .login-form form {
            margin-bottom: 16px;
            background: #fff;
            padding: 30px 0;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.3);
            /* border: 1px solid #ddd; */
            border-radius: 8px;
        }

        .login-form input[type="password"], input[type="email"] {
            width: 391px;
            margin: 30px;
            border-radius: 7px;
            border: 0.1px solid #969fa4;
            padding: 16px;
            margin-left: 49px;
            height: 40px;
            font-size: 15px;
        } 
        
        .login-form h2:before, 
        .login-form h2:after {
            content: "";
            width: 30%;
            height: 2px;
            background: #d4d4d4;
            position: absolute;
            top: 50%;
            z-index: 2;
        }

        .login-form h2 {
            color: #636363;
            margin: 0 0 15px;
            position: relative;
            text-align: center;
        }

        .login-form h2:before {
            left: 0;
        }

        .login-form h2:after {
            right: 0;
        }

        .login-form .hint-text { 
            color: #999;
            text-align: center;
            margin: 0 0 45px;
        }

        .login-form .clearfix {
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-top: 19px;
            margin-left: 60px;
            color: #999;    
        }

        .login-form a {
            text-decoration: none;        
        }

        .login-form a:hover {
            text-decoration: underline;
        }

        .form-control, .btn {
            min-height: 38px;
            border-radius: 5px;
        }

        .btn {
            font-size: 15px;    
            font-weight: bold;
            width: 393px;
            margin: 16px 0 9px;
            padding: 8px;
        }

        .login-form .teks-login {
            color: #999;
            positon: relative;
            top: -40px;
        }
    </style>
</head>
<body>

    <div class="login-form">
        <form action="" method="POST">
            <h2 class="text-center">Login</h2>
            <p class="hint-text">Login ke akunmu dan kelola buku favoritmu.</p>

            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required" autocomplete="off" value="<?php echo htmlspecialchars($remembered_email); ?>">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required" autocomplete="off">
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>

            <div class="clearfix">
                <label for=""><input type="checkbox" name='remember' <?php echo isset($_COOKIE['email']) ? 'checked' : ''; ?>> Remember me</label>
                <a href="forgot_password.php" class="float-right">Forgot Password?</a>
            </div>
        </form>
        <div class="teks-login text-center">Belum punya akun? <a href="register.php">Daftar dulu bro</a></div>
    </div>

</body>

<!-- Bootstrap core JavaScript -->
<script src="js/jquery.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Kode untuk menampilkan sweetalert berdasarkan status login -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        <?php if ($login_status == 'email_tdk_terdaftar'): ?>
            Swal.fire({
                icon: 'Error',
                title: 'Oops...',
                text: 'Anda belum daftar, silahkan daftarkan akun anda terlebih dahulu!',
            })
        <?php elseif ($login_status == 'password_salah'): ?>
            Swal.fire({
                icon: 'Error',
                title: 'Login Gagal',
                text: 'Mohon maaf email atau password yang anda masukkan salah, pastikan email atau password anda benar!'
            })
        <?php elseif ($login_status == 'berhasil'): ?>
            Swal.fire({
                icon: 'Success',
                title: 'Berhasil!',
                text: 'Berhasil login!',
                timer: 1500,
                showConfirmButton: false,
            }).then(function() {
                window.location.href = 'index.php';
            });
        <?php endif; ?>
    });
</script>

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