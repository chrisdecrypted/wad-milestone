
<?php
    include("header.php");

	if(isset($_POST['s']))
	{
		$t  = $_POST['table'];
		$en = $_POST['EmployeeNumber'];
		$fn = $_POST['FirstName'];		
		$ln = $_POST['LastName'];
		$d  = $_POST['Department'];
		$p  = $_POST['Position'];
		$sup  = $_POST['Supervisor'];
		$op = $_POST['OfficePhone'];
		$em = $_POST['EmailAddress'];
		$pattern = "/\d{3}-\d{3}-\d{4}/";
		
		
		if(empty($t))  // select table
		{
			echo "Please confirm the <b>table</b> from the drop-down. <br>";
		}
		
		elseif(empty($en))  // enter EmployeeNumber
		{
			echo "Please enter <b>Employee ID</b> <br>";
		}
		
		elseif(!is_numeric($en)) // only numbers
		{
			echo "<b>Employee ID</b> value can only contain numbers";
		}
		
		elseif(empty($fn))  // enter FirstName
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

        else {
            echo "<p>Thank you, $fn $ln for submitting your form.</p><p> All your information was validated and the database has been updated.</p>";
        }
    }

?>
