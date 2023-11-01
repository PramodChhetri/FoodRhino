<?php

require_once "functions.php";

?>



<?php

if (!empty($_POST)) {

    setSuccess("OOPS You need login first!");
    header("Location: /foodrhino/fraboutus.php");
    die;
}

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

    <!-- Custom fonts for this template-->
    <link href="<?php echo $page_url; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo $page_url; ?>css/sb-admin-2.min.css" rel="stylesheet">

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
                            <form style="display:inline-flex ; padding-right: 50px;" method="GET" action="searchfood.php">
                                <input class="form-control me-2" type="search" name="searchfood" placeholder="Search Food Here" style="width: 500px; margin-right:40px;" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="/foodrhino/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="fraboutus.php">About Us</a>
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
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="aboutus.php">About Us</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" style="padding:20px;">
                            <h1 class="">About Us</h1>
                        </div>
                    </div>
                </div>
                <hr>
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <p class="lead"><b>FoodRhino is the first company in Nepal that delivers food from hundreds of popular restaurants. As a pioneer food delivery service provider, we are making life easier through online ordering.</b></p>
                                <p class="lead"><b>We know that your time is valuable and sometimes every minute in the day counts. That’s why we deliver! So you can spend more time doing the things you love. You can get anything from Indian food to high French cuisine by placing a simple order online through our website, mobile app or over the phone. Then just sit back, relax, and wait for your order to arrive.</b> </p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Alert for successful feedback -->
                <?php if (hasSuccess()) : ?>
                    <div class="alert alert-danger">
                        <?php echo getSuccess();
                        ?>
                    </div>
                <?php endif; ?>
                <br>
                <div class="container">
                    <form class="form" action="fraboutus.php" method="POST">
                        <div class="mb-3">
                            <label for="description" class="form-label"><i>*Give Feedbacks Here</i></label>
                            <textarea class="form-control" id="description" name="feedback" style="height: 100px; text-align:justify">
                    </textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>

            </div>
            <br>
            <br>
            <br>


            <!-- End of contents -->


            <?php require "footer.php"; ?>