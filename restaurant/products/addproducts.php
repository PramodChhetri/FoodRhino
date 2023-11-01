<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

require_once __DIR__ . "/../header.php";

?>


<div class="card" style="max-width: 550px; margin:50px auto 50px auto" ;>
    <div class="card-header">
        <h1>Add Products</h1>
    </div>
    <div class="card-body">
        <form action="storeproducts.php" method="POST" enctype="multipart/form-data">
            <!-- Alert for empty fields and wrong email  -->
            <?php if (hasError()) : ?>
                <div class="alert alert-danger">
                    <?php echo getError();
                    ?>
                </div>
            <?php endif; ?>
            <!-- End of Alert  -->
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="saleprice" class="form-label">Sale Price</label>
                <input type="text" class="form-control" id="saleprice" name="saleprice">
            </div>
            <div class="mb-3">
                <label for="onsale" class="form-label">On_Sale</label>
                <select name="onsale" class="form-control">
                    <option value="1">On Sale</option>
                    <option value="0">Not</option>
                </select>
            </div>
            <?php

            $allcategories = all('categories');

            ?>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" class="form-control">
                    <?php foreach ($allcategories as $ac) : ?>
                        <option value="<?php echo $ac['Name']  ?>"><?php echo $ac['Name']  ?></option>
                    <?php endforeach;   ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" style="height: 200px; text-align:justify">
                    </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>

    </div>
</div>



<?php

require_once __DIR__ . "/../footer.php";

?>