<?php
    session_start();
    include 'dbConnection.php';
    $dbConn = getDatabaseConnection("ottermart");
    include 'functions.php';
    validateSession();
    
      
            $productInfo = getProdInfo($_GET['productId']);
        
    
    //print_r($productInfo);
    
    if (isset($_GET['updateProduct'])) {
        $productName = $_GET['productName'];
        $description = $_GET['description'];
        $price = $_GET['price'];
        $catId = $_GET['catId'];
        $image = $_GET['productImage'];
        
        $sql = "UPDATE om_product SET productName = :productName, productDescription = :description, 
                productImage = :productImage , price = :price, 
                catId = :catId
                WHERE productId = ". $_GET['productId'];
        //echo "HEYYY $productName";
        $np = array();
        
        $np[':productName'] = $productName;
        $np[':description'] = $description;
        $np[':productImage'] = $image;
        $np[':price'] = $price;
        $np[':catId'] = $catId;
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($np);
        echo "Product was updated.";
    }
    
?>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h1> Update a Product</h1>
        
        <form>
            <input type='hidden' name='productId' value='<?=$productInfo[0]['productId']?>'>
            Product Name: <input type='text' name='productName' value='<?=$productInfo[0]['productName']?>'><br>
            Description: <textarea name='description' cols='50' rows='4'><?=$productInfo[0]['productDescription']?></textarea><br>
            Price: <input type="text" name='price' value='<?=$productInfo[0]['price']?>'><br>
            Category: 
            <select name='catId'>
                <option>Select One</option>
                <?php displayCatIds(); ?>
            </select>
            Set Image URL: <input type='text' name='productImage'><br>
                           <input type='submit' name='updateProduct' value='Update Product'><br>
        </form>
    </body>
</html>
