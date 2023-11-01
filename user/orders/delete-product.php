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

delete('orders_products', $id);

setSuccess("Order product has been removed");
redirect("user/orders/showorder.php?id=" . $orders_products['Order_ID']);
die;
