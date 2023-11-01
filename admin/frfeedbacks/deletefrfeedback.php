<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("ID not found");
}

$fb = find('frfeedbacks', $id);

if (empty($fb)) {
    die("User not found");
}

delete('frfeedbacks', $id);

setSuccess('Feedback of ID ' . $id . ' deleted successfully!');
header("Location: /foodrhino/admin/frfeedbacks/");
die;
