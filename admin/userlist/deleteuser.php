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

delete('users', $id);

setSuccess('Profile of ID ' . $id . ' deleted successfully!');
header("Location: /foodrhino/admin/userlist/");
die;
