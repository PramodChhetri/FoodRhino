<?php

require_once __DIR__ . "../../admin.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Custom fonts for this template-->
    <link href="<?php echo $page_url; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo $page_url; ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- CSS  -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <title>FoodRhino</title>

</head>

<body id="page-top">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/foodrhino/user/">FoodRhino</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/foodrhino/user/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../fraboutus.php">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="../allrestaurant.php">Restaurants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="orderhistory.php">Order History</a>
                            </li>
                        </ul>
                        <!-- Search Bar For FOod  -->
                        <form class="d-flex" method="GET" action="searchfood.php">
                            <input class="form-control me-2" name="searchfood" type="search" placeholder="Search For Food Item" aria-label="Search" style="width: 350px;">
                            <button class="btn btn-outline-success" name="submit" type="submit" style="margin-right: 150px;">Search</button>
                        </form>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow d-flex">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b><?php echo $user['Name'] ?></b></span>
                                <img class="img-profile rounded-circle" height="30px" src="<?php echo $page_url; ?>../uploads/<?php echo $user['Image']; ?> "> </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>

                                <a class="dropdown-item" href="profile/">
                                    <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    View Profile
                                </a>
                            </div>
                        </li>
                    </div>
                </div>
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div>



                <!-- Start of contents -->

                <?php
                $pdo = pdo();
                $stmt = $pdo->prepare("SELECT * FROM orders_history WHERE User_ID = ?");
                $stmt->execute([$user['ID']]);
                $orders = $stmt->fetchAll();



                ?>


                <hr style="color:white ; height:5px; margin-top:0%; margin-bottom:0%;">

                <body id="page-top">

                    <!-- Page Wrapper -->
                    <div id="wrapper">

                        <!-- Sidebar -->
                        <ul class="navbar-nav  sidebar sidebar-dark accordion" style="background-color: #eb6864;" id="accordionSidebar">





                            <!-- Nav Item - UserList -->
                            <li class="nav-item active">
                                <a class="nav-link" href="../orders/">
                                    <i class="fas fa-fw fa-book"></i>
                                    <span>Current</span></a>
                            </li>
                            <!-- Divider -->
                            <hr class="sidebar-divider">
                            <!-- Nav Item - Restaurant -->
                            <li class="nav-item active">
                                <a class="nav-link" href="/user/ordershistory/">
                                    <i class="fas fa-fw fa-book"></i>
                                    <span>Previous</span></a>
                            </li>



                            <!-- Sidebar Toggler (Sidebar) -->
                            <div class="text-center d-none d-md-inline">
                                <button class="rounded-circle border-0" id="sidebarToggle"></button>
                            </div>

                        </ul>
                        <!-- End of Sidebar -->


                        <div class="container" style="width: 100%;">
                            <div class="d-flex justify-content-between">
                                <h2>Orders</h2>

                            </div>
                            <!-- Alert for successful add and delete  -->
                            <?php if (hasSuccess()) : ?>
                                <div class="alert alert-danger">
                                    <?php echo getSuccess();
                                    ?>
                                </div>
                            <?php endif; ?>
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Restaurant</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $order) :
                                        $resdetail = find('restaurant', $order['Restaurant_ID']);
                                        $name = $resdetail['Name'];

                                    ?>
                                        <tr>
                                            <td><?php echo $order['ID'] ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $order['Date']; ?></td>
                                            <!-- Buttons for Crud -->
                                            <td>
                                                <a href="showorder.php?id=<?php echo $order['ID']; ?>"><button class="btn btn-danger">Show</button></a>

                                                <a href="#!!" onclick="ConfirmDelete(<?php echo $order['ID']; ?>)"><button class="btn btn-danger">Delete</button></a>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>



                        <!-- End of contents -->

                        <script>
                            function ConfirmDelete(id) {
                                if (confirm('Are you sure want to delete?')) {
                                    location.href = 'deleteorder.php?id=' + id;
                                }

                            }
                        </script>

                        <?php

                        require_once __DIR__ . "/../admin.php";

                        ?>