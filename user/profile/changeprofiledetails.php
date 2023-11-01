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
        <h3>Change Profile-Details </h3>
    </div>
    <div class="card-body">
        <form action="updateprofiledetails.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <!-- Alert for empty fields and wrong email  -->
            <?php if (hasError()) : ?>
                <div class="alert alert-danger">
                    <?php echo getError();
                    ?>
                </div>
            <?php endif; ?>
            <!-- End of Alert  -->
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['Name']; ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $user['Email']; ?>">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <!-- Alert for empty fields and wrong email  -->
            <?php if (hasPassError()) : ?>
                <div class="alert alert-danger">
                    <?php echo getPassError();
                    ?>
                </div>
            <?php endif; ?>
            <!-- End of Alert  -->


            <button type="submit" class="btn btn-primary">Update</button>
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