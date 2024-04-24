<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header('location:login.php');
} ?>
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

    // File upload handling
    $targetDir = "uploads/video/";
    $targetFile = $targetDir . basename($_FILES["video"]["name"]);
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (if needed)
    // if ($_FILES["video"]["size"] > 5000000) {
    //     echo "Sorry, your file is too large.";
    //     $uploadOk = 0;
    // }

    // Allow only certain file formats (you can customize this)
    if($videoFileType != "mp4" && $videoFileType != "avi" && $videoFileType != "mov" && $videoFileType != "wmv") {
        echo "Sorry, only MP4, AVI, MOV, and WMV files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $targetFile)) {
            // File uploaded successfully, now insert into database
            $videoUrl = $targetFile;

            // Prepare SQL statement to insert data into video_story table
            $sql = "INSERT INTO video_story (title, video) VALUES ('$title', '$videoUrl')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Close database connection
    $conn->close();
}
?>
