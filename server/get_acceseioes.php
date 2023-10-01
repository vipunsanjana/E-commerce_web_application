<?php

    require_once('connection.php');

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_category='acceseries' LIMIT 4");
    $stmt->execute();
    $acceseries = $stmt->get_result();

?>