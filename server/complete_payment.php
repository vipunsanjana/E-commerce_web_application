<?php


    session_start();


    if(!isset($_SESSION['user_email'])){

        header("Location: login.php?error=notloggedin");
        exit();
    }

    require_once("connection.php");

    if(isset($_GET['transaction_id']) && isset($_GET['order_id'])){

        $order_id = $_GET['order_id'];
        $order_status = "paid";
        $transaction_id = $_GET['transaction_id'];
        $user_id = $_SESSION['user_id'];
        $payment_date = date("Y-m-d H:i:s");
	
		$sql_update = "UPDATE orders SET order_status = ? WHERE order_id =?";
		$stmt_update = $conn->prepare($sql_update);

        
		$stmt_update->bind_param("si", $order_status,$order_id);
		$stmt_update->execute();

        $sql_one = "INSERT INTO payments (order_id,user_id,transaction_id,payment_date) VALUES (?,?,?,?);";
        $stmt_one = $conn->prepare($sql_one);
        $stmt_one->bind_param('iiss',$order_id,$user_id,$transaction_id,$payment_date);
        $stmt_one->execute();

        header("Location: ../account.php?payment_successful=paid successfully,thanks for shopping with us!");

    }else{
        header("Location: index.php");
        exit();
    }






?>