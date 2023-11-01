<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("ID not found");
}

$user = find('users', $id);

if (empty($user)) {
    die("User not found");
};

?>

<?php

require_once __DIR__ . "/../header.php";

?>

<div class="card" style="max-width: 550px; margin:50px auto 50px auto" ;>
    <div class="card-header">
        <h3>Change Profile-Image </h3>
    </div>
    <div class="card-body">
        <form action="updateprofileimage.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <!-- Alert for error-->
            <?php if (hasError()) : ?>
                <div class="alert alert-danger">
                    <?php echo getError();
                    ?>
                </div>
            <?php endif; ?>
            <!-- End of Alert  -->
            <div class="mb-3">
                <center> <img class="img rounded-circle" src="../../uploads/<?php echo $admin['Image']; ?>" height="300px" width="300px">
                </center>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"> Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <hr>
        <!-- GoTo Userlist -->
        <center><a href="/../foodrhino/admin/profile/"><button class="btn btn-success">Go Back</button></a></center>
    </div>
</div>

<!-- script  -->
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/custom.js"></script>

</body>

</html>

<?php

require_once __DIR__ . "/../footer.php";

?>