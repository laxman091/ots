<?php
session_start();
include '../db/connect.php';
error_reporting(0);
//var_dump($_SESSION);
$user = $_SESSION['username'];
$id = $_SESSION['id'];

if($user == '' || $_SESSION['log_type'] =='admin' || $_SESSION['log_type'] =='content')
	//if($user == '')
{
	header('Location: ../index.php');
}
//echo 'id-' . $id . '<br>';
$sql = "select * from students where id = '$id'";
$result = mysqli_query($con, $sql) or die(mysqli_error());
$value = mysqli_fetch_object($result);
$category = $value->studentcategory;
//echo $category;
$sql2 = "SELECT students.studentcategory,students.attendTest, test_students.testlevel,test_students.testcategory, test_students.startdate,test_students.starttime,test_students.enddate,test_students.endtime
FROM students
RIGHT JOIN test_students
ON students.studentcategory=test_students.testcategory where students.studentcategory='$category'";
$today_date =  date("Y-m-d");
$result2 = mysqli_query($con, $sql2) or die(mysqli_error());
$value2 = mysqli_fetch_object($result2);
$isAttendTest = $value2->attendTest;
$test_level = $value2->testlevel;
$testcategory = $value2->testcategory;
$startdate = $value2->startdate;
$starttime = $value2->starttime;
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script-->
  <script src="../js/strict.js"></script>
  <script src="../js/strictreload.js"></script>
  <style>
  .btntest{
	  margin-top:10px;
  }
  </style>
  <script>
  $(document).ready(function()
  {
	  
  /*if (e.keyCode == 27) { // escape key maps to keycode `27`
        // <DO YOUR WORK HERE>
		$('#response_here').empty();
    }*/
	//$('#response_here').empty();
	$('.btntest').click(function(){
		//alert('start test');
		/*$.post("../php/update_student_status.php?sid=" + <?php echo $id; ?>);
			//var cat = "<?php echo $category; ?>";
			var url_to_load = "../php/start_test.php?cat="+cat;
		$('#response_here').load(url_to_load);*/
		$('.btntest').hide('fast');
		var level1 = "<?php echo $test_level; ?>";
		var cat = "<?php echo $category; ?>";
		//alert(level);
		$('#response_here').load('../php/student_test_details.php?cat='+cat+ '&level='+level1);
		});
		$('#show_result').click(function(){
			//alert('a');
			$('#response_here').load('../php/result2.php');
		});
		
		$('#review_question').click(function(){
			//alert('a');
			//var cat = "<?php echo $category; ?>";
			var url_to_load = "../php/review_test2.php?id="+<?php echo $id;?>;
			$('#response_here').load(url_to_load);
		});
		
		$(document).keypress(function(e) { 
   if (e.ctrlKey && e.keyCode == 82) {
        // 82 = r
   //alert("Ctrl is pressed: " + e.ctrlKey);
return;   
   }
});
	  
  });
  
  //disable back button
  history.pushState({ page: 1 }, "Title 1", "#no-back");
window.onhashchange = function (event) {
  window.location.hash = "no-back";
};


function restrictall()
{
	window.document.statusbar.enable = false;
window.document.titlebar.enable = false;
window.document.addressbar.enable = false;
disableSelection(document.body);
}

function disableSelection(target){
if (typeof target.onselectstart!="undefined") //For IE 
    target.onselectstart=function(){return false}
else if (typeof target.style.MozUserSelect!="undefined") //For Firefox
    target.style.MozUserSelect="none"
else //All other route (For Opera)
    target.onmousedown=function(){return false}
target.style.cursor = "default"
}
  </script>
</head>
<body onload="restrictall()" oncopy="return false" oncut="return false" onpaste="return false">

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
             <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <!--span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span-->
          </button>
          <a class="navbar-brand text-center" href="#">Online Test System</a>
        </div>
            <!-- /.navbar-header -->
			<div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <!--li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li-->
           
			<li class="dropdown" id="showopt2">
               
			   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage<span class="caret"></span></a>
			   
			 
                    <ul class="dropdown-menu dropdown-user" id="branch">
                        <li id="show_result"><a href="#"><i class="glyphicon glyphicon-plus"></i> Result</a>
                        </li>
                        <li id="review_question"><a href="#"><i class="glyphicon glyphicon-eye-open"></i> Review Test</a>
                        </li>
						
                    </ul>
					</li>
          </ul>
		  <ul class="nav navbar-nav dropdown-user pull-right">
		 
		  <?php //echo 'Welcome '; //$_SESSION['myusername'] . ' ';?>
            <li class="dropdown">
                <a href="" id="nbAcctDD" class="dropdown-toggle" data-toggle="dropdown"><?php //echo 'user '; ?><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
                <ul class="dropdown-menu pull-right" id="setting2">
				<li id="show_setting"><a href="#"><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
				<li><a href="../php/Logout.php"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
        </div>
        </nav>
 <?php
/*$sql3 = "select stud_id from score_students where stud_id='$id'";
$result3 = mysqli_query($sql3) or die(mysql_error());
$value = mysql_fetch_object($result3);
$stud_id = $value->stud_id;*/
?> 
<div class="container">
<div class="row">
    <div class="col-md-6 col-lg-4"></div>
	</div>
 <div class="row offset-4">
	<div id="show_test_btn">
	<?php if($startdate <= $today_date) { 
	if ($isAttendTest =='1') { ?>
	
	<button type="button" class="btn btn-danger btntest" style="display:none;">Start Test</button>
	
	<?php 
		}
			if($isAttendTest =='0'){?><button type="button" class="btn btn-danger btntest">Start Test</button>
				<!--div class = "alert alert-danger pull-right">
				<a href = "#" class = "alert-link">Note ! After start test you will not start again. Be carefully!!!.</a>
				</div-->

			<?php }
		} 
	?>
	</div>
	<div class="col-sm-4 col-md-9 col-lg-12"><div id="response_here"></div></div>
  </div>
</div>

</body>
</html>
