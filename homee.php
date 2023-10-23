
<?php


include_once "includes/dbh.inc.php";

$select=mysqli_query($conn,"SELECT *FROM productss");
?>
<?php
session_start();


$firstName = '';

if (!empty($_SESSION['ID'])) {
  $email = $_SESSION['Email'];

  // Retrieve the user's first name from the database
  $sql = "SELECT firstname FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $firstName = $row['firstname'];
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;1,800&family=Poppins:wght@300&display=swap');
  </style>
  <link rel="stylesheet" href="categorySection.css">
  <link rel="stylesheet" href="nav.css">
  <link rel="stylesheet" href="scale.css">
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="video.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="slider.css">
  <link rel="stylesheet" href="roundedSection.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="b">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <script src="video.js"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Jamila</title>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,600;1,100;1,300&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

  <!-- <link rel="stylesheet" href="style.css"> -->
  <!-- <script src="main.js"></script> -->
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />

  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,600;1,100;1,300&display=swap');
  </style>


</head>
<body>
<nav class="navbar">
    <!-- 1st container -->
    <div class="nav-div">

      <img src="m.jpg" class="brand-logo" alt="logo is here">

      <!-- 2nd container of items and include another container -->

      <div class="nav-items">


        <div class="search">

          <input type="text" class="search-box" placeholder="search for a product">

          <button class="search-btn"> search</button>

        </div>
        <a href="#"><img
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAlhJREFUSEvdVr1uE0EYnG/BogLME+CUVDEFOUsUODwBPAGhSURFKhRsI4zwmYgKKpQ0hCeAJyChiHSbylSUOE9AgCoyvkG7/mF9vvPdESxLbHU6f56Z79uZ3RMsaMmCePH/EjdQqfYhNJMleLyNoGue59ZxDTfKImofQHG0nSLyrBUGzbkSN2TlgJBbrofmTmzGS6HpFhS8VqF8MM+/gO5cR11XlT2Q9wxZgadXmuicRNMzscdmX4jzl88aMSXhgcUQeeeHwVoc3pi4gZU7FHl/VtKJPaWsthAMRETWmLiGypoI3/5D4s8+dTkJb0zcRLnYkwvfBlbnJ1BZ2+daClWST62pKPfbCPZSiU1BFlPMEuJE6HuBp6U4U40z7QK5+5ymOCpgC5XSOeHXUYTaod6cJXLq5KqLZ460qwA6PvX1rKOuKe+VEA9NfZ+yNMprplGborwA5j9Df5hui8YfLR5V0wRPdZx3ZFaskwgh77ZwZE+qXKO2JhOvA2AZQNenXkoDceqPfepSWv0gOTFrsgNs9qGMkNil0C9BxMbGvQTSyGOJ3UynAbi/J53LcRiJ97Frsizk5hZKi5CLM/NDwFxvWUhNTdKZnDlObmEd3jrAYg+FNy9x+DMK8gg3LxbQewDIiQ+9m1Vkormss5X3AsTWEGzfp74dBa6L9xHAqn0v2PZD/TgreeKoXVACbFOrKGhNvFD+JCNWXO5R2zELdobd7Pqh3pjqWHk7INbte2Ijz7jTzHVNgEvPEegk5U9Q8Qj8aCH4knXMM/c4D8jf1M7tuzpNzMKIfwMrl+cfOjE8bAAAAABJRU5ErkJggg==" /></a>





            <a href="Account.php">
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAk9JREFUSEvllUFy00AQRf8XKcIuuQFwgjgLIu8INzA3SE6A2VG2qzBVdmCHOUGOgG+As8IKC5QTwBHsHYREn2phU5IizYxTVGWBlpqZfj2/e34Td/Txjri4FXiA9iGgPUv6GlH6Fp/PNr3ARuABDjoiTwHsVkALSscjnE9DEwgG96J4QuGFM7DwcoxkEgIPApu0oj5ZQEJnECZbuJwNkS5MBRBdgU/zdfHZCPOZDx4E7jNOAVhNL8ZKWnVB+4y/A3gIIB0r2f9XYOWBHFIOovZQ0mvbNlbivZB3Q0lmh4yh+9ZKeMGv0H50j/r2p3563tS5PbSPSFnH41p8/A5zk77x84LtZJ/xAsCOiA8nWdKti1bo+uVYSfW53TgSBC4+pbquLcrsSq5IDwIP0dr9xW17IrlbAZiBSJVpQbIDYN3pjV1fvXIQ2A6tam3OtIaXYtn7vlJ05KttcHNVM+0j7pLqCMxvSSiVOA11rFuDfcYQuh4kdQ9PWgT3ELEF/a1nmUGkyJQKujjBF3M65+cEW1NdcvuUgDVQ8Cdgel8/j83Lmw41ghtG4NJqWhdsVfOdwppzVNaCc2kZfV0HsbeZZZz4OtY6P4rULY5PKduvk74WXJhGS4qdkDFXVGGl1sfVv9ppdQNcnDKuaeQruD07EO/zJ0e+GWXzodO5BjyYrYZ6sAs1JbFWzsxlpPNDJ7jPOJ+9dVn6blldd83oktTFpnKNwNAEirWuNlkJvOkw9yXgilcCm2Fc4UHuwVv4kboMwAe1dVe8IMsMgWy65/8D/wYgNxouI+9HyQAAAABJRU5ErkJggg==" alt="User Photo">
    <?php echo $firstName; ?>
</a>
        <a href="signout.php"><img
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAWpJREFUSEvtls1Nw0AQhd8zSDmSTvAFyA1aoAJCB5wTDkayA10kdEAHcU7Y4eJ0EDqAK4QdtMFGBqxo1iFYSNnbWrP7jefn7RANLTbExf8C93DgC3b3tNESyOMNknnZ3umPA/jtV7bGAHwt9NOOGEUmPS/2TuC+1xlB5MwZmh+gyGmI6Z3dOoEveRgLeAxgRuGF1gGh2CiB5FVokqA2mJBJKNMTLbjPI9mCV+bYVvGL1woGJl3ms8jxRkNte5X0xoTMinzabx522gZvTwM8ZL+e4x46XVKGH9XnVkhVzqiKq6JXMyOeunWucT/5Dl8JXkuVSqRI0h91owHHAPa1uauycwYXl1SE2kmlQiTW+S9LlWN7opHiKlzN2ykmJCu3k30OicXzRtqpgDciIFWF8yfKtQWXHwkATmrm0SxbrPYg0Njok8tqPXUjbyOTdGsNe+Uet8+jVloXwHyt8VYL0tg5TZmaC7U2jYHfAXGVES5uf0d3AAAAAElFTkSuQmCC" /></a>

      </div>
    </div>
    <ul class="links-container">
      <li class="link-item"><a href="home.php" class="link">home</a> </li>
      <li class="link-item"><a href="crossbagsdisplay.php" class="link">Cross Bags</a> </li>
      <li class="link-item"><a href="crossbagsdisplay.php" class="link">Shoulder Bags</a> </li>
      <li class="link-item"><a href="crossbagsdisplay.php" class="link">Back packs</a> </li>
      <li class="link-item"><a href="crossbagsdisplay.php" class="link">Wallets</a> </li>
      <!-- <li class="link-item"><a href="eyemakeup.html" class="link">Eye</a> </li> -->

    </ul>

  </nav>
  <section>
    <div class="container">
      <video autoplay muted id="video1" class="video1">
        <source src="video1.mp4" type="video/mp4">
      </video>

      <video autoplay muted id="video2" class="video2">
        <source src="video2.mp4" type="video/mp4">
      </video>

      <video autoplay muted id="video3" class="video3">
        <source src="video3.mp4" type="video/mp4">
      </video>
      <video autoplay muted id="video4" class="video4">
        <source src="video4.mp4" type="video/mp4">
      </video>

      <div class="text">
       

      </div>

    </div>

  </section>


  <script src="video.js"></script>









  <script src="js/"></script>


  <!----------------------SLIDER BEST SELLER--------------------------------->
  <section class="product">
    <h2 class="product-category" style="font-family: 'EB+Garamond';
    color: #0b184d; font-size: 40px;"> bestsellers</h2>
    <button class="pre-btn"><img src="arrow.png"></button>
    <button class="nxt-btn"><img src="arrow.png"></button>
    <!-- -------------------------------------------------------------------->
    
    <?php
   
while($row = mysqli_fetch_assoc($select)){
    if($row['offer']>1){
?>
 <div class="product-container">
<div class="product-card">
        <div class="product-image " style>
          <span class="discount-tag">50% off</span>
          <img src="uploaded_images/<?php echo $row['image'];?>" alt="">

          <button class="card-btn"> Add To Bag</button>
        </div>

        <div class="product-info">

        <h3><?php echo $row['name'];?></h3>
        <span class="price">
        <h3><?php echo ($row['price'] - ($row['price'] * $row['offer']/100));?></h3>
    </span>
        <span class="actual-price">
      
       
       
         <h3><?php echo $row['price'];?></h3>
  </span>
        </div>

      </div>


      
      <?php

}}
?>
    </div>

  </section>
  <script src="js/nav.js"></script>











  <header class="hero-section">




  </header>

  <script src="js/"></script>







  <!-- category section -->
  <section class="home-shop-by bg-peach">
    <div class="home-shop-by__container container container--medium section-header-wrap">
      <header class="section-header">
        <i class="section-header__heading home-shop-by__heading" style="font-family:'EB+Garamond'; color:#0b184d;">Shop
          by<br>Category</h3>
      </header>
      <div class="home-shop-by__row desktop-only">
        <div class="home-shop-by__col">
          <div class="home-shop-by__item home-shop-by__item--1">
            <a href="crossbagsdisplay.php" class="home-shop-by__link" title="crossbag"><img src="crossbag.jpg" style="width:90%;"></a>
          </div>

        </div>
        <div class="home-shop-by__col">
          <div class="home-shop-by__item--2">
            <a href="crossbagsdisplay.php" class="home-shop-by__link" title="waist"><img src="waistbag.jpg"
                style="width:70%;"></a>


          </div>
          <div class="home-shop-by__item--3">
            <a href="crossbagsdisplay.php" class="home-shop-by__link" title="handbag"><img src="handbag.jpg"
                style="width:50%;"></a>

          </div>
        </div>
      </div>

    </div>
  </section>


  <section class="rounded">
    <div class="home-learn-more__content">




    </div>


    <div class="circle circle1">
      <img src="rounded.jpg">
    </div>


    <h2>What does Louly mean?</h2>
    <p class="prounded" style="font-size: 1.25rem ;">Louly can be defined as a quality in someone or something that
      makes it attractive and interesting in our eyes
      Real beauty isn't about symmetry or weight or makeup: it's about looking life right in the face and seeing all its
      magnificence reflected in your own
      The famous English saying goes, “Beauty lies in the eyes of the beholder .”
    </p>

    </div>



  </section>












  <section class="footers">

    <footer>
      <div class="content" style="border:none;">
        <div class="left box">
          <div class="upper">
            <div class="topic">About us</div>
            <p>jamila's shop is where you feel the most jamila</p>
          </div>
          <div class="lower">
            <div class="topic">Contact us</div>
            <div class="phone">
              <a href="#"><i class="fas fa-phone-volume"></i>01119988687</a>
            </div>
            <div class="email">
              <a href="#"><i class="fas fa-envelope"></i>jamila@gmail.com</a>
            </div>
          </div>
        </div>
        <div class="middle box">
          <div class="topic">Our Services</div>
          <div><a href="#">Get Help</a></div>
          <div><a href="#">Shipping</a></div>
          <div><a href="#">Returns</a></div>
          <div><a href="#">order Status</a></div>
          <div><a href="#">payment options</a></div>

        </div>
        <div class="right box">
          <div class="topic">Subscribe us</div>
          <form action="#">
            <input type="text" placeholder="Enter email address">
            <input type="submit" name="" value="Send">
            <div class="media-icons">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </form>
        </div>
      </div>

    </footer>

  </section>





  <script src="slider.js"></script>
  <script type="text/javascript" src="slider.js"></script>

</body>
</html>
