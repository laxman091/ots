<?php
include '../db/connect.php';
/*if(isset($_REQUEST['submit'])){
	$field_values_array = $_REQUEST['choice_name'];
	
	print '<pre>';
	print_r($field_values_array);
	print '</pre>';
	
	foreach($field_values_array as $value){
		//your database query goes here
	}
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add more fields using jQuery</title>
<style>
form {
	margin-top: 10px;
}
input:focus{
	background-color: yellow
}
</style>
<script src="../js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var ansopt = ["A", "B", "C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
	var chk = $('.quest').length;
	//console.log(chk);
	var maxField = 26; //Input fields increment limitation
	var addButton = $('.add_button'); //Add button selector
	var wrapper = $('.field_wrapper'); //Input field wrapper
	var fieldHTML = '<div><input type="text" name="choice_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="../images/remove-icon.png"/></a></div>'; //New input field html 
	var x = 1; //Initial field counter is 1
	$(addButton).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			$(wrapper).append(fieldHTML); // Add field html
			for(var i=0; i < x;i++){
			$('#ans').html("<option value='ansopt[i].tolowercase();'>ansopt[i]</option>");				
			//alert(ansopt.length);	
			
			}
			
		}
	});
	$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
		e.preventDefault();
		$(this).parent('div').remove(); //Remove field html
		x--; //Decrement field counter
	});
	
	//submit form on on click
	$('.addquest').click(function(){
		
			var data = $("form").serialize();
			//alert(data);
			$.post("../php/submit_question.php", data, function() {
			//console.log(data);
			//$('form').reset();
			//$('#response_here').empty();
			$('#response_here').load('../php/add_question_new.php');
			});
	});
	
	$('#question').keyup(function(){
		var quest = $(this).val();
		if(quest.length == 0){
			$('#showRelatedQuestion').html('');
		}
				
		if(quest.length>0){
			//alert(quest);
			$.ajax({
				type:'POST',
				data: {'quest':quest},
				url:'../php/showRelatedQuestion.php',
				success: function(response)
				{
					//alert(response)
					$('#showRelatedQuestion').html(response);
				},
				error: function()
				{}
			});
		}
	});
	
});

//var yourGlobalVariable;
var strlevel;
var strcat;
function getLevel(strlevel)
{
	this.strlevel = strlevel;
}

function getCategory(strcat)
{
	this.strcat = strcat;
	var quest_cat = $('#question_cat option:selected').text();
	//alert(strlevel + strcat + quest_cat);
	
	$('#showtopics').load('../php/show_topics.php?level='+strlevel+'&cat='+strcat+'&testname='+quest_cat);
}
</script>
<style type="text/css">
input[type="text"] {
	height: 20px;
	vertical-align: top;
}
.field_wrapper div {
	margin-bottom: 10px;
}
.add_button {
	margin-top: 10px;
	margin-left: 10px;
	vertical-align: text-bottom;
}
.remove_button {
	margin-top: 10px;
	margin-left: 10px;
	vertical-align: text-bottom;
}
select {
	margin: 5px 5px;
}
</style>
</head>
<body>
<div class="container-fluid">
  <div class="row"> 
    <!--form id="question_form" autocomplete="off"-->
    <form id="question_form">
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading">Select Level and category first</div>
          <div class="panel-body">
            <select class="selectpicker pull-left" name="level" onchange="getLevel(this.value)">
              <option value="" selected>Level</option>
              <option value="easy">Easy</option>
              <option value="medium">Medium</option>
              <option value="tough">Tough</option>
            </select>
            <select class="selectpicker pull-center" id="question_cat" name="category" onchange="getCategory(this.value)">
              <option value="" selected>Category</option>
              <?php
	$sql = "select * from category";
	$result=mysqli_query($sql);
	while ($row = mysql_fetch_array($result))
	{
   ?>
              <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
              <?php
	}
	
  ?>
            </select>
            <span id="showtopics"></span> </div>
        </div>
      </div>
      <div class="col-sm-4"> 
        <!--form name="question_frm" action="" method="post"-->
        <div class="field_wrapper">
          <div class="input-group"><b>Question:</b>
            <textarea class="form-control" rows="4" cols="100" name="question" id="question" autofocus></textarea>
          </div>
          <div>
            <input type="text" name="choice_name[]" class="quest" value=""/>
            <a href="javascript:void(0);" class="add_button" title="Add field"><img src="../images/add-icon.png"/></a> </div>
        </div>
        
        <!--input type="submit" name="submit" value="SUBMIT"/-->
        <div>
          <select class="selectpicker pull-left showAnswer" name="answer" style="margin-right:20px;">
            <option value="" selected>Answer</option>
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
            <option value="e">E</option>
            <option value="f">F</option>
            <option value="g">G</option>
            <option value="h">H</option>
            <option value="i">I</option>
            <option value="j">J</option>
          </select>
		   <select class="selectpicker pull-left showAnswer2" name="answer" style="margin-right:20px;">
            <option value="" selected>Answer</option>
           <div id="ans"></div>
          </select>
		  
          <button type="button" class="btn btn-info addquest">Submit</button>
        </div>
        <br>
      </div>
    </form>
	 <div class="col-sm-4"> 
		<span id="showRelatedQuestion"></span>
	 </div>
  </div>
</div>
</body>
</html>
