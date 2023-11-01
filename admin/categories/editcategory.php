<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("Id not found");
}

$category = find('categories', $id);

if (empty($category)) {
    die("category not found");
}


?>


<?php

require_once __DIR__ . "/../header.php";

?>


<div class="card" style="max-width: 550px; margin:50px auto 50px auto" ;>
    <div class="card-header">
        <h1>Edit Category</h1>
    </div>
    <div class="card-body">
        <form action="updatecategory.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <!-- Alert for empty fields and wrong email  -->
            <?php if (hasError()) : ?>
                <div class="alert alert-danger">
                    <?php echo getError();
                    ?>
                </div>
            <?php endif; ?>
            <!-- End of Alert  -->
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $category['Name']; ?>">
            </div>
            <div class=" mb-3">
                <label for="image" class="form-label">Category Image</label>
                <img height="50px" src="../../uploads/<?php echo $category['Image']; ?>" alt="">
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" style="height: 200px; text-align:justify">
                <?php echo $category['Description']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>

    </div>
</div>



<?php

require_once __DIR__ . "/../footer.php";

?>