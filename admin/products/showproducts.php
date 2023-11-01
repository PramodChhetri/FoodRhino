<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

$products = find('products', $id);

if (empty($id)) {
    die("ID not found");
}

$products = find('products', $id);

if (empty($products)) {
    die("products not found");
}

?>


<?php

require_once __DIR__ . "/../header.php";

?> <div class="container">
    <table class="table">
        <tbody>
            <tr>
                <td><b>ID</b></td>
                <td><b><?php echo $products['ID']; ?></b></td>
            </tr>
            <tr>
                <td><b>Name</b></td>
                <td><b><?php echo $products['Name'] ?></b></td>
            </tr>
            <tr>
                <td><b>Restaurant</b></td>
                <td><b><?php $Restaurant_Name = find('restaurant', $products['Restaurant_ID']);
                        echo $Restaurant_Name['Name'];
                        ?></b></td>
            </tr>
            <tr>
                <td><b>Product Image</b></td>
                <td><img height="100px" src="../../uploads/<?php echo $products['Image'] ?>" alt=""></td>
            </tr>
            <tr>
                <td><b>OnSale</b></td>
                <td><b><?php if ($products['On_Sale'] == 1) {
                            echo "OnSale";
                        } else {
                            echo "Not";
                        }; ?></b></td>
            </tr>
            <tr>
                <td><b>Category </b>
                </td>
                <td><b><?php $Category = find('categories', $products['Category_ID']);
                        echo $Category['Name'];
                        ?></b></td>
            </tr>
            <tr>
                <td><b>Price</b></td>
                <td><b><?php echo $products['Price'];  ?></b></td>
            </tr>
            <tr>
                <td><b>Sale Price</b></td>
                <td><b><?php echo $products['Sale_Price'];  ?></b></td>
            </tr>
            <tr>
                <td><b>Discription</b></td>
                <td><b><?php echo $products['Description'] ?></b></td>
            </tr>


        </tbody>
    </table>
</div>



<?php

require_once __DIR__ . "/../footer.php";

?>