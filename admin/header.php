<?php

    session_start();

?>

<?php require_once '../server/connection.php'; ?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
        integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <!-- Nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-4">
        <div class="container">

            <img class="navbar-brand" src="../assets/img/logo.png" alt="">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            
            </button>
            <div class="collapse navbar-collapse nav-buttons" id="navbarScroll">

                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll mr-5" style="--bs-scroll-height: 100px;">


                    <li class="nav-item">
                        <a class="nav-link"  style="display: inline;margin-left:-120px"  href="dashboard.php">Orders</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"  style="display: inline;margin-left:-10px"  href="product.php">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="account.php">Account</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="help.php">Help</a>
                    </li>

                    <li class="nav-item inline-list-item">
                    <a class="nav-link mr-5" href="add_product.php" >Add&nbspProduct</a>

                    </li>

                    <li class="nav-item inline-list-item">
                    <a class="nav-link mr-5" href="users.php" >Users</a>

                    </li>
                

                    <li class="nav-item">
                        <?php if(isset($_SESSION['admin_email'])){ ?>
                            <a class="nav-link" href="server/logout.php">Sign&nbspOut</a>
                        <?php }else{  ?>    
                            <a class="nav-link" href="login.php">Login</a>
                            <?php } ?>
                    </li>


                </ul>

            </div>
        </div>
    </nav>
    