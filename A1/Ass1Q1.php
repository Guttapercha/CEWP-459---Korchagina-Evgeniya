<?php

// defining constants with corresponding colors
define("even", "<font color='green'> even </font>");
define("odd", "<font color='red'> odd </font>");
define("newline", "<br>");

$i=1;       

// loop printing out 10 random values with corrsponding constants

while ($i<=10) {                       
    
    $a=rand(0,100);                   // choose random integer in range (0,100)
    
    if ($a % 2 == 0) {
        echo "$a: " . even . newline;// print out green "even" and go to a new line
    } else {
        echo "$a: " . odd . newline;// print out red "odd" and go to a new line
    }
    $i++;
}

