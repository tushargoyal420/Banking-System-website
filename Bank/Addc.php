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
$sql= "INSERT INTO `customer`(`Accountno`, `Name`, `Email`, `Balance`, `DOB`) VALUES (NULL,'Tushar Goyal','Tushar@gmail.com','0.00','2001-08-15')";
$con->query($sql);
$sql= "INSERT INTO `customer`(`Accountno`, `Name`, `Email`, `Balance`, `DOB`) VALUES (NULL,'Mehul Baluja','Mehul12@gmail.com','0.00','2007-04-27')";
$con->query($sql);
$sql= "INSERT INTO `customer`(`Accountno`, `Name`, `Email`, `Balance`, `DOB`) VALUES (NULL,'Tarun Negi','TarunNegi84@gmail.com','0.00','2012-04-26')";
$con->query($sql);
$sql= "INSERT INTO `customer`(`Accountno`, `Name`, `Email`, `Balance`, `DOB`) VALUES (NULL,'ABCDl','Abcd325@gmail.com','0.00','2009-08-21')";
$con->query($sql);
$sql= "INSERT INTO `customer`(`Accountno`, `Name`, `Email`, `Balance`, `DOB`) VALUES (NULL,'MNBVC','MNBVC63@gmail.com','0.00','2007-11-12')";
if($con->query($sql)==TRUE)
{
	echo("New Customer Added successfully");
}
else
{
	echo("Error Adding Customer: ".$con->error);
}

$con->close();
?>
