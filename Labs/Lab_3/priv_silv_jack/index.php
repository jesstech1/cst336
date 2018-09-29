<!DOCTYPE html>
<?php
    include "inc/functions.php"; 

?>

<html>
    <head>
        <title>Super Silver Jack!! Kingdom Hearts Style!</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    
    <body>
        
        <div class="hand">
        <?php
            buildDeck();
            shuffle($deck);
            shuffle($players);
            for ($i = 0; $i < 4; $i++) {
                dealCards();
            }
        ?>
        </div>
        
        
        <footer>
            <div>
                
                CST 336 2018 &copy; Baird, Chi, Hernandez and Anacleto<br/>
                Disclaimer: This website is for academic purposes only.<br/>
            </div>
                
                <img src="img/csumblogo.png" alt="CSUMB logo" title="This is the CSUMB logo"/>
        </footer>
    </body>
</html>