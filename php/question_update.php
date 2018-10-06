<?php
include '../db/connect.php';
$qid = $_POST['id'];
$qdata = $_POST['qdata'];

$sql = "update questions set question = '$qdata' where id = '$qid'";
mysqli_query($con, $sql) or die(mysqli_error());
mysqli_close($con);
?>