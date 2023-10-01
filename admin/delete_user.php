<?php

    session_start();
    require_once("../server/connection.php");


?>


<?php

if(!isset($_SESSION['admin_email'])){

    header("Location: login.php?error=emaildoesnotexist");
    
}else{

    if(isset($_GET['user_id'])){

        $user_id = $_GET['user_id'];
        $sql2 = "DELETE FROM users WHERE user_id=?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("i",$user_id);
        $stmt2->execute();
        if($stmt2->execute()){

            header('Location: users.php?delete_successfull_user=userdeletesuccessfully');
			
        }else{

            header('Location: users.php?delete_error_user=userdeleteunsuccessfully');

        }

    }

}


?>