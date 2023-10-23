<?php
require_once('includes/dbh.inc.php');

if (isset($_GET['id']) && isset($_POST['edit_product'])) {
    $id = $_GET['id'];

    // Fetch the existing data for the product
    $sql = "SELECT * FROM `productss` WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $old_image = $data['image']; // Get the old image filename

        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_description = $_POST['product_description'];
        $product_offer = $_POST['product_offer'];
        $product_category = $_POST['product_category'];

        // Handle image upload
        if (isset($_GET['id']) && isset($_POST['edit_product'])) {
            $id = $_GET['id'];
        
            // Fetch the existing data for the product
            $sql = "SELECT * FROM `productss` WHERE id = $id";
            $result = $conn->query($sql);
        
            if ($result->num_rows == 1) {
                $data = $result->fetch_assoc();
                $old_image = $data['image']; // Get the old image filename
        
                $product_name = $_POST['product_name'];
                $product_description = $_POST['product_description'];
                $product_price = $_POST['product_price'];
                $product_offer = $_POST['product_offer'];
                $product_category = $_POST['product_category'];
        
                // Handle image upload
                if (isset($_FILES['product_image']['name']) && ($_FILES['product_image']['name'] != "")) {
                    $size = $_FILES['product_image']['size'];
                    $temp = $_FILES['product_image']['tmp_name'];
                    $type = $_FILES['product_image']['type'];
                    $prodimgname = $_FILES['product_image']['name'];
        
                    // 1st delete the old file from the folder
                    unlink("./uploaded_images/" . $old_image);
        
                    // Upload the new image to the folder
                    move_uploaded_file($temp, "uploaded_images/$prodimgname");
                } else {
                    $prodimgname = $old_image;
                }
        
                // Update the product data in the database
                $sql = "UPDATE `productss` SET 
                `name` = '$product_name',
                `description` = '$product_description',
                `price` = '$product_price',
                `offer` = '$product_offer',
                `category` = '$product_category',
                `image` = '$prodimgname'
                WHERE id = $id";
        
                $update = mysqli_query($conn, $sql);
        
                if ($update) {
                    echo "Data updated successfully";
                } else {
                    echo "Error updating data";
                }
            } else {
                echo "Product not found in the database";
            }
        }
    }
}
?>        
