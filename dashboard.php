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
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Book Management System - Dashboard</title>

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
                    <a href="" class="list-group-item list-group-item-action sidebar-active" style="font-weight: bold;"> <span data-feather="home"></span> Dashboard</a>

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

                    <a href="information/information.php" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="info"></span> Information</a>
                </div>

                <div class="sidebar-heading">Settings</div>
                <div class="list-group list-group-flush">
                    <a href="profil.php" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="user"></span> Profile</a>
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

                <!-- Dashboard -->
                <div class="dashboard-container">
                    <h1>Dashboard</h1>
                    <div class="dashboard">
                        <div class="sales">
                            <div class="status">
                                <div class="info">
                                    <h3>Total Sales</h3>
                                    <h1>1,000</h1>
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
                        <div class="pemasukan">
                            <div class="status">
                                <div class="info">
                                    <h3>Income</h3>
                                    <h1>1,000</h1>
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

                        <div class="pengeluaran">
                            <div class="status">
                                <div class="info">
                                    <h3>Expenditure</h3>
                                    <h1>1,000</h1>
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
                </div>
                <!--  Akhir Dashboard -->

                <!-- new-user -->
                <div class="new-user">
                    <h2>User Lists</h2>
                    <div class="user-list">
                        <div class="user">
                            <img src="photo/default_profile.png" alt="">
                            <h2>Ishna</h2>
                            <p>1 hours ago</p>
                        </div>
                        <div class="user">
                            <img src="photo/default_profile.png" alt="">
                            <h2>Ilham</h2>
                            <p>1 hours ago</p>
                        </div>
                        <div class="user">
                            <img src="photo/default_profile.png" alt="">
                            <h2>Abyan</h2>
                            <p>1 hours ago</p>
                        </div>
                    </div>
                </div>
                <!-- end new-user -->

                <!-- KALO MAU NAMBAH DISINI -->

            </div>
            <!-- Right Section -->

            <div class="right-section">
                <div class="nav">
                    <button id="menu-btn">
                        <span class="material-icons-sharp">menu</span>
                    </button>
                    <div class="dark-mode">
                        <span class="material-icons-sharp active">light_mode</span>
                        <span class="material-icons-sharp">dark_mode</span>
                    </div>
                </div>
                <!-- End of Nav -->

                <div class="reminders">
                    <div class="header">
                        <h2>Reminders</h2>
                        <span class="material-icons-sharp">notifications_none</span>
                    </div>

                    <div class="notification">
                        <div class="icon">
                            <span class="material-icons-sharp">volume_up</span>
                        </div>
                        <div class="content">
                            <div class="info">
                                <h3>Workshop</h3>
                                <small class="text_muted">08:00 AM - 12:00 PM</small>
                            </div>
                            <span class="material-icons-sharp">more_vert</span>
                        </div>
                    </div>

                    <div class="notification deactive">
                        <div class="icon">
                            <span class="material-icons-sharp">edit</span>
                        </div>
                        <div class="content">
                            <div class="info">
                                <h3>Workshop</h3>
                                <small class="text_muted">08:00 AM - 12:00 PM</small>
                            </div>
                            <span class="material-icons-sharp">more_vert</span>
                        </div>
                    </div>

                    <div class="notification add-reminder">
                        <div>
                            <span class="material-icons-sharp">add</span>
                            <h3>Add Reminder</h3>
                        </div>
                    </div>
                </div>
            <!-- end right section -->
        </div>
    </main>

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