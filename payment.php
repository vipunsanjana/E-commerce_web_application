<?php

    session_start();

    if(!isset($_SESSION['user_email'])){

        header("Location: login.php?error=notloggedin");
        exit();

    }else{

        if(isset($_POST['order_pay_btn'])){

            $order_status = $_POST['order_status'];
            $order_total_price = $_POST['order_total_price'];

        }


    }


?>




<?php include("layouts/header.php"); ?>


    <!-- Payment -->

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5 text-center">
            <h2 class="form-weight-bold">Payment</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container text-center">



            <?php if(isset($_POST['order_status']) && $_POST['order_status'] == "not paid"){ ?>
                
                <?php $amount = strval($_POST['order_total_price']); ?>
                <?php $order_id = $_POST['order_id'] ?>
                
                <p>Total payment: $<?php echo $_POST['order_total_price']; ?></p>
                <!-- <input type="submit" class="btn btn-primary" value="Pay Now"> -->
                <div class="d-flex justify-content-center w-150 mt-4">
                    <div id="paypal-button-container"></div>
                </div>


            
            <?php } else if(isset($_SESSION['total']) && $_SESSION['total'] != 0){ ?>

                <?php $amount = strval($_SESSION['total']); ?>
                <?php $order_id = $_SESSION['order_id'] ?>

                <p>Total payment: $<?php echo $_SESSION['total']; ?></p>
                <!-- <input type="submit" class="btn btn-primary" value="Pay Now"> -->
                <div class="d-flex justify-content-center w-150 mt-4">
                    <div id="paypal-button-container"></div>
                </div>
                

                
            
                <?php } else{ ?>

                    <p>You don't have any order.</p>

                <?php } ?>    

                


                </div>
    </section>

    <script src="https://www.paypal.com/sdk/js?client-id=AbjYFSVFZPL4b3wUn3eA0wIfUSNb0LgsIYJ2vALO34r4dnymIfdw0FJGTm5Di8gy-mfB9tXMwpHJB19-&currency=USD"></script>

    <script>
    paypal
    .Buttons({
        createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units: [
            {
                amount: {
                    value: '<?php echo $amount; ?>' // Set the amount you want to charge
                }
            }
            ]
        });
        },
        onApprove: function (data, actions) {
        return actions.order.capture().then(function (orderData) {
          // Successful capture! For dev/demo purposes:
            console.log("Capture result", orderData, JSON.stringify(orderData, null, 2));
            var transaction = orderData.purchase_units[0].payments.captures[0];
            alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available data');

            window.location.href = "server/complete_payment.php?transaction_id="+transaction.id+"&order_id="+<?php echo $order_id ?>;

          // When ready to go live, remove the alert and show a success message within this page.
          // For example:
          // var element = document.getElementById('paypal-button-container');
          // element.innerHTML = "<h3>Thank you for your payment!</h3>";

          // Or go to another URL:
          // actions.redirect('thankyou.html');
        });
        }
    })
    .render('#paypal-button-container');
</script>


    <?php include("layouts/footer.php"); ?>