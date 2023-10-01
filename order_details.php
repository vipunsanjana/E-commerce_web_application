<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php?error=notloggedin");
    exit();
} else {
    require_once("server/connection.php");

    if (isset($_POST['order_details']) && isset($_POST['order_id'])) {
        $order_id = $_POST['order_id'];
        $order_status = $_POST['order_status'];

        $sql = "SELECT * FROM order_items WHERE order_id = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("i", $order_id);
        $stmt->execute();

        $order_details = $stmt->get_result();

        $order_total_price = calculateTotalOrderPrice($order_details);
    } else {
        header("Location: account.php");
        exit();
    }
}

// Move the calculateTotalOrderPrice function outside of the else block
function calculateTotalOrderPrice($order_details)
{
    $total = 0;

    foreach ($order_details as $row) {
        $product_price = $row['product_price'];
        $product_quantity = $row['product_quatity'];

        $total = $total + ($product_price * $product_quantity);
    }

    return $total;
}
?>



<?php include("layouts/header.php"); ?>

        <!-- Order Details-->

    <section class="cart container my-5 py-5">
            <div class="container mt-5">
                <h2 class="font-weight-bolde text-center">Order Details</h2>
                <hr class="mx-auto">
            </div>

            <table class="mt-5 pt-5">
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>

                </tr>

                <?php foreach ($order_details as $row) { ?>

                    <tr>
                        <td>
                            <div class="product-info mt-5">
                                <img class="cart-img" src="assets/img/<?php echo $row['product_image'] ?>" alt="lap">
                                <div>
                                    <p class="mt-3"><?php echo $row['product_name'] ?></p>
                                </div>
                            </div>
                        </td>  
                        
                        <td>
                            <span>$ <?php echo $row['product_price'] ; ?></span> 
                        </td>
                        <td>
                            <span><?php echo $row['product_quatity'] ; ?></span> 
                        </td>
            

                    </tr>

                <?php } ?>

            </table>

            <?php

                if($order_status == "not paid"){ ?>

                    <form style="float: right" method="POST" action="payment.php">
                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
                        <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>" />
                        <input type="hidden" name="order_status" value="<?php echo $order_status; ?>" />
                        <input type="submit" name="order_pay_btn" class="btn btn-primary" value="Pay Now" />
                    </form>
                

            <?php } ?>

    </section>

    <?php include("layouts/footer.php"); ?>