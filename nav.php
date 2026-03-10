<?php
// Get the current page URL
$currentURL = $_SERVER['REQUEST_URI'];

// Initialize variables
$homeClass = '';
$aboutUsClass = '';
$privacyPolicyClass = '';
$termsAndConditionsClass = '';
$contactUsClass = '';
$submitGameClass = '';
$gameClass ='';

// Check the current page and set the corresponding class
if (strpos($currentURL, '/aboutus') !== false) {
    $aboutUsClass = 'active';
} elseif (strpos($currentURL, '/privacypolicy') !== false) {
    $privacyPolicyClass = 'active';
} elseif (strpos($currentURL, '/termsandconditions') !== false) {
    $termsAndConditionsClass = 'active';
} elseif (strpos($currentURL, '/contactus') !== false) {
    $contactUsClass = 'active';
} elseif (strpos($currentURL, '/submitgame') !== false) {
    $submitGameClass = 'active';
} elseif (strpos($currentURL, '/game') !== false) {
    $gameClass = 'active';
} else {
    $homeClass = 'active'; // Default to Home page
}
?>
<nav class="Nav">
    <!-- Navigation Bar -->
    <a class="<?= $homeClass ?>" href="http://mysite"><h3> Home </h3> </a>
    <a class="<?= $aboutUsClass ?>" href="http://mysite/aboutus"><h3> About Us </h3> </a>
    <a class="<?= $privacyPolicyClass ?>" href="http://mysite/privacypolicy"><h3> Privacy Policy </h3> </a>
    <a class="<?= $termsAndConditionsClass ?>" href="http://mysite/termsandconditions"><h3> Terms and Conditions </h3> </a>
    <a class="<?= $contactUsClass ?>" href="http://mysite/contactus"><h3> Contact Us </h3> </a>
    <a class="<?= $submitGameClass ?>" href="http://mysite/submitgame"><h3> Submit Game </h3> </a>
   <div class ="dropdown">
                 <button class="dropbtn">Games
      <!-- <i class="fa fa-caret-down"></i> -->
    </button>
    <div class="dropdown-content">
      <a href="/games?category=STEM">STEM</a><br>
      <a href="/games?category=Literary">Literary</a><br>
      <!-- <a href="#">Link 3</a><br> -->
    </div>
  </div>


</nav>