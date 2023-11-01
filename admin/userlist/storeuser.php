
<?php

require __DIR__ . "/../admin.php";

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



if (!empty($_POST)) {
    $name = request('name');
    $email = request('email');
    $password = request('password');
    $password_verify = request('password_verify');
    $role = request('role');

    // Validation 
    if (empty($name) || empty($email) || empty($password) || empty($password_verify)) {
        setError("Please fill all field!");
        redirect("admin/userlist/adduser.php");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setError("Please provide a valid Email!");
        redirect("admin/userlist/adduser.php");
    }

    if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
        setError("Special characters & Number are allowed in Name");
        redirect("admin/userlist/adduser.php");
    }

    $user = where('users', 'Email', '=', $email, false);

    if (!empty($user)) {
        setError("Email is already registered!");
        redirect("admin/userlist/adduser.php");
    }

    if (strlen($password) < 6) {
        setPassError("Password must be 6 or more characters!");
        redirect("admin/userlist/adduser.php");
    }

    if ($password != $password_verify) {
        setPassError("Confirm Password doesnot match!");
        redirect("admin/userlist/adduser.php");
    }

    create('users', [
        "Name" => $name,
        "Email" => $email,
        "Password" => password_hash($password, PASSWORD_DEFAULT),
        "Role" => $role,
        "Image" => $file_name1
    ]);

    // Successful Creation 
    setSuccess("User Account is successfully created!");
    header("Location: /foodrhino/admin/userlist/");
    die;
};

?>
