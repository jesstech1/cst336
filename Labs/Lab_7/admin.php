<!DOCTYPE html>
<?php
    
    session_start();
    include 'dbConnection.php';
    $dbConn = getDatabaseConnection("ottermart");
    include 'functions.php';
    validateSession();

?>
<html>
    <head>
        <title>Admin Main Page</title>
        <style>
        form {
            display: inline-block;
        }
    </style>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <script>
            function confirmDelete() {
                //alert("really??");
                 return confirm("really??");
             }
            // function openModal() {
                
            //     $('#myModal').modal("show");
            // }
        </script>
    </head>
    
    <body>
        <h1>ADMIN SECION - OTTERMART</h1>
        <h3>Welcome  <?= $_SESSION['adminFullName'] ?></h3>
        
        <br><br>
        <form action='addProduct.php'>
            <input type='submit' value='addProd'/>
        </form>
        <form action="logout.php">
            <input type="submit" value="Logout">
        </form>
        <br><br>
        <?= displayAllProducts(); ?>
        
        <!-- Button trigger modal -->
        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">-->
        <!--  Launch demo modal-->
        <!--</button>-->
        
        <!-- Modal -->
        <!--<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">-->
        <!--  <div class="modal-dialog modal-dialog-centered" role="document">-->
        <!--    <div class="modal-content">-->
        <!--      <div class="modal-header">-->
        <!--        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>-->
        <!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
        <!--          <span aria-hidden="true">&times;</span>-->
        <!--        </button>-->
        <!--      </div>-->
        <!--      <div class="modal-body">-->
        <!--        ...-->
        <!--      </div>-->
        <!--      <div class="modal-footer">-->
        <!--        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        <!--        <button type="button" class="btn btn-primary">Save changes</button>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.css"></script>
    </body>
</html>