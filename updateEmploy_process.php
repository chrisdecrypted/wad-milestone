
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
            echo "<p>Thank you, your new email is saved as <b>$nm</b>.</p><p> All your information was validated and the database has been updated.</p>";
        }
    }

?>
