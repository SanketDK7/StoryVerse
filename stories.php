<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header('location:login.php');
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style_video.css">
    <title>Stories</title>
</head>
<body>
    <div>
        <header class="d-flex flex-wrap justify-content-center py-4 mb-0 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-3" style="font-family: 'Poppins', sans-serif;">Story Verse</span>
            </a>
        
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="index.html" class="nav-link active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="index.html#about" class="nav-link">About</a></li>
                <li class="nav-item"><a href="index.html#education" class="nav-link">Kids Stories</a></li>
                <li class="nav-item"><a href="story_upload.html" class="nav-link">Upload Story</a></li>
                <li class="nav-item"><a href="index.html#gallery" class="nav-link">Gallery</a></li>
            </ul>
        </header>
    </div>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
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

                // SQL query to fetch image URLs, titles, and stories
                $sql = "SELECT title, image, story FROM stories";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $title = $row["title"];
                        $imageUrl = $row["image"];
                        $story = $row["story"];

                        // Generate HTML for each card
                        echo '<div class="col">
                            <div class="card shadow-sm">
                                <img src="' . $imageUrl . '" class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <div class="card-body">
                                    <p class="card-text">' . $title . '</p>
                                    <div style="display: none;" class="story-content">' . $story . '</div>
                                    <button class="btn btn-primary read-story">Read Story</button>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo "0 results";
                }

                // Close database connection
                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(".read-story").click(function () {
                var storyContent = $(this).siblings(".story-content").text();
                var msg = new SpeechSynthesisUtterance();
                msg.text = storyContent;
                window.speechSynthesis.speak(msg);
                alert(storyContent);
                window.speechSynthesis.cancel(); // Stop reading the story
            });
        });
    </script>

</body>
</html>
