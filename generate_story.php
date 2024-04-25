<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story Generator Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!--<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
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
    </style>-->
</head>
<body>
    <h2>Story Generator</h2>
    <div class ="form-container">
    <form method="post">
        <label for="story">Tell us your story idea:</label><br>
        <textarea id="story" name="story" rows="4" cols="50"></textarea><br><br>
        <label for="word_count">Enter word count:</label><br>
        <input type="number" id="word_count" name="word_count" value="1200"><br><br>
        
        <button type="submit" value="Generate Story" class ="btn">
        <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1" class="sparkle">
           <path d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z"></path>
        </svg>
        <span class ="text">Generate</span>
    </button>

    </form> 
    <script>
        function insertGeneratedStory() {
            var generatedStoryDiv = document.getElementById("generated_story");
            generatedStoryDiv.innerHTML = generatedStory;
        }
        window.onload = insertGeneratedStory;
    </script>
    </div>
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
