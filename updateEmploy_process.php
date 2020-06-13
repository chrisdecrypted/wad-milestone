
<?php
    include("header.php");

	if(isset($_POST['s']))
	{
		$en = $_POST['EmployeeNumber'];
		$ln = $_POST['LastName'];
        $om = $_POST['OldMail'];
        $nm = $_POST['NewMail'];		
		
		if(empty($en))  // enter EmployeeNumber
		{
			echo "Please enter <b>Employee ID</b> <br>";
		}
		
		elseif(!is_numeric($en)) // only numbers
		{
			echo "<b>Employee ID</b> value can only contain numbers";
		}			
		elseif(empty($ln))  // enter LastName
		{
			echo "Please enter <b>Last Name</b> <br>";
		}
		elseif (!filter_var($om, FILTER_VALIDATE_EMAIL)) // check email 
		{
			echo  "Invalid <b>E-Mail</b> format. Must follow user@domain.extension.<br>";
        }
        elseif (!filter_var($nm, FILTER_VALIDATE_EMAIL)) // check email 
		{
			echo  "Invalid <b>E-Mail</b> format. Must follow user@domain.extension.<br>";
        }
        elseif ($om === $nm)
        {
            echo "Your new e-mail address ($nm) must be different from your old e-mail address ($om). ";
        }
        else {
            echo "<p>Thank you, your new email is saved as <b>$nm</b>.</p>";
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
					$TableName = "Employee"; 
					$col_0="EmployeeNumber"; 
					$col_1="FirstName";
					$col_2="LastName";
					$col_3="Department";
					$col_4="Position";
					$col_5="Supervisor";
					$col_6="OfficePhone";
					$col_7="EmailAddress";
		  
					
				  //Generate the HTML for the Table
					$SQLstring ="UPDATE EMPLOYEE SET EmailAddress='$nm' WHERE EmployeeNumber='$en';";
					$QueryResult = @mysqli_query($DBConnect, $SQLstring);
					
					$SQLstring = "SELECT * FROM $TableName WHERE EmployeeNumber='$en';"; // will display the most recent addition
		  
				   $QueryResult = @mysqli_query($DBConnect, $SQLstring);
					if (mysqli_num_rows($QueryResult) == 0)
						 echo "<p>There are no entries in the table $TableName.</p>"; 
					else {
						 echo "<p> Here is the updated content of the $TableName table</p>"; 
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
				} 		mysqli_free_result($QueryResult); //Fetch rows from a result-set, then free the memory associated with the result:
			}
		}
	}
	?>	