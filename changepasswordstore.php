<?php


require "functions.php";

$id = request('id');

if (!empty($_POST)) {
    $password = request('password');
    $password_verify = request('password_verify');

    // Validation
    if (empty($password) || empty($password_verify)) {
        setPassError("Please fill password and confirm password!");
        redirect("changepassword.php?id=$id");
    }

    if (strlen($password) < 6) {
        setPassError("Password must be 6 or more characters!");
        redirect("changepassword.php?id=$id");
    }
    if ($password != $password_verify) {
        setPassError("Confirm Password doesnot match!");
        redirect("changepassword.php?id=$id");
    }

    update('users', $id, ["Password" => password_hash($password, PASSWORD_DEFAULT)]);

    // Successful password change 
    setError("Password is successfully updated! You can login.");
    header("Location: /foodrhino/login.php");
    die;
}
