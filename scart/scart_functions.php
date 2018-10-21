<?php

function displayCart() {
        if (isset($_SESSION['cart'])) {
            echo "<table class='table'>";
            foreach($_SESSION['cart'] as $item) {
                $itemName = $item['name'];
                $itemPrice = $item['price'];
                $itemImage = $item['image'];
                $itemId = $item['id'];
                $itemQuant = $item['quantity'];
                // Display the item as a table row.
                echo "<tr>";
                echo "<td><img src='$itemImage'></td>";
                echo "<td><h4>$itemName</h4></td>";
                echo "<td><h4>$$itemPrice</h4></td>";
                //echo "<td><h4>$itemQuant</h4></td>";
                //Replacing static quantity display with this hidden form.
               
                echo "<form method ='post'>";
                echo "<input type='hidden' name='itemId' value='$itemId'>";
                echo "<td><input type='text' name='update' class='form-control' placeholder='$itemQuant'></td>";
                echo "<td><button class='btn btn-danger'>Update</button></td>";
                echo "</form>";
                //echo "</td>";
                // Hidden input element containing the item name.
                echo "<td>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='removeId' value='$itemId'";
                echo "<td><button class='btn btn-danger'>Remove</button></td>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
            //echo "HEYYY item quant = $itemQuant";
        }
        
        
}

function displayCartCount() {
        echo count($_SESSION['cart']);
}



?>