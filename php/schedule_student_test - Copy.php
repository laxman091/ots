<?php
session_start();
include '../db/connect.php';
//$id = $_GET['id'];
//$rgn = $_SESSION['region'];
/*echo $id;
echo $rgn;*/
//die();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
<!--script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script-->
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script-->
<!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
<!--script src="../js/global.js"></script-->

<style>
.height {
	min-height: 200px;
}
.icon {
	font-size: 47px;
	color: #5CB85C;
}
.iconbig {
	font-size: 77px;
	color: #5CB85C;
}
.table > tbody > tr > .emptyrow {
	border-top: none;
}
.table > thead > tr > .emptyrow {
	border-bottom: none;
}
.table > tbody > tr > .highrow {
	border-top: 3px solid;
}
.panel-heading span {
	margin-top: -26px;
	font-size: 15px;
	margin-right: -12px;
}
.clickable {
	background: rgba(0, 0, 0, 0.15);
	display: inline-block;
	padding: 6px 12px;
	border-radius: 4px;
	cursor: pointer;
}
.field_wrapper {
	margin-left: 20px;
}
#showtopics {
	margin-right: 5px;
}
</style>
<script>
var strlevel;
var strcat;
var quest_cat;
var topics = [];
var holdresponse = [];

var test_level;
var tst;
var start_dt;
var start_tm;
var end_dt;
var end_tm;


$(document).ready(function(){


	
		test_level = $('#testlevel option:selected').val();
		//var chkbox = $("input[type='checkbox']").val();
		start_dt = $('#startdate').val();
		start_tm = $('#starttime').val();
		end_dt = $('#enddate').val();
		end_tm = $('#endtime').val();
		
		$('.datepicker2').change(function(){
			//alert($('select option:selected').val() + $("input[type='checkbox']").val() + $('.datepicker1').val());
		
			$('.scheduledtest').removeClass('disabled');	
		
		});
	
		
	
	$('.chkb').click(function(){
	
			//event.preventDefault();
			quest_cat = $(this).val();
			//var uncheck_chkbox = $("input[type='checkbox']").is(':checked');
			test_level = $('#testlevel option:selected').val();
			tst = $(this).closest('label').find('#tsname').text();
			var chkbox = $("input[type='checkbox']").val();
			var uncheck_chkbox = $(this).prop('checked');
			//alert(uncheck_chkbox);
			
			//var wrapper = $('.field_wrapper');
			//var data = $('#showtopics').load('../php/show_topics.php?level='+strlevel+'&cat='+quest_cat+'&testname='+tst); // Add field html
			//$('input[type=checkbox]:checked').each(function(){
				
				if(test_level == '')
				{
					return;
				}
			
			if(uncheck_chkbox)
			{	//$(this).prop('checked', true);
				$.ajax({
				type:'POST',
				url:'../php/show_topics.php',
				data: {'level':test_level,'cat':quest_cat,'testname':tst},
				//data: {'level':test_level,'cat':quest_cat,'testname':tst},
				success: function(response)
				{
					//alert(response);
					//do your stuff here
					 				  
					$('#showtopics').append(response);   
				
				},
				complete: function()
				{
					//$(this).data('requestRunning', false);
					return false;
				},
				error: function()
				{
					return false;
				}
				});
				//$(this).prop('checked', true);
				//$('.myCheckbox').prop('checked', false);
			}
			if(!uncheck_chkbox){
				//alert('a');
					$('.quest_topics').each(function() {
					if($(this).attr('id') == quest_cat)
					{
						//alert($(this).attr('id'));
						$(this).hide();
						//return;
					}
						});
						//$(this).prop('checked', false);
						//uncheck_chkbox.prop('checked',false);
					//return ; 
				}
				
			
			});
	
	
	$('.scheduledtest').click(function()
	{	
		//event.preventDefault();
				
		test_level = $('#testlevel option:selected').val();
		//var chkbox = $("input[type='checkbox']").val();
		start_dt = $('#startdate').val();
		start_tm = $('#starttime').val();
		end_dt = $('#enddate').val();
		end_tm = $('#endtime').val();
		
		//category_topics.push({catgory:cat_arr,topics:cat_topic});
		var data = $("form").serialize();
		//alert(data);
		//topics.unique();
		
		
		/*$.post("../php/schedule_test.php", {data} , function() {
			$("#response_here").empty();
			});*/
		
			$.post('../php/schedule_test.php', data);
			$("#response_here").empty();
			
			//var data = $("form").serialize();
			/*$.post("../php/schedule_test.php", data, function() {
			$('#response_here').load('../php/schedule_student_test.php');
			});*/
		
			/*$.ajax({
			type:'POST',
			data: {'testlevel': test_level ,'testcategory':cat_arr,'testtopics':topics,'startdate':start_dt, 'starttime':start_tm,'enddate':end_dt,'endtime':end_tm},
			//data: {data},
			url: '../php/schedule_test.php',
			success: function()
			{
				//alert(response);
				$("#response_here").empty();
			},
			error: function()
			{
					//$('#response_here').text(response);
					//if(response =='')
					//$('$response_here').load('../php/errorPage.php');
			}
		});*/
	});
	
});

