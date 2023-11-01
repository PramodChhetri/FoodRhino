<?php require "rheader.php";
$userid = $user['ID'];

//restaurant ID
$id = request('id');

if (empty($id)) {
    die("restaurant  not found");
}



$pdo = pdo();
$stmt = $pdo->prepare("SELECT * FROM orders WHERE User_ID = ? AND Restaurant_ID = ? ");
$stmt->execute([$userid, $id]);
$order1 = $stmt->fetch();

if (empty($order1)) {
    create('orders', [
        "User_ID" => $userid,
        "Restaurant_ID" => $id
    ]);

    $stmt = $pdo->prepare("SELECT * FROM orders WHERE User_ID = ? AND Restaurant_ID = ? ");
    $stmt->execute([$userid, $id]);
    $order1 = $stmt->fetch();
}

$oid1 = $order1['ID'];

if (!empty($_POST)) {
    $menu_id = request('menu_id');
    $quantity = request('quantity');

    if ($quantity <= 0) {
        setError("Quanity cannot be negative or zero");

?>

        <script>
            window.location.href = "http://localhost/foodrhino/user/restaurant.php?id=<?php echo $id;  ?>";
        </script>



    <?php
        die;
    }

    $om = find('products', $menu_id);
    $s = $om['Stock'];
    $qid = $om['Stock'];
    $q = $quantity;

    if ($quantity > $om['Stock']) {
        setError("Quanity is out of limit");
    ?>

        <script>
            window.location.href = "http://localhost/foodrhino/user/restaurant.php?id=<?php echo $id;  ?>";
        </script>



<?php
        die;
    }

    $pdo = pdo();
    $stmt = $pdo->prepare("SELECT * FROM orders_products WHERE Order_ID = ? AND Product_ID = ? ");
    $stmt->execute([$oid1, $menu_id]);
    $op1 = $stmt->fetch();

    if (!empty($op1)) {
        // Save Cart
        update('orders_products', $op1['ID'], [
            'Order_ID' => $order1['ID'],
            'Product_ID' => $menu_id,
            'Quantity' => $op1['Quantity'] + $quantity
        ]);

        // $pdo = pdo();
        // $stmt = $pdo->prepare("SELECT * FROM orders_products WHERE Order_ID = ? AND Product_ID = ? ");
        // $stmt->execute([$oid1, $menu_id]);
        // $op1 = $stmt->fetch();
    } else {
        create('orders_products', [
            'Order_ID' => $order1['ID'],
            'Product_ID' => $menu_id,
            'Quantity' => $quantity,
        ]);
    };
    $pdo = pdo();
    $stmt = $pdo->prepare("SELECT * FROM orders_products WHERE Order_ID = ? AND Product_ID = ? ");
    $stmt->execute([$oid1, $menu_id]);
    $op1 = $stmt->fetch();
}

update('products', $menu_id, [

    "Stock" => $s - $q

]);

$orders_products = where('orders_products', 'Order_ID', '=', $op1['Order_ID'], true);

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