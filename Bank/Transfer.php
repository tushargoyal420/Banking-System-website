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
          $a=10000;
          echo("<p>Transfer Money</p>");
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
  $sql= "SELECT Accountno FROM Customer";

  $result = $con->query($sql);
?>
</div>
<!--
<table>
  <tr>
    <th> Account no. </th>
    <th> Name </th>
    <th> Email address </th>
    <th> Balance </th>
    <th> DOB </th>
  </tr> -->



  <!-- <style>
  .dropbtn{
    background-color: #3498DB;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }

  .dropbtn:hover, .dropbtn:focus {
    background-color: #2980B9;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown a:hover {background-color: #ddd;}

  .show {display: block;}
  </style>
  <h2>Clickable Dropdown</h2>
  <p>Click on the button to open the dropdown menu.</p>

  <div class="dropdow">
    <button onclick="myFunction()" class="dropbtn">Dropdown</button>
    <div id="myDrop" class="dropdown-content">
      <?php
      // while($row = $result->fetch_assoc())
      // {
      //    $r=$row['Accountno'];
      //    echo($r ."<a href='#$r'>");
      // }
      ?>
      <! <a href="#home">Home</a>
      <a href="#about">About</a>
      <a href="#contact">Contact</a> -->
  <!--  </div>
  </div>

  <script>
  /* When the user clicks on the button,
  toggle between hiding and showing the dropdown content */
  function myFunction(){
    document.getElementById("myDrop").classList.toggle("show");
  }

  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
  </script> -->

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

  // while($row = $result->fetch_assoc())
  // {
  //        echo "<tr>";
         // echo "<td>". $row["Accountno"]."</td>";
         // echo "<td>". $row["Name"]."</td>";
         // echo "<td>". $row["Email"]."</td>";
         // echo "<td>". $row["Balance"]."</td>";
         // echo "<td>". $row["DOB"]."</td>";
         // echo "<td>". $row["DOB"]."</td>";

  //      echo "</tr>";
  // }
  //          echo("  <p>Transactions History</p>");

?>
<!-- </table>  -->
<!-- <table>
  <tr>
    <th> Transaction ID. </th>
    <th> Account no. from </th>
    <th> Account no. to </th>
    <th> Amount </th>
  </tr> -->
<?php
 // $sq= "SELECT * FROM Transfer WHERE Accountnofrom=$a OR Accountnoto=$a";
 //
 // $res = $con->query($sq);
 //  while($ro = $res->fetch_assoc())
 //  {
 //       echo "<tr>";
 //         echo "<td>". $ro["ID"]."</td>";
 //         echo "<td>". $ro["Accountnofrom"]."</td>";
 //         echo "<td>". $ro["Accountnoto"]."</td>";
 //         echo "<td>". $ro["Amount"]."</td>";
 //       echo "</tr>";
 //  }
  ?>
  <!-- </table> -->
        </div>
      </div>
    </div>
  </body>
</html>
