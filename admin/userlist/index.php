<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

require_once __DIR__ . "/../header.php";

?>


<!-- Start of contents -->

<?php $allusers = all('users'); ?>

<div class="container" style="width: 100%;">
    <div class="d-flex justify-content-between">
        <h2>User List</h2>
        <div>
            <!-- user insert -->
            <a href="adduser.php" class="btn btn-primary">Add New Profile</a>
        </div>
    </div>
    <!-- Alert for successful Add Profile  -->
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
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allusers as $user) : ?>
                <tr>
                    <td><?php echo $user['ID']; ?></td>
                    <td><img height="30px" src="../../uploads/<?php echo $user['Image']; ?>" alt=""></td>
                    <td><?php echo $user['Name']; ?></td>
                    <td><?php echo $user['Email'] ?></td>
                    <td><?php echo $user['Role'] ?></td>

                    <!-- Buttons for Crud -->
                    <td>
                        <a href="showuser.php?id=<?php echo $user['ID']; ?>"><button class="btn btn-danger">Show</button></a>

                        <a href="edituser.php?id=<?php echo $user['ID']; ?>"><button class="btn btn-danger">Edit</button></a>

                        <a href="#!!" onclick="ConfirmDelete(<?php echo $user['ID']; ?>)"><button class="btn btn-danger">Delete</button></a>

                        <a href="#!!" onclick="ConfirmAdmin(<?php echo $user['ID']; ?>)"><button class="btn btn-danger">Change to Admin</button></a>
                        <br>
                        <a href="#!!" onclick="ConfirmUser(<?php echo $user['ID']; ?>)"><button class="btn btn-danger" style="margin-top: 10px;">Change to User</button></a>
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
            location.href = 'deleteuser.php?id=' + id;
        }

    }

    function ConfirmAdmin(id) {
        if (confirm('Are you sure want to change role to admin')) {
            location.href = 'changetoadmin.php?id=' + id;
        }

    }

    function ConfirmUser(id) {
        if (confirm('Are you sure want to change role to User')) {
            location.href = 'changetouser.php?id=' + id;
        }

    }
</script>

<?php

require_once __DIR__ . "/../footer.php";

?>