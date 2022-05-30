<html>
<body style=" background-image: url(https://images.unsplash.com/photo-1528460033278-a6ba57020470?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8bG9naW58ZW58MHx8MHx8&w=1000&q=80);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >

<?php 

session_start();

require "db.php";

if ($db->connect_error) 
{
 die("Connection failed: " . $db->connect_error);
} 

$mobile=$_POST["mno"];
$pwd=$_POST["password"];

$query = mysqli_query($db,"SELECT * FROM user WHERE user.Mbl_No=$mobile AND user.Password='".$pwd."' ") or die(mysql_error());

$temp1;
$temp2;
if($row = mysqli_fetch_array($query))
{
 echo "Welcome ";
 $temp1=$row['Email'];
 $temp2=$row['UID'];
 echo "$temp1";
 echo "<br><br>";

 $query2 = mysqli_query($db," select * from user,ticket where user.UID=ticket.tid AND user.Mbl_No=$mobile") or die(mysql_error());

echo "<table border=1 style='width:100%'>
<thead style='background-color:#e23c52' align='center'>
<td>PNR</td><td>Train_no</td><td>Date_Of_Journey</td><td>Total_Fare</td><td>Train_Class</td><td>Seats_Reserved</td><td>Status</td></thead>";

 while($row = mysqli_fetch_array($query2))
 {
  echo "<tr style='background-color:#bdfff6' align='center'><td>".$row["pnr"]."</td><td>".$row["Train_no"]."</td><td>".$row["doj"]."</td><td>".$row["tfare"]."</td><td>".$row["class"]."</td><td>".$row["nos"]."</td><td>".$row["status"]."</td></tr>";
 }

echo "</table><br>";

 if(mysqli_num_rows($query2) == 0)
 {
  echo "No Reservations Yet !!! <br><br> ";
 }
 
$_SESSION["id"]=$temp2;
}

if(mysqli_num_rows($query) == 0)
{
 echo "Incorrect Credentials!!! <br><br> ";
 echo " <a href=\"http://localhost/railway/index.htm\">Home Page</a><br>";
 die();
}

?>

<form action="cancel.php" method="post">
Enter PNR for Cancellation: <input type="text" name="cancpnr" required><br><br>
<input type="submit" value="Cancel"><br><br>
</form>
<?php

echo " <a href=\"http://localhost/railway/index.htm\">Home Page</a><br>";

$db->close(); 

?>

</body>
</html>