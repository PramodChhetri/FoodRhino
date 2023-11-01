<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("ID not found");
}

$categories = find('categories', $id);

if (empty($categories)) {
    die("Category not found");
}

delete('categories', $id);

setSuccess('Profile of ID ' . $id . ' deleted successfully!');
header("Location: /foodrhino/admin/categories/");
die;
