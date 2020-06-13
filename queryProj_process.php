
<?php
    include("header.php"); 

	if(isset($_POST['s']))
	{ 
        $pi = $_POST['ProjectID'];
        $pn = $_POST['ProjectName'];
         
        if (!is_numeric($pi)){  // select table
			echo "<b>Project ID</b> must be an integer value.<br>";
        }
        
        elseif (empty($pi)){  // select table
			echo "<b>Project ID</b> is a required field.<br>";
		}
		 
		elseif (empty($pn)){  // select table
			echo "Please enter at least a partial <b>Project Name</b>. <br>";
		}
		
        else { 
            echo "<p>Your searched for information about projects matching the <b>ProjectID: '$pi' and Project Name: '$pn'.</b></p>";
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
    
                    
                $SQLstring = "SELECT * FROM $TableName WHERE ProjectId='$pi' AND ProjectName='$pn';"; // will display the most recent addition
                $QueryResult = @mysqli_query($DBConnect, $SQLstring);
 
        if (mysqli_num_rows($QueryResult) == 0)
                        echo "<p>Your query was submitted succesfully, but did not return any results.</p>"; 
                    else {
                        echo "<p> Here is the result of your query. </p>"; 
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