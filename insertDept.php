<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css"  href="wp.css">
<title>Wedgewood Pacific Corporation</title>
</head>
<body>

<?php include("header.php"); ?>

<h3>Add New Department</h3>

<form action="insertDept_process.php" method="post">
		Department Name: <input type="char" name="DepartmentName"><br><br>
		Budget Code: <input type="char" name="BudgetCode"><br><br>
		Office Number: <input type="char" name="OfficeNumber"><br><br>
		Department Phone: <input type="char" name="DepartmentPhone"><br><br>
	<input type="submit" name = "s" value="Submit">
</form>		


</body>
</html>	