<html>
<body style=" background-image: url(https://img.wallpapersafari.com/desktop/800/450/56/8/EM7fHA.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">


<?php

require "db.php";

$cdquery="SELECT stn_code,stn_name FROM station";
$cdresult=mysqli_query($db,$cdquery);
echo "
<table border=1 style='width:100%'>
<thead style='background-color:#e23c52' align='center'>
<td>Station Code</td>\t\t<td>Station Name</td></thead>
";

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
 $cdId=$cdrow['stn_code'];$cdTitle=$cdrow['stn_name'];
	echo "
<tr style='background-color:#bdfff6' align='center'>
<td>$cdId</td>\t\t<td>$cdTitle</td></tr>
";
}
echo "</table>";

?>
<br>
<span><form action="insert_into_station.php" method="post">
Enter new Station Name : <input type="text" name="sname" placeholder=" New Station" required><br><br>
<input type="submit" value="Add Station"></span>
<?php
echo "<br><br> <a href=\"http://localhost/railway/admin_login_1.php\">Go Back to Admin Menu!!!</a> ";
?>
</body>
</html>