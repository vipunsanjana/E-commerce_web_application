

<?php include("header.php"); ?>

    <!-- Login -->

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Admin Login</h2>
            
        </div>
        <div class="mx-auto container">
            <form action="server/login.php" method="POST" id="login-form">
                <div class="form-group">
                    <label style="color: rgb(255, 85, 0);" for="">E-mail</label>
                    <input type="text" class="form-control" id="login-email" name="email" value="<?php if(isset($_GET['email']))echo $_GET['email'];?>" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <label style="color: rgb(255, 85, 0);" for="">Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn-dark" id="login-btn" name="login" value="Login">
                </div>
                <div class="form-group">
                <a style="color:orange" id="register-url" href="../login.php" class="btn mx-auto">Do You want to user Login?</a>
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
            else if($_GET['error']=="wrongcredential"){
                echo '<div class="alert alert-danger text-center" role="alert">
                    Invalid credentials!
                </div>';
            }
            else{
                echo '<div class="alert alert-danger text-center" role="alert">
                    Something went wrong!
                </div>';
            }
        }

    ?>


            <!--alert is end-->


        </div>
        <!-- <a style="color:orange" id="register-url" href="../login.php" class="btn mx-auto">Do You want to user Login?</a> -->
    </section>

    <?php include("footer.php"); ?>