
<?php include("layouts/header.php"); ?>

    <!-- Home -->

    <section id="home">
        <div class="container">
            <h5 style="color:black">NEW ARRIVALS</h5>
            <h1><span> Best Prices</span>This Season</h1>
            <p>E-shop offers the best products for the most affordable prices.</p>
            <a href="<?php echo "shop.php"?>"><button class="btn btn btn-dark">Shop Now</button></a>
        </div>
    </section>

    <!-- Brands -->

    <section id="brand" class="container">
        <div class="row">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/img/Brands/Brands-06.png" alt="">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/img/Brands/Brands-05.png" alt="">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/img/Brands/Brands-03.png" alt="">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/img/Brands/Brands-04.png" alt="">
        </div>
    </section>

    <!-- New -->

    <section id="new" class="w-100">
        <div class="row p-0 m-0">
            <!-- One -->
            <div class="one col-lg-4 col-md-12 colsm-12 p-0">
                <img class="img-fluid" src="assets/img/one.avif" alt="">
                <div class="details">
                    <h2>Extreamly Awesome Laptops</h2>
                    
                    <a href="<?php echo "shop.php"?>"><button class="btn btn btn-light">Shop Now</button></a>
                </div>
            </div>
            <!-- Two -->
            <div class="one col-lg-4 col-md-12 colsm-12 p-0">
                <img class="img-fluid" src="assets/img/pc.jpg" alt="">
                <div class="details">
                    <h2>Awesome PC</h2>
                    <a href="<?php echo "shop.php"?>"><button class="btn btn btn-light">Shop Now</button></a>
                    
                </div>
            </div>
            <!-- Three -->
            <div class="one col-lg-4 col-md-12 colsm-12 p-0">
                <img class="img-fluid" src="assets/img/acc.jpg" alt="">
                <div class="details">
                    <h2>50% OFF Accesseries</h2>
                    <a href="<?php echo "shop.php"?>"><button class="btn btn btn-light">Shop Now</button></a>

                </div>
            </div>
        </div>
    </section>

    <!-- Featured -->

    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Featured</h3>
            <hr class="mx-auto">
            <p>Here you can check out our new heatured products</p>
        </div>
        <div class="row mx-auto container-fluid">
            <?php include('server/get_featured_product.php'); ?>

            <?php while($row = $featured_product->fetch_assoc()){  ?>
            <div class="product col-lg-3 col-md-4 col-sm-12 text-center">
                <img src="assets/img/<?php echo $row['product_image']?>" alt="" class="img-fluid mb-3">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']?></h5>
                <h4 class="p-price">$<?php echo $row['product_price']?></h4>
                <a href="<?php echo "single_product.php?product_id=".$row['product_id'] ;?>"><button class="btn buy-btn">Buy Now</button></a>
            </div>
            <?php } ?>
        </div>
    </section>

    <!-- Banner -->

    <section id="banner" class="my-5">
        <div class="container">
            <h4>MID SEASOON'S SALE</h4>
            <h1>NEW COMPUTER Collection <br> UP to 30% OFF</h1>
            <a href="<?php echo "shop.php"?>"><button class="btn btn buy-btn">Shop Now</button></a>
        </div>
    </section>


    <!-- Pc -->

    <section id="featured my-5 pb-5" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>New PC</h3>
            <hr class="mx-auto">
            <p>Here you can check out our new amazing new PC</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_pc.php'); ?>

            <?php while($row = $pc->fetch_assoc()){  ?>
            <div class="product col-lg-3 col-md-4 col-sm-12 text-center">
                <img src="assets/img/<?php echo $row['product_image']?>" alt="" class="img-fluid mb-3">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']?></h5>
                <h4 class="p-price">$<?php echo $row['product_price']?></h4>
                <a href="<?php echo "single_product.php?product_id=".$row['product_id'] ;?>"><button class="btn buy-btn">Buy Now</button></a>
            </div>
            <?php } ?>
        </div>
    </section>

    <!-- Acceserioes -->

    <section id="featured my-5 pb-5" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Acceseries</h3>
            <hr class="mx-auto">
            <p>Here you can check out our new amazing Acceseries</p>
        </div>
        <div class="row mx-auto container-fluid">
        <?php include('server/get_acceseioes.php'); ?>

        <?php while($row = $acceseries->fetch_assoc()){  ?>
            <div class="product col-lg-3 col-md-4 col-sm-12 text-center">
                <img src="assets/img/<?php echo $row['product_image']?>" alt="" class="img-fluid mb-3">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']?></h5>
                <h4 class="p-price">$<?php echo $row['product_price']?></h4>
                <a href="<?php echo "single_product.php?product_id=".$row['product_id'] ;?>"><button class="btn buy-btn">Buy Now</button></a>
            </div>
        
            <?php } ?>
        </div>
    </section>


<?php include("layouts/footer.php"); ?>