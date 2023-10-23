<?php
include_once "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search users</title>
    <link rel="stylesheet" href="search.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <input type="text" placeholder="Search Users" name="search" >
            <button class="sbtn" name="submit">Search</button>
        </form>
        <div class="container">
            <table>
                <?php
                
                if(isset($_POST['submit'])){
                    $search=$_POST['search'];

                    $sql="Select * from `users` where FirstName='$search'";
                    $result= mysqli_query($conn,$sql);
                    if($result){
                        if(mysqli_num_rows($result)>0)
                        {
                            echo '<thead>
                            <tr>
                            <th>id</>
                            <th>FirstName</th>
                            <th>Email</th>
                            </tr>
                            </thead>';

                            while($row=mysqli_fetch_assoc($result)){
                                echo'
                                <tbody>
                                <tr>
                                    <td>'.$row['ID'].'</td>
                                    <td>'.$row['FirstName'].'</td>
                                    <td>'.$row['Email'].'</td>
                                </tr>
                                </tbody>';
                            }
                            
                            
                        }
                        else{
                            echo '<h2>User Not Found</h2>';
                        }
                    }
                }
                    
                ?>
            </table>
        </div>
    </div>
</body>
</html>