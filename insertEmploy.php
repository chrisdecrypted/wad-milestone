<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css"  href="wp.css">
<title>Wedgewood Pacific Corporation</title>
</head>
<body>
<?php include("header.php"); ?>

<h3>Add New Employee</h3>


<form action="insertEmploy_Process.php" method="post">
	
	Table Name:
	<select id="Table" name="table">
			<option></option>
			<option value="Employee">Employee</option>
	</select>
	
	<br>
	<br>
	
	Employee Number: <input type="integer" name="EmployeeNumber">
	<br>
	<br>
	First Name: <input type="char" name="FirstName">
	<br>
	<br>
	Last Name: <input type="char" name="LastName">
	<br>
	<br>
	Department: <input type="char" name="Department">
	<br>
	<br>
	Position: <input type="integer" name="Position">
	<br>
	<br>
	Supervisor ID#: <input type="integer" name="Supervisor">
	<br>
	<br>
	Office Phone#: <input type="tel" name="OfficePhone">
	<br>
	<br>
	Employee E-mail Address: <input type="email" name="EmailAddress">
	<br>
	<br>

	<input type="submit" name = "s" value="Submit">
	
	</form>		
	
</body>	
</html>	