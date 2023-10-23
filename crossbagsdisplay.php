<?php
session_start();
include "makeup.html";
@include 'includes/dbh.inc.php';
$select=mysqli_query($conn,"SELECT * FROM productss");
?>
<?php


session_start();
while($row = mysqli_fetch_assoc($select)){
    if($row['category']=='cross bags'){
?>

<div class="box-container">

<div class="box">
    <div class="container">
        <div class="img">
        <img src="uploaded_images/<?php echo $row['image'];?>" height="100" alt="">


        </div>
    </div>


    <div class="content">
        <h3><?php echo $row['name'];?></h3>
        <h3><?php echo $row['description'];?></h3>
        <div style="margin:10px ;padding:10px" class="main">
            <i class="fa fa-star checked" id="one"></i>
            <i class="fa fa-star unchecked" id="two"></i>
            <i class="fa fa-star unchecked" id="three"></i>
            <i class="fa fa-star unchecked" id="four"></i>
            <i class="fa fa-star unchecked" id="five"></i>
        </div>
    
        <div class="btn1-group">
            <button><a href="#"> A d d t o B A G <?php echo $row['price']; ?>$</a></button>
        </div>
    </div>


</div>
<?php

}}
?>
