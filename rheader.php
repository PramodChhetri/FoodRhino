<?php

require_once __DIR__ . "/functions.php";


$id = request('id');

if (empty($id)) {
    die("id not found");
}

$restaurant = find('restaurant', $id);

if (empty($restaurant)) {
    die("Restaurant not found");
}

$allmenu = where('products', 'Restaurant_ID', '=', $id, true);



?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
                    <a class="navbar-brand" href="/foodrhino/">FoodRhino</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="d-flex" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <form style="display:inline-flex ; padding-right: 50px;">
                                <input class="form-control me-2" type="search" placeholder="Search Food Here" style="width: 500px; margin-right:40px;" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/foodrhino/">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="allrestaurant.php">Restaurants</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Login
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/foodrhino/login.php">As User</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/foodrhino/restaurantlogin.php">As Restaurant</a></li>

                                </ul>
                            <li class="nav-item">
                                <a class="nav-link" href="fraboutus.php">About Us</a>
                            </li>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>
            <!-- End of Topbar -->



            <div style="background-image: url(uploads/<?php echo $restaurant['F_Image']; ?>);height:400px; overflow:hidden;">
                <div style="margin-top:20px;">
                    <img src="uploads/<?php echo $restaurant['Image']; ?>" alt="">
                    <h1 style="color: black;"><b><?php echo $restaurant['Name']; ?></b></h1>
                </div>
            </div>

            <body id="page-top">


                <!-- Begin Page Content -->
                <div>