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


$file = $_FILES['image']['tmp_name'];
$type = mime_content_type($file);
$size = $_FILES['image']['size'];
$mb_size = $size / 1024 / 1024;


if ($type != "image/png" && $type != "image/jpeg" && $type != "image/gif") {
    setError("Image size must be of type png, jpeg or gif!");
    redirect("restaurant/products/addproducts.php");
}

if ($mb_size > 5) {
    setError("Image size must be less than 5mb!");
    redirect("restaurant/products/addproducts.php");
}

switch ($type) {
    case "image/png":
        $ext = ".png";
        break;
    case "image/jpeg":
        $ext = ".jpeg";
        break;
    case "image/gif":
        $ext = ".gif";
        break;
}

$file_name = "Product" . uniqid() . $ext;

move_uploaded_file($file, "../../uploads/$file_name");


if (!empty($_POST)) {
    $name = request('name');
    $price = request('price');
    $saleprice = request('saleprice');
    $onsale = request('onsale');
    $category = request('category');
    $description = request('description');
    $image = $file_name;

    // Validation 
    if (empty($name) || empty($image) || empty($saleprice) || empty($price)) {
        setError("Please fill all field!");
        redirect("restaurant/products/editproducts.php?id=$id");
    }
    if ($saleprice < 1) {
        setError("Price cannot be negative!");
        redirect("restaurant/products/editproducts.php?id=$id");
    }

    $cca = where('categories', 'Name', '=', $category, false);


    if ($price < 1) {
        setError("Price cannot be negative!");
        redirect("restaurant/products/editproducts.php?id=$id");
    }


    $product = where2('products', 'Name', '=', $name, $id, false);


    if (!empty($product)) {
        setError("Product is already exists!");
        redirect("restaurant/products/editproducts?id=$id");
    }




    update('products', $id, [
        "Name" => $name,
        "Sale_Price" => $saleprice,
        "Price" => $price,
        "On_Sale" => $onsale,
        "Image" => $image,
        "Description" => $description,
        "Category_ID" => $cca['ID'],
        "Restaurant_ID" => $restaurant['ID']
    ]);

    // Successful Creation 
    setSuccess("Product is updated in menu");
    header("Location: /foodrhino/restaurant/products/");
    die;
};
