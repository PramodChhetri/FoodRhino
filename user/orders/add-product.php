<?php

require "../admin.php";

$orderid = request('orderid');
$productid = request('productid');
$quantity = request('quantity');

if (empty($orderid)) {
    setError("Id not found");
    redirect("restaurant/orders/showorder.php?id=$orderid");
    die;
}

$order = find('orders', $orderid);

if (empty($order)) {
    setError("order not found");
    redirect("restaurant/orders/showorder.php?id=$orderid");
    die;
}

$product = find('products', $productid);

if (empty($product)) {
    setError("product not found");
    redirect("restaurant/orders/showorder?id=$orderid.php");
    die;
}

if (!is_numeric($quantity) || $quantity < 1) {
    setError("Quantity must be number and greater than one");
    redirect("restaurant/orders/showorder.php?id=$orderid");
    die;
}


$quality = (int) $quantity;

$pdo = pdo();
$stmt = $pdo->prepare("SELECT * FROM orders_products WHERE Order_ID = ? AND Product_ID = ?");
$stmt->execute([$orderid, $productid]);
$orders_products = $stmt->fetch();





if ($orders_products) {
    $finalorder = $orders_products['Quantity'] + $quality;
    update('orders_products', $orders_products['ID'], [
        "Quantity" => $finalorder
    ]);

    setSuccess("Product updated sucesfully");
    redirect("restaurant/orders/showorder.php?id=$orderid");
    die;
}

create('orders_products', [
    "Order_ID" => $orderid,
    "Product_ID" => $productid,
    "Quantity" => $quantity
]);

setSuccess("Product added sucesfully");
redirect("restaurant/orders/showorder.php?id=$orderid");
die;
