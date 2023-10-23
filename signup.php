<?php
include_once "includes/dbh.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Fname = trim($_POST["FName"]);
    $Lname = trim($_POST["LName"]);
    $Email = trim($_POST["Email"]);
    $Password = $_POST["Password"];
    $ConfirmPassword = $_POST["passConfirm"];

    // Validate input fields
    $errors = [];

    // Check for empty fields
    if (empty($Fname)) {
        $errors[] = "First name is required.";
    }

    if (empty($Lname)) {
        $errors[] = "Last name is required.";
    }

    if (empty($Email)) {
        $errors[] = "Email is required.";
    }

    if (empty($Password)) {
        $errors[] = "Password is required.";
    }

    if (empty($ConfirmPassword)) {
        $errors[] = "Confirm password is required.";
    }

    // Check for valid email format
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Check if password and confirm password match
    if ($Password !== $ConfirmPassword) {
        $errors[] = "Password and confirm password do not match.";
    }

    // Check minimum password length
    if (strlen($Password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    // Check if email is already registered
    $sql = "SELECT COUNT(*) FROM users WHERE Email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $emailCount);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($emailCount > 0) {
        $errors[] = "Email is already registered.";
    }

    if(isset($errors)){
        foreach($errors as $errors){
            echo '<span class="message">'.$errors.'</span>';
        }
    } else {
        // Insert data into the database with default user type as "user"
        $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
        $userType = "user"; // Set default user type
        $sql = "INSERT INTO users (FirstName, LastName, Email, Password, UserType) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $Fname, $Lname, $Email, $hashedPassword, $userType);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // Redirect the user based on their user type
        if ($userType == "admin") {
            header("Location: admindashboard.php");
        } else {
            header("Location: homee.php");
        }
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin add-Product</title>
   
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="Dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
<style>

    </style>
</head>


<body>
    <?php include "signup.html"; ?>

    <!-- Your remaining HTML content here -->

</body>

</html>