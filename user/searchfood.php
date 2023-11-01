<?php


require_once "db.php";

if (empty($_GET['searchfood'])) {
    header("Location: index.php");
    die;
}

$s = $_GET['searchfood'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE Name LIKE ?");
$stmt->execute(['%' . $s . '%']);
$data = $stmt->fetchAll();

?>

<?php

require_once __DIR__ . "/header.php";

?>


<div class="container" style="margin-bottom: 60px;margin-top: 40px;">
    <div class="row">

        <div style="margin-bottom: 10px;">
            <h3 style="float: left;"><strong> FOOD ITEMS </strong></h3>
        </div>
        <hr>
        <!-- Search Bar For FOOD -->
        <div style="margin-bottom: 30px;">
            <form class="d-flex" method="GET" action="searchfood.php">
                <input class="form-control me-2" name="searchfood" type="search" placeholder="Search for Restaurant Here" aria-label="Search" style="width: 700px;">
                <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
            </form>
        </div>


        <div style="margin-bottom: 10px;">
            <h5 style="float: left;"><i> SEARCH RESULT FOR <?php echo $s;  ?></i></h5>
        </div>

        <?php



        foreach ($data as $ar) :
        ?>



            <div class="card" style="width: 18rem;">
                <img src="../uploads/<?php echo $ar['Image'];   ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $ar['Name'];  ?></h5>
                    <p class="card-text"> <?php if ($ar['On_Sale']) : ?>
                            Rs. <?php echo $ar['Sale_Price']; ?>
                            <del>Rs.<?php echo $ar['Price']; ?></del>
                        <?php else : ?>
                            Rs. <?php echo $ar['Price']; ?>
                        <?php endif; ?>
                        <br>
                        <!-- <textarea name="" id="" cols="30" rows="10" style="height: 30px;"><?php echo $ar['Description']; ?></textarea> -->
                    </p>
                    <a href="restaurant.php?id=<?php echo $ar['Restaurant_ID']; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<?php

require_once __DIR__ . "/footer.php";

?>