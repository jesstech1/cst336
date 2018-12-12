<?php

    include 'dbConnection.php';
    include 'functions.php';
    $dbConn = startConnection();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Arachnid Kumite Society</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
            @import url('css/styles.css');
        </style>
    </head>
    <body class="bodies">
    <?php include 'inc/header.php'; ?>
          
        <!--We got Java script, we got jquery, we got AJAX.  What more does one need?! -->
        
        <?php
            //Creating a bunch of buttons.
            buttonGenesis();
        ?>
        
        <script>
            $('document').ready(function() {
                $('.webLink').click(function(){
                    $('#specModal').modal('show');
                    $.ajax({
                       type: "GET",
                       url: "api/spiderweb_api.php",
                       dataType: "json",
                       data: {'specName' : $(this).attr('id')},
                       success : function(data, status) {
                           //alert(data.name);
                            $('#specname').html(data.name);
                            $('#specweight').html("Weight in grams: " + data.weight);
                            $('#specmove').html("Special Move: " + data.special_move);
                            $('#specwins').html("Wins: " + data.wins);
    	                    $('#specimage').attr('src', "img/" + data.imageURL);
                       }
                    });
                });
            });
        </script>
      
         
           <!-- Modal Stuff -->
        <div class="modal fade" id="specModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="specname">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id='container'></div>
                        <div>
                            <img id="specimage" src=''>
                            <div id="specmove">Special Move:</div>
                            <div id="specweight">Weight:</div>
                            <div id="specwins">Wins:</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <div>
          <form>
                Search for Specimen: <input type='text' name='name'><br>
                Filter by Scientific: <select name='type'>
                                      <option value=""> Select One</option>
                                      <?php displayType(); ?>
                                      </select>
               Filter by Main Food: <select name='main'>
                                    <option value=""> Select One</option>
                                    <?php displayFood(); ?>
                                    </select>
               Filter by Special Move: <select name='move'>
                                    <option value=""> Select One</option>
                                    <?php displayMove(); ?>
                                    </select><br>
                Sort Wins <input type='radio' name='sorting' value='wins'><br>
                Sort by Science <input type='radio' name='sorting' value='science'><br>
                Sorty by Weight <input type='radio' name='sorting' value='weight'><br>
                <input type="submit" name='search' value="Filter Compendium"><br>
            </form>
        </div>
       <br><br><br>
      <?php include 'inc/footer.php'; ?>
    </body>
</html>