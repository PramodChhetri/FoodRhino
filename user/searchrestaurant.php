<?php


require_once "db.php";

if (empty($_GET['search'])) {
    header("Location: index.php");
    die;
}

$s = $_GET['search'];
$stmt = $pdo->prepare("SELECT * FROM restaurant WHERE Name LIKE ?");
$stmt->execute(['%' . $s . '%']);
$data = $stmt->fetchAll();

?>

<?php

require_once __DIR__ . "/header.php";

?>


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


        <div style="margin-bottom: 10px;">
            <h5 style="float: left;"><i> SEARCH RESULT FOR <?php echo $s;  ?></i></h5>
        </div>

        <?php




        foreach ($data as $ar) :
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