<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css"  href="wp.css">
<title>Wedgewood Pacific Corporation</title>
</head>
<body>

<?php include("header.php"); ?>

<h3>Add New Project</h3>

<form action="insertProj_process.php" method="post">
	<div>
	Table Name:
	<select id="table" name="Table">
			<option></option>
			<option value="Project">Project</option>
	</select>
	
	<br>
	<br>
	
  Project ID: 
  <input type="integer" name="ProjectID">
	<br>
	<br>
    Project Name: 
    <input type="char" name="ProjectName">
	<br>
	<br>
  Department: 
  <input type="char" name="Department">
	<br>
	<br>
  Maximum Hours: 
  <input type="number" name="MaxHours">
	<br>
	<br>
  Start Date: 	<br>
	<br>
  Month: <select type="integer" name="StartDate_Month">
    <option>Month</option>
    <option>01</option>
    <option>02</option>
    <option>03</option>
    <option>04</option>
    <option>05</option>
    <option>06</option>
    <option>07</option>
    <option>08</option>
    <option>09</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
  </select>
  Day: <select type="integer" name="StartDate_Day">
    <option>Day</option>
    <option>01</option>
    <option>02</option>
    <option>03</option>
    <option>04</option>
    <option>05</option>
    <option>06</option>
    <option>07</option>
    <option>08</option>
    <option>09</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
    <option>13</option>
    <option>14</option>
    <option>15</option>
    <option>16</option>
    <option>17</option>
    <option>18</option>
    <option>19</option>
    <option>20</option>
    <option>21</option>
    <option>22</option>
    <option>23</option>
    <option>24</option>
    <option>25</option>
    <option>26</option>
    <option>27</option>
    <option>28</option>
    <option>29</option>
    <option>30</option>
    <option>31</option>
  </select>

 Year: <select type="integer" name="StartDate_Year">
    <option>Year</option>
    <option>2015</option>
    <option>2016</option>
    <option>2017</option>
    <option>2018</option>
    <option>2019</option>
    <option>2020</option>
  </select>
	<br>
	<br>
  <br>
  End Date (If Known): 
  <br>
  <br>
  
  Month: <select type="integer" name="EndDate_Month">
    <option>Month</option>
    <option>01</option>
    <option>02</option>
    <option>03</option>
    <option>04</option>
    <option>05</option>
    <option>06</option>
    <option>07</option>
    <option>08</option>
    <option>09</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
  </select>
Day: <select type="integer" name="EndDate_Day">
    <option>Day</option>
    <option>01</option>
    <option>02</option>
    <option>03</option>
    <option>04</option>
    <option>05</option>
    <option>06</option>
    <option>07</option>
    <option>08</option>
    <option>09</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
    <option>13</option>
    <option>14</option>
    <option>15</option>
    <option>16</option>
    <option>17</option>
    <option>18</option>
    <option>19</option>
    <option>20</option>
    <option>21</option>
    <option>22</option>
    <option>23</option>
    <option>24</option>
    <option>25</option>
    <option>26</option>
    <option>27</option>
    <option>28</option>
    <option>29</option>
    <option>30</option>
    <option>31</option>
  </select>

 Year: <select type="integer" name="EndDate_Year">
    <option>Year</option>
    <option>2015</option>
    <option>2016</option>
    <option>2017</option>
    <option>2018</option>
    <option>2019</option>
    <option>2020</option>
  </select>
 
	<br>
	<br>
	<br>
	<input type="submit" name = 's' value="Submit">
	
	</form>		
	</div>




</body>
</html>