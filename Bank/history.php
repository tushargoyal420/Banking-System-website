<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Bank of Nation</title>
    <link href="style2.css" rel="stylesheet">
    <script src=""> </script>
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
        <li><a href="form.php"> Transfer Money</a> </li>
        <li><a href="history.php"> Transactions</a> </li>
        <li><a href="details.php"> Customers</a> </li>
      </ul>
    </div>
    <div class="column" style ="height:auto;">
      <div class="leftcol" style ="width: calc(20% - 30px);min-height:100%; ">

       <div class="leftcol-data">
          <p class="content"> Contents:<br> </p>
          <ul >
            <li><a href="homepage.php">  Home  </a> </li>
            <li><a href="form.php">  Transfer Money </a> </li>
            <li> <b><a href="history.php"> Transactions</a> </b> </li>
            <li><a href="details.php">  Customers </a> </li>
          </ul>
        </div>
      </div>
<script>
      document.getElementByClassName('leftcol').style.height= document.getElementsByClassName('centercol').style.height;
</script>

      <div class="centercol" style ="width: calc(80% - 50px); min-height:100% ; height: auto" >
        <div class="leftcol-data">
          <div class="heading">
            <p>All Transactions:</p>
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
  $sql= "SELECT * FROM Transfer";

  $result = $con->query($sql);
?>
  </div>

<table>
  <tr>
    <th> Transaction ID </th>
    <th> Account No. From </th>
    <th> Account No. To </th>
    <th> Amount(Rs.)</th>
  </tr>
     <?php
     while($row = $result->fetch_assoc())
     {
          echo "<tr>";
            echo "<td>". $row["ID"]."</td>";
            echo "<td>". $row["Accountnofrom"]."</td>";
            echo "<td>". $row["Accountnoto"]."</td>";
            echo "<td>". $row["Amount"]."</td>";
          echo "</tr>";
     }
  ?>
</table>
        </div>
      </div>
    </div>

  </body>
