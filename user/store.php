<?php

require "admin.php";

//Restaurant image upload
$file1 = $_FILES['image']['tmp_name'];
$type1 = mime_content_type($file1);
$size1 = $_FILES['image']['size'];
$mb_size1 = $size1 / 1024 / 1024;


if ($type1 != "image/png" && $type1 != "image/jpeg" && $type1 != "image/gif") {
    setError("Image size must be of type png, jpeg or gif!");
    redirect("register.php");
}

if ($mb_size1 > 5) {
    setError("Image size must be less than 5mb!");
    redirect("register.php");
}

switch ($type1) {
    case "image/png":
        $ext1 = ".png";
        break;
    case "image/jpeg":
        $ext1 = ".jpeg";
        break;
    case "image/gif":
        $ext1 = ".gif";
        break;
}

$file_name1 = "Restaurant-" . uniqid() . $ext1;

move_uploaded_file($file1, "uploads/$file_name1");


//Restaurant featured image upload
$file2 = $_FILES['fimage']['tmp_name'];
$type2 = mime_content_type($file2);
$size2 = $_FILES['fimage']['size'];
$mb_size2 = $size2 / 1024 / 1024;


if ($type2 != "image/png" && $type2 != "image/jpeg" && $type2 != "image/gif") {
    setError("Image size must be of type png, jpeg or gif!");
    redirect("register.php");
}

if ($mb_size2 > 5) {
    setError("Image size must be less than 5mb!");
    redirect("register.php");
}

switch ($type2) {
    case "image/png":
        $ext2 = ".png";
        break;
    case "image/jpeg":
        $ext2 = ".jpeg";
        break;
    case "image/gif":
        $ext2 = ".gif";
        break;
}

$file_name2 = "Restaurant-" . uniqid() . $ext2;

move_uploaded_file($file2, "uploads/$file_name2");



// Pan Card UPloads
$file = $_FILES['pan']['tmp_name'];
$type = mime_content_type($file);
$size = $_FILES['pan']['size'];
$mb_size = $size / 1024 / 1024;


if ($type != "image/png" && $type != "image/jpeg" && $type != "image/gif") {
    setError("Image size must be of type png, jpeg or gif!");
    redirect("register.php");
}

if ($mb_size > 5) {
    setError("Image size must be less than 5mb!");
    redirect("register.php");
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

$file_name = "PAN-" . uniqid() . $ext;

move_uploaded_file($file, "uploads/$file_name");


if (!empty($_POST)) {
    $name = request('name');
    $image = $file_name1;
    $fimage = $file_name2;
    $email = request('email');
    $password = request('password');
    $password_verify = request('password_verify');
    $city = request('city');
    $district = request('district');
    $veg = request('veg');
    $description = request('description');
    $pan = $file_name;

    // Validation 
    if (empty($name) || empty($email) || empty($password) || empty($password_verify) || empty($district)) {
        setError("Please fill all field!");
        redirect("register.php");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setError("Please provide a valid Email!");
        redirect("register.php");
    }


    $restaurant = where('restaurant', 'Email', '=', $email, false);


    if (!empty($user) || !empty($restaurant)) {
        setError("Email is already registered!");
        redirect("register.php");
    }

    if (strlen($password) < 6) {
        setPassError("Password must be 6 or more characters!");
        redirect("register.php");
    }

    if ($password != $password_verify) {
        setPassError("Confirm Password doesnot match!");
        redirect("register.php");
    }



    create('restaurant', [
        "Name" => $name,
        "F_Image" => $fimage,
        "Image" => $image,
        "Email" => $email,
        "Password" => password_hash($password, PASSWORD_DEFAULT),
        "City" => $city,
        "District" => $district,
        "Veg" => $veg,
        "PAN" => $pan,
        "Description" => $description
    ]);

    // Successful Creation 
    setSuccess("Restaurant is successfully registered. Wait for Activation Mail!");
    header("Location: /foodrhino/user/");
    die;
};
