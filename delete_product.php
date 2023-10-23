<?php
include_once "includes/dbh.inc.php";
if (isset($_GET['id']) ) 
{
    $id = $_GET['id'];
$sql="DELETE FROM `productss` WHERE id = $id";
if($conn->query($sql)===TRUE)
{
    echo"Data deleted successfully";
}
else{
    echo"something went wrong";
}
}
else{
    die('id not provided');

}
?>