<?php
///////////////////GIVEN////////////////////////////////////////////////////
//initial array
$students = array("1234567" => array("FName" => "Brendan", "LName" => "Wood", "GPA" => 3.4),
                  "2345678" => array("FName" => "Nathalie", "LName" => "Smith", "GPA" => 3.34),     
                  "8456789" => array("FName" => "John", "LName" => "Doe", "GPA" => 2.7),     
                  "4567890" => array("FName" => "Sammy", "LName" => "Singh", "GPA" => 3.7),     
                  "5678901" => array("FName" => "Sarah", "LName" => "Dubois", "GPA" => 3.5),     
                  "6789012" => array("FName" => "Emma", "LName" => "Smith", "GPA" => 4.0));
////////////////////////////////////////////////////////////////////////////



//////////////SORTING///////////////////////////////////////////////////////////
//creating two new (INDEXED!! with labeled values) arrays for further sorting 
//using usort (as was requested at the begining by the task)
$students_ID = array();
$students_GPA = array();

foreach ($students as $key=>$item)
{    
  array_push($students_ID, array('ID' => $key, 'info' => $item));
  array_push($students_GPA, array('ID' => $key, 'info' => $item));
}

//user-defined sorting procedure (by ID)
usort($students_ID, "fcn_sort_by_id");

function fcn_sort_by_id($a, $b)
{
    return $a['ID'] <=> $b['ID'];
}
//user-defined sorting procedure (by GPA)
usort($students_GPA, "fcn_sort_by_gpa");

function fcn_sort_by_gpa($a, $b)
{
    return $a['info']['GPA'] <=> $b['info']['GPA'];
}
////////////////////////////////////////////////////////////////////////



////////////////FRAMING THE RESULT/////////////////////////////////////////
//extracting from sorted arrays exact info stored in the initial arrays
$students_ID_sorted = array();
$students_GPA_sorted = array();

foreach ($students_ID as $key=>$item)
{
        $students_ID_sorted += array ($item['ID'] => $item['info']);
}
foreach ($students_GPA as $key=>$item)
{
        $students_GPA_sorted += array ($item['ID'] => $item['info']);
}

//creating a function that displays a student array in a formatted table

function display_student_results($array, $heading){    
    
    //table//
    echo "<h2 style="."margin-bottom: 0px".">".$heading."</h2><br><br>
        <table border="."1".">

            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>GPA</th>
            </tr>";
    
            foreach ($array as $key=>$item)
            {
                echo "<tr>
                <td>$key</td>
                <td>".$item['FName']."</td>
                <td>".$item['LName']."</td>
                <td>".$item['GPA']."</td>
            </tr>";
            }  echo "</table><br>";     
            }     
    
//////////////////////////////////////////////////////////////////////////

//////////////DISPLAYING RESULTS/////////////
display_student_results($students, "Original Array");
display_student_results($students_ID_sorted, "Array Sorted by ID");
display_student_results($students_GPA_sorted, "Array Sorted by GPA");