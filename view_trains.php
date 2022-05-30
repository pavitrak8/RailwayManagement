<html>
<body style=" background-image: url(https://img.wallpapersafari.com/desktop/800/450/56/8/EM7fHA.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">


<?php

require "db.php";

$cdquery="SELECT * FROM train";
$cdresult=mysqli_query($db,$cdquery);
echo "
<table border=1 style='width:100%'>
<thead style='background-color:#e23c52' align='center'>
<td>Train No</td><td>Train Name</td><td>Starting Point</td><td>Departure Time</td>
<td>Destination Point</td><td>Arrival Time</td><td>Arrival Day</td><td>Distance</td></thead>
";

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
	echo "
<tr style='background-color:#bdfff6' align='center'>
<td>".$cdrow['Train_no']."</td><td>".$cdrow['Train_name']."</td><td>".$cdrow['tr_src']."</td><td>".$cdrow['dept_time']."</td><td>".$cdrow['tr_dest']."</td><td>".$cdrow['arr_time']."</td><td>".$cdrow['arr_day']."</td><td>".$cdrow['distance']."</td></tr>
";
}
echo "</table>";

echo " <br><a href=\"http://localhost/railway/insert_into_train.php\"> Add New Train </a><br> ";
echo " <br><a href=\"http://localhost/railway/admin_login_1.php\">Go Back to Admin Menu!!!</a> ";
?>
</body>
</html>