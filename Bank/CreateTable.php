<?php
$servername= "localhost";
$username= "Bank";
$password= "12345";
$dbname= "bank";

// Create connection
$con= new mysqli($servername,$username,$password,$dbname);
// Check connection
if (!$con)
{
	die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql= "CREATE TABLE Customer(
Accountno INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(30) NOT NULL,
Email VARCHAR(35) NOT NULL UNIQUE KEY,
Balance DOUBLE(10,2) NOT NULL,
DOB DATE NOT NULL)";

$s="ALTER TABLE Customer AUTO_INCREMENT=10000";
if(($con->query($sql)==TRUE) &&($con->query($s)==TRUE))
{
	echo("Table Customer created successfully");
}
else
{
	echo("Error Creating Table: ".$con->error);
}

$sql= "CREATE TABLE Transfer1(
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Accountnofrom INT(10) UNSIGNED NOT NULL,
Accountnoto INT(10) UNSIGNED NOT NULL,
Amount DOUBLE(15,2) NOT NULL)";

$s="ALTER TABLE Transfer1 AUTO_INCREMENT=10000";
if(($con->query($sql)==TRUE)&&($con->query($s)==TRUE))
{
	echo("Table Transfer created successfully");
}
else
{
	echo("Error Creating Table: ".$con->error);
}
$con->close();
?>