function getLevel(strlevel)
{
	this.strlevel = strlevel;
	if(strlevel == '')
	{
		$('#showtopics').html('');
		$("input[type='checkbox']").prop('checked' , false);
	}
}

function getTopic(topic)
{
	//alert(topic);
	topics.push(topic);
	//topics.unique();
}
</script>
</head>
<body>
<div class="panel-body">
  <form id="schedule_form">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
          <div class="col-xs-12 col-md-5 col-lg-5 pull-left">
            <div class="panel panel-default height">
              <div class="panel-heading">Choose Test Level & category</div>
              <div class="col-xs-2">
                <label for="limit">Question Limit</label>
                <input class="form-control" id="limit" type="text">
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="panel-body">
                  <div class="form-group" style="width:100px;"> 
                    <!--label for="test">Test Level:</label--> 
                    <!--form-->
                    <select class="form-control" name="testlevel" id="testlevel" onchange="getLevel(this.value)">
                      <option value="" selected>Select</option>
                      <option value="easy">Easy</option>
                      <option value="medium">Medium</option>
                      <option value="tough">Tough</option>
                    </select>
                    <!--/form--> 
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-lg-4">
                <div class="panel-body"> 
                  <!--form-->
                  <div class="form-group" style="margin-left:20px;">
                    <?php 
							$sql = "select * from category";
							$result = mysqli_query($sql) or die(mysql_error());
							while($row = mysql_fetch_object($result))
							{
						?>
                    
                    <!--div class="form-group" style="margin-left:20px;"-->
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="<?php echo strtolower($row->id);?>" name="testcategory[]" class="chkb">
                        <span id="tsname"><?php echo strtoupper($row->category_name); ?></span></label>
                    </div>
                    <?php } ?>
                    <!--div class="checkbox">
							  <label><input type="checkbox" value="php" name="testlevel" class="chkb">PHP</label>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" value="dotnet" name="testlevel" class="chkb">Dot Net</label>
							</div--> 
                  </div>
                  <!--/form--> 
                </div>
              </div>
            </div>
            <!--/div--> 
          </div>
          <div class="col-xs-12 col-md-6 col-lg-6">
            <div class="panel panel-default height">
              <div class="panel-heading">Test topics</div>
              <div class="panel-body"> 
                <!--form-->
                <div class="form-group" style="margin-left:20px;">
                  <div class="field_wrapper">
                    <div id="showtopics" style="margin-right:5px;"></div>
                  </div>
                </div>
                <!--/form--> 
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-1 col-lg-1">
            <div class="affix-btn">
              <button name="submit" type="submit" value="Save" class="btn pull-right closediv" data-offset-top="0">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h5 class="text-center"><strong>Schedule summary</strong></h5>
          </div>
          <div class="panel-body">
            <div class="table-responsive"> 
              <!--form-->
              <table class="table table-condensed">
                <thead>
                  <!--tr class="info">
                    <td class="text-center" align="center" colspan="2"><strong>Test Dates</strong></td>
                    <td class="text-center"><strong>Time</strong></td> 
                  </tr-->
                  <tr>
                    <td class="text-center"><strong>Start Date with time</strong>
                      <div class="form-group">
                        <input type="date" name="startdate" id="startdate" class="datepicker1" value=""/>
                        <input type="time" name="starttime" id="starttime" value=""/>
                        <span class="glyphicon glyphicon-calendar pull-center"></span> </div></td>
                    <td class="text-center"><strong>End Date with time</strong>
                      <div class="form-group">
                        <input type="date" name="enddate" id="enddate" class="datepicker2" value=""/>
                        <input type="time" name="endtime" id="endtime" value=""/>
                        <span class="glyphicon glyphicon-calendar pull-center"></span> </div></td>
                    <!--td class="text-center"><strong>Test Time</strong></td--> 
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="2" align="center"><b>Note: </b>This test will be apply to all student according to categorywise.</td>
                  </tr>
                  <tr>
                    <td colspan='2' align='center'><a href="#" class="btn btn-success disabled scheduledtest"> Schedule Test</a></td>
                  </tr>
                </tbody>
              </table>
              <!--/form--> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<?php
//print_r($_SESSION);
?>
</body>
</html>