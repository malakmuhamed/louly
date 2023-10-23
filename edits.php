<?php
session_start();
require_once('includes/dbh.inc.php');
$sql="SELECT * FROM `productss`  ";
$result=$conn->query($sql);
?>


<!doctype html>
<html lang="en">

  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>product company</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"  >
    <link rel="stylesheet" href="showall.css">
    <link rel="stylesheet" href="Dashboard.css">
  </head>
  <body>
    
  
    <div class="container">
    <form method="post">
            <input type="text" placeholder="Search Users" name="search" >
            <button class="sbtn" name="submitsearch">Search</button>
        </form>
        <table class="table table-striped table-borderrer">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>description</th>
                <th>price</th>
                
                <th>offer</th>
                <th>category</th>
                <th>image</th>
                <th>Actions</th>
               

</tr>

<?php
                
                if(isset($_POST['submitsearch'])){
                    $search=$_POST['search'];

                    $sql="Select * from `productss` where id='$search'";
                    $result= mysqli_query($conn,$sql);
                    if($result){
                        if(mysqli_num_rows($result)>0)
                        {
                          while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                           
                            echo "<td>" . $row['offer'] . "</td>";
                            echo "<td>" . $row['category'] . "</td>";
                            echo "<td><img src='uploaded_images/" . $row['image'] . "' alt='Selected Image' id='productImageId' width='100' height='100'></td>";
                    
                             echo "<td>";
                               "<div class='btn-group'>";
                            echo "    <a  class='btn-secondary' name='edit_product' href=' ./editaction.php?id= " .$row['id'] ."'>Edit</a>";
                            echo "   <a  class='btn-danger' name='delete_product' href='./delete_product.php?id= " .$row['id'] ."'>Delete</a> " ;
                            echo "  </div>";
                            echo "</td>";
                            echo "</tr>";
                        }
                            
                            
                        }
                        else{
                            echo '<h2>Product Not Found</h2>';
                        }
                    }
                }
                    
                ?>
</table>
    </div>
</body>
</html>
<table>
                
            </table>