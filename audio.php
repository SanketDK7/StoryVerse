<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="index.js"></script>
    <link rel="stylesheet" href="style_video.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- lightgallery css cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <title>Audio</title>
</head>
<body>
<header class="header">

<a href="./index.php" class="logo"> <i class="fas fa-school"></i> StoryVerse</a>

<nav class="navbar">
    <a href="index.php">home</a>
    <a href="index.php#about">about</a>
    <a href="index.php#education">Kids Stories</a>
    <a href="index.php#games">Games</a>
    <a href="index.#contact">contact</a>

</nav>
</header>
<br><br><br><br>
    <div class="album py-9 bg-body-tertiary">
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

              // SQL query to fetch all titles, images, and audio URLs
              $sql = "SELECT title, image, audio FROM audio_story";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  // Output data of each row
                  while($row = $result->fetch_assoc()) {
                      $title = $row["title"];
                      $imageUrl = $row["image"];
                      $audioUrl = $row["audio"];

                      // Generate HTML for each card
                      echo '<div class="col">
                                <div class="card shadow-sm">
                                  <img src="' . $imageUrl . '" class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
                                  <div class="card-body">
                                    <p class="card-text">' . $title . '</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="btn-group">
                                        <audio controls src="' . $audioUrl . '" type="audio/mpeg"></audio>
                                      </div>
                                    </div>
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
</body>
</html>