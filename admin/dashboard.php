

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

    $sql2 = "SELECT COUNT(*) As total_records FROM orders";
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

    $stmt3 = $conn->prepare("SELECT * FROM orders LIMIT ?, ?");
    $stmt3->bind_param("ii", $offset, $total_records_per_page);
    $stmt3->execute();
    $orders = $stmt3->get_result();

}


?>

<h1 style='margin-top:30px;'>Dashboard</h1>
<h1 style='margin-top:30px;'>Dashboard</h1>
<?php if(isset($_GET['update_successfull_order'])){  ?>

<p class="text-center" style="color: green;">Order has been updated successfully!</p>

<?php } ?>

<?php if(isset($_GET['update_error_order'])){ ?>
<p class="text-center" style="color: red;">Order has been updated unsuccessfully!</p>

<?php } ?> 

<?php if(isset($_GET['delete_successfull_order'])){ ?>

<p class="text-center" style="color: green;">Order has been deleted successfully!</p>


<?php } ?>

<?php  if(isset($_GET['delete_error_order'])){  ?>

<p class="text-center" style="color: red;">Order has been deleted unsuccessfully!</p>

<?php } ?> 

<?php  if(isset($_GET['successfull_add'])){  ?>

<p class="text-center" style="color: green;">New product has been added successfully!</p>

<?php } ?> 

<?php  if(isset($_GET['error_add'])){  ?>

<p class="text-center" style="color: red;">New product has been added unsuccessfully!</p>

<?php } ?> 

<?php  




if ($orders->num_rows > 0) {

    
    
    echo("<table border='5' class='table1'>");

    echo("<th>Order ID</th>");
    echo("<th>Order Status</th>");
    echo("<th>User Id</th>");
    echo("<th>Order Cost</th>");
    echo("<th>Order Date</th>");
    echo("<th>User Phone</th>");
    echo("<th>User Addess</th>");
    echo("<th>Edit</th>");
    echo("<th>Remove</th>");
    echo "<tr><h1 style='text-align:center;margin-top:30px;'>All Orders</h1>";
    foreach($orders as $order) {
        echo "<tr>";
        echo "<td>".$order["order_id"]."</td>";
        echo "<td>".$order["order_status"]."</td>";
        echo "<td>".$order["user_id"]."</td>";
        echo "<td>".$order["order_cost"]."</td>";
        echo "<td>".$order["order_date"]."</td>";
        echo "<td>".$order["user_phone"]."</td>";
        echo "<td>".$order["user_address"]."</td>";
        echo "<td><a class='btn btn-primary' href='edit_order.php?order_id={$order["order_id"]}'>Edit Order</a></td>";
        echo "<td><a class='btn btn-danger' href='delete_order.php?order_id={$order["order_id"]}'>Remove Order</a></td>";
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