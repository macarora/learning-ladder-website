<?php 
include "header.php";
include "nav.php";
include "footer.php";

if (!defined('IN_GS')) { 
    die('you cannot load this page directly.'); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>
        <?php get_page_clean_title(); ?>
    </title>
    <link href="<?php get_theme_url(); ?>/reset.css" rel="stylesheet">
    <link href="<?php get_theme_url(); ?>/style4xml.css" rel="stylesheet">

</head>

<body>
    <?php
// Load the XML file
$xmlpath = GSDATAPAGESPATH . "/games/" . $_GET["category"] . ".xml";
$xmldata = simplexml_load_file($xmlpath);

// Check if loading the XML was successful.
// if ($xmldata === false) {
//     echo "Error loading XML from file $xmlpath: " . libxml_get_last_error()->message;
// } else {
    // Access and display data from the XML file.
    $categoryname = $xmldata->categoryname;
    $categorydescription = $xmldata->categorydescription;

    // Output HTML content
        echo '<h1 class="category-title">' . $categoryname . '</h1>';
echo '<p class="category-description">' . $categorydescription . '</p>';


    // Loop through the "game" elements and display information about each game.
    foreach ($xmldata->game as $game) {
    $gamename = $game->name;
    $gamedescription = $game->description;
    $gamecost = $game->cost;
    $gradelevel = $game->gradelevel;
    $subject = $game->subject;
    $picture = $game->gamepicture;
    $link = $game->url;
    $review = $game->review;
    $tags = $game->searchtags;
    $level = $game->difficultylevel;
    $popularity = $game->popularitylevel;
    $equipmentrequired = $game->equipmentrequired;
    $internetspeed = $game->internetspeed;
    
    echo '<div class="games">';
        echo '<img class="picture" src="' . $game->gamepicture . '" alt="' . $game->name . '"><br>';
        echo '<div class="game-details">';
            echo '<a class="game-link" href="' . $game->url . '">' . $game->name . '</a><br>';
            echo "<p>Description: " . $gamedescription . "</p><br>";
             echo "<p>Aud$ " . $gamecost . "</p><br>";
            echo "<p>Grade Level: " . $gradelevel . "</p><br>";
            echo "<p>Subject: " . $subject . "</p><br>";
            echo "<p>Game Review(s): </p><br>";
            foreach ($game->review as $review) {
            $score = (int) $review['score']; // Get the score attribute as an integer
            $text = (string) $review; // Get the review text
            echo "Score: $score - $text<br>";
            }
            echo "</p><br>";
    
            echo "<p>Tags: ";
                foreach ($tags->tag as $tag) {
                echo $tag . ' ';
                }
                echo "</p><br>";
    
            echo "<p>Difficulty Level: ";
                {
                $level = (string) $level['level']; // Get the score attribute as an integer
                echo "$level<br>";
                }
                echo "</p><br>";
    
            echo "<p>Popularity Level: " . $popularity . "</p><br>";
    
            echo "<p>Equipment Required:</p><br>";
            foreach ($equipmentrequired->item as $equipmentItem) {
            echo $equipmentItem . '<br>';
            }
            echo "</p><br>";

            echo "<p>Internet: " . $internetspeed . "</p><br>";
    
    
            echo '</div>';
        echo '</div>';
    
    }

?>

<script>
    // Get the current date and time as a string
    var currentDateTime = new Date().toUTCString();

    // Get the category from the URL
    var urlParams = new URLSearchParams(window.location.search);
    var category = urlParams.get('category');

    if (category) {
        // Set a cookie for the current category
        document.cookie = "category=" + category + "; expires=Thu, 18 Dec 2030 12:00:00 UTC; path=/";
        document.cookie = "lastVisit" + category + "=" + currentDateTime + "; expires=Thu, 18 Dec 2030 12:00:00 UTC; path=/";
    }
</script>

</body>

</html>