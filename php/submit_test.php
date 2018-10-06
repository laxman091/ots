<?php
error_reporting(0);
include '../db/connect.php';
$studentid = $_REQUEST['sid'];
$total_duration = $_REQUEST['time'];
$testid = $_REQUEST['testid'];
$question_option = $_POST['question'];

//$qidarray = array();
//$qval = array();
/*$question_array=array();
foreach($question_option as $q=>$qopt) {
	$qusid = $q;
       foreach($qopt as $qval) {
             $question_array[] = $qval;
    }
}
$question_anwer = implode(',',$question_array);
echo $question_anwer;
die();*/

$count1 = 0;
$count2 = 0;
$attempt = 0;

$qidarray = array();
$qval_tmp = array();
foreach ($question_option as $questid=>$questval){
//$queid = $question_option[$];
//echo $queid;
$qidarray [] = $qid = $questid;

  foreach($questval as $qv) {
             //$question_array[] = $qval;
			 $qval_tmp[] = $qv;
             //echo ' - Options: ' . $qval;
       }
$qval = implode(',',$qval_tmp);
//echo $qval;
unset($qval_tmp);

/*if(empty($qval))
{
	$sql2 = "insert into score_students(stud_id,test_id,question_id,correct,wrong,attempt,unattempt) values('$studentid','$testid','$qid','0','0','0','1')";
	mysqli_query($sql2) or die(mysql_error());
}*/

$sql = "select * from question_choices where question_id = '$questid'";
$result = mysqli_query($con, $sql) or die(mysqli_error());

while($row = mysqli_fetch_object($result))
{
	$ans = $row->is_Correct_Choice;
	if($qval == $ans)
	{
		$sql1 = "insert into score_students(stud_id,test_id,question_id,correct,wrong,attempt,unattempt) values('$studentid','$testid','$qid','1','0','1','0')";
		mysqli_query($con, $sql1) or die(mysqli_error());
		$count1++;
	}
	else if($qval != $ans)
	{
		$sql2 = "insert into score_students(stud_id,test_id,question_id,correct,wrong,attempt,unattempt) values('$studentid','$testid','$qid','0','1','1','0')";
		mysqli_query($con, $sql2) or die(mysqli_error());
		$count2++;
	}
	else if($qval == '')
	{
		$sql2 = "insert into score_students(stud_id,test_id,question_id,correct,wrong,attempt,unattempt) values('$studentid','$testid','$qid','0','0','0','1')";
	mysqli_query($con, $sql2) or die(mysqli_error());
	}
}

}
$attempt = $count1+$count2;
$quesid = implode(",",$qidarray);
 
$sql3 = "insert into result_students(student_id,test_id,total_marks,attempt,duration) values('$studentid','$testid','$count1','$attempt','$total_duration')";
mysqli_query($con, $sql3) or die(mysqli_error());

$sql4 = "update students set test_id='$testid' where id = '$studentid'";
mysqli_query($sql4) or die(mysqli_error());

mysqli_close($con);
?>