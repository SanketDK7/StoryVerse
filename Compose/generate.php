<?php
$name = "";
session_start();
if(!isset($_SESSION['username'])){
    header('location:../login.php');
}
else{
    $name = $_SESSION['username'];

} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story Generator Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" type="text/css" href="style.css">
        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- lightgallery css cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        
        .container {
            width: 700px;
            height: 800px;  
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: linear-gradient(0deg, #aea873, #b8842c);
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-size: 20px;
            font-weight: bold;
            color: black;
        }

        textarea,
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        p{
            color: black;
        }

        pre {
            white-space: pre-wrap;
            word-wrap: break-word;
        }
    </style>
</head>

<body>
<header class="header">

<a href="#" class="logo"> <i class="fas fa-school"></i> StoryVerse</a>

<nav class="navbar">
    <a href="../index.php">home</a>
    <a href="../index.php#about">about</a>
    <a href="../index.php#education">Kids Stories</a>
    <a href="../index.php#games">Games</a>
    <a href="./generate_story.php">Generate Story</a>
    <a href="../index.php#contact">contact</a>

</nav>

<div class="icons">
    <?php
    if($name == ""){ ?>
    <a href="login.php" class="nav-link px-lg-3 py-3 py-lg-4"><div class="fas fa-user" id="login-b"></div></a>
    <?php } else { ?>
        <div class="fas fa-user" id="login-b"><?php echo "   ".$name; ?></div>
    <a href="logout.php" class="nav-link px-lg-3 py-3 py-lg-4"><div class="fas fa-sign-out-alt" id="logout-b"></div></a>
    <?php } ?>
    
    <!--
    <a class="nav-link px-lg-3 py-3 py-lg-4" href="logout.php"><div class="fas fa-sign-out-alt" id="logout-b"></div></a> -->

</div>



</header>
<br><br><br>
    <h2> <img src ="magic-wand.png">Compose your Tale</h2>
    <div style="display: flex; width: 1200px; 
        height: 100px; margin-left: -200px;">
    <div class ="container" style="flex: 2;">
    <form method="post">
        <label for="story">Tell us your story idea:</label><br>
        <textarea id="story" name="story" rows="4" cols="50"></textarea><br><br>
        <label for="word_count">Enter word count:</label><br>
        <input type="number" id="word_count" name="word_count" value="200"><br><br>
        
        <button type="submit" value="Generate Story" class ="btn">
        <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1" class="sparkle">
           <path d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z"></path>
        </svg>
        <span class ="text">Generate</span>
    </button>
    <div id = "generated_story"></div>

    <script>
        function insertGeneratedStory() {
            var generatedStoryDiv = document.getElementById("generated_story");
            generatedStoryDiv.innerHTML = generatedStory;
        }
        window.onload = insertGeneratedStory;
    </script>
    </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $story = $_POST["story"];
            $word_count = $_POST["word_count"];
            $curl = curl_init();
            $story='Write the story for this kids for given subject and make the story attractive so which can attract the small kids to read the story
            ;'.$story;
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://ai-story-generator.p.rapidapi.com/generate/story/v1/",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => http_build_query([
                    'mode'=> 'Creative',
                    'text' => $story,
                    'word_count' => $word_count
                ]),
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: ai-story-generator.p.rapidapi.com",
                    "X-RapidAPI-Key: 1041e5fa95msh0346b0a3699489fp17dd75jsned695d7c18c2",
                    "content-type: application/x-www-form-urlencoded"
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                // Decode JSON response
                $data = json_decode($response, true);
                
                // Check if the story variable exists in the JSON
                if (isset($data['story'])) {
                    // Remove unexpected characters from the story
                    $cleaned_story = strip_tags($data['story']);
                    
                    // Print the cleaned story
                    echo "<h3>Your Creative Creation:</h3>";
                    echo "<p style:'font-size: 18px; text-align: justify;'>" . $cleaned_story . "</p>";

                } else {
                    echo "Story not found in JSON response.";
                }
            }
        }
        ?>
        </div>
        <div style="flex:1; margin-top: 150px;">
            <img src="./story1.png" alt="">
        </div>
    </div>

</body>
</html>
