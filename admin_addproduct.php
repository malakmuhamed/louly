
<?php
@include 'config.php';
if(isset($_POST['add_product'])){
    $product_name=$_POST['product_name'];
     $product_price=$_POST['product_price'];
    $product_description=$_POST['product_description'];
    $product_offer=$_POST['product_offer'];
    $product_category=$_POST['product_category'];
    $product_image=$_FILES['product_image']['name'];
    $product_image_tmp_name=$_FILES['product_image']['tmp_name'];
    $product_image_folder='uploaded_images/'.$product_image;
    
   
   if(empty($product_name) || empty($product_price) || empty($product_price)|| empty($product_image)||empty($product_offer)||empty($product_description)||empty($product_category)   ){
    $message[]='please fill out all';
   }
    else{
        $insert="INSERT INTO products(name,price,image) VALUES('$product_name','$product_price','$product_image')";
        $upload=mysqli_query($conn,$insert);
        if($upload){
            move_uploaded_file($product_image_tmp_name,$product_image_folder);
            $message[]='new product added successfully';

        }
        else{
            $message[]='could not add the product';
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin add-Product</title>
   
    <link rel="stylesheet" href="admin_addproduct.css">
    <link rel="stylesheet" href="Dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
</head>

<body>
<div class="container">
<aside>
<div class="top">
                <div class="logo">
                   <img src="logo.jpeg">
                    <!-- <h2><span class="danger">Jamila</span></h2>  -->
                </div>
                <div class="close" id="close-button">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <div class="sidebar">
               <a href="#" class="active">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Dashboard</h3>
               </a> 
               <a href="#">
                <span class="material-icons-sharp">person</span>
                <h3>Users Accounts</h3>
               </a> 
               <a href="#">
                <span class="material-icons-sharp">person</span>
                <h3>Admin Accounts</h3>
               </a> 
               <a href="admin_addproduct.php">
                <span class="material-icons-sharp">receipt_long</span>
                <h3>Add product</h3>
               </a> 
               <a href="#">
                <span class="material-icons-sharp">insights</span>
                <h3>Edit Product</h3>
               </a> 
               <a href="#">
                <span class="material-icons-sharp">mail_outline</span>
                <h3>Delete product</h3>
                <span class="message-count">26</span>
               </a> 
               
               <a href="#">
                <span class="material-icons-sharp">report_gmailerrorred</span>
                <h3>Orders</h3>
               </a> 
               <a href="#">
                <span class="material-icons-sharp">logout</span>
                <h3>Log out</h3>
               </a> 
               
            </div>
           
        </aside>
       
        <!------------- End Of Sidebar ------------->
        <main>
        <?php
    if(isset($message)){
        foreach($message as $message){
            echo '<span class="message">'.$message.'</span>';
        }
    }
    
    ?>
        
        <div class="containers">
    <div class="admin-product-form-container">
                <form action="<?php $_SERVER['PHP_SELF']?>" method ="post" enctype="multipart/form-data">
   <h3>Add product</h3>
   <input type="text" placeholder="enter product name" name="product_name" class="box">


                     
                        <br />
                        <input type="text" placeholder="enter product description" name="product_description" class="box">


                     
<br />
<input type="number" placeholder="enter product price" name="product_price" class="box">       

<br />
                           
<input type="number" placeholder="enter product offer" name="product_offer" class="box">       

<br />
<label for="category">Product Category</label>
<select type="text" id="category" placeholder="category" value="" name="product_category" class="box" required>
                                <option value="eye">eye</option>
                                <option value="beauty">Beauty</option>
                                <option value="skincare">Skin-Care</option>
                                <option value="lip">Lip</option>
                                <option value="face">Face</option>
                            </select>
                       
<input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">





<input type="submit" class="btn" name="add_product" value="add products">

<br />

</div>
</div>                
        </main>




      

</html>