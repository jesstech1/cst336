<!DOCTYPE html>
       <?php
        
        function getLuckyNum (){    
            $boolio = 0;
            
            while ($boolio == 0) {
                $randNum = rand(1, 10);
                if ($randNum == 4) {
                    $randNum = rand(1, 10);
                }  else {
                    echo $randNum;
                    $boolio = 1;
                }
            } 
        }
        function () {
            "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0, 10)/10).";";
        }
    ?>
<html>
    <head>
        <title>Random Color & Numbers </title>
        <style>
            body {
                <?php
                    $red = rand(0, 255);
                    echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0, 10)/10).");";
                ?>
            }
        </style>
    </head>
    <body>
        <h1>
             <?php
                getLuckyNum();
             ?>
             <!-- Needs style tags -->
        
        </h1>
    </body>
</html>