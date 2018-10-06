<?php
include '../db/connect.php';
$level = $_POST['level'];
$quest = $_POST['question'];
$cat = $_POST['category'];
$topics = $_POST['testtopics'];
$choice_values = $_POST['choice_name'];
$no_of_choice = count($choice_values);

//print_r(array_chunk($choice_values,$no_of_choice));
print_r($_POST);
$ans = strtoupper($_POST['answer']);
$level = $_POST['level'];

//$tmp = array();
foreach ($topics as $value) {
    //echo "Key: $key; Value: $value\n";
	echo $value;
	$tmp[]=$value;

}
//print_r($tmp);
$jointopics = implode(",",$tmp);
echo $jointopics;
//die();

$query1 = "INSERT INTO questions(question,category_id,level,topics,isACtive) VALUES ('$quest','$cat','$level','$jointopics','1')";
$result = mysqli_query($query1) or die(mysql_error());

//get id of question that submitted
$question_id = mysql_insert_id();

if($no_of_choice == 1)
{
	$query2 = "INSERT INTO question_choices (question_id , is_Correct_Choice, choice1) VALUES ('$question_id', '$ans','$choice_values[0]')";
}
else if($no_of_choice == 2)
{
		$query2 = "INSERT INTO question_choices (question_id , is_Correct_Choice,choice1,choice2) VALUES ('$question_id', '$ans','$choice_values[0]','$choice_values[1]')";
}
else if($no_of_choice == 3)
{
	$query2 = "INSERT INTO question_choices (question_id , is_Correct_Choice,choice1,choice2,choice3) VALUES ('$question_id', '$ans','$choice_values[0]','$choice_values[1]','$choice_values[2]')";
}
else if($no_of_choice == 4)
{
		$query2 = "INSERT INTO question_choices (question_id , is_Correct_Choice,choice1,choice2,choice3,choice4) VALUES ('$question_id', '$ans','$choice_values[0]','$choice_values[1]','$choice_values[2]','$choice_values[3]')";
}
else if($no_of_choice == 5)
{
		$query2 = "INSERT INTO question_choices (question_id , is_Correct_Choice,choice1,choice2,choice3,choice4,choice5) VALUES ('$question_id', '$ans','$choice_values[0]','$choice_values[1]','$choice_values[2]','$choice_values[3]','$choice_values[4]')";
}
else if($no_of_choice == 6)
{
		$query2 = "INSERT INTO question_choices (question_id , is_Correct_Choice,choice1,choice2,choice3,choice4,choice5,choice6) VALUES ('$question_id', '$ans','$choice_values[0]','$choice_values[1]','$choice_values[2]','$choice_values[3]','$choice_values[4]','$choice_values[5]')";
}
else if($no_of_choice == 7)
{
		$query2 = "INSERT INTO question_choices (question_id , is_Correct_Choice,choice1,choice2,choice3,choice4,choice5,choice6,choice7) VALUES ('$question_id', '$ans','$choice_values[0]','$choice_values[1]','$choice_values[2]','$choice_values[3]','$choice_values[4]','$choice_values[5]','$choice_values[6]')";
}
else if($no_of_choice == 8)
{
		$query2 = "INSERT INTO question_choices (question_id , is_Correct_Choice,choice1,choice2,choice3,choice4,choice5,choice6,choice7,choice8) VALUES ('$question_id', '$ans','$choice_values[0]','$choice_values[1]','$choice_values[2]','$choice_values[3]','$choice_values[4]','$choice_values[5]','$choice_values[6]','$choice_values[7]')";
}
else if($no_of_choice == 9)
{
		$query2 = "INSERT INTO question_choices (question_id , is_Correct_Choice,choice1,choice2,choice3,choice4,choice5,choice6,choice7,choice8,choice9) VALUES ('$question_id', '$ans','$choice_values[0]','$choice_values[1]','$choice_values[2]','$choice_values[3]','$choice_values[4]','$choice_values[5]','$choice_values[6]','$choice_values[7]','$choice_values[8]')";
}
else if($no_of_choice == 10)
{
		$query2 = "INSERT INTO question_choices (question_id , is_Correct_Choice,choice1,choice2,choice3,choice4,choice5,choice6,choice7,choice8,choice9,choice10) VALUES ('$question_id', '$ans','$choice_values[0]','$choice_values[1]','$choice_values[2]','$choice_values[3]','$choice_values[4]','$choice_values[5]','$choice_values[6]','$choice_values[7]','$choice_values[8]','$choice_values[9]')";
}


else
{
	//die();
	return;
}
mysqli_query($query2) or die(mysql_error());
mysql_close();
?>