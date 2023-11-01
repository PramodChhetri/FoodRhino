<?php

require "functions.php";

unset($_SESSION['user_ID']);
header("location: index.php");
