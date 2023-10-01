<?php

    session_start();

    if(isset($_POST['change_password'])){

        require_once("connection.php");

		$password=$_POST['password'];
		$conformpassword=$_POST['confirmpassword'];
        $user_email = $_SESSION['user_email'];


		if(empty($password) || empty($conformpassword)){

			header("Location: ../account.php?error=emptyfields");
			exit();
		}

		else if($password != $conformpassword){

			header("Location: ../account.php?error=password&confirmpasswordnotmatch");
			exit();
		}

        else{

            
					
				$sql_update = "UPDATE users SET user_password = ? WHERE user_email =?";
				$stmt_update = $conn->prepare($sql_update);

				$hashPass = password_hash($password, PASSWORD_DEFAULT);

				$stmt_update->bind_param("ss", $hashPass,$user_email);
				$stmt_update->execute();
			

				header("Location: ../account.php?passwordreset=successfully");

			}

            $stmt_update->close();
            $conn->close();
        
        
    }else{

        header("Location: ../account.php?error=notloggedin");
        exit();
    }

?>