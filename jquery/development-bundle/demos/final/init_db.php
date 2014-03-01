<html>
<head>

<title>Use this to create database</title>

</head>

<body>

<?php

if(!empty($_POST["db"]))
{$con = mysqli_connect("localhost","root","") or die("Could not connect to MySql server");


$exam_db = "CREATE DATABASE exam3";

//INITIALISE DATABASE EXAM
if (mysqli_query($con,$exam_db))
	  {
	  echo "Database exam_db created successfully";
	  }
	  else
	  {
	  echo "\nError creating database: ". mysqli_error($con1)  ;
	  }
}
?>


<?php
if(!empty($_POST["user"]))
{
$con = mysqli_connect("localhost","root","","exam3"); // Check connection
if (mysqli_connect_errno())
  {
  echo "\nFailed to connect to MySQL: " . mysqli_connect_error();
  }

//INITIALISE TABLE FOR USERS
$user_tb = "CREATE TABLE user(ID INT PRIMARY KEY AUTO_INCREMENT, TEAMNAME VARCHAR(255) NOT NULL UNIQUE,MOBILE VARCHAR(10) NOT NULL, MOBILE2 VARCHAR(10) NOT NULL, MARKS VARCHAR(10), tm VARCHAR(30))";

if (mysqli_query($con,$user_tb))
 	 {
	  echo "\nTable user_tb created successfully";	
	 }
	 else
	  {
	  echo "\nError creating table: ". mysqli_error($con);
	  }
}
?>

<?php
if(!empty($_POST["que"]))
{
$con = mysqli_connect("localhost","root","","exam3"); // Check connection
//INITIALISE TABLE FOR QUESTION
$que_tb = "CREATE TABLE que(sr INT PRIMARY KEY AUTO_INCREMENT, QUE TEXT NOT NULL ,OPTION1 VARCHAR(50) NOT NULL ,OPTION2 VARCHAR(50) NOT NULL ,OPTION3 VARCHAR(50) NOT NULL ,OPTION4 VARCHAR(50) NOT NULL ,CORRECT_ANS VARCHAR(50) NOT NULL)";

if (mysqli_query($con,$que_tb))
  {
  echo "\nTable que_tb created successfully";
  }
else
  {
  echo "\nError creating table: ". mysqli_error($con);
  }
}
?>

<form action="init_db.php" method="post">
<input type="submit"  name = "db" value = "Create database"><br><br>
<input type="submit"  name = "user" value = "create user table"><br><br>
<input type="submit"  name ="que" value = "create que table"><br><br>
</form>


</body>

</html>