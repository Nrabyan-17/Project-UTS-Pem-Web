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
    <link rel="stylesheet" href="css/crudexcavator.css">
    <title>Manage Excavators</title>

    <!-- Bootstrap core css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Feather JS for icons -->
    <script src="js/feather.min.js"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

                    <a href="information.php" class="list-group-item list-group-item-action" style="font-weight: bold;"> 
                        <span data-feather="info"></span> Information
                    </a>
                </div>

                <div class="sidebar-heading">Settings</div>
                <div class="list-group list-group-flush">
                    <a href="profile.php" class="list-group-item list-group-item-action" style="font-weight: bold;"> 
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
                                <a class="nav-link" href="profile.php"><?php echo $username; ?></a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="img img-fluid rounded-circle" src="<?php echo $user_profile; ?>" alt="foto-profil" width="25">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labeledby="navbarDropdown">
                                    <a class="dropdown-item" href="profile.php">Your Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="confirmLogout()">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- /End Navbar Content -->

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Navigation -->
            <nav class="top-nav">
                <div class="user-info">
                    <img src="<?php echo $user_profile; ?>" alt="Profile" class="profile-pic">
                    <span class="username">@<?php echo $username; ?>.com</span>
                </div>
            </nav>

            <!-- Content Area -->
            <div class="content-area">
                <h1>Excavator</h1>

                <div class="excavator-crud-list">
                    <!-- Excavator Item -->
                    <div class="excavator-item">
                        <div class="excavator-image">
                            <img src="photo/excavators/crawler1.jpg" alt="Crawler Excavator">
                        </div>
                        <div class="excavator-info">
                            <h3>Crawler Excavator</h3>
                            <p>Crawler excavators move on steel tracks, giving them excellent stability on uneven or soft ground. They are commonly used in heavy-duty digging operations on construction or mining sites.</p>
                            <div class="price">$6</div>
                        </div>
                        <div class="action-buttons">
                            <button class="btn-edit" onclick="editExcavator(1)">
                                <span data-feather="edit-2"></span>
                            </button>
                            <button class="btn-delete" onclick="deleteExcavator(1)">
                                <span data-feather="trash-2"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Excavator Item -->
                    <div class="excavator-item">
                        <div class="excavator-image">
                            <img src="photo/excavators/crawler2.jpg" alt="Crawler Excavator">
                        </div>
                        <div class="excavator-info">
                            <h3>Crawler Excavator</h3>
                            <p>Crawler excavators move on steel tracks, giving them excellent stability on uneven or soft ground. They are commonly used in heavy-duty digging operations on construction or mining sites.</p>
                            <div class="price">$6</div>
                        </div>
                        <div class="action-buttons">
                            <button class="btn-edit" onclick="editExcavator(2)">
                                <span data-feather="edit-2"></span>
                            </button>
                            <button class="btn-delete" onclick="deleteExcavator(2)">
                                <span data-feather="trash-2"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Excavator Item -->
                    <div class="excavator-item">
                        <div class="excavator-image">
                            <img src="photo/excavators/crawler3.jpg" alt="Crawler Excavator">
                        </div>
                        <div class="excavator-info">
                            <h3>Crawler Excavator</h3>
                            <p>Crawler excavators move on steel tracks, giving them excellent stability on uneven or soft ground. They are commonly used in heavy-duty digging operations on construction or mining sites.</p>
                            <div class="price">$6</div>
                        </div>
                        <div class="action-buttons">
                            <button class="btn-edit" onclick="editExcavator(3)">
                                <span data-feather="edit-2"></span>
                            </button>
                            <button class="btn-delete" onclick="deleteExcavator(3)">
                                <span data-feather="trash-2"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Add New Excavator Button -->
                    <div class="add-excavator">
                        <button class="btn-add" onclick="addNewExcavator()">
                            <span data-feather="plus"></span>
                            <span>Tambah Data</span>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Initialize Feather Icons
        feather.replace();

        // CRUD Functions
        function addNewExcavator() {
            window.location.href = 'add_excavator.php';
        }

        function editExcavator(id) {
            window.location.href = 'edit_excavator.php?id=' + id;
        }

        function deleteExcavator(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Add your delete logic here
                    Swal.fire(
                        'Deleted!',
                        'The excavator has been deleted.',
                        'success'
                    );
                }
            });
        }
    </script>
</body>

</html>