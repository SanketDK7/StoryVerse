<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header('location:login.php');
} ?>
<?php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Database connection parameters
    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $database = "storyverse"; 

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get title, image, and story from the form
    $title = $_POST['title'];
    
    // File upload handling for image
    $targetDir = "uploads/stories_image/";
    $targetFileImage = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOkImage = 1;
    $imageFileType = strtolower(pathinfo($targetFileImage, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFileImage)) {
        echo "Sorry, image file already exists.";
        $uploadOkImage = 0;
    }

    // Allow only certain image formats (you can customize this)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed for images.";
        $uploadOkImage = 0;
    }

    // Check if the upload was successful
    if ($uploadOkImage == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFileImage)) {
            // File uploaded successfully, now insert into database
            $imageUrl = $targetFileImage;
            
            // Get the story content
            $story = $_POST['story'];

            // Prepare SQL statement using a prepared statement
            $sql = "INSERT INTO stories (title, image, story) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);

            // Bind parameters and execute the statement
            $stmt->bind_param("sss", $title, $imageUrl, $story);

            if ($stmt->execute()) {
                echo "New record created successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Close database connection
    $conn->close();
}
?>
