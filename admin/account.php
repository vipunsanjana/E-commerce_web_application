

<?php include("header.php"); ?>

<?php

if(!isset($_SESSION['admin_email'])){

    header("Location: login.php?error=emaildoesnotexist");
    
}else{

    if(isset($_SESSION['admin_email'])){

        $admin_email = $_SESSION['admin_email'];
        $stmt3 = $conn->prepare("SELECT * FROM admins WHERE admin_email=?");
        $stmt3->bind_param("i",$admin_email);
        $stmt3->execute();
        $admins = $stmt3->get_result();

    }else{

        header('Location: dashboard.php?error=cantlookadminaccount');
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
    
        <h2>Admin Account</h2>

                    <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
                    <div class="form-group mt-2">

                    <?php foreach($admins as $admin){ ?>

                        <div class="form-group mt-2">
                            <label>Admin ID</label><br>
                            <p class="ml-5 t" style="color: red;"><?php echo $admin['admin_id']; ?></p>
                        </div>

                        <div class="form-group mt-2">
                            <label>Admin Name</label><br>
                            <p class="ml-5" style="color: red;"><?php echo $admin['admin_name']; ?></p>
                        </div>    

                        <div class="form-group mt-2">
                            <label>Admin Email</label><br>
                            <p class="ml-5" style="color: red;"><?php echo $admin['admin_email']; ?></p>
                        </div>

                    <?php } ?>
    </main>
</div>




<?php include("footer.php"); ?>