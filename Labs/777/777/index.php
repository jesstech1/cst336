<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body>
        
        <!-- no extra space here -->
        <?php
          $random_value1 = rand(0,2);
          $random_value2 = rand(0,2);
          $random_value3 = rand(0,2);
        
        function displaySymbol() {
            
            //declare function in php
            //echo $random_value;
            //echo "<img src='img/$symbol1.png' alt='This is an image of a ' ".ucfirst($symbol). " '.' title='".ucfirst($symbol1)."'/>";
            if ($random_value == 0) {
                $symbol = "seven";
                echo "<img src='img/$symbol.png' alt='This is an image of a ' ".ucfirst($symbol). " '.' title='".ucfirst($symbol)."'/>";
            } else if ($random_value == 1)  {
                 $symbol = "orange";
                echo "<img src='img/$symbol.png' alt='This is an image of a ' ".ucfirst($symbol). " '.' title='".ucfirst($symbol)."'/>";
                
            } else if ($random_value == 2) {
                 $symbol = "cherry";
                echo "<img src='img/$symbol.png' alt='This is an image of a ' ".ucfirst($symbol). " '.' title='".ucfirst($symbol)."'/>";
            }
        }
        
        
        displaySymbol($random_value1);
        displaySymbol($random_value2);
        displaySymbol($random_value3);
        
        ?>

    </body>
</html>