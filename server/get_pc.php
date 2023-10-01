<?php

    require_once('connection.php');

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_category='pc' LIMIT 4");
    $stmt->execute();
    $pc = $stmt->get_result();

?>