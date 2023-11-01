<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("ID not found");
}

$res = find('users', $id);

if (empty($res)) {
    die("User not found");
}


if ($admin['ID'] == $res['ID']) {
    setSuccess('Profile of ID ' . $id . ' is currently in Use!');
    header("Location: /foodrhino/admin/userlist/");
    die;
}

update('users', $id, [
    "Role" => "User"
]);

setSuccess('Profile of ID ' . $id . ' change to user successfully!');
header("Location: /foodrhino/admin/userlist/");
die;
