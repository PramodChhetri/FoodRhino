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
$date = date("Y-m-d H:i");

create('orders_history', [
    "User_ID" => $orders['User_ID'],
    "Restaurant_ID" => $orders['Restaurant_ID'],
    "ID" => $orders['ID'],
    "Date" => $date

]);

delete('orders', $id);

setSuccess('Order of ID ' . $id . ' deleted successfully!');
header("Location: /foodrhino/restaurant/orders/");
die;
