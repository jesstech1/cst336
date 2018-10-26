<?php
    function filterProducts () {
        
        global $dbConn;
        if (isset($_GET['searchForm'])) {
            echo "<h3>Products Found</h3>";
            $product = $_GET['productName'];
            $categoryId = $_GET['category'];
            $priceFrom = $_GET['priceFrom'];
            $priceTo = $_GET['priceTo'];
                        //Vulnerable to $sql injection.
                        //$sql = "SELECT * FROM om_product 
                                //WHERE productName LIKE '%$product%'";
                        //NOW: Use named parameters.  :product is a placeholder to prevent sql injection.
            $namedParameters = array();
            $sql = "SELECT * FROM om_product WHERE 1 ";
            
            if(!empty($_GET['productName'])) {
                $sql .= " AND productName LIKE :product";
                $namedParameters[':product'] = "%$product%";
            }
            if(!empty($_GET['category'])) {
                $sql .= " AND catId = :categoryId";
                $namedParameters[':categoryId'] = "%$categoryId%";
            }
            if(!empty($_GET['priceFrom'])) {
                $sql .= " AND price >= :priceFrom";
                $namedParameters[':priceFrom'] = "%$priceFrom%";
            }
            if(!empty($_GET['priceTo'])) {
                $sql .= " AND price <= :priceTo";
                $namedParameters[':priceTo'] = "%$priceTo%";
            }
            if(isset($_GET['orderBy'])) {
                if($_GET['orderBy'] == "price") {
                    $sql .= " ORDER BY price";
                } else {
                    $sql .= " ORDER BY productName";
                }
            }
            
            echo "THE SQL STATEMENT IS $sql"; echo "<br/>";
            $stmt = $dbConn->prepare($sql);
            $stmt->execute($namedParameters);
            $record = $stmt->fetchALL(PDO::FETCH_ASSOC);
            //print_r($record);
            foreach($record as $rec) {
                echo "<a href=\"purchaseHistory.php?productId=". $rec['productId'] . "\"> History </a>";
                echo $rec['productName'] . " " . $rec['productDecription'] . " " . $rec['price'] .  "<br/>";
            }
        }
    }
    
    //This just fills the category dropdown
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
?>