<?php

include("header.php"); 

if(isset($_POST['s'])) {		
	$pi  = $_POST['ProjectID'];
	$pn  = $_POST['ProjectName'];
	$d   = $_POST['Department'];       
	$sdd  = $_POST['StartDate'];
	$edd  = $_POST['EndDate'];    
	$mh  = $_POST['MaxHours'];

	if (empty($pi)){  // enter ProjectID
		echo "Please enter <b>Project ID</b> <br>";
	}
	elseif (!is_numeric($pi)){  // enter ProjectID
		echo "<b>Project ID</b> must be an integer value.<br>";
	}
	elseif (empty($pn)){ // enter ProjectName
		echo "Please enter a <b>Project Name</b> <br>";
	}
	elseif (empty($d)){ // enter Department
		echo "Please enter a <b>Department</b>  <br>";
	}
	elseif (!is_numeric($mh)){// only numbers
		echo " Please enter only numbers for the <b>Maximum Hours</b>.<br>";
	}   	
	elseif ($edd<$sdd){  // EndDate can not be before StartDate
		echo "Sorry <b>end date</b> cannot be before than <b>start date</b>  <br>";
	}
	else { 
	echo "<p>Your project <b>$pn</b> was successfully created.</p>";
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
			$TableName = "Project"; 
			$col_0="ProjectID"; 
			$col_1="ProjectName";
			$col_2="Department";
			$col_3="MaxHours";
			$col_4="StartDate";
			$col_5="EndDate";

			$SQLstring = "INSERT INTO $TableName ($col_0, $col_1, $col_2, $col_3, $col_4, $col_5) VALUES('$pi', '$pn', '$d', '$mh', '$sdd', '$edd');";
			$QueryResult = @mysqli_query($DBConnect, $SQLstring);
				
			$SQLstring = "SELECT * FROM $TableName;"; // will display the most recent addition
		
	//Generate the HTML for the Table
	$QueryResult = @mysqli_query($DBConnect, $SQLstring);
			if (mysqli_num_rows($QueryResult) == 0)
					echo "<p>There are no entries in the table $TableName.</p>"; 
				else {
					echo "<p> Here is the updated content of the $TableName table:</p>"; 
					echo "<table><tr>"; //begin table 
					echo "<th>$col_0</th>"; //these are the headers, match the # of cols in table 
					echo "<th>$col_1</th>";
					echo "<th>$col_2</th>"; 
					echo "<th>$col_3</th>"; 
					echo "<th>$col_4</th>";
					echo "<th>$col_5</th>"; 
	while ($Row = mysqli_fetch_assoc($QueryResult)) { //creates associative array of data
					echo "<tr>";
					echo "<td>{$Row[$col_0]}</td>"; // similar to above, match # of cols in table
					echo "<td>{$Row[$col_1]}</td>";
					echo "<td>{$Row[$col_2]}</td>";
					echo "<td>{$Row[$col_3]}</td>";                    
					echo "<td>{$Row[$col_4]}</td>";
					echo "<td>{$Row[$col_5]}</td>";
					echo "</tr>";
				}
			} 		mysqli_free_result($QueryResult); //Fetch rows from a result-set, then free the memory associated with the result:
		}
	}
}
?>	