<?php
// Halaman utama (index.php)
include('session.php');

// Ambil data excavator dari database
$query = "SELECT * FROM excavator_items ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Excavators</title>
    <!-- Bootstrap core css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/crudexcavator.css">
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- Feather JS for icons -->
    <script src="js/feather.min.js"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- Container page -->
    <div class="d-flex" id="wrapper">
        
        <!-- Sidebar -->
        <div class="bg-white border-right" id="sidebar-wrapper">
            <div class="user text-center py-4">
                <img class="img img-fluid rounded-circle mb-2" src="<?php echo $user_profile; ?>" alt="foto-profil" width="120">
                <h5 class="mt-2 mb-0"><?php echo $username; ?></h5>
                <p class="text-muted mb-0"><?php echo $email; ?></p>
            </div>

            <div class="sidebar-heading px-3 mt-3 mb-1 text-muted">
                <span>Management</span>
            </div>
            <div class="list-group list-group-flush">
                <a href="dashboard.php" class="list-group-item list-group-item-action" style="font-weight: bold;">
                    <span data-feather="home" class="mr-2" style="font-weight: bold;"></span> Dashboard
                </a>

                <!-- Product dropdown -->
                <a href="#" class="list-group-item list-group-item-action" style="font-weight: bold;" id="productLink">
                    <span data-feather="package" class="mr-2" style="font-weight: bold;"></span> Product
                    <span data-feather="chevron-right" style="float: right;" id="productIcon"></span>
                </a>
                <div id="productSubMenu" style="display: none;">
                    <a href="excavator.php" class="list-group-item list-group-item-action bg-light" style="padding-left: 40px; font-weight: bold;">
                        <span data-feather="truck" class="mr-2" style="font-weight: bold;"></span> Excavator
                    </a>
                    <a href="sparepart.php" class="list-group-item list-group-item-action bg-light" style="padding-left: 40px; font-weight: bold;">
                        <span data-feather="tool" class="mr-2" style="font-weight: bold;"></span> Sparepart
                    </a>
                </div>

                <a href="information/information.php" class="list-group-item list-group-item-action" style="font-weight: bold;">
                    <span data-feather="info" class="mr-2" style="font-weight: bold;"></span> Information
                </a>

                <a href="crudexcavator.php" class="list-group-item list-group-item-action sidebar-active" style="font-weight: bold;">
                    <span data-feather="plus" class="mr-2" style="font-weight: bold;"></span> Manage data
                </a>
            </div>

            <div class="sidebar-heading px-3 mt-4 mb-1 text-muted">
                <span>Settings</span>
            </div>
            <div class="list-group list-group-flush">
                <a href="profil.php" class="list-group-item list-group-item-action" style="font-weight: bold;">
                    <span data-feather="user" class="mr-2" style="font-weight: bold;"></span> Profile
                </a>
                <a href="javascript:void(0)" onclick="confirmLogout()" class="list-group-item list-group-item-action" style="font-weight: bold;">
                    <span data-feather="power" class="mr-2"></span> Log out
                </a>
            </div>
        </div>
        <!-- /End Sidebar -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
                <button class="btn btn-link" id="menu-toggle">
                    <span data-feather="menu"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="profil.php"><?php echo $username; ?></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img img-fluid rounded-circle" src="<?php echo $user_profile; ?>" alt="foto-profil" width="25">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profil.php">Your Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="confirmLogout()">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- /End Navbar -->

            <!-- Main Content -->
            <div class="container-fluid px-4">
                <div class="row mt-4">
                    <div class="col-12">
                        <h2 class="mb-4">Excavator</h2>

                        <div class="excavator-crud-list">
                            <?php 
                            // Tampilkan data excavator dari database
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <!-- Excavator Item -->
                            <div class="excavator-item card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="<?php echo $row['img_path']; ?>" class="card-img" alt="<?php echo $row['name']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                            <p class="card-text"><?php echo $row['description']; ?></p>
                                            <p class="card-text"><strong>Harga:</strong> $<?php echo $row['price']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center justify-content-center">
                                        <div class="action-buttons">
                                            <button class="btn btn-primary btn-sm mb-2" onclick="editExcavator(<?php echo $row['id']; ?>)">
                                                <span data-feather="edit-2"></span> Edit
                                            </button>
                                            <button class="btn btn-danger btn-sm" onclick="deleteExcavator(<?php echo $row['id']; ?>)">
                                                <span data-feather="trash-2"></span> Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                }
                            } else {
                                echo '<div class="alert alert-info">Belum ada data excavator</div>';
                            }
                            ?>
                            
                            <!-- Add New Excavator Button -->
                            <div class="mt-4 mb-5">
                                <button class="btn btn-success" onclick="addNewExcavator()">
                                    <span data-feather="plus"></span> Tambah Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /End Main Content -->
        </div>
        <!-- /End Page Content -->
    </div>
    <!-- /End Container -->

    <!-- Bootstrap core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Initialize Feather Icons
        feather.replace();

        // Menu toggle
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        
        // Product Dropdown
        $("#productLink").click(function(e) {
            e.preventDefault();
            $("#productSubMenu").slideToggle();
            $("#productIcon").toggleClass("rotate-down");
        });

        // Fungsi konfirmasi logout
        function confirmLogout() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan keluar dari sistem",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, logout!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'logout.php';
                }
            });
        }

        // CRUD Functions
        function addNewExcavator() {
            window.location.href = 'add_excavator.php';
        }

        function editExcavator(id) {
            window.location.href = 'edit_excavator.php?id=' + id;
        }

        function deleteExcavator(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan proses delete dengan AJAX
                    $.ajax({
                        url: 'delete_excavator.php',
                        type: 'POST',
                        data: {id: id},
                        success: function(response) {
                            Swal.fire(
                                'Terhapus!',
                                'Data excavator berhasil dihapus.',
                                'success'
                            ).then(() => {
                                location.reload(); // Refresh halaman
                            });
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'Terjadi kesalahan saat menghapus data.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>
</body>

</html>