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

  <div class="dropdown">
    <button class="dropbtn"> AccountNum From </button>
      <div class="accountNumbers">
        <?php
        while($row = $result->fetch_assoc())
        {
           $r=$row['Accountno'];
           echo("<a href='#$r'>$r ");
        }
        ?>

      </div>
    </div>




<?php
  $f=10000;
  $t=10041;
  $a=3000;

  $s="SELECT Name,Balance FROM Customer WHERE Accountno=$f";
  $baf=$con->query($s);
  $bal=$baf->fetch_assoc();
  $baf=$bal['Balance'];
  $s="SELECT Name,Balance FROM Customer WHERE Accountno=$t";
  $bat=$con->query($s);
  $balt=$bat->fetch_assoc();
  $bat=$balt['Balance'];
  if($f==$t)
  {
    echo("You can't Transfer in your own account!! Select Another Account!!");
  }
  else {


  if($baf>=$a)
  {
      $s="UPDATE Customer SET Balance=($baf-$a) WHERE Accountno=$f";
      $b=$con->query($s);
      $s="UPDATE Customer SET Balance=($bat+$a) WHERE Accountno=$t";
      $b=$con->query($s);
      $s="INSERT INTO Transfer VALUES(NULL,$f,$t,$a)";
      $b=$con->query($s);
      echo ("Rs.$a Transfered from ".$f."(".$bal['Name']."'s) to ". $t. "(" .$balt['Name']."'s) Account.");
  }
  else {
    echo ("The Accountno: $f does not have Rs.$a to Transfer!!");
  }
  }
?>
</div>
</div>
        </div>
      </div>
    </div>
  </body>
</html>
