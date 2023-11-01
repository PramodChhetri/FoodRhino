<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("ID not found");
}

$orders = find('orders', $id);

if (empty($orders)) {
    die("order not found");
}



$re = $restaurant['Name'];

$fusr = find('users', $orders['User_ID']);
$usremail = $fusr['Email'];


// Send OTTP Code via Email
$to = $usremail;
$subject = "Order Cancel  Mail";

$body = "Your order from " . $re . " has been cancelled!";
$from = "From: foodrhino@org.np";

mail($to, $subject, $body, $from);


delete('orders', $id);

setSuccess('Order of ID ' . $id . ' cancelled successfully!');
header("Location: /foodrhino/restaurant/orders/");
die;
