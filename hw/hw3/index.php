<!DOCTYPE html>
<?php 
    include "inc/functions.php";
?>
<html>
    <head>
        <style>
            @import url("css/style.css");
        </style>
        
        <title>
            Homework 3 Form Elements: Trig Practice
        </title>
    </head>
    <body>
        <h1>Some Trig Practice</h1>
        <div id="polarData">
            <strong>Enter X and Y values, then select a trig function to transform your messy decimal value</strong><br/>
            <strong>back into exact form.</strong>
        <form>
            <!--  The code to prefill data:  https://www.w3schools.com/php/php_form_complete.asp -->
            <p><input type="text" onfocus="this.value=''" name="xval" value="<?php echo "$xVal"; ?>" size="2">Enter X value.</p>
            <p><input type="text" onfocus="this.value=''" name="yval" value="<?php echo "$yVal"; ?>" size="2">Enter Y Value.</p>
            <p>
                arcsine    <input type="radio" name="tfunct" value="arcsine" <?php if (isset($_GET["tfunct"]) && $trigID == "arcsine") echo "checked";?>>
                arccosine  <input type="radio" name="tfunct" value="arccosine" <?php if (isset($_GET["tfunct"]) && $trigID == "arccosine") echo "checked";?>> 
                arctangent <input type="radio" name="tfunct" value="arctangent" <?php if (isset($_GET["tfunct"]) && $trigID == "arctangent") echo "checked";?>> 
            </p>
            <p>
                And now for some Haiku ...
                Quick, I need one more form element ... ah ... number!!<br/>
                Do you write haiku?  Do you know what numbers to enter?<br/>
                Try numbers between 1 and 10.<br/>
                <input type="number" name="haiku1" min="1" max="10" value="<?php if (isset($_GET['haiku1'])) echo $_GET["haiku1"]; ?>">
                 
                <input type="number" name="haiku2" min="1" max="10" value="<?php if (isset($_GET['haiku2'])) echo $_GET["haiku2"]; ?>">
              
                <input type="number" name="haiku3" min="1" max="10" value="<?php if (isset($_GET['haiku3'])) echo $_GET["haiku3"]; ?>">
                
            </p>
            <p><input type="submit" name="pEntry" value="submit"></p>
        </form>
        </div>
        <div id="procDisp">
            <!--<?php echo "Heycalc for me ". sin(pi()/6) . " " . cos(pi()/6); ?>-->
             <?php if (validateForm($xVal,$yVal,$trigID,$submit,$error) == true) {
                    calcTheta();
                    calcDenominator();
                    displayRadian();
                    displayTrigMessage();
                    haikuScold();
                    //fillTArray();  Not going to use this.
                    //echo "The data in this array is suspicious.";
                    //print_r($tArray);
                } ?>
        </div>
        <div id="testData">
            Use this test data.  These are x and y values.
        <table>
            <tr>
                <th>&pi;/2</th>
                <th>&pi;/4</th>
                <th>&pi;/6</th>
            </tr>
            <tr>
                <td>1 / 0</td>
                <td>.707107 / .707107</td>
                <td>.5 / .866205</td>
            </tr>
        </table>
        </div>
    </body>
</html>