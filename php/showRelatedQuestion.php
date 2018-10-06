<?php
include '../db/connect.php';
$question = $_POST['quest'];

//$sql = "SELECT * FROM questions WHERE question LIKE '$question%'";	// uncomment this if search start from left to right
$sql = "SELECT * FROM questions WHERE question LIKE '%$question%'";
$result = mysqli_query($con, $sql) or die(mysqli_error());
while($row = mysqli_fetch_array($result))
{
		echo "<font color='red'>" . $row[1] . "</font><br>";
}
return;
?>