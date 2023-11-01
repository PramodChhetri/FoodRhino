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
            <h1>Restaurant Registration </h1>
        </div>
        <div class="card-body">
            <form action="store.php" method="POST" enctype="multipart/form-data">
                <!-- Alert for empty fields and wrong email  -->
                <?php if (hasError()) : ?>
                    <div class="alert alert-danger">
                        <?php echo getError();
                        ?>
                    </div>
                <?php endif; ?>
                <!-- End of Alert  -->
                <div class="mb-3">
                    <label for="name" class="form-label">Restaurant Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Restaurant Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="mb-3">
                    <label for="fimage" class="form-label">Featured Image</label>
                    <input type="file" class="form-control" id="fimage" name="fimage">
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
                    <label for="veg" class="form-label">District</label>
                    <select name="veg" class="form-control">
                        <option value="Veg">Veg</option>
                        <option value="Non-veg">Non-Veg</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city">
                </div>
                <div class="mb-3">
                    <label for="district" class="form-label">District</label>
                    <select name="district" class="form-control">
                        <option value="Kathmandu">Kathmandu</option>
                        <option value="Pokhara">Pokhara</option>
                        <option value="Biratnagar">Biratnagar</option>
                        <option value="Chitwan">Chitwan</option>
                        <option value="Nawalparasi">Nawalparasi</option>
                        <option value="Butwal">Butwal</option>
                        <option value="Birgung">Birgung</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" style="height: 200px; text-align:justify">
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="pan" class="form-label">Pan Card Image</label>
                    <input type="file" class="form-control" id="pan" name="pan">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>

        </div>
    </div>

    <!-- script  -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>