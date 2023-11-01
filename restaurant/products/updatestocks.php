<?php

require __DIR__ . "/../admin.php";

$id = request('id');

if (empty($id)) {
    die("product not found");
}

$product = find('products', $id);

if (empty($product)) {
    die("Product not found");
}




if (!empty($_POST)) {

    $price = request('stock');


    // Validation 
    if (empty($price)) {
        setError("Please fill stock!");
        redirect("restaurant/products/editstocks.php?id=$id");
    }
    if ($price < 0) {
        setError("stock cannot be negative!");
        redirect("restaurant/products/editstocks.php?id=$id");
    }






    update('products', $id, [

        "Stock" => $price
    ]);

    // Successful Creation 
    setSuccess("Product stock is updated ");
    header("Location: /foodrhino/restaurant/products/");
    die;
};
