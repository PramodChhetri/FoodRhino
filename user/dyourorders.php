<?php require "rheader.php";

$pdo = pdo();
$stmt = $pdo->prepare("SELECT * FROM orders WHERE Restaurant_ID = ? && User_ID = ?");
$stmt->execute([$restaurant['ID'], $userid]);
$od = $stmt->fetch();


$opall = where('orders_products', 'Order_ID', '=', $od['ID']);



?>

<div class="card-header">
    <h1>Orders</h1>
</div>
<div class="card-body">

    <!-- Alert for empty fields and wrong email  -->
    <?php if (hasError()) : ?>
        <div class="alert alert-danger">
            <?php echo getError();
            ?>
        </div>
    <?php endif; ?>
    <!-- Alert for successful add and delete  -->
    <?php if (hasSuccess()) : ?>
        <div class="alert alert-danger">
            <?php echo getSuccess();
            ?>
        </div>
    <?php endif; ?>
    <!-- End of Alert  -->



    <table class="table">
        <thead>
            <tr>
                <th>SN</th>
                <th>Products</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            <?php

            foreach ($opall as $op) :

            ?>

                <tr>
                    <td><?php echo $op['ID']; ?></td>
                    <td><?php $product = find('products', $op['Product_ID']);
                        echo $product['Name'];
                        ?></td>
                    <td><?php echo $op['Quantity']; ?></td>
                    <td><?php $price = $product['Sale_Price'] * $op['Quantity'];
                        echo $price;
                        ?></td>
                    <td><a href="delete-product.php?id=<?php echo $op['ID']; ?>"><button class="btn btn-danger">Delete</button></a></td>
                </tr>

                <?php $total = $total + $price; ?>

            <?php endforeach; ?>

            <tr>
                <td></td>
                <td></td>
                <td><b>Total</b></td>
                <td><?php echo $total;   ?></td>
            </tr>
        </tbody>
    </table>
</div>







<?php require_once "footer.php";  ?>