<?php 
    session_start();    
    
    
    include 'dbConnection.php';
    $dbConn = startConnection();
    
    $username = $_GET['username'];
    $password = sha1($_GET['password']);
    
    $sql = "SELECT * FROM admin
                 WHERE adminUser = :username 
                 AND  adminPassword = :password ";                 
    $np = array();
    $np[':username'] = $username;
    $np[':password'] = $password;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (empty($record)) {
        echo "<div class='jumbotron'>";
        echo "<h1> Arachnid Kumite Society</h1>";
        echo "<h2>INCORRECT PASSWORD!  ACCESS TO KUMIDATA DENIED!</h2>";
        echo "</div>";
    } else {
       $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
       header('Location: kumidata.php'); //redirects to another program
    }
?>



  
  
