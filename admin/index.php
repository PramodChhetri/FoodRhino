<?php require "header.php"; ?>

<!-- Start of contents -->

<?php

$userno = count_item('users');
$restaurantno = count_item('restaurant');

?>

<div class="container">

    <div style="margin-top: 10px; text-align:center; color:black;">
        <br>
        <h1 class="lead" style="font-size: 50px; color: #4e73df;;">Welcome to Admin Dashboard <?php echo $admin['Name'] ?></h1>
    </div>
    <br>
    <div>
        <center> <img class="img rounded-circle" src="<?php echo $page_url; ?>../uploads/<?php echo $admin['Image']; ?>" height="300px" width="300px">
        </center>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="card  mb-3" style="width: 18rem; margin-left:300px;  margin-right:50px; ">
        <div class="card-header" style="background-color: #4e73df;">
            <h3 class="card-title" style="color: white;"><a href="/foodrhino/admin/userlist" style="color: white;"><b>Users</b></a></h3>
        </div>
        <div class="card-body">
            <center>
                <h1 class="card-title"><b class="display-2"><?php echo $userno;   ?></b></h1>
            </center>
        </div>
    </div>
    <div class="card  mb-3" style="width: 18rem; height:18rem;">
        <div class="card-header" style="background-color: #4e73df;">
            <h3 class="card-title" style="color: white;"><a href="/foodrhino/admin/restaurantlist" style="color: white;"><b>Restaurants</b></a></h3>
        </div>
        <div class="card-body">
            <center>
                <h1 class="card-title"><b class="display-2"><?php echo $restaurantno;   ?></b></h5>
            </center>

        </div>
    </div>
</div>
<br>
<br>

<!-- End of contents -->


<?php require "footer.php"; ?>