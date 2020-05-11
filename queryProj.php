<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css"  href="wp.css">
<title>Wedgewood Pacific Corporation</title>
</head>
<body>

<?php include("header.php"); ?>

<h3>Project Search</h3>
<p>Find out information about various projects. All fields are required. </p>

<form action="queryProj_process.php" method="post">
<div>
  Project ID: 
    <input type="integer" name="ProjectID">
<br><br>
    Project Name: 
    <input type="char" name="ProjectName">

<br><br><br>
<input type="submit" name = 's' value="Submit">

    </form>	
</div>
</body>
</html>