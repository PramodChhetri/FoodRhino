<?php

require "functions.php";

$user = user();

echo "I am User";
echo "<br>";
echo "user's id is" . $_SESSION['user_ID'];
echo "<br>";
echo "<pre>";
var_dump($user);
