


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
          <p> Contents: </p>
          <ul>
            <li><a href="homepage.php">  Home  </a> </li>
            <li><a href="transfer.php">  Transfer Money </a> </li>
            <li><a href="history.php">  Transactions </a> </li>
            <li><b><a href="details.php"> Customers </a></b> </li>
          </ul>
        </div>
      </div>

      <div class="centercol" style="height:auto;">
        <div class="leftcol-data">
          <div class="heading">
      <?php
          $a=$_POST['abcd'];
          echo(" <br> <h1>Details for Accountno: $a</h1>");
      ?>
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
  $sql= "SELECT * FROM Customer WHERE Accountno=$a";

  $result = $con->query($sql);
?>

          </div>

<table>
  <tr>
    <th> Account no. </th>
    <th> Name </th>
    <th> Email address </th>
    <th> Balance </th>
    <th> DOB </th>
    <!-- <th> View Details </th> -->
  </tr>
  <?php
  while($row = $result->fetch_assoc())
  {
       echo "<tr>";
         echo "<td>". $row["Accountno"]."</td>";
         echo "<td>". $row["Name"]."</td>";
         echo "<td>". $row["Email"]."</td>";
         echo "<td>". $row["Balance"]."</td>";
         echo "<td>". $row["DOB"]."</td>";
         // echo "<td>". $row["DOB"]."</td>";

       echo "</tr>";
  }
?>
</table>

<br>
<br>
<h1><center> Transaction History </center></h1>
<br>
<table>
  <tr>
    <th> Transaction ID </th>
    <th> Account no. from </th>
    <th> Account no. to </th>
    <th> Amount </th>
  </tr>
<?php
 $sq= "SELECT * FROM Transfer WHERE Accountnofrom=$a OR Accountnoto=$a";

 $res = $con->query($sq);
  while($ro = $res->fetch_assoc())
  {
       echo "<tr>";
         echo "<td>". $ro["ID"]."</td>";
         echo "<td>". $ro["Accountnofrom"]."</td>";
         echo "<td>". $ro["Accountnoto"]."</td>";
         echo "<td>". $ro["Amount"]."</td>";
       echo "</tr>";
  }
  ?>
  </table>
        </div>
      </div>
    </div>
  </body>
</html>
