<?php
    function displayPoints($random_value1, $random_value2, $random_value3) {
                    echo "<div id='output'>";
                    if ($random_value1 == $random_value2 && $random_value2 == $random_value3) {
                        switch($random_value1) {
                            case 0: $totalPoints = 1000;
                                break;
                            case 1: $totalPoints = 500;
                                break;
                            case 2: $totalPoints = 250;
                                break;
                            case 3: $totalPoints = 900;
                        }
                        echo "<h2>You won $totalPoints points!</h2>";
                        echo "<audio><source src='Sound/yaksax.mp3' type='audio/mpeg'>You browser not like...</audio>";
                } else {
                        echo "<h3>Try Again!</h3>";
                }
                echo "</div>";
            }
    function displaySymbol($random_value,$pos) {
                    //declare function in php
                    //echo $random_value;
                    //echo "<img src='img/$symbol1.png' alt='This is an image of a ' ".ucfirst($symbol). " '.' title='".ucfirst($symbol1)."'/>";
                    /*
                    if ($random_value == 0) {
                        $symbol = "seven";
                        echo "<img src='img/$symbol.png' alt='This is an image of a ' ".ucfirst($symbol). " '.' title='".ucfirst($symbol)."'/>";
                    } else if ($random_value == 1)  {
                         $symbol = "orange";
                        echo "<img src='img/$symbol.png' alt='This is an image of a ' ".ucfirst($symbol). " '.' title='".ucfirst($symbol)."'/>";
                    } else if ($random_value == 2) {
                         $symbol = "cherry";
                        echo "<img src='img/$symbol.png' alt='This is an image of a ' ".ucfirst($symbol). " '.' title='".ucfirst($symbol)."'/>";
                    }*/
                    //Using switch cases instead.
                    
                    /*
                    switch($random_value) {
                        case 0: echo "<img src='img/seven.png' alt='seven' title='Seven' width='70px' />";
                            break;
                        case 1: echo "<img src='img/cherry.png' alt='cherry' title='Cherry' width='70px' />";
                            break;
                        case 2: echo "<img src='img/lemon.png' alt='lemon' title='Lemon' width='70px' />";
                            break;
                    }*/
        switch($random_value) {
            case 0: $symbol = "seven";
                break;
            case 1: $symbol = "cherry";
                break;
            case 2: $symbol = "lemon";
                break;
            case 3: $symbol = "grapes";
        }
            
            echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."' width='70px'/>";
        }   //practice this implementation. "thing='-----'thing2='------'thing3='".somefunction."' thing4='------'some other thing";
        
        function play() {
                /*
                $random_value1 = rand(0,2);
                $random_value2 = rand(0,2);
                $random_value3 = rand(0,2);
                */
                for ($i = 1; $i < 4; $i++ ) {
                    ${"random_value" . $i} = rand(0,3);  //THIS IS BRILLIANT!  ALL LANGUAGES SHOULD HAVE THIS!
                    displaySymbol(${"random_value" . $i}, $i);  
                    //can't put the displayPoints functions in here, it will create three separate divs.
                }
                displayPoints($random_value1, $random_value2, $random_value3);
                /*
                displaySymbol($random_value1);  //If we use the same rando gen, all the images are the same
                displaySymbol($random_value2);  
                displaySymbol($random_value3);
                */
        }
?>