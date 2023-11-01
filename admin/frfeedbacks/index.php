<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

require_once __DIR__ . "/../header.php";

?>


<!-- Start of contents -->

<?php $frfbs = all('frfeedbacks'); ?>

<div class="container" style="width: 100%;">
    <div class="d-flex justify-content-between">
        <h2>Site Feedbacks</h2>
    </div>
    <!-- Alert for successful add and delete  -->
    <?php if (hasSuccess()) : ?>
        <div class="alert alert-danger">
            <?php echo getSuccess();
            ?>
        </div>
    <?php endif; ?>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Feedback</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($frfbs as $fb) :
                $fuser = find('users', $fb['User_ID']);

            ?>
                <tr>
                    <td><?php echo $fuser['ID'] ?></td>
                    <td><img height="30px" src="../../uploads/<?php echo $fuser['Image']; ?>" alt=""></td>
                    <td><?php echo $fuser['Name']; ?></td>

                    <td><?php echo $fb['Feedback'] ?></td>
                    <!-- Buttons for Crud -->
                    <td>

                        <a href="#!!" onclick="ConfirmDelete(<?php echo $fb['ID']; ?>)"><button class="btn btn-danger">Delete</button></a>


                    </td>



                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<!-- End of contents -->

<script>
    function ConfirmDelete(id) {
        if (confirm('Are you sure want to delete?')) {
            location.href = 'deletefrfeedback.php?id=' + id;
        }

    }
</script>

<?php

require_once __DIR__ . "/../admin.php";

?>