<?php

    session_start();
    require_once("../server/connection.php");


?>


<?php

if(!isset($_SESSION['admin_email'])){

    header("Location: login.php?error=emaildoesnotexist");
    
}else{

    if(isset($_GET['product_id'])){

        $product_id = $_GET['product_id'];
        $sql2 = "DELETE FROM products WHERE product_id=?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("i",$product_id);
        $stmt2->execute();
        if($stmt2->execute()){

            header('Location: product.php?delete_successfull_product=Productdeletesuccessfully');
			
        }else{

            header('Location: product.php?delete_error_product=Productdeleteunsuccessfully');

        }

    }

}


?>