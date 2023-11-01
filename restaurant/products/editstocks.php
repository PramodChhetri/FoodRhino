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
        <h1>Stocks Edit</h1>
    </div>
    <div class="card-body">
        <form action="updatestocks.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <!-- Alert for empty fields and wrong email  -->
            <?php if (hasError()) : ?>
                <div class=" alert alert-danger">
                    <?php echo getError();
                    ?>
                </div>
            <?php endif; ?>
            <!-- End of Alert  -->

            <div class="mb-3">
                <label for="stock" class="form-label">Stocks</label>
                <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $product['Stock']; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>

    </body>

    </html>

    <?php

    require_once __DIR__ . "/../footer.php";

    ?>