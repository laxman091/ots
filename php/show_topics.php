<?php
include '../db/connect.php';
$level = $_REQUEST['level'];
$cat = $_REQUEST['cat'];
$name = $_REQUEST['testname'];
//$check_uncheck = $_REQUEST['chk_uncheck'];
//print_r($_POST);
//if($check_uncheck)
//{
?>

<select class="selectpicker pull-center quest_topics" id="<?php echo $cat; ?>" name="testtopics[]" multiple style="margin-right:5px;" multiple onchange="getTopic(this.value)">
   <!--option value="" selected><b>Topics<b></option-->
   <?php
	$sql = "select * from test_topics where test_level = '$level' && test_cat = '$cat' && test_name = '$name'";
	$result=mysqli_query($con, $sql) or die(mysql_error());
	//echo $total = mysql_num_rows($result);
	while ($row = mysqli_fetch_array($result))
	{
   ?>
   
  <option id="selectedOption" value="<?php echo $row[0]; ?>"><?php echo substr($row[4],0,18); ?></option>

  <?php
	}
/*}
else
{
	return false;
}*/	
  ?>
  </select>
