<?php

require "../admin.php";

// orders_products['ID']
$id = request('id');


if (empty($id)) {
    die("ID not found");
}

$orders_products = find('orders_products', $id);

if (empty($orders_products)) {
    die("orders_products not found");
}


//For User Email
$oid = $orders_products['Order_ID'];

$odrs = find('orders', $oid);
$usrid =  $odrs['User_ID'];

$usr = find('users', $usrid);

$usremail = $usr['Email'];

//product name and quantity
$qe = $orders_products['Quantity'];
$proname =  find('products', $orders_products['Product_ID']);
$pe = $proname['Name'];


$re = $restaurant['Name'];


// Send OTTP Code via Email
$to = $usremail;
$subject = "Order Cancel  Mail";

$body = "Your order of " . $qe . "-" . $pe . " from " . $re . " has been cancelled!";
$from = "From: foodrhino@org.np";

mail($to, $subject, $body, $from);

delete('orders_products', $id);

setSuccess("Order product has been removed");
redirect("restaurant/orders/showorder.php?id=" . $orders_products['Order_ID']);
die;
