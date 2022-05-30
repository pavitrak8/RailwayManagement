<html>
<body style=" background-image: url(https://img.wallpapersafari.com/desktop/800/450/56/8/EM7fHA.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">


<?php
session_start();


require "db.php";

$stations=$_SESSION["stations"];

$temp = 0;
$dest = $_SESSION["ns"];
if($_POST["s1".$temp]>0)
{$sql = "INSERT INTO classseats (Train_no,sp,dp,DOJ,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".$dest]."','".$_SESSION["doj"]."','1AC','".$_POST["s1".$temp]."','".$_POST["f1".$temp]."')";
$flag=($db->query($sql));
}
if($_POST["s2".$temp]>0)
{$sql = "INSERT INTO classseats (Train_no,sp,dp,DOJ,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".$dest]."','".$_SESSION["doj"]."','2AC','".$_POST["s2".$temp]."','".$_POST["f2".$temp]."')";
$flag=($db->query($sql));
}
if($_POST["s3".$temp]>0)
{$sql = "INSERT INTO classseats (Train_no,sp,dp,DOJ,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".$dest]."','".$_SESSION["doj"]."','3AC','".$_POST["s3".$temp]."','".$_POST["f3".$temp]."')";
$flag=($db->query($sql));
}
if($_POST["s4".$temp]>0)
{$sql = "INSERT INTO classseats (Train_no,sp,dp,DOJ,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".$dest]."','".$_SESSION["doj"]."','SL','".$_POST["s4".$temp]."','".$_POST["f4".$temp]."')";
$flag=($db->query($sql));
}

if ($flag === TRUE) {
    echo "New seat arrangement added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

echo "<br> <a href=\"http://localhost/railway/admin_login_1.php\">Go Back to Admin Menu!!!</a> ";

?>
</body>
</html>