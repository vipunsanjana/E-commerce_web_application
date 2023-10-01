

<?php include("header.php"); ?>

<?php

if(!isset($_SESSION['admin_email'])){

    header("Location: login.php?error=emaildoesnotexist");
    
}else{

    if(isset($_GET['product_id'])){

        $product_id = $_GET['product_id'];
        $stmt3 = $conn->prepare("SELECT * FROM products WHERE product_id=?");
        $stmt3->bind_param("i",$product_id);
        $stmt3->execute();
        $products = $stmt3->get_result();

    }else if(isset($_POST['edit_btn'])){

        $product_id = $_POST['product_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $color = $_POST['color'];
        $offer = $_POST['offer'];


		$sql_update = "UPDATE products SET product_name = ?, product_description = ?, product_price = ?, product_special_offer = ?, product_color = ?, product_category = ?
                                    WHERE product_id =?";

		$stmt_update = $conn->prepare($sql_update);

		$stmt_update->bind_param("ssssssi", $title,$description,$price,$offer,$color,$category,$product_id);

		if($stmt_update->execute()){;

            header('Location: product.php?successfull=Productupdatesuccessfully');
			
        }else{

            header('Location: product.php?error=Productupdateunsuccessfully');

        }
    
    }else{

        header('Location: product.php');
        exit();

    }

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
    
        <h2>Edit Product</h2>

        <div class="table-responsive">
            <div class="mx-auto container">
                <form id="edit-form" method="POST" action="edit_product.php">
                    <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
                    <div class="form-group mt-2">

                    <?php foreach($products as $product){ ?>
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" />
                        <label>Title</label>
                        <input type="text" class="form-control" id="product-name" value="<?php echo $product['product_name'] ?>" name="title" placeholder="Title">
                    </div>

                    <div class="form-group mt-2">
                        <label>Description</label>
                        <input type="text" class="form-control" id="product-desc" value="<?php echo $product['product_description'] ?>" name="description" placeholder="Description">
                    </div>

                    <div class="form-group mt-2">
                        <label>Price</label>
                        <input type="text" class="form-control" id="product-price" value="<?php echo $product['product_price'] ?>" name="price" placeholder="Price">
                    </div>

                    <div class="form-group mt-2">
                        <label>Category</label>
                        <select class="form-select" required name="category">
                            <option value="pc">PC</option>
                            <option value="laptop">Laptop</option>
                            <option value="">Watches</option>
                            <option value="">Clothes</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label>Color</label>
                        <input type="text" class="form-control" id="product-color" value="<?php echo $product['product_color'] ?>" name="color" placeholder="Title" />
                    </div>

                    <div class="form-group mt-2">
                        <label for="product-offer">Special Offer</label>
                        <input type="text" class="form-control" id="product-offer" value="<?php echo $product['product_special_offer'] ?>" name="offer" placeholder="Offer" />
                    </div>
                        <?php } ?>

                    <div class="form-group mt-2">
                        <input type="submit" class="btn btn-primary"  name="edit_btn" value="Edit Product" />
                    </div>

                </form>
            </div>
        </div>
    </main>
</div>




<?php include("footer.php"); ?>