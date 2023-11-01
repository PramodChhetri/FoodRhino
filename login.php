<?php

require "functions.php";


// Validation 
if (!empty($_POST)) {
    $email = request('email');
    $password = request('password');

    if (empty($email) || empty($password)) {
        setError("Please fill Email and Password");
        redirect("login.php");
    }

    $user = where('users', 'Email', '=', $email, false);

    if (empty($user)) {
        setError("No User found with given Email address");
        redirect("login.php");
    }

    if (password_verify($password, $user['Password'])) {
        //   Successful login
        $_SESSION['user_ID'] = $user['ID'];
        if ($user['Role'] == "Admin") {
            redirect("admin/");
        } elseif ($user['Role'] == "User") {
            redirect("user/");
        }
    } else {
        setError("The Password you entered is incorrect!");
        redirect("login.php");
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body style="background-color: #dae8f2;">

    <!-- Start of Login Area  -->
    <div class="card" style="max-width: 550px; margin:50px auto auto auto" ;>
        <div class="card-header bg-primary" style="display: flex;">
            <h1> Login</h1>
        </div>
        <div class="card-body">
            <form action="login.php" method="POST" style="margin-bottom: 40px;">
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
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <!-- Alert Wrong Password Error  -->
                <?php if (hasError()) : ?>
                    <div class="alert alert-danger">
                        <?php echo getError();
                        ?>
                    </div>
                <?php endif; ?>
                <!-- Password Section  -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <!-- Submit Button  -->
                <button type="submit" class="btn btn-primary">Login</button>
                <a style="color: primary;" href="forgotpassword.php">Forgot Password ?</a>
            </form>
            <hr>
            <!-- Signup Button -->
            <center><a href="signup.php"><button class="btn btn-success">Create New Account</button></a></center>
        </div>
    </div>
    <!-- End of Login Area  -->


    <!-- script  -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>