<?php
include '../db/connect.php';

$level = $_POST['level'];
$cat = $_POST['cat'];

$sql = "select * from test_topics where test_level = '$level' && test_cat = '$cat'";
$result = mysqli_query($sql) or die(mysql_error());
$data = mysql_fetch_object($result);
if($data->topic_content == '')
{
	return;
}
else
{
echo $data->topic_content;
}
?>