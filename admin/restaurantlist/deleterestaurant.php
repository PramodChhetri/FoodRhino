<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("ID not found");
}

$user = find('restaurant', $id);

if (empty($user)) {
    die("User not found");
}

delete('restaurant', $id);

setSuccess('Restaurant of ID ' . $id . ' deleted successfully!');
header("Location: /foodrhino/admin/restaurantlist/");
die;
