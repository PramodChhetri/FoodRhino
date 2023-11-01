<?php

require_once __DIR__ . "/../admin.php";

?>

<?php

$id = request('id');

if (empty($id)) {
    die("Restaurant ID not found");
}

$restaurant = find('restaurant', $id);

if (empty($restaurant)) {
    die("User not found");
}


?>

<?php

require_once __DIR__ . "/../header.php";

?>


<div class="card" style="max-width: 550px; margin:50px auto 50px auto" ;>
    <div class="card-header">
        <h1>Restaurant Details Update</h1>
    </div>
    <div class="card-body">
        <form action="updateprofiledetails.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <!-- Alert for empty fields and wrong email  -->
            <?php if (hasError()) : ?>
                <div class="alert alert-danger">
                    <?php echo getError();
                    ?>
                </div>
            <?php endif; ?>
            <!-- End of Alert  -->
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $restaurant['Name'];  ?>">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Restaurant Image</label><br>
                <img height="50px" src="../../uploads/<?php echo $restaurant['Image']; ?>" alt="">

            </div>
            <div class="mb-3">
                <label for="fimage" class="form-label">Featured Image</label><br>
                <img height="50px" src="../../uploads/<?php echo $restaurant['F_Image']; ?>" alt="">

            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $restaurant['Email'];  ?>" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo $restaurant['City'];  ?>">
            </div>
            <div class="mb-3">
                <label for="cuisine" class="form-label">Cuisine</label>
                <input type="text" class="form-control" id="cuisine" value="<?php echo $restaurant['Cuisine'];  ?>" name="cuisine">
            </div>

            <div class="mb-3">
                <label for="veg" class="form-label">Veg</label>
                <select name="veg" class="form-control">
                    <option value="Non-Veg" <?php if ($restaurant['Veg'] == "Non-Veg") {
                                                echo "selected";
                                            }; ?>>Non-Veg</option>
                    <option value="Veg" <?php if ($restaurant['Veg'] == "Veg") {
                                            echo "selected";
                                        }; ?>>Veg</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="district" class="form-label">District</label>
                <select name="district" class="form-control">
                    <option value="Kathmandu" <?php if ($restaurant['District'] == "Kathmandu") {
                                                    echo "selected";
                                                }; ?>>Kathmandu</option>
                    <option value="Pokhara" <?php if ($restaurant['District'] == "Pokhara") {
                                                echo "selected";
                                            }; ?>>Pokhara</option>
                    <option value="Biratnagar" <?php if ($restaurant['District'] == "Biratnagar") {
                                                    echo "selected";
                                                }; ?>>Biratnagar</option>
                    <option value="Chitwan" <?php if ($restaurant['District'] == "Chitwan") {
                                                echo "selected";
                                            }; ?>>Chitwan</option>
                    <option value="Nawalparasi" <?php if ($restaurant['District'] == "Nawalparasi") {
                                                    echo "selected";
                                                }; ?>>Nawalparasi</option>
                    <option value="Butwal" <?php if ($restaurant['District'] == "Butwal") {
                                                echo "selected";
                                            }; ?>>Butwal</option>
                    <option value="Birgung" <?php if ($restaurant['District'] == "Birgung") {
                                                echo "selected";
                                            }; ?>>Birgung</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="pan" class="form-label">Pan Card Image</label><br>
                <img height="200px" src="../../uploads/<?php echo $restaurant['PAN']; ?>" alt="">

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" style="height: 200px; text-align:justify">
                <?php echo $restaurant['Description'];  ?>       
            </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>

    </body>

    </html>

    <?php

    require_once __DIR__ . "/../footer.php";

    ?>