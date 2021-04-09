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
  $sql= "SELECT Accountno FROM Customer";

  $result = $con->query($sql);
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Bank of Nation</title>
  <link href="style.css" rel="stylesheet">
</head>

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

  <div class="leftcol" style ="width: calc(20% - 30px);">
    <div class="leftcol-data">
      <p> Contents:<br> </p>
      <ul>
        <li><a href="homepage.php"><mo> Home </mo></a> </li>
        <li><mo><b><a href="transfer.php"> Transfer Money</a></mo></b> </li>
        <li><a href="history.php"><mo> Transactions</mo></a> </li>
        <li><mo><a href="details.php"> Customers</mo></a> </li>
      </ul>
    </div>
  </div>

  <div class="centercol" style ="width: calc(80% - 50px)" >
    <div class="leftcol-data">
      <div class="heading">
  <?php
      echo("<p>Transfer Money</p>");
  ?>
      </div>
<body>

  <form method="POST">
    <label for="fromt">Account number from </label>
    <select id="from" name="from">
      <option id="values" value="select">Choose option</option>
    <?php
    while($row = $result->fetch_assoc())
    {
      $r=$row['Accountno'];
      echo "  <option id='values' value= $r> $r </option>";
    }
    ?>
    </select>

<br><br>
    <label for="to">Account number to </label>
    <select id="to" name="to">
      <option value="select">Choose option</option>
    <?php
    while($row = $result->fetch_assoc())
    {
      $r=$row['Accountno'];
      echo "  <option value= $r> $r </option>";
    }
    ?>
    </select>
<br><br>
    <label for="amount"> Enter Amount</label>
    <input type="number" step="0.01" name="amount">
<br><br>
    <input type="submit" name="submit">
  </form>
</body>
</html>


<?php
if($_POST){
  echo $_POST['amount'];
}


 ?>
