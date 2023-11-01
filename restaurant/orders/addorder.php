<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

require_once __DIR__ . "/../header.php";

?>


<div class="card" ;>
    <div class="card-header">
        <h1>Add Order</h1>
    </div>
    <div class="card-body">
        <form action="storeorder.php" method="POST">
            <!-- Alert for empty fields and wrong email  -->
            <?php if (hasError()) : ?>
                <div class="alert alert-danger">
                    <?php echo getError();
                    ?>
                </div>
            <?php endif; ?>
            <!-- End of Alert  -->
            <div class="mb-3">
                <label for="userid" class="form-label"></label>
                <select class="form-control" id="userid" name="userid">
                    <?php $users = all('users');
                    foreach ($users as $usera) :  ?>

                        <option value="<?php echo $usera['ID'];  ?>"><?php echo $usera['Name'];  ?></option>

                    <?php endforeach; ?>

                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>

    </div>
</div>



<?php

require_once __DIR__ . "/../footer.php";

?>