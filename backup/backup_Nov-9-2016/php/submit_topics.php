<?php
include '../db/connect.php';
//print_r($_POST);
$cat = $_POST['category'];
$level = $_POST['level'];
$name = $_POST['name'];
$content = $_POST['toppic_content'];
print_r($_POST);
$sql1 = "select * from test_topics where test_level= '$level' && test_cat='$cat' && test_name='$name'";
$result1 = mysqli_query($sql1) or die(mysql_error());
$num_rows = mysql_num_rows($result1);
echo $num_rows;
//die();
if($num_rows>0)
{
$sql2 = "update test_topics set test_level= '$level', test_cat='$cat', test_name='$name',topic_content='$content' where test_level= '$level' && test_cat='$cat' && test_name='$name'";
mysqli_query($sql2) or die(mysql_error());
}
else {
  $sql3 = "insert into test_topics(test_level,test_cat,test_name,topic_content) values('$level','$cat','$name','$content')";
  mysqli_query($sql3) or die(mysql_error());
}
mysql_close($con);
?>