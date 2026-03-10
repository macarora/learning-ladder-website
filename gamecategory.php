<?php if (!defined('IN_GS')) {
    die('you cannot load this page directly.');
} ?>

<?php
if (isset($_GET["STEM"])) {
    $stemValue = $_GET["STEM"];
    echo "STEM Value: " . $stemValue . "<br>";
    $xmlpath = GSDATAPAGESPATH . "/games/" . $stemValue . ".xml";
    // ... the rest of your code ...
} else {
    echo "STEM parameter is missing in the URL.";
}
?>
