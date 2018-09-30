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
        <h1>Super Silver Jack!! Kingdom Hearts Style!! <hr></h1>
        
        <div class="hand">
        <?php
            buildDeck();
            shuffle($deck);
            shuffle($players);
            for ($i = 0; $i < 4; $i++) {
                dealCards($i);
            }
            winnerCalc();
            //echo"totals:";
            //print_r($totals);
            //echo "<br/>";
            //print_r($diff);
        ?>
        </div>
        
        <footer>
            <div>
                CST 336 2018 &copy; Baird, Chi, Hernandez and Anacleto<br/>
                <strong>Disclaimer:</strong> We did not create any of the characters 
                on this site. 
                <br/>All images belong to the Kingdom Hearts franchise and 
                all rights belong to <br/>Disney and Square Enix.
            </div>
                <img src="img/csumblogo.png" alt="CSUMB logo" title="This is the CSUMB logo"/>
        </footer>
    </body>
</html>