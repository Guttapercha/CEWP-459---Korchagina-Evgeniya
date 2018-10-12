<?php

// Question 3A: To print out prime numbers from 1 to 100

for ($i=2; $i<=100; $i++)
{
    for ($j=$i-1; $j>=1; $j--)
    {
        if ($i%$j==0 & $i!=2)
        {
            echo "Value $i is not prime <br>";
            break;
        } 
        elseif ($i%$j!=0 & $j!=2)
        {
            continue;
        }
        else
        {
            echo "Value $i is prime <br>";
            break;
        }        
    }
}
?>


