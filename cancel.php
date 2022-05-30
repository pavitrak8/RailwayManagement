<html>

<body style=" background-image: url(https://wallpaperaccess.com/full/1900913.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >

<?php 

session_start();

require "db.php";

$pnr=$_POST["cancpnr"];
$uid=$_SESSION["id"];

$sql=" UPDATE ticket SET status ='CANCELLED' WHERE ticket.pnr='".$pnr."' AND ticket.tid='".$uid."' ";

if ($db->query($sql) === TRUE) 
{
 echo "Cancellation Successful!!!";
} 
else 
{
 echo "<br><br>Error:" . $db->error;
}

echo " <br><br><a href=\"http://localhost/railway/index.htm\">Home Page</a><br>";

$db->close(); 
?>

</body>
</html>