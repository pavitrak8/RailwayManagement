<html>
<body style=" background-image: url(https://img.wallpapersafari.com/desktop/800/450/56/8/EM7fHA.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php
session_start();

require "db.php";

echo "
<form action=\"insert_into_classseats_1.php\" method=\"post\">
<table border=1 style='width:100%'> 
<thead style='background-color:#e23c52' align='center'>
<td>Train</td><td>Date Of Journey</td></thead>
<tr><td><select id=\"tno\" name=\"tno\" required>";

$query="SELECT * FROM train";
$result=mysqli_query($db,$query);

while ($row=mysqli_fetch_array($result)) 
{
 $tno=$row['Train_no'];
 $tn=$row['Train_name']." starting at ".$row['tr_src'];
 echo " <option value = \"$tno\" > $tn </option> ";
}

echo "</select></td>
<td><input type=\"date\" name=\"doj\" required></td></tr>
</table><br><br>
<input type=\"submit\" value=\"Enter Seat Details\">
";


echo "<br><br> <a href=\"http://localhost/railway/admin_login_1.php\">Go Back to Admin Menu!!!</a> ";

?>

</body>
</html>
