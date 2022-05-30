<html>
<body style=" background-image: url(https://img.wallpapersafari.com/desktop/800/450/56/8/EM7fHA.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php

require "db.php";

$sql = "DELETE from user where UID= ('".$_GET["id"]."')";
echo $_GET["id"];

if ($db->query($sql) === TRUE) {
    echo ": Record deleted successfully";
} else {
    echo "Error:" . $db->error;
}

echo "<br> <a href=\"http://localhost/railway/admin_login_1.php\">Go Back to Admin Menu!!!</a> ";

$db->close();
?>

</body>
</html>