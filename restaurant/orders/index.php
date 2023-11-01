<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

require_once __DIR__ . "/../header.php";

?>


<!-- Start of contents -->

<?php
$pdo = pdo();
$stmt = $pdo->prepare("SELECT * FROM orders WHERE Restaurant_ID = ?");
$stmt->execute([$restaurant['ID']]);
$orders = $stmt->fetchAll();



?>

<div class="container" style="width: 100%;">
    <div class="d-flex justify-content-between">
        <h2>Orders</h2>

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
                <th>User Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) :
                $userdetail = find('users', $order['User_ID']);
                $name = $userdetail['Name'];

            ?>
                <tr>
                    <td><?php echo $order['ID'] ?></td>
                    <td><?php echo $name; ?></td>
                    <!-- Buttons for Crud -->
                    <td>
                        <a href="showorder.php?id=<?php echo $order['ID']; ?>"><button class="btn btn-danger">Show</button></a>

                        <a href="#!!" onclick="ConfirmDelete(<?php echo $order['ID']; ?>)"><button class="btn btn-danger">Deliver</button></a>


                        <a href="#!!" onclick="ConfirmCancel(<?php echo $order['ID']; ?>)"><button class="btn btn-danger">Cancel</button></a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<!-- End of contents -->

<script>
    function ConfirmDelete(id) {
        if (confirm('Are you sure it is deliverd ?')) {
            location.href = 'deleteorder.php?id=' + id;
        }

    }

    function ConfirmCancel(id) {
        if (confirm('Are you sure want to cancel?')) {
            location.href = 'cancelorder.php?id=' + id;
        }

    }
</script>

<?php

require_once __DIR__ . "/../admin.php";

?>