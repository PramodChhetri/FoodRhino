<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

require_once __DIR__ . "/../header.php";

?>


<!-- Start of contents -->

<?php $products = all('products'); ?>

<div class="container" style="width: 100%;">
    <div class="d-flex justify-content-between">
        <h2>Products List</h2>
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
                <th>Restaurant</th>
                <th>Price</th>
                <th>Category</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) :
                $category = find('categories', $product['Category_ID']);
                $Restaurant_Name = find('restaurant', $product['Restaurant_ID']);
            ?>
                <tr>
                    <td><?php echo $product['ID'] ?></td>
                    <td><img height="30px" src="../../uploads/<?php echo $product['Image']; ?>" alt=""></td>
                    <td><?php echo $product['Name']; ?></td>
                    <td><?php echo $Restaurant_Name['Name']; ?></td>
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

                        <a href="#!!" onclick="ConfirmDelete(<?php echo $product['ID']; ?>)"><button class="btn btn-danger">Delete</button></a>


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