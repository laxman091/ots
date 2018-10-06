<?php
session_start();
error_reporting(0);
include '../db/connect.php';
$student_id = $_SESSION['id'];
$cat = $_REQUEST['cat'];
$cat = strtoupper($cat);
$timezone = new DateTimeZone(date_default_timezone_get());
$date = new DateTime('now', $timezone);

$sql = "select * from category where category_name = '$cat'";
$result = mysqli_query($con, $sql) or die(mysqli_error());
$value = mysqli_fetch_object($result);
$cat_id = $value->id;
$cat_name = strtolower($value->category_name);
//place this before any script you want to calculate time
$time_start = microtime(true); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<style type="text/css">
.bs-example {
	margin: 20px;
}
#content {
	width: 900px;
	margin: 0 auto;
	font-family: Arial, Helvetica, sans-serif;
}
.page {
	float: right;
	margin: 0;
	padding: 0;
}
.page li {
	list-style: none;
	display: inline-block;
}
.page li a, .current {
	display: block;
	padding: 5px;
	text-decoration: none;
	color: #8A8A8A;
}
.current {
	font-weight: bold;
	color: #000;
}
.button {
	padding: 5px 15px;
	text-decoration: none;
	background: #333;
	color: #F3F3F3;
	font-size: 13PX;
	border-radius: 2PX;
	margin: 0 4PX;
	display: block;
	float: left;
}
#refresh-msgId {
	margin-top: 10px;
	margin-right: 200px;
	float: right;
 //position: absolute;
}
.alert-warning {
	color: #8a6d3b;
	background-color: #fcf8e3;
	border-color: #faebcc;
}
.alert {
	padding: 15px;
	margin-bottom: 20px;
	border: 1px solid transparent;
	border-radius: 4px;
}
.q_choice {
	margin-left: 5px;
}
</style>
<script>
$(document).ready(function(){
	$('.btntest').hide('fast');
	//$('form').delay(50000).submit();
	$('.submit_test').click(function(){

		<?php 
		$time_end = microtime(true);
		//dividing with 60 will give the execution time in minutes other wise seconds
		$test_duration = ($time_end - $time_start)/60;
		?>
		//var test_duration = $('#time').text();
		var data = $("form").serialize();
			//$.post("../php/submit_test.php?sid=" + <?php echo $student_id; ?> + '&testid=' + <?php echo $cat_id; ?>, data, function() {
				$.post("../php/submit_test.php?sid=" + <?php echo $student_id; ?> + '&testid=' + <?php echo $cat_id; ?> + '&time=' + <?php echo $test_duration; ?>, data, function(result) {
					//console.log(result);
					//return false;
			//$('#response_here').empty();
			$('#response_here').load('../php/result2.php');
			//$('form').reset();
			});
	});
	var fiveMinutes = 60 * 30,
        display = $('#time');
    startTimer(fiveMinutes, display);

	// move div on scroll
	$(window).scroll(function(){
		$(".movescroll").stop().animate({"marginTop": ($(window).scrollTop()) + "px", "marginLeft":($(window).scrollLeft()) + "px"}, "slow" );
});
	
});

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
	
}
document.onmousedown=disableclick;
status="Right Click Disabled";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
window.history.forward();
    function noBack() { window.history.forward(); }
</script>
</head>
<body oncontextmenu="return false" onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
<div class="alert alert-warning" role="alert" id="refresh-msgId" style="top: 70px;"><b>Don't Refresh the Page !! ...</b></div>
<div id="content">
  <div class="row">
    <div class="col-md-3 col-lg-4 text-center">
      <h2>Start Test</h2>
    </div>
  </div>
  <div class="bs-example">
    <div class="row">
      <div class="col-md-3 col-lg-4">
        <div class="panel panel-default movescroll">
          <div class="panel-heading pull-center">Test Time <i class="fa fa-clock-o" aria-hidden="true"></i></div>
          <div class="panel-body">
            <?php //echo $date;  ?>
            <div><i class="fa fa-clock-o" aria-hidden="true"></i> <font color="red">Test closes in <span id="time">20:00</span> minutes!</font></div>
          </div>
        </div>
      </div>
      <div class="col-md-8 col-lg-8"> 
        <!--form action="submit_test.php" method="post" id="onlinetest"-->
        <form>
          <?php

$query = "select * from test_students where testcategory = '$cat_name'";
$rs = mysqli_query($con, $query) or die(mysqli_error());

$rec = mysqli_fetch_object($rs);
$test_level = $rec->testlevel;
$test_topics = $rec->testtopics;

$topic_array =  explode('^', $test_topics);

foreach($topic_array as $ta)
{
$sql1 = "SELECT t1.id,t1.question,t1.topics,t1.question_type FROM questions t1 JOIN category t2 ON t2.id = t1.category_id WHERE t1.category_id = '$cat_id' && t1.topics = '$ta' order by RAND() LIMIT 50 ";
$result1 = mysqli_query($con, $sql1) or die(mysqli_error());

$i=1;
while($row1 = mysqli_fetch_array($result1))
{
$id = $row1[0];
$quest = $row1[1];
$qtype = $row1['question_type'];
?>
          <div id="question_option" style="border:1px;">
            <div id="quest">
              <h4><?php echo '<span style="color:green;">' .$i . '</span>- ' . $quest; 	//. '-' . $id . '-Topic: ' . $ta . ' ' . $qtype; ?></h4>
            </div>
            <div>
             <input type="hidden" name="question[<?php echo $id ?>]" value="<?php echo $id; ?>">
            </div>
            <?php //if($qtype == 'multiple') { ?>
            <div class="q_choice">
              <ul class="list-unstyled">
                <?php $sql2 = "select * from question_choices where question_id = '$id' ";
	
						$result2 = mysqli_query($con, $sql2) or die(mysqli_error());
						while($row = mysqli_fetch_object($result2))
						{
								//$ans_choice = $row->answer_choices;
								$ans_choice = $row->answer_choices;
								$separated_choices_array = explode('^',$ans_choice);
								
								
				
									//for($i=0; $i<count($separated_choices); $i++){
										$as =1;
										foreach($separated_choices_array as $sa) {
											//check multiple and single answer_choices
												if($qtype == 'multiple')
												{ ?>
													<li>
											  <div>
												<input type="checkbox" name="question[<?php echo $id ?>][]" value="<?php echo $as;  ?>">
												<?php echo $sa; ?></div>
											</li>	
													<?php
												}
												else if($qtype == 'truefalse')
												{
													?>
													<li>
											  <div>
												<input type="radio" name="question[<?php echo $id ?>][]" value="<?php echo $as;  ?>">
												<?php echo $sa; ?></div>
											</li>
													<?php
													
												}
									?>
											<!--li>
											  <div>
												<input type="radio" name="question[<?php //echo $id ?>]">
												<?php //echo $sa; ?></div>
											</li-->
									<?php $as++;  } } ?>
              </ul>
            </div>
							<?php //}	//end of if ?>
          </div>
          <?php $i++;
	} // while loop
} // foreach loop	

	mysqli_close($con);
	?>
          <button type="button" class="btn btn-danger submit_test">Submit</button>
          <hr>
          <p><b>Note:</b> Don't click/press back button during test.</p>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
