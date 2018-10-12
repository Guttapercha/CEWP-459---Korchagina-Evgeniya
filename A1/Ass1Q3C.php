<?php

// Question 3C: To detect when 3 heads or tails appears in a row 
// while coin flipping

define("head", "H");
define("tail", "T");

// loop allows max 20 toss flipping
$coin="";
$i=0;
while ($i<=19) {                       
    
    $coin_bin=rand(0,1);                   // choose random number 0 or 1
    // assigning 0 to head and 1 to tail
    if ($coin_bin==0)
        $coin=$coin.head;
    else $coin=$coin.tail;
        
    if ($i>=2)
    {
        if ($coin[$i]==$coin[$i-1] & $coin[$i-1]==$coin[$i-2])
        {
            if ($coin[$i]==head)
                $side="heads";
            else $side="tails";
            $i++;
            break;
        }
    }
    $i++;
}
echo "$coin<br>";
echo "It took $i roles to achieve 3 $side in a row";
?>
