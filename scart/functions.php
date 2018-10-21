
<?php
    
    function displayResults() {
        global $items; //the $items array we created in the index.
        echo "<table class='table'>";
        foreach($items as $item) {
            $itemName = $item['name'];
            $itemPrice = $item['salePrice'];
            $itemImage = $item['thumbnailImage'];
            $itemId = $item['itemId'];
            
            //Display item as tablerow.
            echo '<tr>';
            echo "<td><img src='$itemImage'></td>";
            echo "<td><h4>$itemName</h4></td>";
            echo "<td><h4>$$itemPrice</h4></td>";
            
            //A hidden input element containing the item name.
            echo "<form method='post'>";
            echo "<input type='hidden' name='itemName' value='$itemName'>";
            echo "<input type='hidden' name='itemPrice' value='$itemPrice'>";
            echo "<input type='hidden' name='itemImage' value='$itemImage'>";
            echo "<input type='hidden' name='itemId' value='$itemId'>";
            if ($_POST['itemId'] == $itemId) {
                echo "<td><button class='btn btn-success'>Added</button></td>";
            } else {
                echo "<td><button class='btn btn-warning'>Add</button></td>";
            }
            echo "</form>";
            echo "</tr>";
        }
        echo "</table>";
    }
    
    function displayCartCount() {
        echo count($_SESSION['cart']);
    }
    
    
?>