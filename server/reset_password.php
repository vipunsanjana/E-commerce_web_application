<?php
	
	if(isset($_POST['reset_password'])){

		require_once 'connection.php';

		$selector=$_POST['selector'];
		$validator=$_POST['validator'];
		$password=$_POST['new_password'];
		$conformpassword=$_POST['conform_new_password'];

		if(empty($password) || empty($conformpassword)){

			header("Location: ../reset_password.php?error=emptyfields&selector=".$selector."&validator=".$validator);
			exit();
		}
		else if($password != $conformpassword){
			header("Location: ../reset_password.php?error=emptyfields&selector=".$selector."&validator=".$validator);
			exit();
		}
		else{

			$current_time=date('U');

			$sql="SELECT * FROM pwd_reset WHERE selector=? AND expires>=?";
			$stmt=$conn->prepare($sql);

			$stmt->bind_param("ss",$selector,$current_time);
			$stmt->execute();

			$result=$stmt->get_result();


			if($result->num_rows>0){

				$user_token=$result->fetch_assoc();

				$token_bin=hex2bin($validator);

				$token_check=password_verify($token_bin,$user_token['token']);

				if($token_check===false){
					header("Location: ../reset_password.php?error=etokendissmathch&selector=".$selector."&validator=".$validator);
					exit();
				}
				else if($token_check===true){
					$tokenemail=$user_token['email'];

					$sql_select="SELECT *FROM users WHERE user_email=?;";
					$stmt_select=$conn->prepare($sql_select);

					$stmt_select->bind_param("s", $tokenemail);
				    $stmt_select->execute();

				    $result = $stmt_select->get_result();


					if($result->num_rows > 0){
					
						$sql_update = "UPDATE users SET user_password = ? WHERE user_email =?;";
						$stmt_update = $conn->prepare($sql_update);

						$hashPass = password_hash($password, PASSWORD_DEFAULT);

						$stmt_update->bind_param("ss", $hashPass, $tokenemail);
						$stmt_update->execute();

						$sql_delete = "DELETE FROM pwd_reset WHERE email = ?;";
						$stmt_delete = $conn->prepare($sql_delete);
                        

						$stmt_delete->bind_param("s", $tokenemail);
						$stmt_delete->execute();

						header("Location: ../login.php?passwordreset=success");

					}
					else{
						header("Location: ../login.php?error=usernotfound");
						exit();
					}
				}
				else{
					header("Location: ../login.php?error=somethingwentwrong");
					exit();
				}
			}
		else{
			header("Location: ../login.php?error=nopassswordrequest");
			exit();
		}

		$stmt->close();
		$stmt_select->close();
		$stmt_update->close();
		$stmt_delete->close();
		$conn->close();

		
		}	
			
		
	}	

	else{
		header("Location: ../login.php");
		exit();
	}	


?>			

