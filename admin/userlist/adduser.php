<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

require_once __DIR__ . "/../header.php";

?>

<div class="card" style="max-width: 550px; margin:50px auto 50px auto" ;>
    <div class="card-header">
        <h3>Add New Profile </h3>
    </div>
    <div class="card-body">
        <form action="storeuser.php" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"> Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
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
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password_verify" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_verify" name="password_verify">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" class="form-control">
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
        <hr>
        <!-- GoTo Userlist -->
        <center><a href="/../foodrhino/admin/userlist/adduser.php"><button class="btn btn-success">Go Back</button></a></center>
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