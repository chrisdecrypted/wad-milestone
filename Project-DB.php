<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css"  href="wp.css">
<title>Wedgewood Pacific Corporation</title>
</head>
<body>
<?php include("header.php"); ?>

<?php
$DBConnect = @mysqli_connect('127.0.0.1:3306', 'root');
if ($DBConnect === FALSE)
     echo "<p>Unable to connect to the database server.</p>"
        . "<p>Error code " . mysqli_errno($DBConnect)
        . ": " . mysqli_error($DBConnect) . "</p>";
else {
     $DBName = "wp";
     if (!@mysqli_select_db($DBConnect, $DBName))
          echo "<p>Cannot open the Wedgewood Pacific database schema! Is it called 'wp' on your host? </p>";
     else {
        // use variables to make naming easier
          $TableName = "Project";
          $col_0="ProjectID";
          $col_1="ProjectName";
          $col_2="Department";
          $col_3="MaxHours";
          $col_4="StartDate";
          $col_5="EndDate";          


          $SQLstring = "SELECT * FROM $TableName";
          $QueryResult = @mysqli_query($DBConnect, $SQLstring);
          if (mysqli_num_rows($QueryResult) == 0)
               echo "<p>There are no entries in the table $TableName!</p>";
          else {
               echo "<p> Here is the content of the $TableName database:</p>";
               echo "<table><tr>";
               echo "<th>$col_0</th>";
               echo "<th>$col_1</th>";
               echo "<th>$col_2</th>";
               echo "<th>$col_3</th>";
               echo "<th>$col_4</th>";
               echo "<th>$col_5</th>";
        

               while ($Row = mysqli_fetch_assoc($QueryResult)) {
                    echo "<tr>";
                    echo "<td>{$Row[$col_0]}</td>";
                    echo "<td>{$Row[$col_1]}</td>";
                    echo "<td>{$Row[$col_2]}</td>";
                    echo "<td>{$Row[$col_3]}</td>";
                    echo "<td>{$Row[$col_4]}</td>";
                    echo "<td>{$Row[$col_5]}</td>";
        
                    echo "</tr>";
               }
          }
          mysqli_free_result($QueryResult);
     }
     mysqli_close($DBConnect);
}
?>
</table>
</body>
</html>
