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
          $TableName = "employee";
          $SQLstring = "SELECT * FROM $TableName";
          $QueryResult = @mysqli_query($DBConnect, $SQLstring);
          if (mysqli_num_rows($QueryResult) == 0)
               echo "<p>There are no entries in the table $TableName!</p>";
          else {
               echo "<p> Here is the content of: $TableName:</p>";
               echo "<table width='100%' border='1'>";
               echo "<tr><th>Last Name</th><th>First Name</th><th>Last Name</th></tr>";
               while ($Row = mysqli_fetch_assoc($QueryResult)) {
                    echo "<tr><td>{$Row['EmployeeNumber']}</td>";
                    echo "<td>{$Row['FirstName']}</td>";
                    echo "<td>{$Row['LastName']}</td></tr>";
               }
          }
          mysqli_free_result($QueryResult);
     }
     mysqli_close($DBConnect);
}
?>
