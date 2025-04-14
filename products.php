<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
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
                <a href="" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="home"></span> Dashboard</a>
                <a href="" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="package"></span> Product</a>
                <a href="" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="info"></span> Information</a>
            </div>

            <div class="sidebar-heading">Settings</div>
            <div class="list-group list-group-flush">
                <a href="" class="list-group-item list-group-item-action sidebar-active" style="font-weight: bold;"> <span data-feather="user"></span> Profile</a>
                <a href="logout.php" class="list-group-item list-group-item-action" style="font-weight: bold;"> <span data-feather="power"></span> Log out</a>
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
                        <li class="">
                            <a class="nav-link" href="index.php">Dashboard</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#">
                                <img src="" alt="">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labeledby="navbarDropdown">
                                <a class="dropdown-item" href="profil.php">Your Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li> 
                    </ul>
                </div>
            </nav>
            <!-- /End Navbar Content -->
        </div>

</body>
</html>