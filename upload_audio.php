<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Database connection parameters
    $servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $database = "storyverse"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get title from the form
    $title = $_POST['title'];

    // File upload handling for image
    $targetDir = "uploads/images/";
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

    // File upload handling for audio
    $targetDir = "uploads/audio/";
    $targetFileAudio = $targetDir . basename($_FILES["audio"]["name"]);
    $uploadOkAudio = 1;
    $audioFileType = strtolower(pathinfo($targetFileAudio, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFileAudio)) {
        echo "Sorry, audio file already exists.";
        $uploadOkAudio = 0;
    }

    // Allow only certain audio formats (you can customize this)
    if ($audioFileType != "mp3" && $audioFileType != "wav" && $audioFileType != "ogg") {
        echo "Sorry, only MP3, WAV, and OGG files are allowed for audio.";
        $uploadOkAudio = 0;
    }

    // Check if both image and audio upload were successful
    if ($uploadOkImage == 0 || $uploadOkAudio == 0) {
        echo "Sorry, your files were not uploaded.";
    } else {
        // Move the uploaded files to the specified directories
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFileImage) && move_uploaded_file($_FILES["audio"]["tmp_name"], $targetFileAudio)) {
            // Files uploaded successfully, now insert into database
            $imageUrl = $targetFileImage;
            $audioUrl = $targetFileAudio;

            // Prepare SQL statement to insert data into audio_story table
            $sql = "INSERT INTO audio_story (title, image, audio) VALUES ('$title', '$imageUrl', '$audioUrl')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your files.";
        }
    }

    // Close database connection
    $conn->close();
}
?>
