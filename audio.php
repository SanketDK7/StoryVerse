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
    <title>Audio</title>
</head>
<body>
<div>
  <header class="d-flex flex-wrap justify-content-center py-4 mb-0 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4" style="font-family: 'Poppins', sans-serif;">Story Verse</span>
    </a>

    <ul class="nav nav-pills">
      <li class="nav-item"><a href="index.html" class="nav-link " aria-current="page">Home</a></li>
      <li class="nav-item"><a href="index.html#about" class="nav-link">About</a></li>
      <li class="nav-item"><a href="index.html#education" class="nav-link">Kids Stories</a></li>
      <li class="nav-item"><a href="audio_upload.html" class="nav-link">Upload Story</a></li>
      <li class="nav-item"><a href="index.html#gallery" class="nav-link">Gallery</a></li>
    </ul>
  </header>
</div>
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