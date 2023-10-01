<?php
	
	if(isset($_POST['register'])){

        session_start();


		require_once 'connection.php';

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];


		if(empty($name) || empty($email) || empty($password) || empty($confirmpassword)){

			header("Location: ../register.php?error=emptyfields&name=".$name."&email=".$email);
			exit();
		}
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			header("Location: ../register.php?error=emailerror&name=".$name);
			exit();
		}
		else if($password != $confirmpassword){
			header("Location: ../register.php?error=passwordmistakes&name=".$name."&email=".$email);
			exit();
		}
		else{

			try{
				$sql="SELECT user_email FROM users WHERE user_email = ?";
				$stmt=$conn->prepare($sql);

				$stmt->bind_param("s",$email);
				$stmt->execute();
				

				$result=$stmt->get_result();

				if($result->num_rows > 0){

					$stmt->close();

					header("Location: ../register.php?error=emailalreadyexits&name=".$name."&email=".$email);
					exit();
				}
				else{
					
					$insert_sql="INSERT INTO users (user_name,user_email,user_password) VALUES (?,?,?)";

					$insert_stmt=$conn->prepare($insert_sql);

					$hash_password=password_hash($password,PASSWORD_DEFAULT);


					$insert_stmt->bind_param("sss",$name,$email,$hash_password);
					$result=$insert_stmt->execute();

					if(!$result){
						echo $stmt->error;
					}

				

                    $user_id = $insert_stmt->insert_id;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['logged_in'] = true;

					$insert_stmt->close();
					$conn->close();

					header("Location: ../login.php?register=successfully");
					exit();
				} 
			}
			catch(mysqli_sql_exception $e){
				echo $e->getMessage();
			}	
		}
	}
	// elseif(isset($_SESSION['logged_in'])){

    //     header("Location: ../account.php?alreadyregisterdsuccessfully");
	// 	exit();

    // }
	else{

		header("Location: ../register.php?error=filltheregisterform");
		exit();

	}


?>