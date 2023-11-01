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





if (!empty($_POST)) {
    $name = request('name');
    $email = request('email');



    // Validation 
    if (empty($name) || empty($email)) {
        setError("Please fill all field!");
        redirect("user/profile/changeprofiledetails.php?id=$id");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setError("Please provide a valid Email!");
        redirect("user/profile/changeprofiledetails.php?id=$id");
    }

    $checkemail = where2('users', 'Email', '=', $email, $id, false);

    if (!empty($checkemail)) {
        setError(" Email already exist!");
        redirect("user/profile/changeprofiledetails.php?id=$id");
    }

    update('users', $id, [
        "Name" => $name,
        "Email" => $email,



    ]);

    // Successful Creation 
    setSuccess("User Account-detail is successfully updated!");
    header("Location: /foodrhino/user/profile/");
    die;
};
