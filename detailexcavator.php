<?php
// Halaman utama (index.php)
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/detailexcavator.css">
    <title>Excavator Details - SANY</title>

    <!-- Bootstrap core css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Feather JS for icons -->
    <script src="js/feather.min.js"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style>
        .no-results {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
            margin: 20px 0;
            color: #6c757d;
            font-size: 16px;
        }
        
        .search-bar {
            transition: all 0.3s ease;
            border: 1px solid #ced4da;
        }
        
        .search-bar:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        
        .search-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .reset-search {
            margin-left: 10px;
            padding: 4px 8px;
            display: none;
        }
    </style>
</head>

<body>
    <main>
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
                    <a href="dashboard.php" class="list-group-item list-group-item-action" style="font-weight: bold;"> 
                        <span data-feather="home"></span> Dashboard
                    </a>

                    <a href="#" class="list-group-item list-group-item-action sidebar-active" style="font-weight: bold;" id="productLink">
                        <span data-feather="package"></span> Product
                        <span data-feather="chevron-right" style="float: right; width: 16px; height: 16px;" id="productIcon"></span>
                    </a>
                    <div id="productSubMenu">
                        <a href="excavator.php" class="list-group-item list-group-item-action sidebar-active" style="padding-left: 40px; font-size: 14px;">
                            <span data-feather="truck"></span> Excavator
                        </a>
                        <a href="sparepart.php" class="list-group-item list-group-item-action" style="padding-left: 40px; font-size: 14px;">
                            <span data-feather="tool"></span> Sparepart
                        </a>
                    </div>

                    <a href="information/information.php" class="list-group-item list-group-item-action" style="font-weight: bold;"> 
                        <span data-feather="info"></span> Information
                    </a>
                </div>

                <div class="sidebar-heading">Settings</div>
                <div class="list-group list-group-flush">
                    <a href="profil.php" class="list-group-item list-group-item-action" style="font-weight: bold;"> 
                        <span data-feather="user"></span> Profile
                    </a>
                    <a href="javascript:void(0)" onclick="confirmLogout()" class="list-group-item list-group-item-action" style="font-weight: bold;"> 
                        <span data-feather="power"></span> Log out
                    </a>
                </div>
            </div>
            <!-- /End Sidebar Content -->

            <!-- Main Page Content -->
            <div id="page-content-wrapper">
                <!-- Navbar Content -->
                <nav class="navbar navbar-expand-lg navbar-dark border-bottom">
                    <button class="toggler" type="button" id="menu-toggle" aria-expanded="false">
                        <span data-feather="menu"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="profile.php" style="color: #363949;"><?php echo $username; ?></a>
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

                <!-- Main Content -->
                <div class="main-content">
                    <div class="content">
                        <h1 class="brand-title">SANY</h1>
                        
                        <div class="search-container">
                            <input type="text" class="search-bar" placeholder="Cari tipe excavator...">
                            <button type="button" class="btn btn-sm btn-outline-secondary reset-search" title="Reset pencarian">
                                <span data-feather="x"></span>
                            </button>
                        </div>
                        
                        <div class="excavator-list">
                            <!-- SY75C Excavator -->
                            <div class="excavator-card">
                                <div class="excavator-image">
                                    <img src="photo/excavators/sy75c.jpg" alt="SANY SY75C">
                                </div>
                                <div class="excavator-content">
                                    <div class="excavator-header">
                                        <h2>SY75C</h2>
                                        <div class="price-tag">$12</div>
                                        <div class="status-tag">Ready in store house</div>
                                    </div>
                                    <div class="excavator-description">
                                        SY75C menawarkan mesin Yanmar T4F yang efisien dan andal. Dilengkapi dengan
                                        kontrol joystick dan sistem hidraulik bantu dua arah, excavator ringkas ini membuktikan
                                        bahwa Anda tidak perlu mengorbankan ukuran demi performa. Kokpit yang nyaman
                                        dilengkapi dengan pemanas dan AC untuk pengoperasian sepanjang hari dalam iklim
                                        apa pun dan desain yang ramah perawatan memungkinkan akses cepat ke semua titik
                                        servis untuk meminimalkan waktu henti.
                                    </div>
                                    <div class="excavator-specs">
                                        <div class="spec-item">Operating Weight: 7.2 T</div>
                                        <div class="spec-item">Net Power: 43.0 kW</div>
                                        <div class="spec-item">Dig Depth: 4,450 mm</div>
                                    </div>
                                </div>
                            </div>

                            <!-- SY60C Excavator -->
                            <div class="excavator-card">
                                <div class="excavator-image">
                                    <img src="photo/excavators/sy60c.jpg" alt="SANY SY60C">
                                </div>
                                <div class="excavator-content">
                                    <div class="excavator-header">
                                        <h2>SY60C</h2>
                                        <div class="price-tag">$12</div>
                                        <div class="status-tag imported">Imported</div>
                                    </div>
                                    <div class="excavator-description">
                                        SY60C adalah eksekavator yang seimbang yang telah dioptimalkan untuk stabilitas dan
                                        tenaga dengan memuaskan pecisi titik, torsi boom yang dan warna skor
                                        komponen yang ekstrim merupakan mesin yang telah terbukti untuk
                                        panjang yang tinggi. Didukung oleh garansi standar terkuat di industri ini selama 5 tahun/5.000 jam. SY60C
                                        memberikan nilai maksimum.
                                    </div>
                                    <div class="excavator-specs">
                                        <div class="spec-item">Operating Weight: 6.1 T</div>
                                        <div class="spec-item">Net Power: 41.7 kW</div>
                                        <div class="spec-item">Dig Depth: 3,581 mm</div>
                                    </div>
                                </div>
                            </div>

                            <!-- SY55C Excavator -->
                            <div class="excavator-card">
                                <div class="excavator-image">
                                    <img src="photo/excavators/sy55c.jpg" alt="SANY SY55C">
                                </div>
                                <div class="excavator-content">
                                    <div class="excavator-header">
                                        <h2>SY55C</h2>
                                        <div class="price-tag">$12</div>
                                        <div class="status-tag imported">Imported</div>
                                    </div>
                                    <div class="excavator-description">
                                        SY55C adalah eksekavator kompak yang menggabungkan kinerja tinggi dengan
                                        efisiensi bahan bakar yang luar biasa. Sistem hidraulik yang responsif dan
                                        kontrol yang presisi membuat mesin ini ideal untuk pekerjaan di ruang terbatas.
                                        Kabin operator yang ergonomis menawarkan visibilitas 360 derajat dan
                                        kenyamanan sepanjang hari.
                                    </div>
                                    <div class="excavator-specs">
                                        <div class="spec-item">Operating Weight: 5.5 T</div>
                                        <div class="spec-item">Net Power: 36.2 kW</div>
                                        <div class="spec-item">Dig Depth: 3,500 mm</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /End Main Content -->
            </div>
        </div>
    </main>

    <!-- Bootstrap core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        feather.replace();

        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

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

        $(document).ready(function() {
            $("#productLink").click(function(e) {
                e.preventDefault();
                $("#productSubMenu").slideToggle("fast");

                if ($("#productSubMenu").is(":visible")) {
                    $("#productIcon").addClass("rotate-down").removeClass("rotate-right");
                } else {
                    $("#productIcon").addClass("rotate-right").removeClass("rotate-down");
                }
            });

            // Fungsi pencarian excavator
            $(".search-bar").on("keyup", function() {
                var searchText = $(this).val().toLowerCase();
                
                // Tampilkan tombol reset jika ada text di search bar
                if(searchText.length > 0) {
                    $(".reset-search").show();
                } else {
                    $(".reset-search").hide();
                }
                
                $(".excavator-card").each(function() {
                    var excavatorType = $(this).find("h2").text().toLowerCase();
                    var excavatorDesc = $(this).find(".excavator-description").text().toLowerCase();
                    var excavatorSpecs = $(this).find(".excavator-specs").text().toLowerCase();
                    
                    if (excavatorType.indexOf(searchText) > -1 || 
                        excavatorDesc.indexOf(searchText) > -1 ||
                        excavatorSpecs.indexOf(searchText) > -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                // Tampilkan pesan jika tidak ada hasil
                if ($(".excavator-card:visible").length === 0) {
                    if ($(".no-results").length === 0) {
                        $(".excavator-list").append('<div class="no-results">Tidak ada excavator yang sesuai dengan pencarian Anda.</div>');
                    }
                } else {
                    $(".no-results").remove();
                }
            });
            
            // Fungsi tombol reset pencarian
            $(".reset-search").on("click", function() {
                $(".search-bar").val("");
                $(".excavator-card").show();
                $(".no-results").remove();
                $(this).hide();
                feather.replace(); // Update icon feather
            });
        });
    </script>
</body>

</html>