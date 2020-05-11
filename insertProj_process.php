

<?php
include("header.php"); 

if(isset($_POST['s']))
{		$t   = $_POST['Table'];
		$pi  = $_POST['ProjectID'];
		$pn  = $_POST['ProjectName'];
        $d   = $_POST['Department'];       
        $sdd  = $_POST['StartDate_Day'];
        $sdm  = $_POST['StartDate_Month'];
        $sdy  = $_POST['StartDate_Year'];
        $edd  = $_POST['EndDate_Day'];
        $edm  = $_POST['EndDate_Month'];
        $edy  = $_POST['EndDate_Year'];
		$mh  = $_POST['MaxHours'];
		
		if (empty($t)){  // select table
			echo "Please confirm the <b>table</b> from the drop-down. <br>";
		}
		elseif (empty($pi)){  // enter ProjectID
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
        elseif (!is_numeric($sdd)){ // enter Day
			echo "Missing <b>day</b> from start date. Please try again.  <br>";
		}

        elseif (!is_numeric($sdm)){ // enter Month
			echo "Missing <b>month</b> from start date. Please try again.  <br>";
		}
        
        elseif (!is_numeric($sdy)){ // enter Year
			echo "Missing <b>year</b> from start date. Please try again.  <br>";
		}
		
		elseif ($edy<$sdy){  // enter Year
			echo "Sorry <b>end date</b> cannot be before than <b>start date</b>  <br>";
		}

		else{ 
		echo "<p>Your project $pn was successfully created.</p><p> All your information was validated and the database has been updated.</p>";
	}	

}
	
?>	
	
