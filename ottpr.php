<?php

require "functions.php";

// Validation 
if (!empty($_POST)) {
    $email = request('email');

    if (empty($email)) {
        setError("Please fill Email!");
        redirect("forgotrpassword.php");
    }

    $res = where('restaurant', 'Email', '=', $email, false);

    if (empty($res)) {
        setError("No User restaurant found with given Email address");
        redirect("forgotrpassword.php");
    }

    $id = $res['ID'];

    // Send OTTP Code via Email
    $to = $res['Email'];
    $subject = "OTTP Code";
    $code = uniqid();
    $body = "You OTTP Code is   " . $code;
    $from = "From: foodrhino@org.np";

    mail($to, $subject, $body, $from);

    update('restaurant', $id, ['OTTP' => $code]);
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot-Password</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body style="background-color: #dae8f2;">

    <!-- Start of Login Area  -->
    <div class="card" style="max-width: 550px; margin:50px auto auto auto" ;>

        <div class="card-body">
            <form action="changerpassword.php?id=<?php echo $id; ?>" method="POST" style="margin-bottom: 40px;">
                <!-- Alert for empty fields and wrong email  -->
                <?php if (hasError()) : ?>
                    <div class="alert alert-danger">
                        <?php echo getError();
                        ?>
                    </div>
                <?php endif; ?>
                <!-- Email Section  -->
                <div class="mb-3">
                    <label for="ottp" class="form-label">Enter OTTP Code</label>
                    <input type="text" class="form-control" id="ottp" name="ottp">
                    <div id="emailHelp" class="form-text">Enter OTTP Code Correctlly.</div>
                </div>
                <!-- Submit Button  -->
                <button type="submit" class="btn btn-primary">Next</button>
            </form>
            <hr>
            <!-- Signup Button -->
            <center><a href="restaurantlogin.php"><button class="btn btn-success">Back</button></a></center>
        </div>
    </div>
    <!-- End of Login Area  -->


    <!-- script  -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>