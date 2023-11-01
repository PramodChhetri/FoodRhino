<?php

require __DIR__ . "/../admin.php";


if (!empty($_POST)) {
    $userid = request('userid');


    // Validation 
    if (empty($userid)) {
        setError("Please provide user!");
        redirect("restaurant/orders/addorder.php");
    }

    $usr = find('users', $userid);


    if (!$usr) {
        setError("cannot find user");
        redirect("restaurant/orders/addorder.php");
    }



    create('orders', [
        "User_ID" => $userid,

    ]);

    // Successful Creation 
    setSuccess("Order is added");
    header("Location: /foodrhino/restaurant/orders/");
    die;
};
