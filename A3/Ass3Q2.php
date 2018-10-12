<?php

////////////////////CLASS STUDENT///////////////////////////////////

//class Student storing a student with their ID, FName. LName and GPA.  
//class contains a constructor for all four values, 
//and corresponding getter methodse getters for each of the four variables.

class Student
{
    private $ID;
    private $FName;
    private $LName;
    private $GPA;
    
    function __construct($ID, $FName, $LName, $GPA) {
        $this->ID = $ID;
        $this->FName = $FName;
        $this->LName = $LName;
        $this->GPA = $GPA;
    }
    
    function getID() {
        return $this->ID;
    }

    function getFName() {
        return $this->FName;
    }

    function getLName() {
        return $this->LName;
    }

    function getGPA() {
        return $this->GPA;
    }    
    
    function __toString() {
        return "$this->GPA";
    }
}
/////////////////CLASS STUDENTS//////////////////////

class Students
{
    private $list_of_students = array();
    
    ////////////////
    public function AddStudent(Student $s)
    {
        array_push($this->list_of_students, $s);
    }
    //////////////
    public function SortMe()
    {
        usort($this->list_of_students, "fcn_sort_by_gpa");
    }
    ////////////////
    function __toString()
    {
        $returnVal ="<table border="."1".">

            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>GPA</th>
            </tr>";        
        
            foreach ($this->list_of_students as $student)
            {
                $returnVal .= "<tr>";
                $returnVal .= "<td>".$student->getID()."</td>
                <td>".ucfirst($student->getFName())."</td>
                <td>".ucfirst($student->getLName())."</td>
                <td>".$student->getGPA()."</td>";
                $returnVal .= "</tr>";
            }
            $returnVal .="</table><br>";
        
        return "$returnVal";
    }
 
}

///////////////////////////////////////////
///////////////////////////////////////////
//////////////////////////////////////////
//function sorting by GPA

function fcn_sort_by_gpa($a, $b)
{
    return $a->getGPA() <=> $b->getGPA();
}

//header function
function echoTitle($str)
{
    echo "<h2>$str</h2>";
}

//Create 6 Student objects
$student_1 = new Student(1234567, "Brendan", "Wood", 3.4);
$student_2 = new Student(2345678, "Nathalie", "Smith", 3.34);
$student_3 = new Student(3456789, "John", "Doe", 2.7);
$student_4 = new Student(4567890, "Sammy", "Singh", 3.7);
$student_5 = new Student(5678901, "Sarah", "Dubois", 3.5);
$student_6 = new Student(6789012, "Emma", "Smith", 4);


// collection object $students of type Students
$students = new Students();
$students->AddStudent($student_1);
$students->AddStudent($student_2);
$students->AddStudent($student_3);
$students->AddStudent($student_4);
$students->AddStudent($student_5);
$students->AddStudent($student_6);

// display “Original OO Student List”
echoTitle("Original OO Students List");

//Display the original $student_list
echo $students;

//cloning and sorting new list of students
$students_2 = clone $students;
$students_2->SortMe();

// display “Original OO Student List”
echoTitle("Sorted OO Students List By GPA");


//Display the original $student_list
echo $students_2;