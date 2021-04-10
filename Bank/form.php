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
  <link href="style2.css" rel="stylesheet">
</head>

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
<div class="column">

  <div class="leftcol" style ="width: calc(20% - 30px);">
    <div class="leftcol-data">
      <p class="content"> Contents:<br> </p>
      <ul>
        <li><a href="homepage.php"> Home </a> </li>
        <li><b><a href="form.php"> Transfer Money</a></b> </li>
        <li><a href="history.php"> Transactions</a> </li>
        <li><a href="details.php"> Customers</a> </li>
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
  <div class="formmain">
    <!-- Form  -->
    <form method="POST" action="Transfer.php">
      <div class="formfrom">
        <div class="labelbox">
          <label for="from">Account No. From</label>
        </div>
        <select id="from" name="from" required>
          <option id="choose" value="">Choose option</option>
            <?php
              while($row = $result->fetch_assoc())
              {
                $r=$row['Accountno'];
                echo "  <option value= $r> $r </option>";
              }
            ?>
        </select>
      </div>
      <div class="formto">
        <!-- to option -->
        <div class="labelbox">
          <label for="to">Account No. To</label>
        </div>
        <select id="to" name="to" required>
          <option id="choose" value="">Choose option</option>
            <?php
              $sql= "SELECT Accountno FROM Customer";

              $result = $con->query($sql);
              while($row = $result->fetch_assoc())
              {
                $r=$row['Accountno'];
                echo "  <option value= $r> $r </option>";
              }
              $con->close();
            ?>
        </select>
      </div>
      <div class="formamount">
        <!-- amount -->
        <div class="labelbox">
          <label for="amount"> Enter  Amount</label>
        </div>
        <div class="amountt">
          <input type="number"  placeholder="Rupees." step="0.01" name="amount" required> <br><br>
        </div>
      </div>
      <div class="formsubmit">
        <!-- Submit -->
          <input type="submit" name="submit">
      </div>
    </form>

  </div>
</body>
</html>


<?php
if($_POST){
  $a= $_POST['amount'];
  $f= $_POST['from'];
  $t= $_POST['to'];
}


 ?>
