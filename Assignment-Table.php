<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css"  href="wp.css">
<title>Wedgewood Pacific Corporation</title>
</head>
<body>

<?php
include("header.php");
// Establish connection 
$DBConnect = @mysqli_connect('127.0.0.1:3306', 'root'); // ip of DB and credentials

if ($DBConnect === FALSE) // this will display MySQL errors if a connection cannot be made.
     echo "<p>Unable to connect to the database server.</p>". "<p>Error code " . mysqli_errno($DBConnect). ": " . mysqli_error($DBConnect) . "</p>";
else {
     $DBName = "wp"; 
     // SCHEMA name of db. if your Wedgewood Pacific DB is different, put that name here or the code will not work locally

     if (!@mysqli_select_db($DBConnect, $DBName))
          echo "<p>Cannot open the Wedgewood Pacific database schema! Is it called 'wp' on your host? </p>";
    else {    
        
        // Type variable names exactly like they're displayed in the DB
        // Add variables as needed col_3, col_4, etc.. 
        // Avoids entering same data multiple times.
          $TableName = "Assignment"; 
          $col_0="ProjectID"; 
          $col_1="EmployeeNumber";
          $col_2="HoursWorked";

          $SQLstring = "SELECT * FROM $TableName "; // the sql QUERY used to populate the data below:

          //Generate the HTML for the Table
          $QueryResult = @mysqli_query($DBConnect, $SQLstring);
          if (mysqli_num_rows($QueryResult) == 0)
               echo "<p>There are no entries in the table $TableName.</p>"; 
          else {
               echo "<p> Here is the content of the $TableName database:</p>"; 
               echo "<table><tr>"; //begin table 
               echo "<th>$col_0</th>"; //these are the headers, match the # of cols in table 
               echo "<th>$col_1</th>";
               echo "<th>$col_2</th>"; 

               while ($Row = mysqli_fetch_assoc($QueryResult)) { //creates associative array of data
                    echo "<tr>";
                    echo "<td>{$Row[$col_0]}</td>"; // actual data, match # of cols in table
                    echo "<td>{$Row[$col_1]}</td>";
                    echo "<td>{$Row[$col_2]}</td>";
                    echo "</tr>";
                }
            } mysqli_free_result($QueryResult);
        } mysqli_close($DBConnect);
    }
?>
        </table> 
    </body>
</html>
