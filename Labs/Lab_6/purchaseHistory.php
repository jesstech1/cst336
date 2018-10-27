<?php

    include '../../inc/dbConnection.php';
    
    $dbConn = startConnection("ottermart");
    
    $productId = $_GET['productId'];
    
    $sql = "SELECT * FROM om_product
            NATURAL JOIN om_purchase  
            WHERE productId = :pId";  //Using named parameters to avoid sql injection
                                      //the natural join gives us purchase information too.
    $np = array();
    
    $np[":pId"] = $productId;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    echo $record[0]['productName'] . "<br/>";
    if (empty($record[0]['purchaseDate'])) {
        echo "No purchase info.";
        
    } else {
        echo "<img src='" .$record[0]['productImage'] . "' width='200'/><br/>"; 
        
        foreach($record as $rec) {
            echo "Purchase Date: " . $rec['purchaseDate'] . "<br/>";
            echo "Unit Price: " . $rec['unitPrice'] . "<br/>";
            echo "Quantity: " . $rec['quantity'] . "<br/>";
        }
    }
    
?>