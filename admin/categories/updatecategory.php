<?php

require __DIR__ . "/../admin.php";

$id = request('id');

if (empty($id)) {
    die("Id not found");
}

$category = find('categories', $id);

if (empty($category)) {
    die("Category not found");
}


$file = $_FILES['image']['tmp_name'];
$type = mime_content_type($file);
$size = $_FILES['image']['size'];
$mb_size = $size / 1024 / 1024;


if ($type != "image/png" && $type != "image/jpeg" && $type != "image/gif") {
    setError("Image size must be of type png, jpeg or gif!");
    redirect("restaurant/categorys/addcategorys.php");
}

if ($mb_size > 5) {
    setError("Image size must be less than 5mb!");
    redirect("restaurant/categorys/addcategorys.php");
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

$file_name = "Categories" . uniqid() . $ext;

move_uploaded_file($file, "../../uploads/$file_name");


if (!empty($_POST)) {
    $name = request('name');
    $description = request('description');
    $image = $file_name;

    // Validation 
    if (empty($name) || empty($image)) {
        setError("Please fill all field!");
        redirect("admin/categories/addcategory.php");
    }



    $category = where2('categories', 'Name', '=', $name, $id, false);


    if (!empty($category)) {
        setError("Product is already exists!");
        redirect("admin/categories/editcategory.php?id=$id");
    }





    update('categories', $id, [
        "Name" => $name,
        "Image" => $image,
        "Description" => $description,
    ]);

    // Successful Creation 
    setSuccess("Category is updated");
    header("Location: /foodrhino/admin/categories/");
    die;
};
