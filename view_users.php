<html>
<body style=" background-image: url(https://img.wallpapersafari.com/desktop/800/450/56/8/EM7fHA.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php

require "db.php";

$cdquery="SELECT * FROM user";
$cdresult=mysqli_query($db,$cdquery);
echo "
<table border=1 style='width:100%'>
<thead style='background-color:#e23c52' align='center'><td>User Id</td><td>Email Id</td> <td>Password</td><td>Mobile No</td><td>Date Of Birth</td><td></td></thead>";

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
	echo "
<tr><td>".$cdrow[0]."</td><td>".$cdrow[1]."</td><td>".$cdrow[2]."</td><td>".$cdrow[3]."</td><td>".$cdrow[4]."</td><td><a href=\"http://localhost/railway/delete_user.php?id=".$cdrow[0]."\"><button>Delete</button></a></td></tr>
";
}
echo "</table>";

echo " <br><a href=\"http://localhost/railway/new_user_form.html\"> Add New User </a><br> ";
echo " <br><a href=\"http://localhost/railway/admin_login_1.php\">Go Back to Admin Menu!!!</a> ";
?>
</body>
</html>