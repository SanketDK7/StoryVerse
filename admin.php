<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header('location:login.php');
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids Website Admin Panel</title>
    <link rel="stylesheet" href="admin_panel.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap');

body {
    font-family: 'Comic Neue', cursive;
    background-color: #f7f7f7;
}

.container {
    text-align: center;
    margin: 50px auto;
    max-width: 400px;
    padding: 20px;
    border: 2px solid #ccc;
    border-radius: 15px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
    margin-bottom: 30px;
}

.upload-section {
    margin-bottom: 30px;
}

label {
    display: block;
    font-size: 18px;
    margin-bottom: 10px;
}

.upload-button {
    display: inline-block;
    padding: 15px 30px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
    border: 2px solid transparent;
}

.upload-button.video {
    background-color: #ff7f50;
}

.upload-button.audio {
    background-color: #66cdaa;
}

.upload-button.text {
    background-color: #6495ed;
}

.upload-button:hover {
    background-color: #444;
    border-color: #444;
}

.logout-button {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #ff4d4d;
    color: #fff;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.logout-button:hover {
    background-color: #ff3333;
}

 </style>
</head>
<body>

<div class="container">
        <h1>Kids Website Admin Panel</h1>
        <div class="upload-section">
            <label for="video">Upload Video Story:</label>
            <a href="./video_upload.html" class="upload-button video">Upload</a>
        </div>

        <div class="upload-section">
            <label for="audio">Upload Audio Story:</label>
            <a href="./audio_upload.html" class="upload-button audio">Upload</a>
        </div>

        <div class="upload-section">
            <label for="story">Upload Text Story:</label> 
            <a href="./story_upload.html" class="upload-button text">Upload</a>
        </div>

        <a href="./logout.php" class="logout-button">Logout</a>
    </div>


</body>
</html>
