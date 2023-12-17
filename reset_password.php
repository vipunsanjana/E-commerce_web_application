<?php include("layouts/header.php"); ?>

    <!-- Reset Password -->

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Reset Password</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            
        <?php

if(isset($_GET['selector']) && isset($_GET['validator'])){

  $selector = $_GET['selector'];
  $validator = $_GET['validator'];

  if(empty($selector) || empty($validator)){
    echo '<div class="alert alert-danger" role="alert">
      Could not validate your request
    </div>';
  }
  else{
    if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
      ?>
            <form action="server/reset_password.php" method="POST" id="login-form">
            <input class="form-control" placeholder="" type="hidden" name="selector" value="<?php echo $selector;?>">
                          <input class="form-control" placeholder="" type="hidden" name="validator" value="<?php echo $validator;?>">

                <div class="form-group">
                    <label style="color: rgb(255, 85, 0);" for="">Password</label>
                    <input type="password" class="form-control" id="login-password" name="new_password" placeholder="New Password" required>
                </div>
                <div class="form-group">
                    <label style="color: rgb(255, 85, 0);" for="">Confirm Password</label>
                    <input type="password" class="form-control" id="login-password" name="conform_new_password" placeholder="Conform New Passsword" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn-dark" id="login-btn" name="reset_password" value="ResetPassword">
                </div>

            </form>

            <!--alert-->
            <?php
                    }
                  }
                }
                else{
                  echo '<div class="alert alert-danger" role="alert">
                      Could not validate your request
                    </div>';
                }  
              ?>

            <!--alert is end-->

            <div>
                    <div class="form-group">
                        <a id="register-url" href="login.php" class="btn">Already member a login?</a>
                    </div>
                </div>
        </div>

   

    </section>

    <?php include("layouts/footer.php"); ?>