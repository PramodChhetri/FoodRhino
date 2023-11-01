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
    $opassword = request('opassword');
    $password = request('password');
    $password_verify = request('password_verify');

    // Validation 
    if (empty($password) || empty($opassword) || empty($password_verify)) {
        setPassError("Please fill all field!");
        redirect("admin/profile/changeprofilepassword.php?id=$id");
    }


    if (password_verify($opassword, $user['Password'])) {

        if (strlen($password) < 6) {
            setPassError("Password must be 6 or more characters!");
            redirect("admin/profile/changeprofilepassword.php?id=$id");
        }

        if ($password != $password_verify) {
            setPassError("Confirm Password doesnot match!");
            redirect("admin/profile/changeprofilepassword.php?id=$id");
        }

        update('users', $id, [

            "Password" => password_hash($password, PASSWORD_DEFAULT),

        ]);

        // Successful Creation 
        setSuccess("Password successfully updated!");
        header("Location: /foodrhino/admin/profile/");
        die;
    } else {
        setPassError("old Password is not correct!");
        redirect("admin/profile/changeprofilepassword.php?id=$id");
    };
};
