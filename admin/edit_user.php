

<?php include("header.php"); ?>

<?php

if(!isset($_SESSION['admin_email'])){

    header("Location: login.php?error=emaildoesnotexist");
    
}else{

    if(isset($_GET['user_id'])){

        $user_id = $_GET['user_id'];
        $stmt3 = $conn->prepare("SELECT * FROM users WHERE user_id=?");
        $stmt3->bind_param("i",$user_id);
        $stmt3->execute();
        $users = $stmt3->get_result();

    }else if(isset($_POST['edit_btn'])){

        $user_id = $_POST['user_id'];
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];


		$sql_update = "UPDATE users SET user_name = ?, user_email = ?
                                    WHERE user_id =?";

		$stmt_update = $conn->prepare($sql_update);

		$stmt_update->bind_param("ssi",$user_name, $user_email, $user_id);

		if($stmt_update->execute()){

            header('Location: users.php?update_successfull_user=usereditsuccessfully');
			
        }else{

            header('Location: users.php?update_error_user=usereditunsuccessfully');

        }
    
    }else{

        header('Location: users.php');
        exit();

    }

}


?>

<div class="row">
    <main class="col-md-9 ms-sm-auto col-lg-18 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 style="margin-top:80px;margin-left:-400px">Dashboard</h1>   
            <div class="btn-toolbar mb-2 mb-md-8">
                <div class="btn-group me-2">
                    <!-- Add your buttons here -->
                </div>
            </div>
        </div>
    
        <h2>Edit User</h2>

        <div class="table-responsive">
            <div class="mx-auto container">
                <form id="edit-form" method="POST" action="edit_user.php">
                    <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
                    <div class="form-group my-3">

                    <?php foreach($users as $user){ ?>
                        <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>" />
                        <label>User Id</label>
                        <p class="my-4"><?php echo $user['user_id'] ?></p>
                    </div>

                    <div class="form-group mt-3">
                        <label>User Name</label>
                        
                        <input type="text" class="form-control" id="order-price" value="<?php echo $user['user_name'] ?>" name="name" placeholder="user Name">
                    </div>



                    <div class="form-group my-3">
                        <label>User Email</label>
                        <input type="text" class="form-control" id="product-color" value="<?php echo $user['user_email'] ?>" name="email" placeholder="User Email" />
                    </div>

                        <?php } ?>

                    <div class="form-group mt-2">
                        <input type="submit" class="btn btn-primary"  name="edit_btn" value="Edit User" />
                    </div>

                </form>
            </div>
        </div>
    </main>
</div>




<?php include("footer.php"); ?>