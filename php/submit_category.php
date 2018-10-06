<?php
include '../db/connect.php';

$cat = strtoupper($_POST['cat']);
print_r($_POST);
$sql = "insert into category(category_name , isActive) values('$cat' , '1')";
mysqli_query($con, $sql) or die(mysqli_error());
mysqli_close($con);
?>