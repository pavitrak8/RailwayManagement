<html>
<body style=" background-image: url(https://img.wallpapersafari.com/desktop/800/450/56/8/EM7fHA.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php
session_start();

require "db.php";
$ns = 0;
if(isset($_POST["ns"]))
{
$ns=$_POST["ns"];
$tname=$_POST["tname"];
$_SESSION["tname"] = "$tname";
$sp=$_POST["sp"];
$_SESSION["sp"] = "$sp";
$st=$_POST["st"];
$_SESSION["st"] = "$st";
$dp=$_POST["dp"];
$_SESSION["dp"] = "$dp";
$dt=$_POST["dt"];
$_SESSION["dt"] = "$dt";
$dd=$_POST["dd"];
$_SESSION["dd"] = "$dd";
$ns=$_POST["ns"];
$_SESSION["ns"] = "$ns";
$ds=$_POST["ds"];
$_SESSION["ds"] = "$ds";

echo "<table border=1 style='width:100%'> 
<thead style='background-color:#e23c52' align='center'> <td>Train_name</td><td>Starting_point</td><td>Starting_time</td><td>Destination_point</td><td>Destination_time</td><td>Day_of_arrival</td><td>No_of_stations</td><td>Distance</td></thead>";
echo "<tr><td>".$tname."</td><td>".$sp."</td><td>".$st."</td><td>".$dp."</td><td>".$dt."</td><td>".$dd."</td><td>".$ns."</td><td>".$ds."</td></tr></table>";

echo " <table border=1 style='width:100%'> 
<thead style='background-color:#e23c52' align='center'> <td>Station</td><td>Arrival_Time</td><td>Departure_Time</td><td>Distance</td></thead>";
echo " <tr><td>".$sp."</td><td>".$st."</td><td>".$st."</td><td>0</td></tr>";

echo "<form action=\"insert_into_train_2.php\" method=\"post\">";
$temp=1;
while ($temp<=$ns) 
{
 	echo " <tr><td><select id=\"stn".$temp."\" name=\"stn".$temp."\"required> ";

	$cdquery="SELECT stn_name FROM station";
	$cdresult=mysqli_query($db,$cdquery);
	        
	echo " <option value = \"\" > </option>";
			
	while ($cdrow=mysqli_fetch_array($cdresult)) 
	{
	 $cdTitle=$cdrow['stn_name'];
	 echo " <option value = \"$cdTitle\" > $cdTitle </option>";
	}

	echo "
	</select></td>
	<td><input type=\"text\" name=\"st".$temp."\" required></td>
	<td><input type=\"text\" name=\"dt".$temp."\" required></td>
	<td><input type=\"text\" name=\"ds".$temp."\" required></td>	
	</tr>";
 $temp+=1;
}

	echo " <tr><td>".$dp."</td><td>".$dt."</td><td>".$dt."</td><td>".$ds."</td></tr></table>";	
	echo "<input type=\"submit\">";
}


else if($ns==0)
{
echo "
<form action=\"insert_into_train_1.php\" method=\"post\">
<table>
<tr><td>Train Name </td><td> <input type=\"text\" name=\"tname\" required></td></tr>
<tr><td>Starting Point </td><td> <select id=\"sp\" name=\"sp\" required>
";

$cdquery="SELECT stn_name FROM station";
$cdresult=mysqli_query($db,$cdquery);

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
 $cdTitle=$cdrow['stn_name'];
 echo " <option value = \"$cdTitle\" > $cdTitle </option>";
            
}

echo "
</select></td></tr>
<tr><td>Starting Time </td><td> <input type=\"time\" name=\"st\" required></td></tr>
<tr><td>Destination Point </td><td> <select id=\"dp\" name=\"dp\" required>
";

$cdquery="SELECT stn_name FROM station";
$cdresult=mysqli_query($db,$cdquery);

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
 $cdTitle=$cdrow['stn_name'];
 echo " <option value = \"$cdTitle\" > $cdTitle </option>";
            
}

echo "
</select></td></tr>
<tr><td>Destination Arrival Time </td><td> <input type=\"time\" name=\"dt\" required></td></tr>
<tr><td>Distance </td><td> <input type=\"text\" name=\"ds\" required></td></tr>
<tr><td>No Of Intermediate stations</td><td><input type=\"text\" name=\"ns\" required></td></tr>
<tr><td>Day of Arrival </td><td> <input type=\"text\" name=\"dd\" required></td></tr>
</table><br><br>
<input type=\"submit\" value=\"Enter Train Details\">
";}

echo "<br><br> <a href=\"http://localhost/railway/admin_login_1.php\">Go Back to Admin Menu!!!</a> ";

?>

</body>
</html>