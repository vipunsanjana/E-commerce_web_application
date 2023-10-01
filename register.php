<?php include("layouts/header.php"); ?>
    

    <!-- Register -->


    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            
        </div>
        <div class="mx-auto container">
            <form action="server/register.php" id="register-form" method="POST">
                <div class="form-group">
                    <label style="color: rgb(255, 85, 0);" for="">Name</label>
                    <input type="text" class="form-control" id="register-name" value="<?php if(isset($_GET['name']))echo $_GET['name'];?>" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label style="color: rgb(255, 85, 0);" for="">E-mail</label>
                    <input type="text" class="form-control" id="register-email" value="<?php if(isset($_GET['email']))echo $_GET['email'];?>" name="email" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <label style="color: rgb(255, 85, 0);" for="">Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label style="color: rgb(255, 85, 0);" for="">Confirm Password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirmpassword" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn-dark" name="register" id="register-btn" value="Register">
                </div>
                <div class="form-group">
                    <a id="login-url" href="login.php" class="btn">Do you have account? Login</a>
                </div>
            </form>


        <!--alert-->

    <?php

if(isset($_GET['error'])){
    if($_GET['error']=="emptyfields"){
        echo '<div class="alert alert-danger text-center" role="alert">
            All fields are required!
            </div>';
    }
    else if($_GET['error']=="emailerror"){
    echo '<div class="alert alert-danger text-center" role="alert">
            E mail format is wrong!
        </div>';
    }
    else if($_GET['error']=="passwordmistakes"){
        echo '<div class="alert alert-danger text-center" role="alert">
            Password and confirm password should be same!
        </div>';
    }
    else if($_GET['error']=="emailalreadyexits"){
        echo '<div class="alert alert-danger text-center" role="alert">
            Email alreadyexist!
        </div>';
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
            Something went wrong!
        </div>';
    }
}

?>


<!--alert is end-->
        </div>
    </section>

    

    <?php include("layouts/footer.php"); ?>