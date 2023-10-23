<?php
session_start();
include_once "includes/dbh.inc.php";
session_start();
//lab task delete the user from database and destroy session
// sql to delete a record
$sql = "DELETE  FROM users WHERE ID =" . $_SESSION["ID"];

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
session_destroy();
?>