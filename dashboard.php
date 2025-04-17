<?php
// Halaman utama (index.php)
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management System - Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">

    <!-- Bootstrap core css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Feather JS for icons -->
    <script src="js/feather.min.js"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <a href="" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="home"></span> Dashboard</a>

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

                    <a href="" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="info"></span> Information</a>
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
        
                <h1>Dashboard</h1>
                <!-- Dashboard -->
                <div class="dashboard">
                    <div class="sales">
                        <div class="status">
                            <div class="info">
                                <h3>Total Sales</h3>
                                <h1>Rp.1,000,000,000</h1>
                            </div>
                            <div class="progresss">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>
                                <div class="percentage">
                                    <p>+93%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="visits">
                        <div class="status">
                            <div class="info">
                                <h3>Site Visit</h3>
                                <h1>10,000</h1>
                            </div>
                            <div class="progresss">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>
                                <div class="percentage">
                                    <p>-21%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="searches">
                        <div class="status">
                            <div class="info">
                                <h3>Searches</h3>
                                <h1>10,000</h1>
                            </div>
                            <div class="progresss">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>
                                <div class="percentage">
                                    <p>+21%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Akhir Dashboard -->
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

</body>

</html>