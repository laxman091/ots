<?php
//session_start();
include '../db/connect.php';
$studentid = $_REQUEST['sid'];
$total_duration = $_REQUEST['time'];
$testid = $_REQUEST['testid'];
$question_option = $_POST['question'];
//$option_check = $_POST['optcheck']; 
/*echo $studentid . ' <br>';
echo $testid;
print_r($_POST);*/
//$sql = "select * from question";
$count1 = 0;
$count2 = 0;
$attempt = 0;

$qidarray = array();
foreach ($question_option as $questid=>$questval){
//echo 'qid: ' . $qid . $qval . '<br>';
$qidarray [] = $qid = $questid;
$qval = $questval;
$sql = "select * from question_choices where question_id = '$questid'";
$result = mysqli_query($sql) or die(mysql_error());
//$result = $mysqli->query($sql);
while($row = mysql_fetch_object($result))
{
	$attempt++;
	//$row->question_id;
	$ans = $row->is_Correct_Choice;
	if($qval == $ans)
	{
		$sql1 = "insert into score_students(stud_id,test_id,question_id,correct,wrong,attempt,unattempt) values('$studentid','$testid','$qid','1','0','1','0')";
		mysqli_query($sql1) or die(mysql_error());
		//$count = $count + 1;
		$count1++;
		//echo 'yes';
	}
	if($qval != $ans)
	{
		$sql2 = "insert into score_students(stud_id,test_id,question_id,correct,wrong,attempt,unattempt) values('$studentid','$testid','$qid','0','1','1','0')";
		mysqli_query($sql2) or die(mysql_error());
		$count2++;
		//echo 'no';
	}
	/*if($qval == '')
	{
		$sql2 = "insert into score_students(stud_id,test_id,question_id,correct,wrong,attempt,unattempt) values('$studentid','$testid','$qid','0','0','0','1')";
		mysqli_query($sql2) or die(mysql_error());
		$count2++;
		//echo 'no';
	}*/
}

}

 $quesid = implode(",",$qidarray);
$sql3 = "insert into result_students(student_id,test_id,total_marks,attempt,duration) values('$studentid','$testid','$count1','$attempt','$total_duration')";
mysqli_query($sql3) or die(mysql_error());

$sql4 = "update students set test_id='$testid' where id = '$studentid'";
mysqli_query($sql4) or die(mysql_error());

/*$std_obj = new UpdateStudentTable;
$std_obj->updatestudent($studentid,$testid);

class UpdateStudentTable
{
	function updatestudent($sid,$tstid){
		//$sql4 = "update students set attendTest = '1',test_id='$tstid' where id = '$sid'";
		$sql4 = "update students set test_id='$tstid' where id = '$sid'";
		mysqli_query($sql4) or die(mysql_error());
      }
}*/
mysql_close($con);
?>