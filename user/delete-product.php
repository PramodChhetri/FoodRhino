<?php

require "admin.php";

// orders_products['ID']
$id = request('id');


if (empty($id)) {
    die("ID not found");
}

$orders_products = find('orders_products', $id);

if (empty($orders_products)) {
    die("orders_products not found");
}

$od = where('orders', 'ID', '=', $orders_products['Order_ID'], false);

$re = where('restaurant', 'Id', '=', $od['Restaurant_ID'], false);


delete('orders_products', $id);

setSuccess("Order product has been removed");

?>

<script>
    window.location.href = "http://localhost/foodrhino/user/dyourorders.php?id=<?php echo $re['ID'];  ?>"
</script>