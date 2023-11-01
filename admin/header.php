<?php

require_once __DIR__ . "/admin.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo $page_url; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo $page_url; ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/foodrhino/admin/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-fw fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">FR Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/foodrhino/admin/">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - UserList -->
            <li class="nav-item active">
                <a class="nav-link" href="/foodrhino/admin/userlist">
                    <i class="fas fa-fw fa-book"></i>
                    <span>User List</span></a>
            </li>

            <!-- Nav Item - Restaurant -->
            <li class="nav-item active">
                <a class="nav-link" href="/foodrhino/admin/restaurantlist">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Restaurant list</span></a>
            </li>

            <!-- Nav Item - Products-->
            <li class="nav-item active">
                <a class="nav-link" href="/foodrhino/admin/products">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Products</span></a>
            </li>

            <!-- Nav Item - Categories -->
            <li class="nav-item active">
                <a class="nav-link" href="/foodrhino/admin/categories">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Categories</span></a>
            </li>

            <!-- Nav Item - Site feed back -->
            <li class="nav-item active">
                <a class="nav-link" href="/foodrhino/admin/frfeedbacks">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Feedbacks</span></a>
            </li>

            <!-- Nav Item - Restaurant Feedback -->
            <li class="nav-item active">
                <a class="nav-link" href="/foodrhino/admin/feedbacks">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Restaurant Feedbacks</span></a>
            </li>

            <!-- Nav Item - Profile -->
            <li class="nav-item active">
                <a class="nav-link" href="/foodrhino/admin/profile">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>




                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b><?php echo $admin['Name'] ?></b></span>
                                <img class="img-profile rounded-circle" src="<?php echo $page_url;   ?>../uploads/<?php echo $admin['Image']; ?> ">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">