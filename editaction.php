<?php
session_start();
if(!isset($_GET['id']))
{
    die('id is not provided');
}
require_once('includes/dbh.inc.php');
$id=$_GET['id'];
$sql="SELECT * FROM `productss` WHERE id= $id";
$result=$conn->query($sql);
if($result->num_rows != 1) //mafesh prod ando nafs id f id howa 1 bas
{
    die('id is not not in our db');
}
$data=$result->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit-Product</title>
   
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
    <form action="./modifys.php?id=<?=$id ?>" method="POST" enctype="multipart/form-data">
   <h3>EDIT product</h3>
   
   <input type="text" placeholder="enter product name" name="product_name" class="box" value="<?=$data['name']?>">


                     
                        <br />
                        <input type="text" placeholder="enter product description" name="product_description" class="box" value="<?=$data['description']?>">


                     
<br />
<input type="number" placeholder="enter product price" name="product_price" class="box" value="<?=$data['price']?>">       

<br />
                           
<input type="number" placeholder="enter product offer" name="product_offer" class="box" value="<?=$data['offer']?>">       

<br />
<label for="category">Product Category</label>
<select id="category" name="product_category" class="box" required>
    <option value="eye" <?php if ($data['category'] === 'eye') echo 'selected'; ?>>Eye</option>
    <option value="beauty" <?php if ($data['category'] === 'beauty') echo 'selected'; ?>>Beauty</option>
    <option value="skincare" <?php if ($data['category'] === 'skincare') echo 'selected'; ?>>Skin-Care</option>
    <option value="lip" <?php if ($data['category'] === 'lip') echo 'selected'; ?>>Lip</option>
    <option value="face" <?php if ($data['category'] === 'face') echo 'selected'; ?>>Face</option>
</select>
<div id="selectedImage">
    <img src="uploaded_images/<?php echo $data['image']; ?>" alt="Selected Image" id="productImageId" width='100' height='100'>
    <input type="file" name="product_image" accept="image/png, image/jpeg, image/jpg">
</div>


                       






<input type="submit" class="btn" name="edit_product" value="edit products">

<br />

</div>
</div>                
        </main>




      

</html>