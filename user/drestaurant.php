<?php

require "admin.php";

request('id');

redirect("user/restaurant.php?id=$id");
