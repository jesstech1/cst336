<?php 
    
    $xVal = $_GET["xval"];
    $yVal = $_GET["yval"];
    $trigID = $_GET["tfunct"];
    $submit = $_GET["pEntry"];
    $error = "Why you no enter full data?";
    $theta;
    $radDenom; 
    $tArray = array();
    function validateForm(&$x,&$y,&$trig,&$sub,&$err) {
        $boolio = false;
        /*
        if(empty($submit)) {
                    echo "Enter the data.";
        }else if(isset($submit)) {
            if (empty($xVal) || empty($yVal) || empty($trigID)) {
                echo "$error";
            }
        }*/
        //****Check for false conditions first.*****
        if(empty($sub)) {
                    echo "Enter the data.";
        }else if ($x === '' || $y === '' || empty($trig)) {
            echo "Why you no enter full data?";
            
        } else {
            //echo "good boy.  ";
            $boolio = true;
        }
        //echo "  Echoing boolio: ";
        //echo $boolio ? 'true.  ' : 'false.  ';
        return $boolio;
    }
    
    function calcHyp(&$x,&$y) {
        $temp;
        $temp = sqrt(pow($x,2) + pow($y,2));
        return $temp;
    }
    
    function calcTheta() {
       // echo "HEY THETA!";
        global $xVal,$yVal,$theta;
        if (isset($xVal) && isset($yVal) && $xVal != 0) {
            $temp;
            $temp = atan($yVal/$xVal);
            //echo "theta is $temp.  ";
            $theta = $temp;
            //echo "theta is $theta  ";
        }
    }
    
    function calcDenominator(){
        //echo "HEY DENOM!";
        global $theta;
        global $radDenom;
        //echo "I just accssed theta from inside cdenom: $theta ";
        if ($theta != 0) {
            $temp = $theta;
            //echo "Temp is $temp.  ";
            $temp *= 180/pi();
            $temp = 180/$temp;
            //echo "Radian denominator is $temp.  ";
            $radDenom = $temp;
            //echo "radDenom is $radDenom.  ";
        } else {
            $radDenom = 2;
        }
    }
    
    function displayRadian() {
        global $radDenom;
        global $theta;
        echo "<div id='exactVal'>";
        //echo "theta is $theta";
        //echo "radDenom is $radDenom.  ";
        $temp = $radDenom;
        if (abs($temp - round($temp,0) < .02)) {
            $temp = round($temp, 0);
        }
        echo "<img src='img/pi.png' alt='the beloved symbol for pi' title='pi time'><br/>";
        echo "<hr id='vinculum'>";
        echo "$temp";
        echo "</div>";
    }
    
    function displayTrigMessage() {
        global $trigID;
        if ($trigID == arcsine || $trigID == arccosine) {
        echo "<div id='tMessage'>";
        echo "You selected $trigID.  Because this is a small college excercise, it is ok, but this</br>";
        echo " identity is useless without a hypotenuse.  I have to complete this assignment soon, so I <br/>";
        echo "  can't give you one.";
        echo "</div>";
        } else {
            echo "<div id='tMessage'>";
            echo "Yes, good, tangent is what you wanted.  Sorry, time pressure limits me to implementing<br/>";
            echo " cheeky remarks.";
            echo "</div>";
        }
        echo "<br/><br/><br/>";
    }
    /*  This is not working how I want.  The calculations are off I can't figure out why.
    function fillTArray() { 
        global $tArray;
        for ( $i = 1; $i <= 3; $i++) {
           array_push($tArray,array("&pi;",2*$i, cos(pi()/(2*$i)), sin(pi()/2*$i)));
        }
    }
   */
   /*  This function would have needed the calculations in the array to be accurate.
   function generateTable() {
       
   }*/
   
   function haikuScold() {
       echo "<h2>Here is the reward for the haiku pattern you suggested.</h2>";
       if (isset($_GET["haiku1"]) &&  isset($_GET["haiku2"]) && isset($_GET["haiku3"])) {
           if ($_GET["haiku1"] != 5 && $_GET["haiku2"] != 7 && $_GET["haiku2"] != 5) {
               echo "<i>That's not haiku!  You're just countin' syllables!  Get Back in the water!</i> - The Deadly Fin";
           } else {
               echo "Ah yes, the sweetness ... <br/>";
               echo "Five, Seven, Five ... melody <br/>";
               echo "Honey for our ears ...";
           }
       }
   }

?>