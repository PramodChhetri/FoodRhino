<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

require_once __DIR__ . "/../header.php";

?>


<div class="card" style="max-width: 550px; margin:50px auto 50px auto" ;>
    <div class="card-header">
        <h1>Add Category</h1>
    </div>
    <div class="card-body">
        <form action="storecategory.php" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Category Image</label>
                <input type="file" class="form-control" id="image" name="image">
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