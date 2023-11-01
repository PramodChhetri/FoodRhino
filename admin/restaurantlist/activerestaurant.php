<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("Restaurant ID not found");
}

$restaurant = find('restaurant', $id);

if (empty($restaurant)) {
    die("Restaurant not found");
}


// Send OTTP Code via Email
$to = $restaurant['Email'];
$subject = "Activation Mail";

$body = "Your Restaurant Account is activated. Visit our site and login using your mail id and password. Enjoy our service. Thank you!    ";
$from = "From: foodrhino@org.np";

mail($to, $subject, $body, $from);

update('restaurant', $id, ['Active' => "Active"]);

setSuccess('Restaurant of ID ' . $id . ' actived successfully!');
header("Location: /foodrhino/admin/restaurantlist/");
?>

