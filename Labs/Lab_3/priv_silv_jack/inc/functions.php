<?php
    $deck = array();
    $card = array();
    $players = array("Shuyan","Elijah","Francisco","Jesse");
    //print_r($players);

    function buildDeck() {
        global $deck;
        for ($i = 0; $i < 13; $i++) {
                array_push($deck, array("clubs",  $i + 1));
                array_push($deck, array("diamonds",  $i + 1));
                array_push($deck, array("hearts",  $i + 1));
                array_push($deck, array("spades",  $i + 1));
        }
        //print_r($deck);
    }
    
    function retrieveCard() {
        global $deck;
        global $card;
        $card =  array_pop($deck);
        //echo "***$card[0]***$card[1]***";
    }
    
    
    function dealCards() {  //display cards and track total.
    global $card;
    global $players;
    $total = 0;
    $nerve = rand(0, 15);  //$nerve is a stat that measures how brave our players are at any given time.  
    //print_r($players);
    $temp = array_pop($players);
    
     echo "<div id='hand'>";
     echo "<img src='img/players/$temp.png'/>";
        while($total < 29 + $nerve) {
            retrieveCard();
            
            echo "<img src='img/cards/$card[0]/$card[1].png'/>";
           
            $total += $card[1];
        }
        if ($total <= 42) {
            echo "Player has $total points! ";
        } else if ($total > 42) {
            echo "Defeat ... lose ... $total, THAT'S TOO MUCH!!!";
        }
        echo "</div>";
        echo "<br/><br/><br/><br/><br/><br/><br/>";
        
    }
?>