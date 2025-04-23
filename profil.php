<?php

// Halaman profil (profil.php)
include('session.php');

if (isset($_POST['save'])) {

    $namaAwal = $_POST['first-name'];
    $namaAkhir =  $_POST['last-name'];
    $email1 = $_POST['email'];

    $sql = "UPDATE `tbl_user` SET nama_awal = '$namaAwal', nama_akhir = '$namaAkhir', email = '$email1' WHERE id_pengguna = '$userid' ";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo ("<script>alert('Data berhasil di update!'); window.location.href = 'profil.php'; </script>");

        // Ambil data yang sudah terupdate dari database
        $result2 = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE id_pengguna = '$userid'");
        if ($result2 && mysqli_num_rows($result2) > 0) {
            $row = mysqli_fetch_assoc($result2);
            $username = $row['nama_awal'] . ' ' . $row['nama_akhir'];
            $email = $row['email'];

            $_SESSION['email'] = $email; // Simpan data email yang sudah terupdate atau terbaru ke dalam session

            // NOTE PENTING: Jika ingin mengupdate data dan datanya ingin berubah secara dinamis pada halaman webnya,
            // maka kita WAJIB mengambil data yang sudah terupdate dari database dan menyimpannya ke dalam session.
        }
    } else {
        echo ("<script>alert('Tidak dapat mengeksekusi $sql')</script>");
    }

}

    if (isset($_POST['upload'])) {

        $name = $_FILES['file']['name']; // Menangkap nama file beserta ekstensi yang diupload
        $target_dir = "photo/"; // Direktori (folder) tujuan untuk menyimpan file yang diupload
        $target_file = $target_dir . basename($_FILES["file"]["name"]); // basename() --> Mengambil nama file beserta ekstensinya dari path yang diberikan.

        // Mendapatkan eksetensi file yang diunggah dan mengubahnya menjadi huruf kecil.
        $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // pathinfo() --> digunakan untuk mendapatkan informasi tentang path file, seperti nama file, direktori, dan ekstensi.
        // PATHINFO_EXTENSION --> HANYA mengambil ekstensi file dari path yang diberikan.

        //  Daftar ekstensi file yang diperbolehkan untuk diunggah
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        // Mengecek apakah ekstensi file yang diunggah termasuk dalam daftar yang diperbolehkan atau tidak.
        if (in_array($imgFileType, $extensions_arr)) {

            $query = "UPDATE `tbl_user` SET profile_path = '$name' WHERE id_pengguna = '$userid' ";
            mysqli_query($conn, $query);

            // Untuk memindahkan file dari lokasi sementara ke direktori tujuan.
            move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);

            $result = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE id_pengguna = '$userid' ");

                if ($result && mysqli_num_rows($result) > 0 ) {
                    $row = mysqli_fetch_assoc($result);
                    $user_profile = $target_dir . $row['profile_path'];
                }
            header("Refresh: 0");
        }

    }  

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <title>Book Management System - Profile Page</title>
    <!-- Bootstrap core css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Dashboard CSS for Dark Mode support -->
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- Material Icons for Dark Mode Toggle -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- Feather JS for icons -->
    <script src="js/feather.min.js"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- custom styles -->
    <style>
body {
	background-color: #EFEFEF;
}

/* Styling buat navbar */
.navbar {
    padding: 0.5rem 1rem;
    width: 100%;
}

.navbar-nav.ml-auto {
    display: flex;
    margin-left: auto !important; 
}

.navbar-collapse {
    justify-content: flex-end; 
}

.input-group {
    border-radius: 3px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
    margin: auto;
    width: 395px;
}

.input-group-append button{
    height: 44px;
    border-radius: 0 1px;
}

.custom-file input[type='file'] {
    display: none;
}  

/* .custom-file .custom-file-label {
    position: relative;
    left: -270px;
    top: 7px;
} */

.custom-file-input {
    flex: 1;
    padding: 8px 12px;
    border: none;
    background: white;
    font-size: 14px;
    height: 40px;
}

.custom-file-label {
    background: #e0e0e0;
    padding: 10px 12px;
    border: none;
    font-size: 16px;
    cursor: pointer;
}

.custom-file-input:active {
    border: none;
}

.feather {
  width: 20px;
  height: 20px;
  stroke: #4D4D4D;
  stroke-width: 2;
  stroke-linecap: round;
  stroke-linejoin: round;
  fill: none;
  vertical-align: text-bottom;
}

.list-group{
  background-color: #FFFFFF;
}

.list-group-item{
  border:none;
  border-bottom: 1px solid #ddd;
}

