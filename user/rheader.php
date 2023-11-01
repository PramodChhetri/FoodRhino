<?php

require_once __DIR__ . "/admin.php";
$userid = $user['ID'];


$id = request('id');

if (empty($id)) {
    die("id not found");
}

$restaurant = find('restaurant', $id);

if (empty($restaurant)) {
    die("Restaurant not found");
}

$allmenu = where('products', 'Restaurant_ID', '=', $id, true);

// $pdo = pdo();
// $stmt = $pdo->prepare("SELECT * FROM uservisit WHERE User_ID = ? AND Restaurant_ID = ?");
// $stmt->execute([$userid, $id]);
// $alreadyvisit = $stmt->fetch();

// if (empty($alreadyvisit)) {
//     create('uservisit', [
//         'User_ID' => $userid,
//         'Restaurant_ID' => $id,
//         'Visits' => "1"
//     ]);
// }
// $s = $alreadyvisit['ID'];
// update('uservisit', $s, [
//     'Visits' => $alreadyvisit['Visits'] + "1"
// ]);



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
            <nav class="navbar navbar-expand navbar-dark topbar static-top shadow" style="background-color: #eb6864;">

                <!-- Topbar Navbar -->
                <div class="container-fluid">
                    <a class="navbar-brand" href="/foodrhino/user/">FoodRhino</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/foodrhino/user/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="fraboutus.php">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="allrestaurant.php">Restaurants</a>
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


            <div style="background-image: url(../uploads/<?php echo $restaurant['F_Image']; ?>);height:400px; overflow:hidden;">
                <div style="margin-top:20px;">
                    <img src="../uploads/<?php echo $restaurant['Image']; ?>" alt="">
                    <h1 style="color: black; "><b><?php echo $restaurant['Name']; ?></b></h1>
                </div>
            </div>

            <body id="page-top">

                <!-- Page Wrapper -->
                <div id="wrapper">

                    <!-- Sidebar -->
                    <ul class="navbar-nav  sidebar sidebar-dark accordion" style="background-color: #eb6864;" id="accordionSidebar">



                        <!-- Divider -->
                        <hr class="sidebar-divider my-0">

                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item active">
                            <a class="nav-link" href="/foodrhino/user/restaurant.php?id=<?php echo $id; ?>">
                                <i class="fas fa-fw fa-book"></i>
                                <span>Menu</span></a>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Nav Item - UserList -->
                        <li class="nav-item active">
                            <a class="nav-link" href="/foodrhino/user/dyourorders.php?id=<?php echo $restaurant['ID'] ?>">
                                <i class="fas fa-fw fa-book"></i>
                                <span>Order</span></a>
                        </li>

                        <!-- Nav Item - Restaurant -->
                        <li class="nav-item active">
                            <a class="nav-link" href="/foodrhino/user/otherbranch.php?id=<?php echo $restaurant['ID'] ?>">
                                <i class="fas fa-fw fa-book"></i>
                                <span>Other Branches</span></a>
                        </li>

                        <!-- Nav Item - Restaurant -->
                        <li class="nav-item active">
                            <a class="nav-link" href="/foodrhino/user/aboutus.php?id=<?php echo $restaurant['ID'] ?>">
                                <i class="fas fa-fw fa-book"></i>
                                <span>About Us</span></a>
                        </li>



                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                        </div>

                    </ul>
                    <!-- End of Sidebar -->

                    <!-- Begin Page Content -->
                    <div>