

<?php include("header.php"); ?>

<?php

if(!isset($_SESSION['admin_email'])){

    header("Location: login.php?error=emaildoesnotexist");
    
}else{

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

    $total_records_per_page = 10;
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


?>

<h1 style='margin-top:30px;'>Dashboard</h1>
<h1 style='margin-top:30px;'>Dashboard</h1>
<?php if(isset($_GET['successfull'])){  ?>

    <p class="text-center" style="color: green;">Product has been updated successfully!</p>

<?php } ?>

<?php if(isset($_GET['error'])){ ?>
    <p class="text-center" style="color: red;">Product has been updated unsuccessfully!</p>

<?php } ?> 

<?php if(isset($_GET['delete_successfull_product'])){ ?>
    
    <p class="text-center" style="color: green;">Product has been deleted successfully!</p>
    
    
<?php } ?>

<?php  if(isset($_GET['delete_error_product'])){  ?>
    
    <p class="text-center" style="color: red;">Product has been deleted unsuccessfully!</p>

<?php } ?>    

<?php  if(isset($_GET['successfull_update_image'])){  ?>

<p class="text-center" style="color: green;">New image has been updated successfully!</p>

<?php } ?> 

<?php  if(isset($_GET['error_update_image'])){  ?>

<p class="text-center" style="color: red;">New image has been updated unsuccessfully!</p>

<?php } ?> 


<?php  




if ($products->num_rows > 0) {

    
    
    echo("<table border='5' class='table1'>");

    echo("<th>Product ID</th>");
    echo("<th>Product Image</th>");
    echo("<th>Product Name</th>");
    echo("<th>Product Price</th>");
    echo("<th>Product Offer</th>");
    echo("<th>Product Category</th>");
    echo("<th>Product Color</th>");
    echo("<th>Edit Images</th>");
    echo("<th>Edit</th>");
    echo("<th>Remove</th>");

    echo "<tr><h1 style='text-align:center;margin-top:30px;'>All Products</h1>";

    foreach($products as $product) {
        echo "<tr>";
        echo "<td>".$product["product_id"]."</td>";
        echo "<td><img src='../assets/img/{$product['product_image']}' style='width: 70px; height: 70px;' /></td>";
        echo "<td>".$product["product_name"]."</td>";
        echo "<td>$".$product["product_price"]."</td>";
        echo "<td>$".$product["product_special_offer"]."</td>";
        echo "<td>".$product["product_category"]."</td>";
        echo "<td>".$product["product_color"]."</td>";
        echo "<td><a class='btn btn-warning' href='edit_image.php?product_id={$product["product_id"]}&product_name={$product["product_name"]}'>Edit Images</a></td>";
        echo "<td><a class='btn btn-primary' href='edit_product.php?product_id={$product["product_id"]}'>Edit Product</a></td>";
        echo "<td><a class='btn btn-danger' href='delete_product.php?product_id={$product["product_id"]}'>Remove Product</a></td>";
        ?>
        

        
        <?php
        echo "</tr>";
    }
    echo ("</table>");

    }else{
        echo ('<h1>The Users table is empty</h1>');
    }

$conn->close();


    ?>
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



<?php include("footer.php"); ?>