<html>
<body style=" background-image: url(https://images.unsplash.com/photo-1528460033278-a6ba57020470?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8bG9naW58ZW58MHx8MHx8&w=1000&q=80);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php 

session_start();

require "db.php";

$doj=$_POST["doj"];
$_SESSION["doj"] = "$doj";
$sp=$_POST["sp"];
$_SESSION["sp"] = "$sp";
$dp=$_POST["dp"];
$_SESSION["dp"] = "$dp";

$query = mysqli_query($db,"SELECT t.Train_no,t.Train_name,c.sp,s1.departure_time,c.dp,s2.arrival_time,t.arr_day,c.class,c.fare,c.seatsleft FROM train as t,classseats as c, schedule as s1,schedule as s2 where s1.Train_no=t.Train_no AND s2.Train_no=t.Train_no AND s1.station_name='".$sp."' AND s2.station_name='".$dp."' AND t.Train_no=c.Train_no AND c.sp='".$sp."' AND c.dp='".$dp."' AND c.doj='".$doj."' ");

echo "<table border=1 style='width:100%'><thead style='background-color:#e23c52' align='center'><td>Train No</td><td>Train Name</td><td>Starting_Point</td><td>Arrival Time</td><td>Destination Point </td><td>Departure_Time</td><td>Day</td><td>Class</td><td>Fare
</td><td>Seats Left</td></thead>";

while($row = mysqli_fetch_array($query))
{
 echo "<tr style='background-color:#bdfff6' align='center'><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr>";
}
echo "</table>";

//$rowcount=mysqli_num_rows($query);
if(mysqli_num_rows($query) == 0)
{
 echo "No such train <br>";

}
?>

If you wish to proceed with booking fill in the following details:<br><br>
<form action="reservation.php" method="post">
Registered Mobile No: <input type="text" name="mno" required><br><br>
Password: <input type="password" name="password" required><br><br>
Enter Train No: <input type="text" name="tno" required><br><br>
Enter Class: <input type="text" name="class" required><br><br>
No. of Seats: <input type="text" name="nos" required><br><br>
<input type="submit" value="Proceed with Booking"><br><br>
</form>

<?php

echo " <a href=\"http://localhost/railway/enquiry.php\">More Enquiry</a> <br>";

$db->close(); 
?>

<br><a href="http://localhost/railway/index.htm">Go to Home Page!!!</a>
</body>
</html>