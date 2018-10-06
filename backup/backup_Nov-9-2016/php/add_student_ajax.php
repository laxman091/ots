<?php
include '../db/connect.php';
$fullname = $_POST['fullname'];
$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];
$stype = $_POST['studtype'];
$cat = $_POST['category'];
$city = $_POST['city'];
$phone = $_POST['phone'];
//print_r($_POST);
if($stype =='')
{
	return;
}
if($stype == 'student'){
$sql1 = "insert into students (fullname,username,password,email,login_type,studentcategory,stud_city,stud_phone) values('$fullname','$user','$pass','$email','$stype','$cat','$city','$phone')";
mysqli_query($sql1) or die(mysql_error());
}
if($stype == 'admin' || $stype =='content')
{
$sql2 = "insert into members (fullname,username,password,email,login_type,isActive) values('$fullname','$user','$pass','$email','$stype','1')";
mysqli_query($sql2) or die(mysql_error());	
}
mysql_close($con);
?>