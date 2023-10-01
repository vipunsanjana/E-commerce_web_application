<?php

    session_start();

    if(!isset($_SESSION['user_email'])){

        header("Location: login.php?error=notloggedin");
        exit();

    }else{

        require_once("server/connection.php");

        $user_id = $_SESSION['user_id'];
        $sql="SELECT * FROM orders WHERE user_id = ?";
		$stmt=$conn->prepare($sql);

		$stmt->bind_param("i",$user_id);
		$stmt->execute();

        

        $orders = $stmt->get_result();

    }

?>




<?php include("layouts/header.php"); ?>

    <!-- Account -->

    <section class="my-5 py-5">
        <div class="row container mx-auto">

        <?php if(isset($_GET['payment_successful'])){ ?>
            <p class="mt-5 text-center" style="color:green;"><?php echo $_GET['payment_successful']; ?></p>
        <?php } ?>    
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <h2>
                    <?php   if(isset($_GET['login'])){
                        if($_GET['login']=="successfully"){
                            echo 
                            '<div class="text-success text-center" role="alert">
                            Login Successfully!
                            </div>';
                        }
                    }?>
                </h2>
                <h3 class="font-weight-bold">Account info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name : <span class="text-dark"><?php echo $_SESSION['user_name']?></span></p>
                    <p>Email : <span class="text-dark"><?php echo $_SESSION['user_email']?></span></p>
                    <p><a href="#order" id="orders-btn">Your orders</a></p>
                    <p><a href="server/logout.php" id="logout-btn">Logout</a></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <form action="server/changePassword.php" method="POST" id="account-form">
                    <h3>Change Password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" id="account-password-confirm" name="confirmpassword" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password" name="change_password" class="btn mt4" id="change-pass-btn">
                    </div>
                </form>
            </div>
        </div>
                    <!--alert-->

    <?php

        if(isset($_GET['error'])){
            if($_GET['error']=="emptyfields"){
                echo '<div class="alert alert-danger text-center" role="alert">
                    All fields are required!
                </div>';
            }
            else if($_GET['error']=="password&confirmpasswordnotmatch"){
                echo '<div class="alert alert-danger text-center" role="alert">
                Password & Confirm Password not match!
                </div>';
            }
            else{
                echo '<div class="alert alert-danger text-center" role="alert">
                    Something went wrong!
                </div>';
            }
        }
        else if(isset($_GET['passwordreset'])){
            if($_GET['passwordreset']=="successfully"){
                echo '<div class="alert alert-success text-center" role="alert">
                    Password Updated Successfully!
                </div>';
            }
        }

    ?>


    <!--alert is end-->
    </section>



        <!-- Order -->

    <section class="cart container my-5 py-5">
            <div class="container mt-5">
                <h2 class="font-weight-bolde text-center">Your Orders</h2>
                <hr class="mx-auto">
            </div>

            <table class="mt-5 pt-5">
                <tr>
                    <th>Order Id</th>
                    <th>Order Cost</th>
                    <th>Order City</th>
                    <th>Order Status</th>
                    <th>Order Date</th>
                    <th>Order Details</th>

                </tr>

                <?php while ($row = $orders->fetch_assoc()) { ?>

                    <tr>
                        <td>
                            <div class="product-info">
                                <!-- <img class="cart-img" src="assets/img/<?php echo $row['product_image'] ?>" alt="lap"> -->
                                
                                <p class="mt-3"><?php echo $row['order_id']; ?></p>
                                    
                            </div>
                        </td>  
                        
                        <td>
                            <span><?php echo $row['order_cost'] ; ?></span> 
                        </td>
                        <td>
                            <span><?php echo $row['user_city'] ; ?></span> 
                        </td>
                        <td>
                            <span><?php echo $row['order_status'] ; ?></span> 
                        </td>
                        <td>
                            <span><?php echo $row['order_date'] ; ?></span> 
                        </td>
                        <td>
                            <form method="POST"  action="order_details.php">
                                <input type="hidden" value="<?php echo $row['order_status'] ?>" name="order_status" />
                                <input type="hidden" value="<?php echo $row['order_id'] ?>" name="order_id" />
                                <input class="btn btn-warning" type="submit" name="order_details" value="details" />
                            </form>
                            
                        </td>

                    </tr>

                <?php } ?>

            </table>

    </section>


    <?php include("layouts/footer.php"); ?>