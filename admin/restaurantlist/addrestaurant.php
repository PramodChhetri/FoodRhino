<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

require_once __DIR__ . "/../header.php";

?>


<div class="card" style="max-width: 550px; margin:50px auto 50px auto" ;>
    <div class="card-header">
        <h1>Restaurant Registration </h1>
    </div>
    <div class="card-body">
        <form action="storerestaurant.php" method="POST" enctype="multipart/form-data">
            <!-- Alert for empty fields and wrong email  -->
            <?php if (hasError()) : ?>
                <div class="alert alert-danger">
                    <?php echo getError();
                    ?>
                </div>
            <?php endif; ?>
            <!-- End of Alert  -->
            <div class="mb-3">
                <label for="name" class="form-label">Restaurant Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Restaurant Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="fimage" class="form-label">Featured Image</label>
                <input type="file" class="form-control" id="fimage" name="fimage">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <!-- Alert for empty fields and wrong email  -->
            <?php if (hasPassError()) : ?>
                <div class="alert alert-danger">
                    <?php echo getPassError();
                    ?>
                </div>
            <?php endif; ?>
            <!-- End of Alert  -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password_verify" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_verify" name="password_verify">
            </div>
            <div class="mb-3">
                <label for="veg" class="form-label">Veg</label>
                <select name="veg" class="form-control">
                    <option value="Veg">Veg</option>
                    <option value="Non-veg">Non-Veg</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="active" class="form-label">Status</label>
                <select name="active" class="form-control">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="cuisine" class="form-label">Cuisine</label>
                <input type="text" class="form-control" id="cuisine" name="cuisine">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="mb-3">
                <label for="district" class="form-label">District</label>
                <select name="district" class="form-control">
                    <option value="Kathmandu">Kathmandu</option>
                    <option value="Pokhara">Pokhara</option>
                    <option value="Biratnagar">Biratnagar</option>
                    <option value="Chitwan">Chitwan</option>
                    <option value="Nawalparasi">Nawalparasi</option>
                    <option value="Butwal">Butwal</option>
                    <option value="Birgung">Birgung</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" style="height: 200px; text-align:justify">
                    </textarea>
            </div>
            <div class="mb-3">
                <label for="pan" class="form-label">Pan Card Image</label>
                <input type="file" class="form-control" id="pan" name="pan">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

    </div>
</div>



<?php

require_once __DIR__ . "/../footer.php";

?>