<?php
include '../db/connect.php';
error_reporting(0);
$level = $_POST['testlevel'];
$category = $_POST['testcategory'];
$topics = $_POST['testtopics'];
$sdate = $_POST['startdate'];
$stime = $_POST['starttime'];
$edate = $_POST['enddate'];
$etime = $_POST['endtime'];
//$cat_topics = $_POST['category_topics'];

print_r($_POST);
/*foreach ($_POST as $param_name => $param_val) {
    echo "Param: $param_name; Value: $param_val<br />\n";
}*/

//die();
//$tmp = array();
/*foreach ($topics as $value) {
    //echo "Key: $key; Value: $value\n";
	echo $value;
	$tmp[]=$value;

}*/

//$jointopics = implode(" , ",$tmp);

//die();
// $tmp = array();
echo '<br>-------<br>';
print_r($category);
echo '<br>-------<br>';
print_r($topics);
echo '<br>---------<br>';

//die();
foreach($category as $cat)
{
	//echo $cat . ': ';
	$sql1 = "select * from category where id = '$cat'";
	$result1 = mysqli_query($con, $sql1) or die(mysqli_error());
	$row1 = mysqli_fetch_object($result1);
	//$c = $row1->id;
	echo '<br>Category: ' . $cat . ' ' ;
	$tn = $row1->category_name;
	$cat_name= strtolower($tn);
	
	foreach($topics as $topic)
	{
	//$tmp[] = $t;
	//$sql2= "select * from test_topics where test_level = '$level' && test_cat = '$cat' && test_name = '$cat_name'";
	$sql2= "select * from test_topics where id = '$topic' && test_level = '$level' && test_cat = '$cat'";
	$result2 = mysqli_query($con, $sql2) or die(mysqli_error());
	$row2 = mysqli_fetch_object($result2);
	$topic_id = $row2->id;
	//echo '<br>----<br>Topic ID: ' . $topic_id . '---------<br>';
		if($topic_id != null)
		{
			$tmp[] = $topic_id;
			echo $topic_id . ' ';
		}
		
		//$tmp[] = $topic_id;
	
	}
	
		//var_dump($tmp);
	$tmpjoin = implode("," , $tmp);
	//$tmpjoin = array_filter($tmpjoin);
		
		$sql3 = "insert into test_students (testlevel,testcategory,testtopics,startdate,starttime,enddate,endtime) values('$level','$cat_name','$tmpjoin','$sdate','$stime','$edate','$etime')";
		mysqli_query($sql3) or die(mysql_error());
		unset($tmp);
	
}

//var_dump($tmpjoin);

mysql_close($con);
?>