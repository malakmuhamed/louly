<?php
// Start session
session_start();
include_once "includes/dbh.inc.php";

// Check if user is logged in
if (!isset($_SESSION["ID"])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Retrieve user data from the database
$userID = $_SESSION["ID"];
$sql = "SELECT * FROM users WHERE ID = $userID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Update session variables with user data
$_SESSION["Email"] = $row["Email"];
$_SESSION["Password"] = $row["Password"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
</head>

<body>
    <h1>Edit Profile</h1>

    <form action="" method="post">

        Email:<br>
        <input type="text" value="<?= $_SESSION['Email'] ?>" name="Email"><br>

        Old Password:<br>
        <input type="password" name="OldPassword"><br>

        New Password:<br>
        <input type="password" name="Password"><br>

        <input type="submit" value="Submit" name="Submit">
    </form>
</body>

</html>


