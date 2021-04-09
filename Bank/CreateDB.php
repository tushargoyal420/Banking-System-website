<?php
$servername = "localhost";
$username = "Bank";
$password = "12345";

// Create connection
$con = mysqli_connect($servername, $username, $password);
// Check connection
if (!$con)
{
  die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE Bank";
if (mysqli_query($con, $sql))
{
  echo "Database created successfully";
} else
{
  echo "Error creating database: " . mysqli_error($con);
}

mysqli_close($con);

echo ("<br><a href='CreateTable.php'>Create Table</a>");
?>
