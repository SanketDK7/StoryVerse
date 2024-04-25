<?php
$name = "";
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
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
    
    <link rel="stylesheet" href="style.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to bottom right, #ffccff, #99ccff); /* Gradient background */
        padding: 20px;
    }

    h2 {
        text-align: center;
        color: #333; /* Dark heading color */
        font-size: 28px; /* Increased font size */
    }

    form {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        color: #333; /* Dark label color */
        font-size: 18px; /* Increased font size */
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
        font-size: 16px; /* Increased font size */
    }

    input[type="submit"] {
        background-color: #ff6699; /* Pink submit button */
        color: #fff;
        cursor: pointer;
    }

    p {
        color: #333; /* Dark text color */
        font-size: 18px; /* Increased font size */
    }

    #generated_story {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    <a href="#home">home</a>
    <a href="#about">about</a>
    <a href="#education">Kids Stories</a>
    <a href="#games">Games</a>
    <a href="./generate_story.php">Generate Story</a>
    <a href="#contact">contact</a>

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
    <h2>Story Generator</h2>
    <form method="post">
        <label for="story">Tell us your story idea:</label><br>
        <textarea id="story" name="story" rows="4" cols="50"></textarea><br><br>
        <label for="word_count">Enter word count:</label><br>
        <input type="number" id="word_count" name="word_count" value="1200"><br><br>
        <input type="submit" value="Generate Story">
    </form>

    
    
    <script>
        function insertGeneratedStory() {
            var generatedStoryDiv = document.getElementById("generated_story");
            generatedStoryDiv.innerHTML = generatedStory;
        }

        window.onload = insertGeneratedStory;
    </script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $story = $_POST["story"];
    $word_count = $_POST["word_count"];
    $curl = curl_init();

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
            "X-RapidAPI-Key: fbd8f4438cmshdcce3c8548a55d8p1a3530jsnf0f3967901a3",
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
            echo "<div id='generated_story'>";
            echo "<h3>Generated Story:</h3>";
            echo "<p>" . $cleaned_story . "</p>";
            echo "</div>";
        } else {
            echo "Story not found in JSON response.";
        }
    }
}
?>

</body>
</html>
