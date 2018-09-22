<?php
    include 'inc/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <!-- no extra space here -->
        <div id = "main">
            <?php
                play();
            ?>
            <form>
                <button type="button" onclick="">Recombine</button><!--The Ajax Documentation looked like dakr magic to me-->
            </form>
        </div>
        <footer>
            <hr>
            CST336. 2017&copy; Anacleto <br />
            <strong>Disclaimer:</strong> All material on this website was taken from online resources. <br />
            It is used for academic purposes only. <br />
            Other Disclaimer:  The flowers and the prices are real though!  <br />
            <img src="img/csumblogo.png" alt="CSUMB logo" title="This is the csumb logo"/>
        </footer>
    </body>
</html>