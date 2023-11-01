<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("product not found");
}

$product = find('products', $id);

if (empty($product)) {
    die("Product not found");
}


?>

<?php

require_once __DIR__ . "/../header.php";

?>


<div class="card" style="max-width: 550px; margin:50px auto 50px auto" ;>
    <div class="card-header">
        <h1>Product Edit</h1>
    </div>
    <div class="card-body">
        <form action="updateproducts.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <!-- Alert for empty fields and wrong email  -->
            <?php if (hasError()) : ?>
                <div class=" alert alert-danger">
                    <?php echo getError();
                    ?>
                </div>
            <?php endif; ?>
            <!-- End of Alert  -->
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $product['Name']; ?>">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <img height="50px" src="../../uploads/<?php echo $product['Image']; ?>" alt="">
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['Price']; ?>">
            </div>
            <div class="mb-3">
                <label for="saleprice" class="form-label">Sale Price</label>
                <input type="number" class="form-control" id="saleprice" name="saleprice" value="<?php echo $product['Sale_Price']; ?>">
            </div>
            <div class="mb-3">
                <label for="onsale" class="form-label">On_Sale</label>
                <select name="onsale" class="form-control">
                    <option value="1" <?php if ($product['On_Sale'] == 1) {
                                            echo "selected";
                                        } ?>>On Sale</option>
                    <option value="0" <?php if ($product['On_Sale'] == 0) {
                                            echo "selected";
                                        } ?>>Not</option>
                </select>
            </div>
            <?php

            $allcategories = all('categories');

            ?>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" class="form-control">
                    <?php foreach ($allcategories as $ac) : ?>
                        <option value="<?php echo $ac['Name']  ?>" <?php if ($product['Category_ID'] == $ac['ID']) {
                                                                        echo "selected";
                                                                    } ?>><?php echo $ac['Name']  ?></option>
                    <?php endforeach;   ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" style="height: 200px; text-align:justify">
                  <?php echo $product['Description']; ?>  </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>

    </body>

    </html>

    <?php

    require_once __DIR__ . "/../footer.php";

    ?>