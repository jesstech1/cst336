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
    <header>
        
    </header>
    
    <body>
        
        <div class="hand">
        <?php
            buildDeck();
            shuffle($deck);
            shuffle($players);
            for ($i = 0; $i < 4; $i++) {
                dealCards($i);
            }
            print_r($totals);
        ?>
        </div>
        
        <footer>
            <div>
                CST 336 2018 &copy; Baird, Chi, Hernandez and Anacleto<br/>
                <strong>Disclaimer:</strong> I did not create any of the characters 
                on this site. All images belong to the Kingdom Hearts franchise and 
                all rights belong to Disney and Square Enix.
            </div>
                
                <img src="img/csumblogo.png" alt="CSUMB logo" title="This is the CSUMB logo"/>
        </footer>
    </body>
</html>