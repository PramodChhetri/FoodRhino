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
        <center> <img class="img rounded-circle" src="../../uploads/<?php echo $restaurant['Image']; ?>" height="300px" width="300px">
        </center>
    </div>
    <br>
    <div>
        <center> <a href="changeprofileimage.php?id=<?php echo $restaurant['ID'];   ?>" class="btn btn-primary">Change Profile-Image</a></center>
    </div>
</div>
<br>


<table class="table">
    <tbody>
        <tr>
            <td><b>Name</b></td>
            <td><b><?php echo $restaurant['Name']; ?></b></td>
        </tr>
        <tr>
            <td><b>ID</b></td>
            <td><b><?php echo $restaurant['ID']; ?></b></td>
        </tr>

        <tr>
            <td><b>Email</b></td>
            <td><b><?php echo $restaurant['Email'] ?></b></td>
        </tr>
        <tr>
            <td><b>Cuisine</b></td>
            <td><b><?php echo $restaurant['Cuisine'] ?></b></td>
        </tr>
        <tr>
            <td><b>City</b></td>
            <td><b><?php echo $restaurant['City'] ?></b></td>
        </tr>
        <tr>
            <td><b>District</b></td>
            <td><b><?php echo $restaurant['District'] ?></b></td>
        </tr>
        <tr>
            <td><b>Veg</b></td>
            <td><b><?php echo $restaurant['Veg'] ?></b></td>
        </tr>
        <tr>
            <td><b>Description</b></td>
            <td><b><?php echo $restaurant['Description'] ?></b></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <a href="changeprofiledetails.php?id=<?php echo $restaurant['ID'];   ?>" class="btn btn-secondary">Change Profile-Details</a>
                <a href="changeprofilepassword.php?id=<?php echo $restaurant['ID'];   ?>" class="btn btn-secondary">Change Profile-Password</a>
            </td>
        </tr>
    </tbody>
</table>
<br>

<!-- End of contents -->


<?php require "../footer.php"; ?>