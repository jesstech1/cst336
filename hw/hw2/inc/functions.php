<?php
    session_start();
    $_SESSION["my_name"] = "Jesse";  //No noticeable effect.  I must be using it wrong.
    /*This is for the arrays homework.*/
       //$farray = array("g.jpg","k.jpg","s.jpg","o.jpg");
      //They have to be inside the functions.
    
    function displayFlower($rand1, $rand2, $rand3, $rand4) {
        echo "<div id='flower'>";
        for ($i = 1; $i < 5; $i++){
            $total += ${"rand" .$i};
        }
           if ($total == 12) {
            $flower = "j"; 
            //echo $flower;
            $flow = "Juliet Rose";
            $price = "$'15 Million' in USD.";
        } else if ($total >= 10 && $total <= 11) {
            $flower = "s";
            //echo $flower;
            $flow = "Shenzhen Nongke Orchid";
            $price = "$'290k' in USD.";
        } else if ($total >= 5 && $total <= 9) {
            $flower = "k";
            //echo $flower;
            //echo "TESSSSST";
            $flow = "Kinabalu Orchid";
            $price = "$'6k' in USD.";
        } else if ($total >= 0 && $total <=4) {
            //echo "$farray[3]";
            $flower = "g";
             $flow = "Gloriosa Lily";
            $price = "$'10' in USD.";
        }
        $j = 0;
        while ($j <= 6) {  /*This keeps the text from overlapping with the greek symbols.*/
            echo "<br/>";
            $j++;
        }
        $randArray = array($rand1,$rand2,$rand3,$rand4);
        echo "The simple code: ";
        echo implode(",",$randArray); echo "<br/>";
        echo "Genetic and Alchemic totals from greek glyphs (You want a 12): $total <br/>";
        echo "Calculating bonus magics: ";
        $bonus = caclculateBonusMagics($bonus,$rand4);
        $total += $bonus;
        echo "New Total: $total <br/>";
        if ($total >= 12) {  /*I could not separate this concern easily.  It would take an entire rewrite.  I need reconsider my approach in the future.*/
            $flower = "j"; 
            //echo $flower;
            $flow = "Juliet Rose";
            $price = "$'15 Million' in USD.";
        } else if ($total >= 10 && $total <= 11) {
            $flower = "s";
            //echo $flower;
            $flow = "Shenzhen Nongke Orchid";
            $price = "$'290k' in USD.";
        } else if ($total >= 5 && $total <= 9) {
            $flower = "k";
            //echo $flower;
            //echo "TESSSSST";
            $flow = "Kinabalu Orchid";
            $price = "$'6k' in USD.";
        } else if ($total >= 0 && $total <=4) {
            //echo "$farray[3]";
            $flower = "g";
             $flow = "Gloriosa Lily";
            $price = "$'10' in USD.";
        }
        //echo "  $rand1, $rand2, $rand3, $rand4  "; echo "<br/>";
        echo "<br/>";
        echo "<img src='img/flower/$flower.jpg' alt='A $flow.' title ='The elegant $flow, breath taking ...'/>";
        echo "<br/><br/>";
        echo "Through alchemy you have created the $flow. <br/>";
        echo "It is worth $price Have fun selling it!";
        echo "</div>";
    }
    function displayGreek($pos) {
        echo "<div id='greek'>";
        /*The simple code doesn't work unless you use these values.*/
        switch($rand) {
            case 0: $symbol = "a";
                break;
            case 1: $symbol = "b";
                break;
            case 2: $symbol = "e";
                break;
            case 3: $symbol = "o";
            }
        $garray = array("a","b","e","o");
        shuffle($garray);
        $gareek = $garray[0];  // It could be anything really ...  I couldn't find a creative of efficient way to do this.
        echo "<img id='greek$pos'src='img/greek/$gareek.jpg' alt='The greek letter for $gareek' title='The greek letter for $gareek' />";
        echo "</div>";
    }
    function caclculateBonusMagics ($bonus, $rand4) {
        $randMagic = rand(1,10);
        if($randMagic >= 8) {
            echo "Fate has awarded you a rare bonus. <br/>";
            echo "Without this bonus, it could be years <br/>";
            echo " before you see the most expensive flower. <br/>";
            echo "Fate Bonus: 1 <br/>";
            $bonus +=1;
        } else {
            echo "Fate has turned its back on you, but perhaps karma is generous. <br/>";
            $i = 0;
            do {
                $r = rand(0,2);
                $r2 = rand(0,2);
                if (($r*$r2)/2 == 0 ) {
                    echo "Karma has smiled, by living a good life <br/>";
                    echo "you have increased your chance of seeing the most expensive flower. <br/>";
                    echo "Karma Bonus: 2 <br/>";
                    $bonus += 2; 
                    break;
                } else {
                    echo "We just checked, and Karma doesn't like you either. <br/>"; 
                    echo "It's ok though.  You can keep trying.";
                }
                $i++;
            }while ($i < 2);
        }
        return $bonus;
    }
    function initiate() {
        for ($i = 1; $i < 5; $i++) {
            ${"rand" .$i} = rand(0,3);
            displayGreek($i);
        }
        displayFlower($rand1,$rand2,$rand3,$rand4);
    }
?>