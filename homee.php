
<?php
session_start();
include_once "includes/dbh.inc.php";
include "index.html";
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
<html>
<nav class="navbar">
    <!-- 1st container -->
    <div class="nav-div">

      <img src="R.png" class="brand-logo" alt="logo is here">

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
      <li class="link-item"><a href="index.html" class="link">home</a> </li>
      <li class="link-item"><a href="skincare.html" class="link">Cross Bags</a> </li>
      <li class="link-item"><a href="Allmakeup.html" class="link">Shoulder Bags</a> </li>
      <li class="link-item"><a href="makeup.html" class="link">Back packs</a> </li>
      <li class="link-item"><a href="facemakeup.html" class="link">Wallets</a> </li>
      <!-- <li class="link-item"><a href="eyemakeup.html" class="link">Eye</a> </li> -->

    </ul>

  </nav>
</html>
