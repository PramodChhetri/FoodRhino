<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("ID not found");
}

$restaurant = find('users', $id);

if (empty($restaurant)) {
    die("User not found");
}

update('users', $id, [
    "Role" => "Admin"
]);

setSuccess('Profile of ID ' . $id . ' change to admin successfully!');
header("Location: /foodrhino/admin/userlist/");
die;
