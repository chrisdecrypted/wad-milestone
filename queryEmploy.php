<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css"  href="wp.css">
<title>Wedgewood Pacific Corporation</title>
</head>
<body>

<?php include("header.php"); ?>

<h3>Employee Search</h3>
<p>Use the following form to search for Employees.</p>

<form action="queryEmploy_process.php" method="post">
	<div>
    <br>
    First Name: 
    <input type="char" name="FirstName">
    <br>
    <br>
    Last Name: 
    <input type="char" name="LastName"> * required
    <br>
    <br>
	Department:
	<select id="table" name="DepartmentName"> 
	  <option></option>
      <option name="Project">Project</option>
      <option name="Administration">Administration</option>
      <option name="Legal">Legal</option>
      <option name="Human Resources">Human Resources</option>
      <option name="Finance">Finance</option>
      <option name="Accounting">Accounting</option>
      <option name="Sales and Marketing">Sales and Marketing</option>
      <option name ="InfoSystems">InfoSystems</option>
      <option name="Research and Development">Research and Development</option>
      <option name="Production">Production</option>
    </select>	
    * required
    <br>
    
    <br>
	<br>
	<br>
	<input type="submit" name = 's' value="Submit">
	
	</form>	
</body>
</html>