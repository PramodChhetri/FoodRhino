<?php

require "../foodrhino/functions.php";

$id = request('id');

setError("You need to login first!");
redirect("restaurant.php?id=$id");
