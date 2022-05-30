<html>
<body style=" background-image: url(https://wallpaperaccess.com/full/1900913.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >


<?php 

session_start();

require "db.php";

$pname=$_POST["pname"];
$page=$_POST["page"];
$pgender=$_POST["pgender"];

$tno=$_SESSION["tno"];
$doj=$_SESSION["doj"];
$sp=$_SESSION["sp"];
$dp=$_SESSION["dp"];
$class=$_SESSION["class"];
$id=$_SESSION["id"];
//echo "$tno $doj $class";

$query=" SELECT fare FROM classseats WHERE Train_no='".$tno."' AND class='".$class."' AND DOJ='".$doj."' AND sp='".$sp."' AND dp='".$dp."'  ";
$result=mysqli_query($db,$query) or die(mysql_error());

$row=mysqli_fetch_array($result);
$fare=$row[0];
//echo "$fare";
$tempfare=0;
$temp=0;

for($i=0;$i<$_SESSION["nos"];$i++) 
{
 if($page[$i]>=18)
 {
  $temp++;
  $tempfare+=$fare;
 }
 else if($page[$i]<18)
  $tempfare+=0.5*$fare;
 else if($page[$i]>=60)
  $tempfare+=0.5*$fare;
}
//echo "   $tempfare";

if($temp==0)
{
 echo "<br><br> Cannot Book. Atleast one adult must accompany!!!";
 echo "<br><br><a href=\"http://localhost/railway/enquiry.php\">Back to Enquiry</a> <br>";
 die();
}

echo "Total fare is Rs.".$tempfare."/-";

$sql = "INSERT INTO ticket(tid,Train_no,src,dest,doj,tfare,class,nos) VALUES ('".$_SESSION["id"]."','".$_SESSION["tno"]."','".$_SESSION["sp"]."','".$_SESSION["dp"]."','".$_SESSION["doj"]."','".$tempfare."','".$_SESSION["class"]."','".$_SESSION["nos"]."' )";

if ($db->query($sql) === TRUE) 
{
 echo "<br><br>Reservation Successful";
} 
else 
{
 echo "<br><br>Error: " . $db->error;
}

$tid=$_SESSION["id"];
$ttno=$_SESSION["tno"];
$tdoj=$_SESSION["doj"];

$query=" Select pnr from ticket where tid='".$tid."' AND Train_no='".$ttno."' AND doj='".$tdoj."' ";
$result=mysqli_query($db,$query) or die(mysql_error());

$row=mysqli_fetch_array($result);
$rpnr=$row['pnr'];

$tpname=$_POST['pname'];
$tpage=$_POST["page"];
$tpgender=$_POST["pgender"];

for($i=0;$i<$_SESSION["nos"];$i++) 
{
$sql = "INSERT INTO passenger(pnr,name,age,gender) VALUES  ('".$rpnr."','".$tpname[$i]."','".$tpage[$i]."','".$tpgender[$i]."')";

if ($db->query($sql) === TRUE) 
{
 echo "<br><br>Passenger details added!!!";
} 
}

echo "<br><br><a href=\"http://localhost/railway/index.htm\">Go Back!!!</a> <br>";

$db->close(); 
?>

</body>
</html>