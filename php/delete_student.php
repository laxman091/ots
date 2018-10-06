<?php
include '../db/connect.php';
$id = $_POST['id'];
$sql = "delete from students where id = '$id'";
mysqli_query($con, $sql) or die(mysqli_error());
mysqli_close($con);
?>