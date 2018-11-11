<?php 
    session_start();
    include 'dbConnection.php';
    $dbConn = getDatabaseConnection("ottermart");
    include 'functions.php';
    

    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    $sql = "SELECT * FROM om_admin
                     WHERE username = :username
                     AND password = :password";
    $np = array();
    $np[':username'] = $username;
    $np[':password'] = $password;
    
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //print_r($records);
    
    if (empty($record)) {
        echo "Wrong username or password!!";
    } else {
        $_SESSION['adminFullName'] = $record['firstName'] . " " .$record['lastName'];
        header('Location:  admin.php');
    }
    
    
    

?>