<?php


function validateSession(){
    if (!isset($_SESSION['adminFullName'])) {
        header("Location: index.php");  //redirects users who haven't logged in 
        exit;
    }
}


function addTheScribe () {
        global $dbConn;
        if (isset($_GET['scribenm']) && isset($_GET['key'])){
            
            $username = ($_GET['scribenm']);
            $password = sha1(($_GET['key']));
            $sql = "INSERT INTO admin (adminID, adminUser, adminPassword) VALUES (null, :usr, :pass)";
            $noProblem = array();
            $noProblem[":usr"] = $username;
            $noProblem[":pass"] = $password;
            $stmt = $dbConn->prepare($sql);
            $stmt->execute($noProblem);
            //echo "A new scribe has joined the Society";
        }
        $_SESSION['boolio'] = 1;
    }
    
    function changeDiet () {
        global $dbConn;
        if ((isset($_GET['specimen']) && isset($_GET['diet'])) && (!(empty($_GET['specimen']) || empty($_GET['diet']))))   {
            $name = $_GET['specimen'];
            $diet = $_GET['diet'];
            //echo "$name and $diet";
            $sql = "UPDATE diet SET main = :diet WHERE name = :name";
            $np = array();
            $np[":name"] = $name;
            $np[":diet"] = $diet;
            $stmt = $dbConn->prepare($sql);
            $stmt->execute($np);
                return;
        } else if (!(isset($_GET['specimen']) && isset($_GET['diet'])) || ((empty($_GET['specimen']) || empty($_GET['diet']))) ){
            echo "Chicken is default.  Enter a specimen name.";
        }
        
    };
    
    function excommunicate () {
        global $dbConn;
        $nongrata = $_GET['scribenm'];
        $sql = "DELETE FROM admin WHERE adminUser = :noproblem";
        $noproblem = array();
        $noproblem[":noproblem"] = $nongrata;
        //An experiment;
        try {
            $stmt = $dbConn->prepare($sql);
            $stmt->execute($noproblem);
        } catch (Exception $e) {
            return;
        }
        $_SESSION['boolio'] = 0;
    }
    
    function getDiets () {
        global $dbConn;
        $sorting = $_GET['sorting'];
        if ($sorting == null) { 
            $sql = "SELECT * FROM diet NATURAL JOIN basicinfo";
        } 
        if ($sorting == "namu") {
            $sql = "SELECT * FROM diet NATURAL JOIN basicinfo ORDER BY name ASC";
        }
        if($sorting == "tDowns") {
             $sql = "SELECT * FROM diet NATURAL JOIN basicinfo ORDER BY mammal_takedowns ASC";
        }
        if ($sorting == "grams") {
            $sql = "SELECT * FROM diet NATURAL JOIN basicinfo ORDER BY grams_consumed DESC";
        }
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    
    function aggregate1 () {
        global $dbConn;
        $sql = "SELECT avg(grams_consumed) FROM diet NATURAL JOIN basicinfo WHERE scientific LIKE '%spider%'";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch();
        echo "<span style='color:#37D7D7'>Average Grams of Opponents Consumed by Spiders:</span>  <strong>" .$record['avg(grams_consumed)']. "</strong><br>";
    }
    
    function aggregate2 () {
        global $dbConn;
        $sql = "SELECT scientific, sum(mammal_takedowns) FROM diet NATURAL JOIN basicinfo GROUP BY scientific ORDER BY mammal_takedowns ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<span style='color:#37D7D7'>Mammal Takedowns by Scientific:</span> <br>";
        foreach($records as $rec) {
            echo $rec['scientific']. ": <strong>" .$rec['sum(mammal_takedowns)']. "</strong><br>"; 
        }
    }
    
    function aggregate3 () {
        global $dbConn;
        $sql = "SELECT name, wins FROM basicinfo ORDER BY wins DESC LIMIT 3";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<span style='color:#37D7D7'>Kumite Triumvirate:</span> <br>";
        echo "<span style='color:#37D7D7'>Specimen   -   Wins </span><br>";
        foreach($records as $rec) {
            echo $rec['name']. ": <strong>" .$rec['wins']. "</strong><br>"; 
        }
    }
    
    function aggregate4 () {
        global $dbConn;
        $sql = "SELECT special_move, count(special_move) FROM basicinfo GROUP BY special_move ORDER BY count(special_move) ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $trouble = getSizeofTable();
        echo "***** trouble is $trouble <br>";
        echo "<span style='color:#37D7D7'>Percentage of Special Moves used by Specimens:</span> <br>";
        foreach($records as $rec) {
            $x = 100/$trouble;
            $p = $rec['count(special_move)']*$x;
            echo $rec['special_move']. ": ".round($p, 2)."%<br>";
        }
    }
    
    function getSizeofTable () {
        global $dbConn;
        $sql = "SELECT count(*) from basicinfo";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record['count(*)'];
    }
    
    function displayType() {
        global $dbConn;
        $sql = "SELECT DISTINCT scientific FROM basicinfo ORDER BY scientific ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchALL(PDO::FETCH_ASSOC);
        //print_r($record);
        foreach($record as $rec) {
            echo "<option>" . $rec['scientific'] . "</option><br/>";
        }
    }
    
    function displayFood() {
        global $dbConn;
        $sql = "SELECT DISTINCT main FROM basicinfo NATURAL JOIN diet ORDER BY main ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchALL(PDO::FETCH_ASSOC);
        //print_r($record);
        foreach($record as $rec) {
            echo "<option>" . $rec['main'] . "</option><br/>";
        }
    }
    
    function displayMove() {
        global $dbConn;
        $sql = "SELECT DISTINCT special_move FROM basicinfo ORDER BY special_move ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchALL(PDO::FETCH_ASSOC);
        //print_r($record);
        foreach($record as $rec) {
            echo "<option>" . $rec['special_move'] . "</option><br/>";
        }
    }
    
    function getSpecimens() {
        global $dbConn;
        $sql;
        if (!isset($_GET['search'])) {
             $sql = "SELECT * FROM basicinfo WHERE 1 ";
        }
        
        if (!empty($_GET['search'])) {
            $move = $_GET['move'];
            $main = $_GET['main'];
            $science = $_GET['type'];
            $name = $_GET['name'];
            
            $sql = "SELECT * FROM basicinfo NATURAL JOIN diet WHERE 1 ";
            $np = array();
            
            if(!empty($_GET['name'])) {
                $sql .= " AND (name LIKE :name )";
                $np[':name'] = "%$name%";
            }
            if(!empty($_GET['type'])) {
                $sql .= " AND scientific = :type";
                $np[':type'] = $science;
            } 
            if(!empty($_GET['move'])) {
                $sql .= " AND special_move = :move";
                $np[':move'] = $move;
            }
             if(!empty($_GET['main'])) {
                $sql .= " AND main = :main";
                $np[':main'] = $main;
            }
            if(!empty($_GET['sorting']) && $_GET['sorting'] == "wins") {
                $sql .= " ORDER by wins ASC ";
                $np[':main'] = $main;
            }
            if(!empty($_GET['sorting']) && $_GET['sorting'] == "science") {
                $sql .= " ORDER by scientific ASC ";
                $np[':main'] = $main;
            }
            if(!empty($_GET['sorting']) && $_GET['sorting'] == "weight") {
                $sql .= " ORDER by weight ASC ";
                $np[':main'] = $main;
            }
        }
            $stmt = $dbConn->prepare($sql);
            $stmt->execute($np);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //echo json_encode($records);
            return $records;
            
    }

    function buttonGenesis() {
        $speci = getSpecimens();
        
        foreach($speci as $spec) {
            if ($spec['name'] == "Nyarlathotep") {
                continue;
            }
            echo "Name: ";
            echo "<a href='#' class='webLink' id='" .$spec['name']. "' >" .$spec['name']. "</a><br>"; 
            echo "Scientific Name: " .$spec['scientific']. "<br>";
            echo "<button id='".$spec['name']. "' type='button' class='btn btn-primary webLink'>Examine</button>";
            echo "<hr><br>";
        }
    }



?>