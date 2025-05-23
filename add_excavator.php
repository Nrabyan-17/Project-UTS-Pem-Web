<?php
// Halaman untuk menambah data excavator
include('session.php');

// Jika form disubmit
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    
    // Handle file upload
    $target_dir = "photo/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $image_path = $target_file;
    $upload_success = true;
    
    // Periksa apakah file gambar
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check === false) {
        $upload_success = false;
        $error_message = "File harus berupa gambar.";
    }
    
    // Periksa ekstensi file
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if(!in_array($file_extension, $allowed_extensions)) {
        $upload_success = false;
        $error_message = "Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
    }
    
    // Upload file jika valid
    if ($upload_success) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Insert data ke database
            $query = "INSERT INTO excavator_items (name, description, price, img_path) 
                     VALUES ('$name', '$description', '$price', '$image_path')";
            
            if (mysqli_query($conn, $query)) {
                $success_message = "Data excavator berhasil ditambahkan.";
                // Redirect setelah 2 detik
                header("refresh:2;url=crudexcavator.php");
            } else {
                $error_message = "Error: " . mysqli_error($conn);
            }
        } else {
            $error_message = "Gagal mengupload file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/crudexcavator.css">
    <title>Tambah Excavator</title>

    <!-- Bootstrap core css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Feather JS for icons -->
    <script src="js/feather.min.js"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-submit {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #45a049;
        }
        .btn-cancel {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        .btn-cancel:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>
    <!-- Container page -->
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
                    <a href="excavator.php" class="list-group-item list-group-item-action" style="padding-left: 40px; font-size: 14px;">
                        <span data-feather="truck"></span> Excavator
                    </a>
                    <a href="" class="list-group-item list-group-item-action" style="padding-left: 40px; font-size: 14px;">
                        <span data-feather="tool"></span> Sparepart
                    </a>
                </div>

                <a href="information/information.php" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="info"></span> Information</a>
                <a href="crudexcavator.php" class="list-group-item list-group-item-action sidebar-active" style="font-weight: bold;">
                    <span data-feather="plus" class="mr-2" style="font-weight: bold;"></span> Manage data
                </a>
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
            <nav class="navbar navbar-expand-lg navbar-light border-bottom w-100">
                <button class="toggler" type="button" id="menu-toggle" aria-expanded="false">
                    <span data-feather="menu"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        
                        <li class="nav-item mx-1">
                            <a class="nav-link username-link" href="profil.php"><?php echo $username; ?></a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle profile-dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <main class="main-content">

                <!-- Content Area -->
                <div class="content-area">
                    <div class="container form-container">
                        <h2 class="mb-4">Tambah Excavator Baru</h2>
                        
                        <?php if(isset($success_message)): ?>
                            <div class="alert alert-success">
                                <?php echo $success_message; ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if(isset($error_message)): ?>
                            <div class="alert alert-danger">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                        
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Nama Excavator:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Deskripsi:</label>
                                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="price">Harga (dalam USD):</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="image">Gambar:</label>
                                <input type="file" class="form-control-file" id="image" name="image" required>
                                <small class="form-text text-muted">Upload gambar dengan format JPG, JPEG, PNG, atau GIF</small>
                            </div>
                            
                            <div class="form-group">
                                <a href="crudexcavator.php" class="btn btn-cancel">Batal</a>
                                <button type="submit" name="submit" class="btn btn-submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
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
        $(document).ready(function() {
            $("#productLink").click(function(e) {
                e.preventDefault();
                $("#productSubMenu").slideToggle("fast");
                
                // Toggle icon rotation
                if ($("#productSubMenu").is(":visible")) {
                    $("#productIcon").addClass("rotate-down").removeClass("rotate-right");
                } else {
                    $("#productIcon").addClass("rotate-right").removeClass("rotate-down");
                }
            });
            
            // Auto-hide sidebar pada layar kecil saat halaman dimuat
            if (window.innerWidth < 992) {
                $("#wrapper").addClass("toggled");
            }
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
    </script>
</body>

</html> 