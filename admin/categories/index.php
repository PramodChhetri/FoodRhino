<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

require_once __DIR__ . "/../header.php";

?>


<!-- Start of contents -->

<?php $categories = all('categories'); ?>

<div class="container" style="width: 100%;">
    <div class="d-flex justify-content-between">
        <h2>Categories List</h2>
        <!-- user insert -->
        <a href="addcategory.php" class="btn btn-primary">Add Category</a>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category) :            ?>
                <tr>
                    <td><?php echo $category['ID'] ?></td>
                    <td><img height="30px" src="../../uploads/<?php echo $category['Image']; ?>" alt=""></td>
                    <td><?php echo $category['Name']; ?></td>
                    <!-- Buttons for Crud -->
                    <td>
                        <a href="showcategory.php?id=<?php echo $category['ID']; ?>"><button class="btn btn-danger">Show</button></a>

                        <a href="editcategory.php?id=<?php echo $category['ID']; ?>"><button class="btn btn-danger">Edit</button></a>

                        <a href="#!!" onclick="ConfirmDelete(<?php echo $category['ID']; ?>)"><button class="btn btn-danger">Delete</button></a>

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
            location.href = 'deletecategory.php?id=' + id;
        }

    }
</script>

<?php

require_once __DIR__ . "/../admin.php";

?>