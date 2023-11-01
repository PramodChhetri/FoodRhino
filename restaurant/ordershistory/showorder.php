<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("ID not found");
}

$order = find('orders_history', $id);

if (empty($order)) {
    die("order not found");
}


$orders_products = where('orders_products', 'Order_ID', '=', $order['ID'], true);

?>


<?php

require_once __DIR__ . "/../header.php";

?>
<div class="card-header">
    <h1>Order Products</h1>
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
            <?php foreach ($orders_products as $op) :

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

            <?php endforeach; ?>
        </tbody>
    </table>
</div>






<?php

require_once __DIR__ . "/../footer.php";

?>