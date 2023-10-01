<?php


    session_start();

    if(!isset($_SESSION['user_email'])){

        header("Location: login.php?error=notloggedin");
        exit();
    }

    if( !empty($_SESSION['cart'])){


    }else{

        header("Location: index.php");
    }


?>




<?php include("layouts/header.php"); ?>

    <!-- Check out -->

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Check Out</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form action="server/place_order.php" method="POST" id="checkout-form">
                <div class="form-group checkout-small-element">
                    <label style="color: rgb(255, 85, 0);" for="">Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label style="color: rgb(255, 85, 0);" for="">E-mail</label>
                    <input type="text" class="form-control" id="checkout-email" name="email" placeholder="E-mail" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label style="color: rgb(255, 85, 0);" for="">Phone</label>
                    <input type="text" class="form-control" id="checkout-phone" name="phone" placeholder="Phone Number" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label style="color: rgb(255, 85, 0);" for="">City</label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required>
                </div>
                <div class="form-group checkout-large-element">
                    <label style="color: rgb(255, 85, 0);" for="">Address</label>
                    <input type="text" class="form-control" id="checkout-addess" name="address" placeholder="Address" required>
                </div>
                <div class="form-group checkout-btn-container">
                    <p>Total amount: $ <?php echo $_SESSION['total']; ?></p>
                    <input type="submit" class="btn btn-dark" id="checkout-btn" name="place_order" value="Place Order">
                </div>
            </form>
        </div>
    </section>

    <?php include("layouts/footer.php"); ?>