<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("ID not found");
}

$user = find('users', $id);

if (empty($user)) {
    die("User not found");
}


// image upload
$file1 = $_FILES['image']['tmp_name'];
$type1 = mime_content_type($file1);
$size1 = $_FILES['image']['size'];
$mb_size1 = $size1 / 1024 / 1024;


if ($type1 != "image/png" && $type1 != "image/jpeg" && $type1 != "image/gif") {
    setError("Image size must be of type png, jpeg or gif!");
    redirect("admin/restaurantlist/addrestaurant.php");
}

if ($mb_size1 > 5) {
    setError("Image size must be less than 5mb!");
    redirect("admin/restaurantlist/addrestaurant.php");
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

$file_name1 = "User-" . uniqid() . $ext1;

move_uploaded_file($file1, "../../uploads/$file_name1");





update('users', $id, [

    "Image" => $file_name1
]);

// Successful Creation 
setSuccess("User Account is successfully updated!");
header("Location: /foodrhino/user/profile/");
die;
