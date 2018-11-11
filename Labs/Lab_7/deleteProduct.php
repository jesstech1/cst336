<?php
    session_start();
    include 'dbConnection.php';
    $dbConn = getDatabaseConnection("ottermart");
    include 'functions.php';
    validateSession();
    
    
    $sql = "DELETE FROM om_product WHERE productId = " . $_GET['productId'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();

    header("Location: admin.php");
?>