<?php
session_start();
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

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Email = htmlspecialchars($_POST["Email"]);
    $OldPassword = htmlspecialchars($_POST["OldPassword"]);
    $Password = htmlspecialchars($_POST["Password"]);

    // Verify if the entered old password matches the stored password
    $hashedOldPassword = $row['Password'];
    if (!password_verify($OldPassword, $hashedOldPassword)) {
        echo "Invalid old password.";
        exit();
    }

    // Validate the new password
    if (strlen($Password) < 8) {
        echo "New password should be at least 8 characters long.";
        exit();
    }

    // Update the password in the database
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET Password='$hashedPassword' WHERE ID = $userID";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Retrieve updated user data from the database
        $sql = "SELECT * FROM users WHERE ID = $userID";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        // Update session variable
        $_SESSION["Password"] = $row["Password"];

        // Redirect to index.php or any other page
        header("Location: Account.php");
        exit();
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}
?>