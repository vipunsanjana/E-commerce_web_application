<?php

    session_start();


	if(isset($_POST['login'])){

		require_once 'connection.php';

		$email=$_POST['email'];
		$password=$_POST['password'];

		if(empty($email) || empty($password)){

			header("Location: ../register.php?error=emptyfields&email=".$email);
			exit();

		}

		else{

			$sql="SELECT * FROM users WHERE user_email = ?";
			$stmt=$conn->prepare($sql);

			if($stmt===false){

				echo $conn->error;

			}

			$stmt->bind_param("s",$email);
			$stmt->execute();

			$result=$stmt->get_result(); 

			if($result->num_rows>0){

				$user=$result->fetch_assoc();
				
				$password_check = password_verify($password, $user['user_password']);


				$stmt->close();
				$conn->close();
				if($password_check){

					session_start();
					
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['user_name'] = $user['user_name'];
                    $_SESSION['user_email'] = $user['user_email'];
                    $_SESSION['logged_in'] = true;

                    

					header("Location: ../account.php?login=successfully");
					exit();

				}

				else{

					header("Location: ../login.php?error=wrongcredential&email=".$email);
					exit();
				
				}

			}else{

                header("Location: ../login.php?error=emaildoesnotexist&email=".$email);
                exit();
            
            }		
		}
    }
	
	else{

		header("Location: ../register.php");
		exit();

	}

?>