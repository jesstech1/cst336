<?php
    //include "../../inc/dbConnection.php";
    include "inc/functions.php";
    include '../../inc/dbConnection.php';
    $dbConn = startConnection('ottermart');
    //Creating a database connection
    //$host = "localhost";
    //$dbname = "ottermart";
    //$username = "root";
    //$password = "";
    //$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //$dbConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //SELECT * FROM `om_product` order by productId
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6 Ottermart Product Search</title>
        <style>@import url("css/styles.css");</style>
    </head>
    <body>
        <div>
        <h1> Ottermart </h1>
        <h2> Product Search </h2>
        <form>
            Product: <input type='text' name="productName" placeholder="Product Keyword" /><br/>
            
            <?php
                /*
                $sql = "SELECT productName FROM om_product 
                            WHERE productName LIKE '%$product%'
                            OR productDescription LIKE '%$product%'";
                */
                
                
            ?>
            Category: 
            <select name='category'>
                 <option value="">Select One</option>   
                 <?=displayCategories()?>
            </select><br/>
            Price: From <input type='text' name='priceFrom' /> To <input type='text' name='priceTo' /><br/>
            Order result by:<br/>
            <input type='radio' name='orderBy' value='price'/> Price
            <br/>
            <input type='radio' name='orderBy' value='productName' /> Name
            <br/>
            <input type='submit' name='searchForm' value='Search'/>
        </form>
        </div>
        <?=filterProducts()?>
    </body>
</html>