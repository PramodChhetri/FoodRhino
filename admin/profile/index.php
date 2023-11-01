<?php require "../header.php"; ?>

<!-- Alert for successful add and delete  -->
<?php if (hasSuccess()) : ?>
    <div class="alert alert-danger">
        <?php echo getSuccess();
        ?>
    </div>
<?php endif; ?>


<!-- Start of contents -->

<div class="container">
    <div>
        <center> <img class="img rounded-circle" src="../../uploads/<?php echo $admin['Image']; ?>" height="300px" width="300px">
        </center>
    </div>
    <br>
    <div>
        <center> <a href="changeprofileimage.php?id=<?php echo $admin['ID'];   ?>" class="btn btn-primary">Change Profile-Image</a></center>
    </div>
</div>
<br>


<table class="table">
    <tbody>
        <tr>
            <td><b>Name</b></td>
            <td><b><?php echo $admin['Name']; ?></b></td>
        </tr>
        <tr>
            <td><b>ID</b></td>
            <td><b><?php echo $admin['ID']; ?></b></td>
        </tr>
        <tr>
            <td><b>Email</b></td>
            <td><b><?php echo $admin['Email'] ?></b></td>
        </tr>
        <tr>
            <td><b>Role</b></td>
            <td><b><?php echo $admin['Role'] ?></b></td>
        </tr>
        <tr>
            <td><a href="changeprofiledetails.php?id=<?php echo $admin['ID'];   ?>" class="btn btn-secondary">Change Profile-Details</a></td>
            <td><a href="changeprofilepassword.php?id=<?php echo $admin['ID'];   ?>" class="btn btn-secondary">Change Profile-Password</a></td>
        </tr>
    </tbody>
</table>
<br>

<!-- End of contents -->


<?php require "../footer.php"; ?>