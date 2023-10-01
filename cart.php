<?php

    session_start();


    if(!isset($_SESSION['user_email'])){

        header("Location: login.php?error=notloggedin");
        exit();
    }




    if(isset($_POST['add_to_cart'])){

        if(isset($_SESSION['cart'])){

            $product_array_ids = array_column($_SESSION['cart'],"product_id");

            if(!in_array($_POST['product_id'],$product_array_ids)){

                // $product_id = $_POST['product_id'];

                $product_array = array(
                    'product_id' => $_POST['product_id'],
                    'product_name' => $_POST['product_name'],
                    'product_price' => $_POST['product_price'],
                    'product_image' => $_POST['product_image'],
                    'product_quatity' => $_POST['product_quatity'],
                );

                $_SESSION['cart'][$product_id] = $product_array;

            }else{

                echo '<script>setTimeout(function() { alert("Product was already added to the cart."); }, 500);</script>';
                //echo '<script>window.location="index.php";</script>';

            }

        }else{

            
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quatity = $_POST['product_quatity'];

            $product_array = array(
                'product_id' => $product_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_image' => $product_image,
                'product_quatity' => $product_quatity,
            );

            $_SESSION['cart'][$product_id] = $product_array;
        }

        calculateTotalCart();

    }else if(isset($_POST['remove_product'])){    

        $product_id = $_POST['product_id'];
        unset($_SESSION['cart'][$product_id]);

        calculateTotalCart();

    }else if(isset($_POST['edit_quatity'])){
        
        $product_id = $_POST['product_id'];
        $product_quatity = $_POST['product_quatity'];

        $product_array = $_SESSION['cart'][$product_id];
        $product_array['product_quatity'] = $product_quatity;

        $_SESSION['cart'][$product_id] = $product_array;


        calculateTotalCart();

    }else{

        //header("Location: index.php");

    }


    function calculateTotalCart(){

        $total_price = 0;
        $total_quatity = 0;

        foreach ($_SESSION['cart'] as $key => $value) {
            
            $product = $_SESSION['cart'][$key];
            $price = $product['product_price'];
            $quatity = $product['product_quatity'];

            $total_price = $total_price + ($price * $quatity);
            $total_quatity = $quatity + $total_quatity;
        }

        $_SESSION['total'] = $total_price;
        $_SESSION['quatity'] = $total_quatity;
    }




?>

<?php include("layouts/header.php"); ?>


    <!-- cart -->

    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde">Your Cart</h2>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantit</th>
                <th>Subtotal</th>
            </tr>

            <?Php if(isset($_SESSION['cart'])){ ?>
                <?php
                
                

                        foreach ($_SESSION['cart'] as $key => $value) { ?>

                    <tr>
                        <td>
                            <div class="product-info">
                                <img class="cart-img" src="assets/img/<?php echo $value['product_image'] ?>" alt="lap">
                                <div>
                                    <p><?php echo $value['product_name']; ?></p>
                                    <small><span>$</span><?php echo $value['product_price']; ?></small>
                                    <br>
                                    <form action="cart.php" method="POST">
                                        <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" />
                                        <input type="submit" name="remove_product" value="remove" class="remove-btn" />
                                    </form>
                                </div>
                            </div>
                        </td>  
                        
                        <td>

                            <form action="cart.php" method="POST">
                                
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" />
                                <input type="number" name="product_quatity" value="<?php echo $value['product_quatity']; ?>" />
                                <input type="submit" name="edit_quatity" value="edit" class="remove-btn" />
                            </form>
                        </td>

                        <td>
                            <span>$</span>
                            <span class="product-price"><?php echo $value['product_quatity'] * $value['product_price'] ; ?></span>
                        </td>
                    </tr>

                <?php } ?>
            <?php } ?>
            

        </table>

        <div class="cart-total">
            <table>
                <!-- <tr>
                    <td>Subtotal</td>
                    <td>$155</td>
                </tr> -->
                
                    <tr>
                    <?Php if(isset($_SESSION['cart'])){ ?>
                        <td>Total</td>
                        
                            <td>$<?php echo $_SESSION['total']; ?></td>
                        <?php } ?>       
                    </tr>
                
            </table>
            
        </div>

        <div class="checkout-container">
        <form action="checkout.php" method="POST">
            <input type="submit" name="checkout" value="Checkout" class="btn checkout-btn mt-5" />
        </form>
        </div>
        
    </section>




    <?php include("layouts/footer.php"); ?>