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
        <h3>Edit Profile-Password </h3>
    </div>
    <div class="card-body">
        <form action="updateprofilepassword.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">

            <?php if (hasPassError()) : ?>
                <div class="alert alert-danger">
                    <?php echo getPassError();
                    ?>
                </div>
            <?php endif; ?>
            <!-- End of Alert  -->
            <div class="mb-3">
                <label for="opassword" class="form-label">Old-Password</label>
                <input type="password" class="form-control" id="opassword" name="opassword">
            </div>
            <hr>
            <div class="mb-3">
                <label for="password" class="form-label">New-Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password_verify" class="form-label">Confirm New-Password</label>
                <input type="password" class="form-control" id="password_verify" name="password_verify">
            </div>


            <button type="submit" class="btn btn-primary">Change</button>
        </form>
        <hr>
        <!-- GoTo Userlist -->
        <center><a href="/../foodrhino/user/profile/"><button class="btn btn-success">Go Back</button></a></center>
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