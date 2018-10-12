<?php

$sourceText = "This is your input string"; 
echo "Initial string is: \"$sourceText\" <br><br>"; //printing out initial string
$sourceText_length=strlen($sourceText);             //calculating the length of initial string

// Option 1: using SUBSTR along with STRLEN

echo "Option 1: <br>";
echo "\"";
for ($i=$sourceText_length-1; $i>=0; $i--)
{
    echo substr($sourceText,$i,1); 
}
echo "\"";  
        
// Option 2: using the character byte reference
echo "<br><br>Option 2: <br>";
$sourceText_reverse="";
for ($i=$sourceText_length-1; $i>=0; $i--)
{
    $sourceText_reverse=$sourceText_reverse.$sourceText[$i];
}
echo "\"".$sourceText_reverse."\""; 
