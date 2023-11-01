<?php

require __DIR__ . "/../admin.php";

$id = request('id');




if (!empty($_POST)) {
    $name = request('name');

    $active = request('active');

    $email = request('email');

    $cuisine = request('cuisine');
    $city = request('city');
    $district = request('district');
    $veg = request('veg');
    $description = request('description');

    // Validation 
    if (empty($name) || empty($email) || empty($district)) {
        setError("Please fill all field!");
        redirect("admin/restaurantlist/editrestaurant.php?id=$id");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setError("Please provide a valid Email!");
        redirect("admin/restaurantlist/editrestaurant.php?id=$id");
    }






    update('restaurant', $id, [
        "Name" => $name,
        "Email" => $email,

        "Active" => $active,
        "City" => $city,
        "Cuisine" => $cuisine,
        "District" => $district,
        "Veg" => $veg,
        "Description" => $description,
        "Active" => $active
    ]);

    // Successful Creation 
    setSuccess("Restaurant updated!");
    header("Location: /foodrhino/admin/restaurantlist");
    die;
};

echo "errrror";
