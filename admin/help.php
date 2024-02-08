

<?php include("header.php"); ?>

<?php

if(!isset($_SESSION['admin_email'])){

    header("Location: login.php?error=emaildoesnotexist");
    
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
    
        <h2>Help</h2>

                    <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
                    <div class="form-group mt-2">

                    

                        <div class="form-group mt-2">
                            <label>Developer Name</label><br>
                            <p class="ml-5 t" style="color: red;">Software Engineering - UOK</p>
                        </div>

                        <div class="form-group mt-2">
                            <label>Phone Number</label><br>
                            <p class="ml-5 t" style="color: red;">077-8780559</p>
                        </div>

                        <div class="form-group mt-2">
                            <label>E-mail</label><br>
                            <p class="ml-5" style="color: red;">pcarcade@gamil.com</p>
                        </div>    

                        <div class="form-group mt-2">
                            <label>Address</label><br>
                            <p class="ml-5" style="color: red;">No 122/3,Kesbawa Road,Bandaragama,Sri Lanka.</p>
                        </div>

                
    </main>
</div>




<?php include("footer.php"); ?>