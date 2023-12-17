<?php include("layouts/header.php"); ?>

    <!-- Fogot Password -->

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Fogot Your Password</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form action="server/fogot_password.php" method="POST" id="login-form">
                <div class="form-group">
                    <label style="color: rgb(255, 85, 0);" for="">E-mail</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn-dark" id="login-btn" name="foget_password_button" value="Get Reset Link">
                </div>
                <div>
                    <div class="form-group">
                        <a id="register-url" href="login.php" class="btn">Already member a login?</a>
                    </div>
                </div>

            </form>
        </div>

    </section>

    <?php include("layouts/footer.php"); ?>