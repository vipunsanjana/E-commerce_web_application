

<?php include("header.php"); ?>

<?php

if(!isset($_SESSION['admin_email'])){

    header("Location: login.php?error=emaildoesnotexist");
    
}else{

    if(isset($_GET['order_id'])){

        $order_id = $_GET['order_id'];
        $stmt3 = $conn->prepare("SELECT * FROM orders WHERE order_id=?");
        $stmt3->bind_param("i",$order_id);
        $stmt3->execute();
        $orders = $stmt3->get_result();

    }else if(isset($_POST['edit_btn'])){

        $order_id = $_POST['order_id'];
        $order_cost = $_POST['cost'];
        $order_status = $_POST['status'];
        $order_date = $_POST['date'];


		$sql_update = "UPDATE orders SET order_cost = ?, order_status = ?, order_date = ?
                                    WHERE order_id =?";

		$stmt_update = $conn->prepare($sql_update);

		$stmt_update->bind_param("sssi",$order_cost, $order_status, $order_date, $order_id);

		if($stmt_update->execute()){

            header('Location: dashboard.php?update_successfull_order=ordereditsuccessfully');
			
        }else{

            header('Location: dashboard.php?update_error_order=ordereditunsuccessfully');

        }
    
    }else{

        header('Location: dashboard.php');
        exit();

    }

}


?>

<div class="row">
    <main class="col-md-9 ms-sm-auto col-lg-18 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 style="margin-top:80px;margin-left:-400px">Dashboard</h1>   
            <div class="btn-toolbar mb-2 mb-md-8">
                <div class="btn-group me-2">
                    <!-- Add your buttons here -->
                </div>
            </div>
        </div>
    
        <h2>Edit Order</h2>

        <div class="table-responsive">
            <div class="mx-auto container">
                <form id="edit-form" method="POST" action="edit_order.php">
                    <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
                    <div class="form-group my-3">

                    <?php foreach($orders as $order){ ?>
                        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>" />
                        <label>Order Id</label>
                        <p class="my-4"><?php echo $order['order_id'] ?></p>
                    </div>

                    <div class="form-group mt-3">
                        <label>Order Price</label>
                        
                        <input type="text" class="form-control" id="order-price" value="<?php echo $order['order_cost'] ?>" name="price" placeholder="Order Price">
                    </div>


                    <div class="form-group my-3">
                        <label>Order Status</label>
                        <select class="form-select" required name="status">
                        
                            <option value="not paid" <?php if($order['order_status'] == "not paid"){echo "selected";} ?> >Not Paid</option>
                            <option value="paid" <?php if($order['order_status'] == "paid"){echo "selected";} ?> >Paid</option>
                            <option value="shipped" <?php if($order['order_status'] == "shipped"){echo "selected";} ?> >Shipped</option>
                            <option value="delivered" <?php if($order['order_status'] == "delivered"){echo "selected";} ?> >Delivered</option>
                        </select>
                    </div>
                    <div class="form-group my-3">
                        <label>Order Date</label>
                        
                        <input type="text" class="form-control" id="product-color" value="<?php echo $order['order_date'] ?>" name="date" placeholder="Title" />
                    </div>

                        <?php } ?>

                    <div class="form-group mt-2">
                        <input type="submit" class="btn btn-primary"  name="edit_btn" value="Edit Order" />
                    </div>

                </form>
            </div>
        </div>
    </main>
</div>




<?php include("footer.php"); ?>