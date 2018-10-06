<?php
include '../db/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  .addTopic
  {margin-top:5px;}
  </style>
  <script>
  $(document).ready(function(){
	$('.addTopic').click(function(){
		
		var level = $("#cat_level option:selected").val();
		var cat = $("#cat_question option:selected").val();
		var name = $('#cat_question option:selected').text();
		var content = $('#content').val();
		
		//alert(level+cat+name+content);
		$.post("../php/submit_topics.php" , {'level':level,'category': cat,'toppic_content': content,'name':name});
		$('#response_here').load('../php/add_topics.php');
});
  });
</script>
<script>  
  
  function showContent()
  {		
	//$('#content').text('');
	  var level = $('#cat_level option:selected').val();
	  var category = $('#cat_question option:selected').val();
	  
	  //alert(level + category);
	  if(category == '')
	  {
		  $('.addcontent').hide();
		  $('.addTopic').hide();
	  }
	  else if(level == ''){
			
	  $('.addcontent').hide();
		  $('.addTopic').hide();
	  }
	  else{
		  $('.addcontent').show('fast');
			$('.addTopic').show('fast');
	  }
	  
	  /*$.ajax({
		  type:'POST',
		  url:'../php/get_topic_content.php',
		  data: {'level':level,'cat':category},
		  success: function(response)
		  {
			  if(response == '')
			  {return;}
				else{
			  $('#content').html(response);
				}
		  },
		  error: function()
		  {}
	  });*/
	 
}
  
</script>
</head>
<body>

<div class="container">
  <h3> Add Topic</h3>
  <div class="row">
  
  <form id="question_form">
   
   <div class="col-md-6 col-lg-8">
     <select class="selectpicker pull-center" id="cat_level" name="question_level" onchange="showContent()">
   <option value="" selected>Select Level</option>
   <option value="easy">Easy</option>
   <option value="medium">Medium</option>
   <option value="tough">Tough</option>
</select>
   
   <select class="selectpicker pull-center" id="cat_question" name="question_cat" onchange="showContent()">
   <option value="" selected>Select Category</option>
   <?php
	$sql = "select * from category";
	//$con2->query($query);
	$result=mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($result))
	{
   ?>
   
  <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>

  <?php
	}
	//$con2->close();
  ?>
  </select>
  

   <div class="input-group addcontent" style="display:none;">Topic:
    <!--textarea class="form-control" rows="6" cols="150" name="content" id="content" autofocus></textarea-->
	<input type="text" class="form-control" name="content" id="content" size="40" autofocus/>
	</div>
   
    <button type="button" class="btn btn-primary addTopic" style="display:none;">Submit</button>
	</div>
	
  </form>
  </div>

</div>

</body>
</html>

