<?php

require "functions.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot-Pasword</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body style="background-color: #dae8f2;">

    <!-- Start of Login Area  -->
    <div class="card" style="max-width: 550px; margin:50px auto auto auto" ;>
        <div class="card-header bg-primary" style="display: flex;">
            <h3>Find your Account </h3>
        </div>
        <div class="card-body">
            <form action="ottpr.php" method="POST" style="margin-bottom: 40px;">
                <!-- Alert for empty fields and wrong email  -->
                <?php if (hasError()) : ?>
                    <div class="alert alert-danger">
                        <?php echo getError();
                        ?>
                    </div>
                <?php endif; ?>
                <!-- Email Section  -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll send OTTP Code in entered Email.</div>
                </div>
                <!-- Submit Button  -->
                <button type="submit" class="btn btn-primary">Next</button>
            </form>
            <hr>
            <!-- Signup Button -->
            <center><a href="restaurantlogin.php"><button class="btn btn-success">Back to LogIn</button></a></center>
        </div>
    </div>
    <!-- End of Login Area  -->


    <!-- script  -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>