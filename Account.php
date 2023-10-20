<?php



include_once "includes/dbh.inc.php";
include "Account.html";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    // Select data from the database where email matches
    $sql = "SELECT * FROM users WHERE Email='$Email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['Password'];

        // Verify if the entered password matches the hashed password
        if (password_verify($Password, $hashedPassword)) {
            $_SESSION["ID"] = $row["ID"];
            $_SESSION["FName"] = $row["FirstName"];
            $_SESSION["LName"] = $row["LastName"];
            $_SESSION["Email"] = $row["Email"];
            $_SESSION["UserType"] = $row["UserType"];

            if ($_SESSION["UserType"] == "admin") {
                header("Location: admindashboard.php");
            } else {
                header("Location: homee.php");
            }
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Email does not exist.";
    }
}

// Add the code below to prevent non-admin users from accessing the admindashboard.php page
if (isset($_SESSION["UserType"]) && $_SESSION["UserType"] !== "admin") {
    echo "You are not authorized to access this page.";
    exit();
}



?>