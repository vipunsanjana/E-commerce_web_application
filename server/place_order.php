<?php

    session_start();
    
    require_once('connection.php');

    if(!isset($_SESSION['user_email'])){
        header("Location: ../login.php?error=emaildoesnotexist");
        
    }else{

        if (isset($_POST['place_order'])) {
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];
            $address = $_POST['address'];
            $order_cost = $_SESSION['total'];
            $order_status = "not paid";
            $user_id = $_SESSION['user_id'];
            $order_date = date("Y-m-d H:i:s");

            $sql = "INSERT INTO orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date) VALUES (?,?,?,?,?,?,?);";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('isiisss',$order_cost,$order_status,$user_id,$phone,$city,$address,$order_date);
            
            $stmt_status = $stmt->execute();

            if(!$stmt_status){
                header("Location: ../index.php");
            }

            $order_id = $stmt->insert_id;
            

            foreach ($_SESSION['cart'] as $key => $value) {
                
                $product = $_SESSION['cart'][$key];
                $product_id = $product['product_id'];
                $product_name = $product['product_name'];
                $product_image = $product['product_image'];
                $product_price = $product['product_price'];
                $product_quatity = $product['product_quatity'];
                $order = $_SESSION['cart'][$key];
                $date = $order['order_date'];

                $sql_one = "INSERT INTO order_items (order_id,product_id,product_name,product_image,product_price,product_quatity,user_id,order_date) VALUES (?,?,?,?,?,?,?,?);";
                $stmt_one = $conn->prepare($sql_one);
                $stmt_one->bind_param('iissiiis',$order_id,$product_id,$product_name,$product_image,$product_price,$product_quatity,$user_id,$order_date);
                $stmt_one->execute();

            }


            // unset($_SESSION['cart']);

            $_SESSION['order_id'] = $order_id;


            header("Location: ../payment.php?order_status=order placed successfully");


        }
    }    


?>