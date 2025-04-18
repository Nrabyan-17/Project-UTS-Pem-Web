<?php
include('../session.php');
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Information Excavator</title>

  <!-- Bootstrap core css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Feather JS for icons -->
  <script src="js/feather.min.js"></script>
  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    body {
      /* margin: 0;
      font-family: Arial, sans-serif; */
      background: #EFEFEF;
      /* color: #333; */
    }

    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 220px;
      height: 100vh;
      background: #e0e0e0;
      padding: 20px;
      box-shadow: 2px 0 8px rgba(0,0,0,0.1);
    }

    .sidebar h2 {
      color: #333;
      font-size: 20px;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar ul li {
      padding: 10px 0;
      color: #555;
      cursor: pointer;
    }

    .sidebar ul li strong {
      color: #000;
    }

    .main {
      margin-left: 220px;
      padding: 30px 20px 30px 10px;
      transition: margin 0.25s ease-out;
    }

    #wrapper.toggled .main {
      margin-left: auto;
      margin-right: auto;
      max-width: 100%;
      padding: 30px 10%;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .header h1 {
      font-size: 24px;
      color: #222;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
      padding-left: 0;
      width: 100%;
    }

    #wrapper.toggled .grid {
      max-width: 90%;
      margin: 0 auto;
    }

    .card {
      background: #fff;
      border-radius: 10px;
      padding: 15px;
      transition: 0.3s;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      border: 1px solid #ddd;
    }

    .card:hover {
      border: 1px solid #0099cc;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .card img {
      max-width: 100%;
      height: 100px;
      object-fit: contain;
    }

    .card h3 {
      font-size: 16px;
      margin: 10px 0 5px;
      color: #111;
    }

    .card p {
      font-size: 12px;
      color: #555;
    }

    .card a {
      display: block;
      margin-top: 10px;
      font-size: 12px;
      color: #0077aa;
      text-decoration: none;
    }

    .card a:hover {
      text-decoration: underline;
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
  color: #6f42c1;
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

.page-content-wraper {
    width: 100%;
    flex-grow: 1;
}

.page-content-wraper .navbar {
    width: 100%;
}
  </style>
</head>
<body>

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
                <a href="index.php" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="home"></span> Dashboard</a>
                
                <!-- Implementasi ulang dropdown product -->
                <a href="#" class="list-group-item list-group-item-action" style="font-weight: bold;" id="productLink">
                    <span data-feather="package"></span> Product
                    <span data-feather="chevron-right" style="float: right; width: 16px; height: 16px;" id="productIcon"></span>
                </a>
                <div id="productSubMenu" style="display: none;">
                    <a href="" class="list-group-item list-group-item-action" style="padding-left: 40px; font-size: 14px;">
                        <span data-feather="truck"></span> Excavator
                    </a>
                    <a href="" class="list-group-item list-group-item-action" style="padding-left: 40px; font-size: 14px;">
                        <span data-feather="tool"></span> Sparepart
                    </a>
                </div>
                
                <a href="information.php" class="list-group-item list-group-item-action sidebar-active" style="font-weight: bold;"> <span data-feather="info"></span> Information</a>
            </div>

            <div class="sidebar-heading">Settings</div>
            <div class="list-group list-group-flush">
                <a href="profil.php" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="user"></span> Profile</a>
                <a href="javascript:void(0)" onclick="confirmLogout()" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="power"></span> Log out</a>
            </div>
        </div>
        <!-- /End Sidebar Content -->

        <!-- Main page content -->
        <div class="page-content-wraper">

          <!-- Navbar Content -->
          <nav class="navbar navbar-expand-lg navbar-light border-bottom w-100">

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

  <!--  -->
  <div class="main">
    <!-- Card Excavator -->
    <div class="grid">

      <div class="card" onclick="location.href='information/detail_information.php?type=crawler'">
        <img src="photo/crawler.png" alt="Crawler Excavator">
        <h3>Crawler Excavator</h3>
        <p>Crawler excavator merupakan jenis excavator paling umum dan paling sering digunakan dalam berbagai proyek konstruksi berat, pertambangan, serta </p>
        <a href="detail_information.php?type=crawler">&rarr; Selengkapnya</a>
      </div>

      <div class="card" onclick="location.href='information/detail_information.php?type=wheeled'">
        <img src="photo/wheeled.png" alt="Wheeled Excavator">
        <h3>Wheeled Excavator</h3>
        <p>Wheeled excavator menggunakan roda karet alih-alih rantai. Biasanya digunakan untuk proyek di area perkotaan atau lokasi konstruksi dengan</p>
        <a href="detail_information.php?type=wheeled">&rarr; Selengkapnya</a>
      </div>

      <div class="card" onclick="location.href='information/detail_information.php?type=mini'">
        <img src="photo/mini.png" alt="Mini Excavator">
        <h3>Mini Excavator</h3>
        <p>Mini excavator adalah excavator berukuran kecil yang dirancang untuk pekerjaan di ruang terbatas atau area sempit, seperti </p>
        <a href="detail_information.php?type=mini">&rarr; Selengkapnya</a>
      </div>

      <div class="card" onclick="location.href='information/detail_information.php?type=longreach'">
        <img src="photo/longreach.png" alt="Long Reach Excavator">
        <h3>Long Reach Excavator</h3>
        <p>Sesuai namanya, long reach excavator memiliki lengan (boom dan arm) yang jauh lebih panjang dari excavator standar. Jenis ini dirancang </p>
        <a href="detail_information.php?type=longreach">&rarr; Selengkapnya</a>
      </div>

      <div class="card" onclick="location.href='information/detail_information.php?type=dragline'">
        <img src="photo/dragline.png" alt="Dragline Excavator">
        <h3>Dragline Excavator</h3>
        <p>Dragline excavator adalah salah satu excavator terbesar dan digunakan dalam proyek skala industri, seperti tambang terbuka (open-pit mining), pembangunan pelabuhan, </p>
        <a href="detail_information.php?type=dragline">&rarr; Selengkapnya</a>
      </div>

      <div class="card" onclick="location.href='information/detail_information.php?type=suction'">
        <img src="photo/suction.png" alt="Suction Excavator">
        <h3>Suction Excavator</h3>
        <p>Suction excavator, juga dikenal sebagai vacuum excavator, adalah alat berat yang bekerja dengan menghisap tanah atau material melalui tekanan udara tinggi. Alat ini </p>
        <a href="detail_information.php?type=suction">&rarr; Selengkapnya</a>
      </div>

      <div class="card" onclick="location.href='information/detail_information.php?type=amphibious'">
        <img src="photo/amphibious.png" alt="Amphibious Excavator">
        <h3>Amphibious Excavator</h3>
        <p>Excavator jenis ini dirancang khusus untuk bekerja di medan berair, rawa, atau tanah lunak. Dilengkapi dengan ponton (struktur mengapung) sebagai </p>
        <a href="detail_information.php?type=amphibious">&rarr; Selengkapnya</a>
      </div>

      </div>
    </div>
  </div>
</div>

   <!-- Bootstrap core JavaScript -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
