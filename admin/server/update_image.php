<?php

    session_start();
    require_once("../../server/connection.php");


?>


<?php



    if(!isset($_SESSION['admin_email'])){

        header("Location: ../login.php?error=emaildoesnotexist");
        
    }else{

        if(isset($_POST['update_image'])){

            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];

            $image1 = $_FILES['image1']['tmp_name'];
            $image2 = $_FILES['image2']['tmp_name'];
            $image3 = $_FILES['image3']['tmp_name'];
            $image4 = $_FILES['image4']['tmp_name'];
                    
            $image_name1 = $product_name . "1.jpeg";
            $image_name2 = $product_name . "2.jpeg";
            $image_name3 = $product_name . "3.jpeg";
            $image_name4 = $product_name . "4.jpeg";

        
            $target_directory = "../../assets/img/";

            move_uploaded_file($image1, $target_directory . $image_name1);
            move_uploaded_file($image2, $target_directory . $image_name2);
            move_uploaded_file($image3, $target_directory . $image_name3);
            move_uploaded_file($image4, $target_directory . $image_name4);

            $stmt = $conn->prepare("UPDATE products SET product_image=?, product_image2=?, product_image3=?, product_image4=? WHERE product_id=?");
            $stmt->bind_param("ssssi", $image_name1, $image_name2, $image_name3, $image_name4,$product_id);

            if ($stmt->execute()) {
                header('Location: ../product.php?successfull_update_image=Productimagechangesuccessfully');
            } else {
                header('Location: ../product.php?error_update_image=Productimagechangeunsuccessfully');
            }
        
            
            $stmt->close();
            $conn->close();


        }else{
            header('Location: ../product.php');
        }


    }


?>