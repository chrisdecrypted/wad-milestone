
<?php
    include("header.php");

	if(isset($_POST['s']))
	{

		$fn = $_POST['FirstName'];		
		$ln = $_POST['LastName'];
		$d  = $_POST['Department'];
		$p  = $_POST['Position'];
		$sup  = $_POST['Supervisor'];
		$op = $_POST['OfficePhone'];
		$em = strtolower($_POST['EmailAddress']); //avoids case-sensitivity issues with email input
		$pattern = "/\d{3}-\d{3}-\d{4}/";
		$pattern2 = "@wp.com";
				
		if (empty($fn))  // enter FirstName
		{
			echo "Please enter <b>First Name</b> <br>";
		}
		
		elseif(empty($ln))  // enter LastName
		{
			echo "Please enter <b>Last Name</b> <br>";
		}
		
		elseif(empty($d)) // enter Department
		{
			echo "Please enter <b>Department</b> <br>";
		}
		
		elseif(empty($p)) // enter Position
		{
			echo "Please enter <b>Position</b> <br>";
		}		
		
		elseif(empty($sup)) // enter Supervisor
		{
			echo "Please enter <b>Supervisor ID</b> <br>";
		}
		
		elseif(!is_numeric($sup)) // only numbers
		{
			echo "<b>Supervisor ID</b> value can only contain numbers";
		}
		
		elseif(empty($op)) // enter OfficePhone
		{
			echo "Please enter <b>Office Phone Number</b><br>";
		}
		
		elseif(!preg_match($pattern, $op ))  // phone number format
		{
			echo "<b>Office Phone Number</b> not in proper format. Must be entered in this format: 000-000-0000<br>";
		}
				
		elseif(strlen($op)<12)   // check length <12 digit error >12 digit error
		{
			echo "Not enough digits in <b>Office Phone Number</b><br> ";
		}
		
		elseif(strlen($op)>12)  
		{
			echo "Too many digits in <b>Office Phone Number</b><br> ";
		}
		elseif (!filter_var($em, FILTER_VALIDATE_EMAIL)) // check email 
		{
			echo  "Invalid <b>E-Mail</b> format. Must follow user@domain.extension.<br>";
        }
		elseif (!preg_match("/$pattern2$/",$em)) // email must end in @WP.com
		{
      		echo "$em address does not end in @WP.com.";
        }	

        else {
			echo "<p>Thank you, <b>$fn $ln</b> for submitting your form.</p>";
		}

		$DBConnect = @mysqli_connect('127.0.0.1:3306', 'root'); // ip of DB and credentials

		if ($DBConnect === FALSE) // this will display MySQL errors if a connection cannot be made.
			 echo "<p>Unable to connect to the database server.</p>". "<p>Error code " . mysqli_errno($DBConnect). ": " . mysqli_error($DBConnect) . "</p>";
		else {
			 $DBName = "wp"; 
			 // SCHEMA name of db. if your Wedgewood Pacific DB is different, put that name here or the code will not work locally
		 
			 if (!@mysqli_select_db($DBConnect, $DBName))
				  echo "<p>Cannot open the Wedgewood Pacific database schema! Is it called 'wp' on your host? </p>";
			else {    
		$TableName = "employee"; 
          $col_0="EmployeeNumber"; 
          $col_1="FirstName";
          $col_2="LastName";
          $col_3="Department";
          $col_4="Position";
          $col_5="Supervisor";
          $col_6="OfficePhone";
          $col_7="EmailAddress";

		  
		//Generate the HTML for the Table
		$SQLstring = "INSERT INTO EMPLOYEE (FirstName, LastName, Department, Position, Supervisor, OfficePhone, EmailAddress)
		VALUES('$fn', '$ln', '$d', '$p', '$sup', '$op', '$em')";

		  $QueryResult = @mysqli_query($DBConnect, $SQLstring);
		  
		  $SQLstring = "SELECT * FROM employee ORDER BY EmployeeNumber DESC LIMIT 1;"; // will display the most recent addition

		 $QueryResult = @mysqli_query($DBConnect, $SQLstring);
          if (mysqli_num_rows($QueryResult) == 0)
               echo "<p>There are no entries in the table $TableName.</p>"; 
          else {
               echo "<p> Here is the information you added to the $TableName database:</p>"; 
               echo "<table><tr>"; //begin table 
               echo "<th>$col_0</th>"; //these are the headers, match the # of cols in table 
               echo "<th>$col_1</th>";
               echo "<th>$col_2</th>"; 
               echo "<th>$col_3</th>"; 
               echo "<th>$col_4</th>"; 
               echo "<th>$col_5</th>"; 
               echo "<th>$col_6</th>"; 
               echo "<th>$col_7</th>"; 

               while ($Row = mysqli_fetch_assoc($QueryResult)) { //creates associative array of data
                    echo "<tr>";
                    echo "<td>{$Row[$col_0]}</td>"; // similar to above, match # of cols in table
                    echo "<td>{$Row[$col_1]}</td>";
                    echo "<td>{$Row[$col_2]}</td>";
                    echo "<td>{$Row[$col_3]}</td>";
                    echo "<td>{$Row[$col_4]}</td>";
                    echo "<td>{$Row[$col_5]}</td>";
                    echo "<td>{$Row[$col_6]}</td>";
                    echo "<td>{$Row[$col_7]}</td>";
                    echo "</tr>";
				}
            } mysqli_free_result($QueryResult); //Fetch rows from a result-set, then free the memory associated with the result:
    }

	}

}
?>
</table>
<br><br><br><br>
<p> Click <b><a href="Employee-DB.php">here</a></b> to view the complete employee table.</p>

</body>
</html>