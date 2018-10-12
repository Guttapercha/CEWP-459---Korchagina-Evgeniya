<?php

session_start();
$id=session_id();//get session ID
$visits=0;
?>

<html><head></head>
    <body>
        <h2>Welcome to my page!</h2>
        <!--random generating request method-->
        <form method="<?=(rand(0,1)==0)? "get": "post";?>" action="<?php echo $_SERVER["PHP_SELF"];?>">
         <br>    
         <input type='text' name='your first name' placeholder="Enter your first name">
         <br>    <br>
        <input type='text' name='your last name' placeholder="Enter your last name">
         <br>    <br>
         <input type='submit' name="submit" value="Get page info">
        </form>        
    </body>
</html>

<?php

if (isset($_REQUEST['submit']))
{
    //determine request method
    $method = $_SERVER['REQUEST_METHOD'];
    
    //count # of visits of web page via pressing "submit" button
    if (isset($_COOKIE['counter'])){
        $visits = $_COOKIE['counter'];
        $counter=$_COOKIE['counter']++;
        $counter=$counter+1;
        setcookie("counter", $counter);     
    } 
        else
    {   setcookie('counter', 1);
        $visits = 1;
    }      
    
        
}
////to see pattern of server set language in order to process it
//$l=$_SERVER['HTTP_ACCEPT_LANGUAGE'];
//echo "Pattern of language recorde $l";

//get an array of strings with comma delimiter
$user_pref_langs = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);

//get the first element of an array which is the most preferred user's language
$lang=$user_pref_langs[0];

if (isset($method) && $visits != 0)
            { 
            echo "$method Values <br><br>
        <table border="."1".">
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>id</td>
                <td>$id</td>
            </tr>
            <tr>
                <td>lang</td>
                <td>$lang</td>
            </tr>
            <tr>
                <td>counter</td>
                <td>$visits</td>
            </tr>";
            
            //adding users values into the table
            foreach ($_REQUEST as $key => $value) {
            if ($key!='submit'){
                echo "<tr>
                <td>$key</td>
                <td>";
                $value=(!empty($value) && isset($value))? $value: 'value is not set';
                echo "$value</td>
            </tr>";
            }
            }
        echo "</table>";
        }  
        
?>

