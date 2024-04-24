<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story Generator Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h2>Story Generator</h2>
    <form method="post">
        <label for="story">Tell us your story idea :</label><br>
        <textarea id="story" name="story" rows="4" cols="50"></textarea><br><br>
        <label for="word_count">Enter word count:</label><br>
        <input type="number" id="word_count" name="word_count" value="1200"><br><br>
        <input type="submit" value="Generate Story">
    </form>

    <div id="generated_story"></div>
    
    <script>
        function insertGeneratedStory(){
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
    echo "<pre>" .$response. "</pre>";
}
}
?>

</body>
</html>