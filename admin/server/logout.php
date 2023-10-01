<?php

    session_start();
    if(isset($_SESSION['admin_email'])){

        session_unset();
        session_destroy();
        header("Location: login.php?success=logout");
        exit();
    }

?>