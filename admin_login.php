<html>
<body style=" background-image: url(https://img.wallpapersafari.com/desktop/800/450/56/8/EM7fHA.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
<div align="center">
<?php 
session_start();
$_SESSION["admin_login"]=False;
if($_POST["uid"]=='admin' AND $_POST["password"]=='admin' )
{
$_SESSION["admin_login"]=True;
}

if($_SESSION["admin_login"]==True)
{
echo " <br><a href=\"http://localhost/railway/view_stations.php\">View All Stations </a><br> ";
echo " <br><a href=\"http://localhost/railway/view_trains.php\">View All Trains </a><br> ";
echo " <br><a href=\"http://localhost/railway/view_users.php\">View All Users </a><br> ";
echo " <br><a href=\"http://localhost/railway/booked.php\"> View All Booked tickets </a><br> ";
echo " <br><a href=\"http://localhost/railway/cancelled.php\"> View All Cancelled tickets </a><br> ";
}


else 
{

echo "
Wrong Credentials. Kindly Login Again!!!<br><br>
<form action=\"admin_login.php\" method=\"post\">
User ID: <input type=\"text\" name=\"uid\" required><br><br>
Password: <input type=\"password\" name=\"password\" required><br><br>
<input type=\"submit\">
</form>
";
}


?>
<br><a href="http://localhost/railway/index.htm">Log Out</a>
</div>
</body>
</html>