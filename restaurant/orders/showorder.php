<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("ID not found");
}

$order = find('orders', $id);

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

    <form action="add-product.php?orderid=<?php echo $order['ID']; ?>" method="POST">
        <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <label for="productid">Product</label>
                    <select name="productid" id="productid" class="form-control">
                        <?php
                        $allproducts = all('products');
                        foreach ($allproducts as $oneproduct) :
                        ?>
                            <option value="<?php echo $oneproduct['ID']; ?>"><?php echo $oneproduct['Name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" value="1" name="quantity" class="form-control">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="" class="d-block">&nbsp;</label>

                    <button class="btn btn-primary">Add Product</button>
                </div>
            </div>

        </div>
    </form>

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