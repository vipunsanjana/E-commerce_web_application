<?php

    session_start();
    require_once("../server/connection.php");


?>


<?php

if(!isset($_SESSION['admin_email'])){

    header("Location: login.php?error=emaildoesnotexist");
    
}else{

    if(isset($_GET['order_id'])){

        $order_id = $_GET['order_id'];
        $sql2 = "DELETE FROM orders WHERE order_id=?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("i",$order_id);
        $stmt2->execute();
        if($stmt2->execute()){

            header('Location: dashboard.php?delete_successfull_order=orderdeletesuccessfully');
			
        }else{

            header('Location: dashboard.php?delete_error_order=orderdeleteunsuccessfully');

        }

    }

}


?>