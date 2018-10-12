<?php
//check if values are entered in the input cell and assign values to 
//variables $number1 and $number2; assign to variable $sign the value 
//of mathematical operation from drop-down menu
     
    if (isset($_POST['number1']) && isset($_POST['number2']))
    {
        $number1 = $_POST['number1'];        
        $number2 = $_POST['number2']; 
        $sign = $_POST['signs'];        
        
    }
    else
    {
        $number1 = "";
        $number2 = "";
        $sign = "";
    }           
?>

<html>    
    
    <!--self-posting page using POST method-->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2>Welcome to calculator app!<br><br></h2>
        Please enter value #1<br><br>
        <!--sticky value of numbers - keep their values after input in the cell-->
        <input type="text" name="number1" value="<?php echo $number1; ?>">
        <br><br>
         Please enter value #2<br><br>
        <input type="text" name="number2" value="<?php echo $number2; ?>">       
        <br><br>
        <!--drop-down menu - choice of mathematical operation-->
        <!--sticky drop-down menu-->
        <select name="signs"> 
            <option value="choice" disabled selected>  </option>
            <option value="plus" <?php if($sign == "plus") echo 'selected'?>> + </option>
            <option value="minus" <?php if($sign == "minus") echo 'selected'?>> - </option>
            <option value="mult" <?php if($sign == "mult") echo 'selected'?>> * </option>
            <option value="div" <?php if($sign == "div") echo 'selected'?>> / </option>
        </select>
        <input type="submit" value="ENTER">
    </form>
</html>
 
<!--Here described actions that will be taken after form submitted using POST method-->
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $validator=True;
    //defining variables whose initial values will never be displayed
    $operation="undefined"; 
    $result="??";
    //validation if the vlaues of the input are numeric. 
    //Raising an error if at least one value is not numeric
        if (!is_numeric($number1) || !is_numeric($number2))
        {
            echo "<h3><font color='red'> Input two numeric values!! </font></h3>";
            $validator=False;
        } elseif ($validator==True)
    {       
    //choice of mathematical operation based on drop-down menu value
    //variables $result and $operation contain result of math operation
    //and its name, correspondingly            
               
        if ($sign=="plus") {
            $result=$number1+$number2;
            $operation="addition";
        }            
        elseif ($sign=="minus"){
            $result=$number1-$number2;
            $operation="subtraction";
        }
        elseif ($sign=="mult"){
            $result=$number1*$number2;
            $operation="multiplication";
        }
        elseif ($sign=="div" && $number2!=0){
            $result=number_format($number1/$number2,2);//Show a number to 2 decimal places
            $operation="division";
        }  
        
        $display="The result of mathematical $operation is $result";
        
        //raising an error on division by zero
        if (($sign=="div" && $number2==0)){          
            $display="<font color='red'> Error: Division by zero is forbidden! </font>";
        }//check wheather math operation is chosen at all
        elseif ($sign==""){
            $display="<font color='red'> Choose math operation! </font>";
        }
        
        echo "<h3>$display</h3>";
    }
}
?>

