

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
    
        <h2>Create Product</h2>
        <div class="table-responsive">



            <div class="mx-auto container">
                <form id="edit-form" enctype="multipart/form-data" method="POST" action="server/create_product.php">
                    <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
                    <div class="form-group mt-2">

                        <label>Title</label>
                        <input type="text" class="form-control" id="product-name"  name="title" placeholder="Title">
                    </div>

                    <div class="form-group mt-2">
                        <label>Category</label>
                        <select class="form-select" required name="category">
                            <option value="pc">PC</option>
                            <option value="laptop">Laptop</option>
                            <option value="">Gamming</option>
                            <option value="">Acceseies</option>
                        </select>
                    </div>

                    
                    <div class="form-group mt-2">
                        <label>Description</label>
                        <input type="text" class="form-control" id="product-desc"  name="description" placeholder="Description">
                    </div>


                    <div class="form-group mt-2">
                        <label>Image 1</label>
                        <input type="file" class="form-control" id="image1"  name="image1" placeholder="Image One">
                    </div>
                    <div class="form-group mt-2">
                        <label>Image 2</label>
                        <input type="file" class="form-control" id="image2"  name="image2" placeholder="Image Two">
                    </div>
                    <div class="form-group mt-2">
                        <label>Image 3</label>
                        <input type="file" class="form-control" id="image3"  name="image3" placeholder="Image Three">
                    </div>
                    <div class="form-group mt-2">
                        <label>Image 4</label>
                        <input type="file" class="form-control" id="image4"  name="image4" placeholder="Image Four">
                    </div>

                    
                    <div class="form-group mt-2">
                        <label>Price</label>
                        <input type="text" class="form-control" id="product-price"  name="price" placeholder="Price">
                    </div>

                    <div class="form-group mt-2">
                        <label for="product-offer">Special Offer</label>
                        <input type="text" class="form-control" id="product-offer" name="offer" placeholder="Offer" />
                    </div>

                    <div class="form-group mt-2">
                        <label>Color</label>
                        <input type="text" class="form-control" id="product-color" name="color" placeholder="Title" />
                    </div>
                        

                    <div class="form-group mt-2">
                        <input type="submit" class="btn btn-primary"  name="add_btn" value="Add Product" />
                    </div>

                </form>
            </div>
        </div>
    </main>
</div>




<?php include("footer.php"); ?>