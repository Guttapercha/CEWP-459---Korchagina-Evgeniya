<html>  
<head>     
<title>Multiplication table in PHP</title>  

<!--  inline CSS--> 	
<style type="text/css">        
	body {
                font-size: 12px; 
                font-family: Helvetica; }               
	td {    height: 24px;             		
		text-align: center;               
		width: 24px;
                background-color: lightblue;
                color: darkblue;}
	td a {  display: block;             
		text-decoration: none;}
	td a:hover {background-color: #faa;} 
</style> 

</head> 
 
<body>     
<table border="1"> <!--  Add borders around the table cells-->
    
<?php   

$Rows = 10; //number for Rows
$Cols = 10; //number for Colsumns

for($i=1;$i<=$Rows;$i++)
{ 
    echo "<tr>";
    for($j=1;$j<=$Cols;$j++)
    { 
        //creating link with numbers and title 
        echo "<td><a title="."$i"."&nbsp;x&nbsp;"."$j"."&nbsp;=&nbsp;".$i*$j.">".$i*$j."</a></td>";       
    }
  echo "</tr>";
}        
?>     
</table> 
</body> 
 
</html>