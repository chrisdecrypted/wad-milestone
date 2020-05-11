<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css"  href="wp.css">
<title>Wedgewood Pacific Corporation</title>
</head>
<body>
<?php include("header.php"); ?>

<h3>Update Employee E-Mail</h3>

<form action="updateEmploy_Process.php" method="post">
	
	<b>CONFIRM</b> Employee Number: <input type="integer" name="EmployeeNumber">
	<br>
	<br>

	<b>CONFIRM</b> Last Name: <input type="char" name="LastName">
	<br>
	<br>

    <b>OLD</b> Employee E-mail Address: <input type="email" name="OldMail">
	<br>
    <br>
    
	<b>NEW</b> Employee E-mail Address: <input type="email" name="NewMail">
	<br>
	<br>

	<input type="submit" name = "s" value="Submit">
	
	</form>		
	
</body>	
</html>	