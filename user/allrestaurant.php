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
                                <a class="nav-link " aria-current="page" href="/foodrhino/user/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="fraboutus.php">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active " href="allrestaurant.php">Restaurants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="orders/">Order History</a>
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

                                <a class="dropdown-item" href="../userprofile.php?id=<?php echo $user['ID'];   ?>">
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


                <div class="container" style="margin-bottom: 60px;margin-top: 40px;">
                    <div class="row">

                        <div style="margin-bottom: 10px;">
                            <h3 style="float: left;"><strong> RESTAURANTS</strong></h3>
                        </div>
                        <hr>
                        <!-- Search Bar For Restaurant -->
                        <div style="margin-bottom: 30px;">
                            <form class="d-flex" method="GET" action="searchrestaurant.php">
                                <input class="form-control me-2" name="search" type="search" placeholder="Search for Restaurant Here" aria-label="Search" style="width: 700px;">
                                <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
                            </form>
                        </div>


                        <?php


                        $allrestaurants = all('restaurant');

                        foreach ($allrestaurants as $ar) :
                        ?>

                            <div class="col-md-6 col-lg-3" style="padding: 10px;">
                                <div class="listing">
                                    <div class="listing__photo" style="height:150px !important">
                                        <a href="restaurant.php?id=<?php echo $ar['ID']; ?>">
                                            <img src="../uploads/<?php echo $ar['F_Image'];   ?>" style="width:100%;">
                                        </a>
                                    </div>
                                    <div class="title20 mt-2">
                                        <a href="restaurant.php?id=<?php echo $ar['ID']; ?>" style="text-decoration: none; color: dark-primary;"><span><?php echo $ar['Name'];  ?></span></a>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>
                </div>

                <?php

                require_once __DIR__ . "/footer.php";

                ?>