<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

require_once __DIR__ . "/../header.php";

?>


<!-- Start of contents -->

<?php $restaurants = all('restaurant'); ?>

<div class="container" style="width: 100%;">
    <div class="d-flex justify-content-between">
        <h2>Restaurant List</h2>
        <div>
            <!-- user insert -->
            <a href="addrestaurant.php" class="btn btn-primary">Add New Restaurant</a>
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
                <th>Status</th>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($restaurants as $restaurant) : ?>
                <tr>
                    <td><?php echo $restaurant['Active'] ?></td>
                    <td><?php echo $restaurant['ID']; ?></td>
                    <td><img height="30px" src="../../uploads/<?php echo $restaurant['Image']; ?>" alt=""></td>
                    <td><?php echo $restaurant['Name']; ?></td>
                    <td><?php echo $restaurant['Email'] ?></td>
                    <!-- Buttons for Crud -->
                    <td>
                        <a href="showrestaurant.php?id=<?php echo $restaurant['ID']; ?>"><button class="btn btn-danger">Show</button></a>

                        <a href="editrestaurant.php?id=<?php echo $restaurant['ID']; ?>"><button class="btn btn-danger">Edit</button></a>

                        <a href="#!!" onclick="ConfirmDelete(<?php echo $restaurant['ID']; ?>)"><button class="btn btn-danger">Delete</button></a>

                        <a href="#!!" onclick="ConfirmActive(<?php echo $restaurant['ID']; ?>)"><button class="btn btn-danger">Active</button></a>

                        <a href="#!!" onclick="ConfirmDeactive(<?php echo $restaurant['ID']; ?>)"><button class="btn btn-danger" style="margin-top:  ;">Deactive</button></a>



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
            location.href = 'deleterestaurant.php?id=' + id;
        }

    }

    function ConfirmActive(id) {
        if (confirm('Are you sure want to active restaurant?')) {
            location.href = 'activerestaurant.php?id=' + id;
        }

    }

    function ConfirmDeactive(id) {
        if (confirm('Are you sure want to deactive restaurant?')) {
            location.href = 'deactiverestaurant.php?id=' + id;
        }

    }
</script>

<?php

require_once __DIR__ . "/../admin.php";

?>