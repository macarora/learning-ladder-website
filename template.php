<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); } 

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>


<!DOCTYPE html>
<html> 
<head>
 <meta charset="utf-8">
        <title><?php get_page_clean_title(); ?></title>
    <script>
        // Function to get the value of a specific cookie
        function getCookie(name) {
            var cookies = document.cookie.split('; ');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i].trim();
                if (cookie.indexOf(name) === 0) {
                    return cookie.substring(name.length + 1);
                }
            }
            return null;
        }

        // Check if the page is the home page (index.php)
        var isHomePage = window.location.pathname === '/';

        // Check if "STEM" or "Literary" cookies exist and if it's the home page
        if (isHomePage) {
            var lastVisitSTEM = getCookie("lastVisitSTEM");
            var lastVisitLiterary = getCookie("lastVisitLiterary");

            if (lastVisitSTEM) {
                alert("You last visited the STEM page on: " + lastVisitSTEM);
            } else if (lastVisitLiterary) {
                alert("You last visited the Literary page on: " + lastVisitLiterary);
            }
        }
    </script>
    </head>

    <body>
        <?php include('header.php');?>
        <?php include('nav.php'); ?>
        <?php include('footer.php'); ?>
        <?php get_page_content(); ?>
    </body>
</html>
