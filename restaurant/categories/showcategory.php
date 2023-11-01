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
    die("categories not found");
}

$prod = where('products', 'Category_ID', '=', $categories['ID']);

?>


<?php

require_once __DIR__ . "/../header.php";

?>

<div class="container">
    <table class="table">
        <tbody>
            <tr>
                <td><b>ID</b></td>
                <td><b><?php echo $categories['ID']; ?></b></td>
            </tr>
            <tr>
                <td><b>Name</b></td>
                <td><b><?php echo $categories['Name'] ?></b></td>
            </tr>
            <tr>
                <td><b>Product Image</b></td>
                <td><img height="100px" src="../../uploads/<?php echo $categories['Image'] ?>" alt=""></td>
            </tr>
            <tr>
                <td><b>Discription</b></td>
                <td><b><?php echo $categories['Description'] ?></b></td>
            </tr>
            <tr>
                <td><b>Products</b></td>
                <td>
                    <b><?php
                        foreach ($prod as $pd) :
                            echo $pd['Name'];
                        ?>
                            <br>
                        <?php endforeach;     ?></b>
                </td>
            </tr>

        </tbody>
    </table>
</div>



<?php

require_once __DIR__ . "/../footer.php";

?>