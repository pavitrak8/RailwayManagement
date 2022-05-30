<html>
<body style=" background-image: url(https://wallpaperaccess.com/full/1900913.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >

<?php 

require "db.php";

$pwd=$_POST["password"];
$email=$_POST["emailid"];
$mbl=$_POST["mobileno"];
$dob=$_POST["dob"];

$sql = "INSERT INTO user (Password,Email,Mbl_no,DOB) VALUES ('".$pwd."','".$email."','".$mbl."','".$dob."')";

if ($db->query($sql) === TRUE) 
{
 echo "Hi $email<br><br> <a href=\"http://localhost/railway/index.htm\"> Click here </a> to browse through our website!!! " ;
} 
else 
{
 echo "Error:" . $db->error. "<br><br>
 <a href=\"http://localhost/railway/new_user_form.html\">Go Back to Registration!!!</a> ";
}

$db->close(); 
?>

</body>
</html>