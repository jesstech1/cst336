<?php
    include '../dbConnection.php';
    $dbConn = getDatabaseConnection("c9");
    
    //We didn;t need this, we didn;thave double quotes.
   /* $sql = "SELECT * FROM pets WHERE id = :petid";
    
    $np = array();
    $np[':petid'] = $petid;*/
    //We're just concatenating with the get method so no named paramter is needed.
    $sql="SELECT * FROM pets WHERE id = " . $_GET['petid'];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //print_r($record);
    echo json_encode($record);
    
    ?>
    