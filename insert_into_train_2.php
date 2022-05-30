<html>
<body style=" background-image: url(https://img.wallpapersafari.com/desktop/800/450/56/8/EM7fHA.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php
session_start();


require "db.php";

$sql = "INSERT INTO train (Train_name,tr_src,dept_time,tr_dest,arr_time,arr_day,distance) VALUES ('".$_SESSION["tname"]."','".$_SESSION["sp"]."','".$_SESSION["st"]."','".$_SESSION["dp"]."','".$_SESSION["dt"]."','".$_SESSION["dd"]."','".$_SESSION["ds"]."')";

if ($db->query($sql) === TRUE) {
    echo "New Train record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$cdquery="SELECT Train_no FROM train where Train_name='".$_SESSION["tname"]."' AND tr_src='".$_SESSION["sp"]."' AND tr_dest='".$_SESSION["dp"]."'";
$cdresult=mysqli_query($db,$cdquery);			
$cdrow=mysqli_fetch_array($cdresult);
$trainno=$cdrow['Train_no'];
//echo $trainno;
$sql = "INSERT INTO schedule (Train_no,station_name,arrival_time,departure_time,distance) VALUES ('".$trainno."','".$_SESSION["sp"]."','".$_SESSION["st"]."','".$_SESSION["st"]."','0')";
$flag=($db->query($sql));
$temp=1;
while ($temp<=$_SESSION["ns"]) 
{
	$sql = "INSERT INTO schedule (Train_no,station_name,arrival_time,departure_time,distance)
	VALUES ('".$trainno."','".$_POST["stn".$temp]."','".$_POST["st".$temp]."','".$_POST["dt".$temp]."','".$_POST["ds".$temp]."')";
	$flag=($db->query($sql));
	$temp+=1;
}
$sql = "INSERT INTO schedule (Train_no,station_name,arrival_time,departure_time,distance) VALUES ('".$trainno."','".$_SESSION["dp"]."','".$_SESSION["dt"]."','".$_SESSION["dt"]."','".$_SESSION["ds"]."')";
$flag=($db->query($sql));

if ($flag === TRUE) {
	echo "<br>";
    echo "New schedule added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
echo "<br><br> <a href=\"http://localhost/railway/insert_into_classseats.php\">Insert the Class Seats into the train</a> ";

?>
</body>
</html>