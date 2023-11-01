<?php


require "functions.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body style="background-color: #dae8f2">
    <div class="card" style="max-width: 550px; margin:50px auto 50px auto" ;>
        <div class="card-header">
            <h1>Sign Up </h1>
        </div>
        <div class="card-body">
            <form action="userstore.php" method="POST" enctype="multipart/form-data">
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
                    <label for="image" class="form-label">Profile Image</label>
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
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
            <hr>
            <!-- GoTo Login Button -->
            <center><a href="login.php"><button class="btn btn-success">GoTo Login</button></a></center>
        </div>
    </div>

    <!-- script  -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>