<?php
    session_start();
    $_SESSION['boolio'];
    include 'dbConnection.php';
    include 'functions.php';
    //include 'compendium.php';
    $dbConn = startConnection();
    
    validateSession();
    

  
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Kumidata Archives </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
          <script>
                function lerta() {
                    alert("Novitiate elevated!");
                }
                function lerta2() {
                    alert("Scribe eliminated!");
                }
        </script>
        <style>
            body {
                text-align:center;
            }
        </style>
        
    </head>
    <body>
        <h1 class="jumbotron"> Kumidata Archives </h1>
        <h4>Elevate Novitiate</h4>
        <form>
            Assign Scribe Name: <input type='text'  name='scribenm'><br>
            Assign Scribe Key   :  <input type='password' name='key'><br>
                <input type='submit' id="one" name="fate" value='elevate' onclick="">
                <input type="submit" id="two" name="fate" value='excommunicate' onclick="">
           <?php 
                if (($_GET['fate'] == "excommunicate") && !empty($_GET['scribenm'])) {
                    excommunicate();
                    header("Location: kumidata.php");
                }
                if (($_GET['fate'] == "elevate") && !empty($_GET['scribenm'])) {
                    addTheScribe();
                    header("Location: kumidata.php");
                }
            ?>
        </form>
        <br><br><br><br>
        <h4>Change Diet</h4>
        <div id="changediet">
              <form>
                  Enter Specimen Name: <input type="text" name="specimen"><br>
                  Enter New Diet: <input type="text" name="diet"  value="chicken"><br>
                  <input type ="submit" name="dietchange"><br>
                  <?php changeDiet(); ?>
              </form>
          </div>
          <br><br>
        
        <h4>View Dietary Report</h4>
        <form>
            <input type="submit" value="Generate Dietary Kumidata"><br>
            Sort by Grams Consumed: <input type='radio' name='sorting' value='grams'><br>
            Sort by Name: <input type='radio' name='sorting' value='namu'><br>
            Sort by Mammal Takedowns: <input type='radio' name='sorting' value='tDowns'><br>
        </form>
        <button class="kumidataLink">Output Diet Report</button>
         <script>
            $('document').ready(function() {
                $('.kumidataLink').click(function(){
                    $('#dietModal').modal('show');
                });
            });
        </script>
     <div class="modal fade"  id="dietModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dietRep">Diet Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align:center">
                    <div>
                        <?php
                            $diets = getDiets();
                            foreach($diets as $diet) {
                              echo "<strong>Specimen: " .$diet['name']. "</strong><br>";
                              echo "<img id='specimage' src='img/" .$diet['imageURL']. "'><br>";
                              echo "Main Food: " .$diet['main']. "<br>";
                              echo "Grams Consumed: " .$diet['grams_consumed']. "<br>";
                              echo "Mammal Takedowns: " .$diet['mammal_takedowns']. "<br><br><br>";
                            }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
        <br><br><br><br>
        
          
    <h4>Aggregate the Kumidata</h4>
    <button class="kumidataAggr">Invoke Modal of Aggregation</button>
         <script>
            $('document').ready(function() {
                $('.kumidataAggr').click(function(){
                    $('#aggregateModal').modal('show');
                });
            });
        </script> 
    <div class="modal fade"  id="aggregateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dietRep">Aggregate Kumidata</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align:center">
                    <div>
                        <?php
                            echo aggregate3(). "<br>";
                            echo aggregate1(). "<br>";
                            echo aggregate2(). "<br>";
                            echo aggregate4(). "<br>";
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <!-- LOCK THE KUMIDATA!!! -->
        <br><br><br><br>
        <form action="lockkumidata.php">
            <input type="submit" value="LOCK KUMIDATA">
        </form>
          <br><br><br><br>
         
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
    </body>
</html>