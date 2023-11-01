<?php require "header.php"; ?>

<!-- Start of contents -->

<!-- Alert for successful add and delete  -->
<?php if (hasSuccess()) : ?>
    <div class="alert alert-danger">
        <?php echo getSuccess();
        ?>
    </div>
<?php endif; ?>
<!-- Carousel/Slider -->

<div style="margin-bottom: 50px;">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/bg/bg-1.jpeg" class="d-block w-100" height="550px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p>Haven't register restaurant yet? <a href="register.php"><strong>Register</strong></a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/bg/bg-2.jpeg" class="d-block w-100" height="550px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p>Haven't register restaurant yet? <a href="register"><strong>SignUp Now</strong></a>.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/bg/bg-3.jpeg" class="d-block w-100" height="550px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p>Haven't register restaurant yet? <a href="register.php"><strong>SignUp Now</strong></a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/bg/bg-4.jpeg" class="d-block w-100" height="550px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p>Haven't register restaurant yet? <a href="register.php"><strong>SignUp Now</strong></a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/bg/bg-5.jpeg" class="d-block w-100" height="550px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p>Haven't register restaurant yet? <a href="register.php"><strong>SignUp Now</strong></a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/bg/bg-6.jpeg" class="d-block w-100" height="550px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p>Haven't register restaurant yet? <a href="register.php"><strong>SignUp Now</strong></a></p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>



<!-- Blog/Posts  -->
<div>
    <div class="container" style="margin-bottom: 30px; margin-top: 50px;">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static" style="background-color: #f4f4f4;">
                        <strong class="d-inline-block mb-2 text-primary"> The Wall Street Journal</strong>
                        <h3 class="mb-0">Featured post</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto" style="text-align: justify;">FoodRhino company is about to shake the Nepal food ordering market in Nepal. After launching new branches all over the Nepal, FoohRhino is about to be became largest restaurant chain company in Nepal.</p>
                        <a href="https://www.wsj.com/" class="stretched-link" style="color:  #eb6864;">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="images/img/twsj.jpeg" class="bd-placeholder-img" width="250" height="330" alt="">

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static" style="background-color: #f4f4f4;">
                        <strong class="d-inline-block mb-2 text-success">Alimentarium</strong>
                        <h3 class="mb-0">Food Origins</h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="mb-auto">Where does our food come from? Tomatoes come from the Andes and coffee from Ethiopia. An overview of the production of some foodstuffs, from their origin to where they are mainly grown today.</p>
                        <a href="https://www.alimentarium.org/en/magazine/infographics/where-does-our-food-come" class="stretched-link" style="color:  #eb6864;">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="images/img/fo1.jpeg" class="bd-placeholder-img" width="250" height="330" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<hr>


<!-- Featured Restaurants -->

<div class="container" style="margin-bottom: 60px;margin-top: 40px;">
    <div class="row">
        <div style="margin-bottom: 10px;">
            <h5 style="float: left;"><strong>FEATURED RESTAURANTS</strong></h5>
            <a href="/foodrhino/user/allrestaurant.php" style="text-decoration: none; float: right; color:  #eb6864;"><b>View All</b></a>
        </div>
        <div class="col-md-6 col-lg-3" style="padding: 10px;">
            <div class="listing">
                <div class="listing__photo" style="height:150px !important">
                    <a href="restaurant.php?id=19">
                        <img src="images/featured/lt.jpg" style="width:100%;">
                    </a>
                </div>
                <div class="title20 mt-2">
                    <a href="restaurant.php?id=19" style="text-decoration: none; color:black;"><span>Le Trio</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3" style="padding: 10px;">
            <div class="listing">
                <div class="listing__photo" style="height:150px !important">
                    <a href="restaurant.php?id=20">
                        <img src="images/featured/pi.jpg" style="width:100%;">
                    </a>
                </div>
                <div class="title20 mt-2">
                    <a href="restaurant.php?id=20" style="text-decoration: none; color:black;"><span>Pizza Inn</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3" style="padding: 10px;">
            <div class="listing">
                <div class="listing__photo" style="height:150px !important">
                    <a href="restaurant.php?id=21">
                        <img src="images/featured/zh.png" style="width:100%;">
                    </a>
                </div>
                <div class="title20 mt-2">
                    <a href="restaurant.php?id=21" style="text-decoration: none; color:black;"><span>Zhong Hua</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3" style="padding: 10px;">
            <div class="listing">
                <div class="listing__photo" style="height:150px !important">
                    <a href="restaurant.php?id=22">
                        <img src="images/featured/bcfp.jpg" style="width:100%;">
                    </a>
                </div>
                <div class="title20 mt-2">
                    <a href="restaurant.php?id=22" style="text-decoration: none; color:black;"><span>Bricks Cafe Firewood Pizza</span></a>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Register Restaurant -->
<div style="background-color:#f4f4f4; padding-top: 30px; margin-top: 20px; padding-bottom: 50px">
    <div class="row">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-6">
            <div class="text-center" style="text-align:justify;">

                <h2 style="text-align:center;">
                    <b>
                        FoodRhino is the largest restaurant chain of Nepal.<br>Join with us for better customer interaction!
                    </b>
                </h2>
            </div>
            <div class="text-center">
                <a href="register.php"><button class="btn btn-primary" style="background-color: #eb6864; color:black;"><b>Register</b></button></a>
            </div>
        </div>
    </div>
</div>

<!-- End of contents -->


<?php require "footer.php"; ?>