/* Styling untuk submenu */
#productSubmenu .list-group-item {
  padding-left: 15px;
  padding-top: 5px;
  padding-bottom: 5px;
}

.user {
  text-align: center;
  border-bottom: 1px solid #ddd;
}

.user img {
  padding: 10px;
}

.toggler {
  color: #000;
  background-color: #fff;
  border: none;
  outline: none;
}

.sidebar-active {
  color: #6f42c1 !important;
  font-weight: 500;
}

.sidebar-active .feather{
	stroke: #6f42c1;
	font-weight: 500;
}

#wrapper {
    overflow-x: hidden;
	background-color: #fff;
}

.border-right {
    border-right: 1px solid #ddd;
}

#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 14px;
  font-weight: bold;
  text-transform: uppercase;
  color: #999;
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }
}

/* Add Rounded Border to Card */
.card{
  margin-bottom: 10px;
}
.container-fluid{
  margin-right: 20px;
}
/* Custom Gradients */
.card-gradient-1{
	border:none;
	color: #ffffff;
	background: #ED213A;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #93291E, #ED213A);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #93291E, #ED213A); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.card-gradient-2{
	border:none;
	color: #ffffff;
	background: #E44D26;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #E44D26, #F16529);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #E44D26, #F16529); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.card-gradient-3{
	border:none;
	color: #ffffff;
	background: #cc2b5e;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #753a88, #cc2b5e);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #753a88, #cc2b5e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.card-gradient-4{
	border:none;
	color: #ffffff;
	background: #00B4DB;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #0083B0, #00B4DB); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.card-gradient-5{
	border:none;
	color: #ffffff;
	background: #136a8a;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #267871, #136a8a);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #267871, #136a8a); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.card-gradient-6{
	border:none;
	color: #ffffff;
	background: #2b5876;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #4e4376, #2b5876);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #4e4376, #2b5876); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.card-gradient-7{
	border:none;
	color: #ffffff;
	background: #6a3093;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #a044ff, #6a3093);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #a044ff, #6a3093); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.card-gradient-8{
	border:none;
	color: #ffffff;
	background: #B24592;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #F15F79, #B24592);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #F15F79, #B24592); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.card-gradient-9{
	border:none;
	color: #ffffff;
	background: #c94b4b;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #4b134f, #c94b4b);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #4b134f, #c94b4b); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


}

