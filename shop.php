<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php?error=notloggedin");
    exit();
} else {
    require_once("server/connection.php");

    if (isset($_POST['search'])) {
        if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
            $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
        }

        $category = $_POST['category'];
        $price = $_POST['price'];

        $sql2 = "SELECT COUNT(*) As total_records FROM products WHERE product_category=? AND product_price<=?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("si", $category, $price);
        $stmt2->execute();
        $result = $stmt2->get_result();
        $row = $result->fetch_assoc();
        $total_records = $row['total_records'];

        $total_records_per_page = 8;
        $offset = ($page_no - 1) * $total_records_per_page;

        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;

        $adjacents = 2;

        $total_no_of_pages = ceil($total_records / $total_records_per_page);

        $stmt3 = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=? LIMIT ?, ?");
        $stmt3->bind_param("siii", $category, $price, $offset, $total_records_per_page);
        $stmt3->execute();
        $products = $stmt3->get_result();

    } else {
        
        if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
            $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
        }

        $sql2 = "SELECT COUNT(*) As total_records FROM products";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute();
        $result = $stmt2->get_result();
        $row = $result->fetch_assoc();
        $total_records = $row['total_records'];

        $total_records_per_page = 8;
        $offset = ($page_no - 1) * $total_records_per_page;

        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;

        $adjacents = 2;

        $total_no_of_pages = ceil($total_records / $total_records_per_page);

        $stmt3 = $conn->prepare("SELECT * FROM products LIMIT ?, ?");
        $stmt3->bind_param("ii", $offset, $total_records_per_page);
        $stmt3->execute();
        $products = $stmt3->get_result();
    }
}
?>





<?php include("layouts/header.php"); ?>

<?php

    // session_start();

    // if(!isset($_SESSION['user_email'])){

    //     header("Location: login.php?error=notloggedin");
    //     exit();

    // }else{


    //     require_once("server/connection.php");

    //     if(isset($_POST['search'])){

    //         $category = $_POST['category'];
    //         $price = $_POST['price'];

    //         $sql="SELECT * FROM products WHERE product_category=? AND product_price<=?";

    //         $stmt=$conn->prepare($sql);
    //         $stmt->bind_param("si",$category,$price);
    //         $stmt->execute();

    //         $products = $stmt->get_result();

    //     }else{

    //         if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
    //             $page_no = $_GET['page_no'];

    //         }else{
    //             $page_no = 1;
    //         }

    //         $sql2 = "SELECT COUNT(*) As total_records FROM products";
    //         $stmt2 = $conn->prepare($sql2);
    //         $stmt2->execute();
    //         $total_records = $stmt2->get_result();
            
    //         $total_records_per_page = 8;
    //         $offset = ($page_no - 1) * $total_records_per_page;

    //         $previous_page = $page_no - 1;
    //         $next_page = $page_no + 1;

    //         $adjacents = "2";

    //         $total_no_of_pages = ceil($total_records/$total_records_per_page);

    //         $stmt3 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
    //         $stmt3->execute();
    //         $products = $stmt3->get_result();
        
    //     }
    // }    

?>


    <!-- Search -->

    
    <section id="search" style="background-color:orange;" class="my-5 pb-5 ms-2 sidenav  mb-5 border-radius-xl">
        <div class="container text-center py-5">
            <h3 class="font-weight-bold">Search Products</h3>
            <hr class="bg-dark w-100">
        </div>
        <form action="shop.php" method="POST">
            <div class="row mx-auto container">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h4>Category</h4>
                    <div class="form-check">
                        <input class="form-check-input" value="pc" type="radio" name="category" id="category_one" <?php if(isset($category) && $category == 'pc'){echo "checked";} ?> >
                        <label class="form-check-label font-weight-bold" for="flexRadioDefault1">
                            Pc
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="laptop" type="radio" name="category" id="category_two" <?php if(isset($category) && $category == 'laptop'){echo "checked";} ?>>
                        <label class="form-check-label font-weight-bold" for="flexRadioDefault2">
                            Laptop
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="acceseies" type="radio" name="category" id="category_three" <?php if(isset($category) && $category == 'acceseies'){echo "checked";} ?>>
                        <label class="form-check-label font-weight-bold" for="flexRadioDefault2">
                            Acceseies
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="gamming" type="radio" name="category" id="category_four" <?php if(isset($category) && $category == 'gamming'){echo "checked";} ?>>
                        <label class="form-check-label font-weight-bold" for="flexRadioDefault2">
                            Gamming
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mx-auto container mt-5">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h4>Price</h4>
                    <input type="range" name="price" value="<?php if(isset($price)){echo $price;}else{echo "100";} ?>" class="form-range w-50" min="1" max="1000" id="customRange2">
                    <div class="w-50">
                        <span style="float: left;">1</span>
                        <span style="float: right;">1000</span>
                    </div>
                </div>
            </div>
            <div class="form-group my-3 mx-3">
                <input type="submit" name="search" value="Search" class="btn btn-primary text-center">
            </div>
        </form>
    </section>

            <!-- Shop -->

    <section id="shop" class="my-5 container-fluid py-4 mb-5">
        <div class="container text-start py-5 mb-5">
            <h3 class="mb-2">Our products</h3>
            <hr class="text-center mb-2">
            <p class="mb-5">Here you can check out our new heatured products</p>
        </div>
        <div class="row mx-auto container mb-5">

            <?php while($row = $products->fetch_assoc()){  ?>

            <div onclick="window.location.href='single_product.php';" class="product col-lg-3 col-md-4 col-sm-12 text-center">
                <img src="assets/img/<?php echo $row['product_image'] ?>" alt="" class="img-fluid mb-3">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
                <h4 class="p-price">$<?php echo $row['product_price'] ?></h4>
                <a class="btn shop-buy-btn" href="<?php echo "single_product.php?product_id=".$row['product_id'] ?>">Buy Now</a>
            </div>

            <?php } ?>
        

            <nav aria-label="page navigation example">
                <ul class="pagination mt-5">

                    <li class="page-item <?php if($page_no <=1){echo 'disabled';} ?>"><a href="<?php if($page_no <= 1){echo '#';}else{echo "?page_no=".($page_no-1);} ?>" class="page-link">Previous</a></li>
                    <li class="page-item"><a href="?page_no=1" class="page-link">1</a></li>
                    <li class="page-item"><a href="?page_no=2" class="page-link">2</a></li>
                    <?php if($page_no >= 3){ ?>
                        <li class="page-item"><a href="#" class="page-link">...</a></li>
                        <li class="page-item"><a href="<?php "?page_no=".$page_no; ?>" class="page-link"><?php echo $page_no; ?></a></li>
                    <?php } ?>
                    
                    <li class="page-item <?php if($page_no >= $total_no_of_pages){echo 'disabled';} ?>"><a href="<?php if( $page_no >= $total_no_of_pages){echo '#';}else{echo "?page_no=".($page_no+1);} ?>" class="page-link">Next</a></li>
                </ul>
            </nav>
        </div>
    </section>





    <?php include("layouts/footer.php"); ?>