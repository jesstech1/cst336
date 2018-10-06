<?php
//include "Slider/api/pixabayAPI.php"; //***MOVED TO if statement, isset ***
//echo "You searched for " . $_GET["keyword"];   //Gathers the parameters used by GET
//$_POST;  values of POST gathered in this arrays.
//Must match method we are specifying in the form.
//print_r($_GET);
//$imageURLs = getImageURLs($keyword, $orientation);

    $backGroundImage = "Slider/img/sea.jpg";
    
    if ( isset($_GET["keyword"]) ) {   //returns if a form has been submitted.
        include "Slider/api/pixabayAPI.php";  // The downloaded file structure is different from Dr. Lara's, be careful.
        $keyword = $_GET["keyword"];
        echo "You searched for " . $_GET["keyword"];
        
        if (!empty($_GET['category'])) { //user made a category selection.
            $keyword = $_GET['category'];
        }
        echo " Layout: " . $_GET["layout"];
        $imageURLs = getImageURLs($keyword, $_GET["layout"]);
        shuffle($imageURLs);
        $backGroundImage = $imageURLs[array_rand($imageURLs)];
    }
//print_r($imageURLs);
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4: Pixabay Slideshow </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css"/>
        <style>@import url("Slider/css/styles.css");</style>
        <style>
            body {
                background-image: url(<?=$backGroundImage?>);
                background-size: cover;
            }
            
            #carouselExampleIndicators {
                width:500px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <br/><br/>
       
        <form method="GET">  <!-- GET is the default - prameters are displayed as part of url, after ? -->
            <div id="text_in">
                <input type="text" name="keyword"/>
            </div>
            
            <div id="radios">
                <div><input type="radio" name="layout" value="Vertical" > Vertical</div>
                <div><input type="radio" name="layout" value="Horizontal" > Horizontal</div>
            </div>
            <div id="submission">
                <input type="submit" name="submitBtn" value="Submit"/>
            </div>
            
            <div id="category">
                These are your categories ...
            <select name="category">
                <option value="">Select One</option>
                <option value="Ocean">Sea</option>
                <option>Mountains</option>
                <option>Forest</option>
                <option>Sky</option>
            </select>
            </div>
            
            
        </form>
        <!--<h1>You must type a keyword or select a category</h1>-->
        <div id="main">
        <?php 
            if (isset($imageURLs)) { ?> 
            
        <?php
                echo "<h2> Type a keyword or select a category<br/>
                    to display a slideshow <br /> with random images from Pixabay.com </h2>";
                echo"<br/><br/>";
        ?>
        <br/><br/>
      
        <!-- jquery -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <?php
                for ( $i = 1; $i < 7; $i++ ) {
                    echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>"; //These all appear on the same line in cource code.
                }
            //<!--<li data-target="#carouselExampleIndicators" data-slide-to="5"></li>-->
            ?>
          </ol>
        <div class="carousel-inner">
        <!--<div class="carousel-item active">
              <img class="d-block w-100" src="/*<=$imageURLs[0]?>*/" alt="First slide">
        </div>-->
        <?php
            for ( $i = 0; $i < 7; $i++ ) {
                
                echo "<div class=\"carousel-item";
                
                /*if ( $i == 0 ) {
                    echo " active";
                }
                echo "\">";*/
                
                echo($i == 0)?" active" : "";
                echo "\">";
                
                echo "<img class=\"d-block w-100\" src=\" " . $imageURLs[$i] . "\" alt=\"Second slide\">";
                echo "</div>";
            }
        ?> 
        </div>
        <!--
        <div class="carousel-item">
              <img class="d-block w-100" src="<=$imageURLs[2]?>" alt="Third slide">
        </div>
         <div class="carousel-item">
              <img class="d-block w-100" src="<=$imageURLs[3]?>" alt="Fourth slide">
        </div>
         <div class="carousel-item">
              <img class="d-block w-100" src="<=$imageURLs[4]?>" alt="Fifth slide">
        </div>
        -->
          
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <?php
            } //closing is isset($imageURLs)
            else { echo " <h1>Enter a Keyword or select a Category </h1>";}
        ?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>