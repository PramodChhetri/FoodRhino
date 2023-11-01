<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("ID not found");
}

$fb = find('feedbacks', $id);

if (empty($fb)) {
    die("User not found");
}

delete('feedbacks', $id);

setSuccess('Feedback of ID ' . $id . ' deleted successfully!');
header("Location: /foodrhino/admin/feedbacks/");
die;
