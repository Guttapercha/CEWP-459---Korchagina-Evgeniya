<?php

// Attach common DB Class
require_once 'DBClass.php';

// Instantiate a new db class.
$db = new DBClass();

//Verify if connected

 if ($db->isConnected())
 {
     $result = $db->GetContacts();
     
     $html = "<table class='table table-striped'><tr><th>ID</th><th>Name</th><th>Phone</th><th>ACTION</th></tr>";

    foreach ($result as $row) {
        if ($row['active']==='Y')
        {
            $html .= "<tr>";
            $html .= "<td>" . $row['id'] . "</td>";
            $html .= "<td><input class='form-control' id= 'name" . $row['id'] . "' type='text' value='" . $row['name'] . "'></td>";
            $html .= "<td><input class='form-control phonemask' id= 'phone" . $row['id'] . "' type='text' value='" . $row['phone'] . "'></td>";

            $html .= "<td>" .
            "<a class='btn btn-primary' href = '#' onclick='updateContact(" . $row['id'] . ")'>Update</a> " .
            "<a class='btn btn-danger' href='#'  onclick='deleteContact(" . $row['id'] . ")'>Delete</a></td>";

            $html .= "</tr>";
        }

    }

    $html .= "</table>";

    echo $html;
 }