.card-gradient-10{
	border:none;
	color: #ffffff;
	background: #C33764;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #1D2671, #C33764);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #1D2671, #C33764); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}

.card-gradient-11{
	border:none;
	color: #ffffff;
	background: #EB3349;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #F45C43, #EB3349);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #F45C43, #EB3349); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.card-gradient-12{
	border:none;
	color: #ffffff;
	background: #283048;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #859398, #283048);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #859398, #283048); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

/* Styling untuk rotasi ikon */
.rotate-down {
    transform: rotate(90deg);
    transition: transform 0.3s ease;
}

.rotate-right {
    transform: rotate(0deg);
    transition: transform 0.3s ease;
}

/* Hover effect for sidebar menu items */
.list-group-item {
    transition: transform 0.3s ease;
}

.list-group-item:hover {
    transform: translateX(10px);
}
    </style>
</head>

<body>
    <!-- Container page profil -->
    <div class="d-flex" id="wrapper">

        <!-- Sidebar Content -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="user">
                <img class="img img-fluid rounded-circle" src="<?php echo $user_profile; ?>" alt="foto-profil" width="120">
                <h4><?php echo $username; ?></h4>
                <p><?php echo $email; ?></p>
            </div>

            <div class="sidebar-heading">Management</div>
            <div class="list-group list-group-flush">
                <a href="dashboard.php" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="home"></span> Dashboard</a>
                
                <!-- Implementasi ulang dropdown product -->
                <a href="#" class="list-group-item list-group-item-action" style="font-weight: bold;" id="productLink">
        
                    <span data-feather="package"></span> Product
                    <span data-feather="chevron-right" style="float: right; width: 16px; height: 16px;" id="productIcon"></span>
                </a>
                <div id="productSubMenu" style="display: none;">
                    <a href="excavator.php" class="list-group-item list-group-item-action" style="padding-left: 40px; font-size: 14px;">
                        <span data-feather="truck"></span> Excavator
                    </a>
                    <a href="" class="list-group-item list-group-item-action" style="padding-left: 40px; font-size: 14px;">
                        <span data-feather="tool"></span> Sparepart
                    </a>
                </div>
                
                <a href="information/information.php" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="info"></span> Information</a>
                <a href="crudexcavator.php" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="plus"></span> Manage data</a>
            </div>

            <div class="sidebar-heading">Settings</div>
            <div class="list-group list-group-flush">
                <a href="" class="list-group-item list-group-item-action sidebar-active" style="font-weight: bold;"> <span data-feather="user"></span> Profile</a>
                <a href="javascript:void(0)" onclick="confirmLogout()" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="power"></span> Log out</a>
            </div>
        </div>
        <!-- /End Sidebar Content -->

        <!-- Main Page Content -->
        <div id="page-content-wrapper">

            <!-- Navbar Content -->
            <nav class="navbar navbar-expand-lg navbar-light border-bottom">
                <button class="toggler" type="button" id="menu-toggle" aria-expanded="false">
                    <span data-feather="menu"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="profil.php"><?php echo $username; ?></a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img img-fluid rounded-circle" src="<?php echo $user_profile; ?>" alt="foto-profil" width="25">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labeledby="navbarDropdown">
                                <a class="dropdown-item" href="profil.php">Your Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="confirmLogout()">Logout</a>
                            </div>
                        </li> 
                    </ul>
                </div>
            </nav>
            <!-- /End Navbar Content -->

            <!-- Tampilan ubah profil -->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">

                        <p class="mt-4"><b>Ubah foto profil</b></p>
                        <form class="form" action="" method="POST" enctype='multipart/form-data'> <!-- atribut enctype untuk -->
                            <div class="text-center mt-4">
                                <img class="img img-fluid rounded-circle" src="<?php echo $user_profile; ?>" alt="Profile-Picture" width="140px">
                            </div>

                            <div class="input-group col-md mb-4 mt-4 d.flex justify-content-center">
                                <div class="custom-file">
                                    <input type="text" class="custom-file-input" value="Ubah foto profil" disabled>
                                    <input type="file" name='file' class="custom-file-input" id="profilepic" aria-describedby="profilepicinput"> <!-- Input ini tidak diperlihatkan ke layar web, alias displaynya none. -->
                                    <label class="custom-file-label" for="profilepic">Browse</label> 
                                    <!-- Best Practicenya jika ingin mengupload file, gunakan satu label sebagai acuan kita pada saat ingin mengupload filenya -->
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="submit" name='upload' id="profilepicinput">Upload Picture</button>
                                </div>
                            </div>
                        </form>

                        <p class="mt-5 mb-3"><b>Ubah nama profil</b></p>
                        <form action="" method="POST" id="registrationForm" autocomplete="off">
                            <div class="row">

                                <div class="col">
                                    <div class="form-group">        
                                        <div class="col-md">
                                            <label for="first-name">First name</label>
                                            <input type="text" name='first-name' class="form-control" id='first-name' placeholder="First name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <div class="col-md">
                                            <label for="">last name</label>
                                            <input type="text" class="form-control" name='last-name' id='last-name' placeholder="Last name" required>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class='form-group'>
                                <div class="col-md mt-4">
                                    <label for="email">Email</label>
                                    <input type="email" name='email' id='email' placeholder='Email Adress' class='form-control' required>
                                </div>
                            </div>

                            <div class='form-group'>
                                <div class="col-md mt-4">     
                                    <button class="btn btn-block btn-lg btn-success form-control" name="save" type="submit" >Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- /End tampilan ubah profil -->

        </div>
        <!-- /End Main Page Content -->

    </div>
    <!-- /End Container Page Profil -->


    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Dark Mode JS -->
    <script src="js/dark-mode.js"></script>

    <!-- Script buat Burger Menu Toggle -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
    </script>

    <script>
        feather.replace()
    </script>

    <!-- Script untuk Konfirmasi Logout  -->
    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Konfirmasi Logout',
                text: "Apakah Anda yakin ingin keluar dari sistem?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "logout.php";
                }
            });
        }
    </script>

    <!-- Script untuk dropdown sidebar -->
    <script>
        $(document).ready(function() {
            // Implementasi dropdown dengan toggle ikon
            $("#productLink").click(function(e) {
                e.preventDefault();
                $("#productSubMenu").slideToggle("fast");
                
                // Toggle icon rotation between right and down
                if ($("#productSubMenu").is(":visible")) {
                    $("#productIcon").addClass("rotate-down").removeClass("rotate-right");
                } else {
                    $("#productIcon").addClass("rotate-right").removeClass("rotate-down");
                }
            });
        });
    </script>

    <!-- Script untuk upload foto profil -->
    <script type="text/javascript">
        $(document).ready(function() {

            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.avatar').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".file-upload").on('change', function() {
                readURL(this);
            });     
        });
    </script>

</body>

</html>