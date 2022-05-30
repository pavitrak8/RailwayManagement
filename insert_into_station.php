<html>
<body style=" background-image: url(https://img.wallpapersafari.com/desktop/800/450/56/8/EM7fHA.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">


<?php

require "db.php";

$sql = "INSERT INTO station(stn_name) VALUES ('".$_POST["sname"]."')";

if ($db->query($sql) === TRUE) {
    echo " '".$_POST["sname"]."' : New Station added successfully";
} else {
    echo "Error:" . $db->error;
}

echo "<br> <a href=\"http://localhost/railway/admin_login_1.php\">Go Back to Admin Menu!!!</a> ";

$db->close();
?>

</body>
</html>