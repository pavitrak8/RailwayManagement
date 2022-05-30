<html>
<body style=" background-image: url(https://img.wallpapersafari.com/desktop/800/450/56/8/EM7fHA.jpg);
    height: 100%; 
	width: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php
session_start();

require "db.php";

if($_POST["tno"])
{
$trainno=$_POST["tno"];
$_SESSION["trainno"] = "$trainno";
$doj=$_POST["doj"];
$_SESSION["doj"] = "$doj";

$cdquery="SELECT * FROM train where Train_no='".$trainno."'";
$cdresult=mysqli_query($db,$cdquery);			
$cdrow=mysqli_fetch_array($cdresult);

echo "<table border=1 style='width:100%'> 
<thead style='background-color:#e23c52' align='center'> 
<td>Train No</td><td>Train Name</td><td>Starting Point</td><td>Starting Time</td>
<td>Destination Point</td><td>Destination Time</td><td>Day Of Arrival</td><td>Distance</td> <td>Date Of Journey</td></thead>";
echo "<tr><td>".$cdrow[0]."</td><td>".$cdrow[1]."</td><td>".$cdrow[2]."</td><td>".$cdrow[3]."</td><td>".$cdrow[4]."</td><td>".$cdrow[5]."</td><td>".$cdrow[6]."</td><td>".$cdrow[7]."</td><td>".$doj."</td></tr></table>";

$cdquery="SELECT station_name FROM schedule where Train_no='".$trainno."' ORDER BY distance ASC  ";
$cdresult=mysqli_query($db,$cdquery);
$stations=array();
$i=0;
while($cdrow=mysqli_fetch_array($cdresult))
{
	$stations[$i]=$cdrow["station_name"];
	$i+=1;
}

$_SESSION["ns"] = $i-1;

$_SESSION["stations"]="$stations";

echo " <table border=1 > 
<thead style='background-color:#e23c52' align='center'>
<td>Starting Point</td><td>Destination Point</td><td>1AC seats</td><td>1AC Fare</td><td>2AC seats</td><td>2AC Fare</td><td>3AC seats</td><td>3AC Fare</td><td>SL seats</td><td>SL Fare</td></thead>";

echo "<form action=\"insert_into_classseats_2.php\" method=\"post\">";
$temp=0;

while ($temp<=$_SESSION["ns"]) 
{
$_SESSION["st".$temp]=$stations[$temp];
$temp+=1;
}

$temp=0;
$dest = $_SESSION["ns"];
echo " <tr><td>".$stations[$temp]."</td>
<td>".$stations[$dest]."</td>
<td><input type=\"text\" name=\"s1".$temp."\" value=\"0\" required></td>
<td><input type=\"text\" name=\"f1".$temp."\" value=\"0\" required></td>	
<td><input type=\"text\" name=\"s2".$temp."\" value=\"0\" required></td>
<td><input type=\"text\" name=\"f2".$temp."\" value=\"0\" required></td>
<td><input type=\"text\" name=\"s3".$temp."\" value=\"0\" required></td>
<td><input type=\"text\" name=\"f3".$temp."\" value=\"0\" required></td>
<td><input type=\"text\" name=\"s4".$temp."\" value=\"0\" required></td>
<td><input type=\"text\" name=\"f4".$temp."\" value=\"0\" required></td>
</tr>";
echo "<br>";
echo "</table><input type=\"submit\"></form>";

}else
{
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
</table><br>
<input type=\"submit\" value=\"Enter Train Details\">
";
}

echo "<br><br> <a href=\"http://localhost/railway/admin_login_1.php\">Go Back to Admin Menu!!!</a> ";

?>

</body>
</html>
