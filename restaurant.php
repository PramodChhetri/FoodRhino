<?php require "rheader.php"; ?>


<!-- Start of content -->
<div class="container-fluid" style="width: 1200px;">

    <div class="card-header">
        <h1>Order Products</h1>
    </div>
    <div class="card-body">

        <!-- Alert for empty fields and wrong email  -->
        <?php if (hasError()) : ?>
            <div class="alert alert-danger">
                <?php echo getError();
                ?>
            </div>
        <?php endif; ?>
        <!-- Alert for successful add and delete  -->
        <?php if (hasSuccess()) : ?>
            <div class="alert alert-danger">
                <?php echo getSuccess();
                ?>
            </div>
        <?php endif; ?>
        <!-- End of Alert  -->

        <table class="table">
            <thead>
                <th>Item</th>
                <th>Order Available</th>
                <th>Price</th>
                <th></th>
            </thead>
            <tbody>
                <?php foreach ($allmenu as $om) :

                ?>

                    <tr>
                        <td><?php echo $om['Name']; ?></td>
                        <td><?php echo $om['Stock']; ?></td>
                        <td>Rs. <?php echo $om['Sale_Price']; ?></td>
                        <td>
                            <form action="yourorders.php?id=<?php echo $restaurant['ID'] ?>" method="POST">
                                <input type="hidden" name="menu_id" value="<?php echo $om['ID']; ?>">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="number" id="quantity" value="1" name="quantity" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <button class="btn btn-primary">Add to Cart</button>
                                        </div>
                                    </div>
                            </form>
                        </td>

                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>



<!-- end of content  -->

<?php require_once "footer.php";  ?>


<!-- end of content  -->

<?php require_once "footer.php";  ?>