<?php

require "functions.php";

$id = request('id');

// Validation 
if (!empty($_POST)) {
    $ottp = request('ottp');

    if (empty($ottp)) {
        setError("Please fill OTTP!");
        redirect("forgotrpassword.php");
    }

    $user = where('restaurant', 'OTTP', '=', $ottp, false);



    if ($ottp != $user['OTTP']) {
        setError("OTTP Code doesnot match.");
        redirect("forgotrpassword.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change-Password</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body style="background-color: #dae8f2">
    <div class="card" style="max-width: 550px; margin:50px auto 50px auto" ;>
        <div class="card-header">
            <h3>Change Password</h3>
        </div>
        <div class="card-body">
            <form action="changerpasswordstore.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
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
                <button type="submit" class="btn btn-primary">Next</button>
            </form>
            <hr>
            <!-- GoTo Login Button -->
            <center><a href="ottpr.php"><button class="btn btn-success">Back</button></a></center>
        </div>
    </div>

    <!-- script  -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>