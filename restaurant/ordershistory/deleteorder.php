<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("ID not found");
}

$orders = find('orders_history', $id);

if (empty($orders)) {
    die("order not found");
}



delete('orders_history', $id);

setSuccess('Order of ID ' . $id . ' deleted successfully!');
header("Location: /foodrhino/restaurant/ordershistory/");
die;
