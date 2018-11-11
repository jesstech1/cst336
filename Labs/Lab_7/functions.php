<?php


    function validateSession() {
        if(!isset($_SESSION['adminFullName'])) {
            header("Location: index.php");
            exit;
        }
    }


    function displayAllProducts() {
        global $dbConn;
        
        $sql = "SELECT * FROM om_product ORDER BY productName";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            echo "[<a href='updateProduct.php?productId=" . $record['productId'] . "'>Update</a>]";
            echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
            echo "<input type='hidden' name='productId' value='". $record['productId']. "'>";
            echo "<button type='submit'>Delete</button>";
            echo "</form>";
            
            echo $record['productName'] . " " . $record['price'] . "<br><br>";
        
        }
    }
    
    function getProdInfo ($var) {
        global $dbConn;
        $prodId = $var;
         $sql = "SELECT * FROM om_product WHERE productId = :prodId";
         $np =array ();
         $np[':prodId'] = $prodId;
         
         $stmt = $dbConn->prepare($sql);
         $stmt->execute($np);
         $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
         //print_r($record);
         return $record;
        
    }
    
    function displayCategories() {
        global $dbConn;
        $sql = "SELECT * FROM om_category ORDER BY catName DESC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchALL(PDO::FETCH_ASSOC);
        //print_r($record);
        
        //catDescription catName catId
        foreach($record as $rec) {
        
            echo "<option>" . $rec['catName'] . "</option><br/>";
        }
    }
    
     function displayCatIds() {
        for($i = 1; $i <= 7; $i++) {
            echo "<option>$i</option><br/>";
        }
    }


?>