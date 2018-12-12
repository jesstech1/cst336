<?php
    include '../dbConnection.php';
    $dbConn = startConnection("c9");
    
    $specName = $_GET['specName'];
    //echo "**** $specName";
    //$sql="SELECT * FROM BasicInfo WHERE name =
    
    $sql = "SELECT * FROM BasicInfo WHERE name LIKE :specName";
    
    $np = array();
    $np[':specName'] = $specName;
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //print_r($record);
    echo json_encode($record);
    
?>