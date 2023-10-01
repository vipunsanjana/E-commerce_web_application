<?php
	

		require_once '../server/connection.php';

		$name = "admin";
		$email = "admin@gmail.com";
		$password = "1";
		
					$insert_sql="INSERT INTO admins (admin_name,admin_email,admin_password) VALUES (?,?,?)";

					$insert_stmt=$conn->prepare($insert_sql);

					$hash_password=password_hash($password,PASSWORD_DEFAULT);


					$insert_stmt->bind_param("sss",$name,$email,$hash_password);
					$result=$insert_stmt->execute();

					if(!$result){
						echo $stmt->error;
					}

			

					header("Location: login.php?register=successfully");
					exit();
	
		


?>