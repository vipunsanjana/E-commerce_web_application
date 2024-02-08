<?php

    session_start();

?>



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


    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-4">
        <div class="container">

            <img class="navbar-brand" src="assets/img/logo.png" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-buttons" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"  href="shop.php">Shop</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact&nbspUs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About&nbspUs</a>
                    </li>

                    <li class="nav-item">
                        <a href="cart.php"  style="color: blue;">
                        <?php if (isset($_SESSION['user_id'])) { ?>
                            <i class="fas fa-shopping-bag">
                                <?php if(isset($_SESSION['quatity']) && $_SESSION["quatity"] != 0){ ?>
                                    <span class= "cart-quatity"><?php echo $_SESSION['quatity'] ?>
                                <?php } ?>    
                                <?php }?>
                            </i>
                        </a>
                    </li>
                        
                    <!-- <li class="ml-2">
                    <a href="account.php"style="color: black;"><i class="fas fa-user ml-2"></i></a>
                    </li>     -->
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <li class="nav-item">
    <a href="account.php" style="color: blue;">
        <i class="fas fa-user ml-2"></i>
    </a>
</li>

                        <li class="ml-2">
                    <a href="server/logout.php" class="nav-link">Logout</a>
                    </li>
                <?php else : ?>
                        <div class="nav-item">
                                <a href="login.php" class="nav-link">Login</a>
                                
                        </div>
                        <div class="nav-item">
                                
                                <a href="register.php" class="nav-link">Register</a>
                        </div>
                <?php endif; ?>

                </ul>

            </div>
        </div>
    </nav>
