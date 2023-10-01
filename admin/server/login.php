<?php

    session_start();


	if(isset($_POST['login'])){

		require_once '../../server/connection.php';

		$email=$_POST['email'];
		$password=$_POST['password'];

		if(empty($email) || empty($password)){

			header("Location: ../register.php?error=emptyfields&email=".$email);
			exit();

		}

		else{

			$sql="SELECT * FROM admins WHERE admin_email = ?";
			$stmt=$conn->prepare($sql);

			if($stmt===false){

				echo $conn->error;

			}

			$stmt->bind_param("s",$email);
			$stmt->execute();

			$result=$stmt->get_result(); 

			if($result->num_rows>0){

				$admin=$result->fetch_assoc();
				
				$password_check = password_verify($password, $admin['admin_password']);


				$stmt->close();
				$conn->close();
				if($password_check){

					session_start();
					
                    $_SESSION['admin_id'] = $admin['admin_id'];
                    $_SESSION['admin_name'] = $admin['admin_name'];
                    $_SESSION['admin_email'] = $admin['admin_email'];
                    $_SESSION['logged_in'] = true;

                    

					header("Location: ../dashboard.php?login=successfully");
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

		header("Location: ../login.php");
		exit();

	}

?>