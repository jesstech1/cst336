<?php
    include 'dbConnection.php';
    $dbConn = getDatabaseConnection("c9");
    function getAllPets() {
        global $dbConn;
        /*include "dbConnection.php";
        $dbConn = getDatabaseConnection("c9");*/
        $sql = "Select * FROM pets ORDER BY name ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        //print_r($records);
        return $records;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
            body {
                text-align: center;
            }
        </style>
   
    </head>
    <body>
	<!--Add main menu here -->
	<?php include 'inc/header.php'; ?>
	
	
	<script>
	    $('document').ready(function() {
	        $('.petLink').click(function() {
	            $('#container').html("<img src='img/loading.gif' />");
	            $('#petModal').modal('show');
	            $.ajax({
	                type: "GET",
	                url: "api/getPetInfo.php",
	                dataType: "json",
	                data: {'petid' : $(this).attr('id')},
	                success : function (data, status) {
	                    //This only gets the info, it doesn't display it.
	                    //alert(data.name);
	                    //Uisng jquery to access the h1 placeholder we placed at the bottom.
	                    //data is the record we got from the api in json form
	                    //data is the record and we use .name  to get the column name or
	                    //key name.
	                    $('#petname').html(data.name);
	                    $('#petdescription').html(data.description);
	                    $('#petimage').attr('src', "img/" + data.pictureURL);
	                    $("#container").html("");
	                    
	                }
	                /*complete: function(data,status){
	                    alert(status);
	                }*/
	            });//closing ajax
	            //alert($(this).attr('id'));
	        });
	    });
	</script>
    <?php
        $pets = getAllPets();
        /*foreach($pets as $pet) {
            echo "<ul><li>Name: " ."<a href='#' class='petLink' id = '" .$pet['id']. "'>" .$pet['name']. "</a></li>"; 
            echo "Type: ". $pet['type'] . "</li></ul>";
        }*/
        foreach($pets as $pet) {
            echo "Name: ";
            echo "<a href='#' class='petLink' id='" .$pet['id']. "' >" .$pet['name']. "</a><br>"; 
            echo "Type: " .$pet['type']. "<br>";
            echo "<button id='" .$pet['id']. "' type='button' class='btn btn-primary petLink'>Adopt Me!</button>";
            echo "<hr><br>";
        }
    ?>


<!-- Modal -->
<div class="modal fade" id="petModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="petname">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id='container'></div>
            <div>
                <img id="petimage" src=''>
                <div id="petdescription">Description:</div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <?php include 'inc/footer.php'; ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>        
</body>



</html>


































