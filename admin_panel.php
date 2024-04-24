<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids Website Admin Panel</title>
    <link rel="stylesheet" href="admin_panel.css">
</head>
<body>
    <div class="container">
        <h1>Kids Website Admin Panel</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <label for="video">Upload Video:</label>
            <input type="file" name="video" id="video" accept="video/*">
            <label for="audio">Upload Audio:</label>
            <input type="file" name="audio" id="audio" accept="audio/*">
            <label for="story">Upload Story:</label>
            <input type="file" name="story" id="story" accept="application/pdf">
            <button type="submit" name="submit">Upload</button>
        </form>
    </div>

    <?php
    // Handle file uploads
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        // Handle video upload
        if ($_FILES['video']['error'] === UPLOAD_ERR_OK) {
            $videoName = $_FILES['video']['name'];
            $videoTemp = $_FILES['video']['tmp_name'];
            move_uploaded_file($videoTemp, 'uploads/' . $videoName);
            echo "<p>Video uploaded successfully!</p>";
        }

        // Handle audio upload
        if ($_FILES['audio']['error'] === UPLOAD_ERR_OK) {
            $audioName = $_FILES['audio']['name'];
            $audioTemp = $_FILES['audio']['tmp_name'];
            move_uploaded_file($audioTemp, 'uploads/' . $audioName);
            echo "<p>Audio uploaded successfully!</p>";
        }

        // Handle story upload
        if ($_FILES['story']['error'] === UPLOAD_ERR_OK) {
            $storyName = $_FILES['story']['name'];
            $storyTemp = $_FILES['story']['tmp_name'];
            move_uploaded_file($storyTemp, 'uploads/' . $storyName);
            echo "<p>Story uploaded successfully!</p>";
        }
    }
    ?>

</body>
</html>
