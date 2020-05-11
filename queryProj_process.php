
<?php
    include("header.php"); 

	if(isset($_POST['s']))
	{ 
        $pi = $_POST['ProjectID'];
        $pn = $_POST['ProjectName'];
         
        if (!is_numeric($pi)){  // select table
			echo "<b>Project ID</b> must be an integer value.<br>";
        }
        
        if (empty($pi)){  // select table
			echo "<b>Project ID</b> is a required field.<br>";
		}
		 
		elseif (empty($pn)){  // select table
			echo "Please enter at least a partial <b>Project Name</b>. <br>";
		}
		
        else{ 
            echo "<p>Success!</p> <p>Project Info</p> <p>Project Info</p> <p>Project Info</p> <p>Project Info</p> <p>Project Info</p>";
        }	
	    
	}	
?>	