<!DOCTYPE html>
<?php
    session_start();
    include 'functions.php';
    include 'dbConnection.php';
    $dbConn = getDatabaseConnection("ottermart");
    validateSession();
    
    if (isset($_GET['addProduct'])) {
        $productName = $_GET['productName'];
        $description = $_GET['description'];
        $price = $_GET['price'];
        $catId = $_GET['catId'];
        $image = $_GET['productImage'];
        
        $sql = "INSERT INTO om_product (productName, productDescription, productImage, price, catId) 
                VALUES (:productName, :description, :productImage, :price, :catId)";
                
        $np = array();
        
        $np[':productName'] = $productName;
        $np[':description'] = $description;
        $np[':productImage'] = $image;
        $np[':price'] = $price;
        $np[':catId'] = $catId;
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($np);
        echo "New Product was added.";
    }
    
    

?>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h1> Add a New Product</h1>
        
        <form>
            Product Name: <input type='text' name='productName'><br>
            Description: <textarea name='description' cols='50' rows='4'></textarea><br>
            Price: <input type="text" name='price'><br>
            Category: 
            <select name='catId'>
                <option>Select One</option>
                <?php displayCategories(); ?>
            </select>
            Set Image URL: <input type='text' name='productImage'><br>
                           <input type='submit' name='addProduct' value='Add Product'><br>
        </form>

    </body>
</html>