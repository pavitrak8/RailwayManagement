<html>
<body style=" background-image: url(https://img.wallpapersafari.com/desktop/800/450/56/8/EM7fHA.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php
require "db.php";

$query="SELECT * FROM ticket where status='BOOKED' ";
$result=mysqli_query($db,$query);

echo "<table border=1 style='width:100%'>
<thead style='background-color:#e23c52' align='center'>
<td>Ticket Id</td><td>PNR</td><td>Train No</td><td>Source</td><td>Destination</td>
<td>Date Of Journey</td><td>No. of Seats</td><td>Class</td><td>Fare</td><td>Status</td>
</thead>";

while ($row=mysqli_fetch_array($result))
{
echo "<tr style='background-color:#bdfff6' align='center'>
<td>".$row[0]."</td>
<td>".$row[9]."</td>
<td>".$row[8]."</td>
<td>".$row[6]."</td>
<td>".$row[7]."</td>
<td>".$row[1]."</td>
<td>".$row[4]."</td>
<td>".$row[3]."</td>
<td>".$row[2]."</td>
<td>".$row[5]."</td></tr>";
}

echo "</table>";

echo "<br> <a href=\"http://localhost/railway/admin_login_1.php\">Go Back to Admin Menu</a> ";

$db->close();
?>


</body>
</html>
