<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Bank of Nation</title>
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar">
      <span class="text">
        <p>Modern Bank of Nation</p>
      </span>
    </div>
    <div class="pannel">
      <ul>
        <li><a href="homepage.php"> Home </a> </li>
        <li><a href="transfer.php"> Transfer Money</a> </li>
        <li><a href="history.php"> Transactions</a> </li>
        <li><a href="details.php"> Customers</a> </li>
      </ul>
    </div>
    <div class="column">

      <div class="leftcol" style ="width: calc(20% - 30px)">
        <div class="leftcol-data">
          <p> Contents:<br> </p>
          <ul>
            <li><a href="homepage.php"><mo> Home </mo></a> </li>
            <li><a href="transfer.php"><mo> Transfer Money</mo></a> </li>
            <li><a href="history.php"><mo> Transactions</mo></a> </li>
            <li><mo><b><a href="details.php"> Customers</a></mo></b> </li>
          </ul>
        </div>
      </div>

      <div class="centercol" style ="width: calc(80% - 50px)" >
        <div class="leftcol-data">
          <div class="heading">
            <p>All Customers</p>
          </div>
          <div class="data1">

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
  $sql= "SELECT Accountno, Name FROM Customer";

  $result = $con->query($sql);
?>
  </div>

<table>
  <tr>
    <th> Account no. </th>
    <th> Name </th>
    <th> View More Details </th>
  </tr>

    <form name="form" action="alldetails.php" method="POST">
     <?php
     while($row = $result->fetch_assoc())
     {
          echo "<tr>";
          //  $ro= $row['Accountno'];
            echo "<td>". $row["Accountno"]."</td>";
            echo "<td>". $row["Name"]."</td>";
            echo ("<td><button type='submit' name='abcd' value=\"{$row['Accountno']}\">View More Details</button></td>");
          echo "</tr>";
     }
     ?>
     </select>
     </form>
  <?php

  ?>
  </table>
        </div>
      </div>
    </div>
  </body>
