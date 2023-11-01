<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

require_once __DIR__ . "/../header.php";

?>


<!-- Start of contents -->

<?php $products = where('products', 'Restaurant_ID', '=', $restaurant['ID']); ?>

<div class="container" style="width: 100%;">
    <div class="d-flex justify-content-between">
        <h2>Products List</h2>
        <div>
            <!-- user insert -->
            <a href="addproducts.php" class="btn btn-primary">Add Product</a>
        </div>
    </div>
    <!-- Alert for successful add and delete  -->
    <?php if (hasSuccess()) : ?>
        <div class="alert alert-danger">
            <?php echo getSuccess();
            ?>
        </div>
    <?php endif; ?>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Category</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) :
                $category = find('categories', $product['Category_ID']);

            ?>
                <tr>
                    <td><?php echo $product['ID'] ?></td>
                    <td><img height="30px" src="../../uploads/<?php echo $product['Image']; ?>" alt=""></td>
                    <td><?php echo $product['Name']; ?></td>
                    <td><?php echo $product['Stock']; ?></td>
                    <td>
                        <?php if ($product['On_Sale']) : ?>
                            Rs. <?php echo $product['Sale_Price']; ?>
                            <del>Rs.<?php echo $product['Price']; ?></del>
                        <?php else : ?>
                            Rs. <?php echo $product['Price']; ?>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $category['Name'] ?></td>

                    <!-- Buttons for Crud -->
                    <td>
                        <a href="showproducts.php?id=<?php echo $product['ID']; ?>"><button class="btn btn-danger">Show</button></a>

                        <a href="editproducts.php?id=<?php echo $product['ID']; ?>"><button class="btn btn-danger">Edit</button></a>

                        <a href="#!!" onclick="ConfirmDelete(<?php echo $product['ID']; ?>)"><button class="btn btn-danger">Delete</button></a>

                        <a href="editstocks.php?id=<?php echo $product['ID']; ?>"><button class="btn btn-danger">Stock</button></a>
                    </td>



                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<!-- End of contents -->

<script>
    function ConfirmDelete(id) {
        if (confirm('Are you sure want to delete?')) {
            location.href = 'deleteproducts.php?id=' + id;
        }

    }
</script>

<?php

require_once __DIR__ . "/../admin.php";

?>