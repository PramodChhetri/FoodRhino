<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

$restaurant = find('restaurant', $id);

if (empty($id)) {
    die("ID not found");
}

$restaurant = find('restaurant', $id);

if (empty($restaurant)) {
    die("restaurant not found");
}

?>


<?php

require_once __DIR__ . "/../header.php";

?>

<div class="container">
    <table class="table">
        <tbody>
            <tr>
                <td><b>ID</b></td>
                <td><b><?php echo $restaurant['ID']; ?></b></td>
            </tr>
            <tr>
                <td><b>Image</b></td>
                <td><img height="100px" src="../../uploads/<?php echo $restaurant['Image'] ?>" alt=""></td>
            </tr>
            <tr>
                <td><b>Featured Image</b></td>
                <td><img height="100px" src="../../uploads/<?php echo $restaurant['F_Image'] ?>" alt=""></td>
            </tr>
            <tr>
                <td><b>Name</b></td>
                <td><b><?php echo $restaurant['Name'] ?></b></td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td><b><?php echo $restaurant['Email'] ?></b></td>
            </tr>
            <tr>
                <td><b>Veg</b></td>
                <td><b><?php echo $restaurant['Veg'] ?></b></td>
            </tr>
            <tr>
                <td><b>Active</b></td>
                <td><b><?php echo $restaurant['Active'] ?></b></td>
            </tr>
            <tr>
                <td><b>City</b></td>
                <td><b><?php echo $restaurant['City'] ?></b></td>
            </tr>
            <tr>
                <td><b>District</b></td>
                <td><b><?php echo $restaurant['District'] ?></b></td>
            </tr>

            <tr>
                <td><b>Discription</b></td>
                <td><b><?php echo $restaurant['Description'] ?></b></td>
            </tr>
            <tr>
                <td><b>PAN Card</b></td>
                <td><img height="300px" src="../../uploads/<?php echo $restaurant['PAN'] ?>" alt=""></td>
            </tr>

        </tbody>
    </table>
</div>



<?php

require_once __DIR__ . "/../footer.php";

?>