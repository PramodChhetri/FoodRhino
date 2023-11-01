<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("ID not found");
}

$products = find('products', $id);

if (empty($products)) {
    die("User not found");
}

delete('products', $id);

setSuccess('Profile of ID ' . $id . ' deleted successfully!');
header("Location: /foodrhino/restaurant/products/");
die;
