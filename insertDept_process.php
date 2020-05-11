<?php
    include("header.php"); 

	if(isset($_POST['s']))
	{ 
		$t  = $_POST['Table'];
		$dn = $_POST['DepartmentName'];
		$dp = $_POST['DepartmentPhone'];
		$on = $_POST['OfficeNumber'];
		$bc = $_POST['BudgetCode'];
		$pattern = "/\d{3}-\d{3}-\d{4}/";
		
		
		if (empty($t)){  // select table
			echo "Please confirm the <b>table</b> from the drop-down. <br>";
		}
		 
		elseif(empty($dn))  // enter department name  
		{
			echo "Please enter a <b>Department Name</b>  <br>";
		}
		 
		
		elseif(empty($on))  // enter OfficeNumber
		{
			echo "Please enter an <b>Office Number</b>  <br>";
		}
		 
		
		elseif(empty($bc))  // enter BudgetCode
		{
			echo "Please enter a <b>Budget Code</b>  <br>";
		}
		 
		
		elseif(empty($dp))  // enter DepartmentPhone
		{
			echo "Please enter a <b>Department Phone Number</b>  <br>";
		}
		 
		
	    elseif(!preg_match($pattern, $dp ))  // phone number format
		{
			echo "<b>Department Phone Number</b> not in proper format <br>";
		}
		 
		
		elseif(strlen($dp)<12)   // check length <12 digit error >12 digit error
		{
			echo "Not enough digits or dashes in <b>Department Phone Number</b> <br> ";
		}
		 
		
		elseif(strlen($dp)>12)  
		{
			echo " Too many digits or dashes in <b>Department Phone Number</b> ";
        }
        
        else{ 
            echo "<p>Your department $dn was successfully added.</p><p> All your information was validated and the database has been updated.</p>";
        }	
	    
	}	
?>	