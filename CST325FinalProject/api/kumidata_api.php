<?php
    include '../dbConnection.php';
    $dbConn = startConnection("c9");
    
    //echo "**** $specName";
    //$sql="SELECT * FROM BasicInfo WHERE name =
    
    $sql = "SELECT * FROM Diet ORDER BY grans_consumed ASC";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($record);
    echo json_encode($record);
    
?>