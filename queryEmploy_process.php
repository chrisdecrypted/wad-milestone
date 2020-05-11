<?php
    include("header.php"); 

	if(isset($_POST['s']))
	{ 
        $fn = $_POST['FirstName'];
        $ln = $_POST['LastName'];
		$dn = $_POST['DepartmentName'];
        
        if (empty($ln)){  // select table
			echo "At least one letter of the <b>Last Name</b> is required.<br>";
		}
		 
		elseif (empty($dn)){  // select table
			echo "Please confirm the <b>Department Name</b> from the drop-down. <br>";
		}
		
        else{ 
            echo "<p>Here is the MySQL Query: </p> 
            <br>SELECT FirstName, LastName
            <br>FROM Employee 
            <br> WHERE FirstName LIKE '%$fn%' AND LastName LIKE '%$ln%' AND Department='$dn';
            ";
        }	
	    
	}	
?>	