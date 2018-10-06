<?php
include '../db/connect.php';
$sql = "select * from category";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>
  $(document).ready(function(){
	    $('.closediv').click(function(){
		// To close the div and empty it
		$("#response_here").empty();
	});
	  //$('#show_students').load('../php/show_students.php');
	  
	  $('.btnStudent').click(function()
	  {	
			var data = $("form").serialize();
			$.post("../php/add_student_ajax.php", data, function() {
			$('#response_here').load('../php/add_student.php');
			//$('form').reset();
			});
		});
  });
  
  function checkType(str)
  {	//alert(str);
	  if(str =='student'){
	  $('#category').show('fast');
		//$('#show_students').show('fast');
		$('#show_students').load('../php/show_students.php');
	  }
	  else if(str =='admin' || str == 'content'){
	  $('#category').hide();
		$('#show_students').load('../php/show_members.php');
	  }
	  
	  else if(str=='')
	  {
		  $('#category').hide();
		  $('#show_students').empty();
		//$('#show_students').hide();
		//$('#show_students').load('../php/show_members.php');
	  }
  }
  </script>
</head>
<body>


<div class="affix-btn">
                    <button type="button" class="btn pull-right closediv">Close</button>
					
                </div>
  <h2>Add Account</h2>
  <div class="row">
  <div class="col-md-5">
  <form id="studentform" autocomplete="off">
   <div class="form-group">
      <label for="text">Full Name:</label>
      <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter fullname" size="25" required="required" data-error="fullname is required.">
    </div>
   <div class="form-group">
      <label for="text">Username:</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" size="25" required="required" data-error="Firstname is required.">
    </div>
	  <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
    </div>

<div class="form-group">
<select class="selectpicker col-md-offset-2 pull-left" name="studtype" onchange="checkType(this.value)">Type
<option value="" selected>Select</option>
<option value="admin">Admin</option>
<option value="content">Content</option>
<option value="student">Student</option>
</select>
<!--/div>
<div class="form-group"-->
<select class="selectpicker col-md-offset-1 pull-center" name="category" id="category" style="display:none;">Type
<option value="" selected>Select</option>
<?php
$result = mysqli_query($con, $sql) or die(mysql_error());
while($row = mysqli_fetch_array($result))
{
?>
<option value="<?php echo strtolower($row[1]); ?>" ><?php echo strtoupper($row[1]); ?></option>
<?php
}
mysql_close($con);
?>
</select><br>
</div>
 <div class="form-group">
      <label for="text">City:</label>
      <input type="text" class="form-control" name="city" id="city" placeholder="Enter city" size="25">
    </div>
	 <div class="form-group">
      <label for="text">Phone:</label>
      <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" size="25">
    </div>

    <button type="button" class="btn btn-primary btnStudent">Submit</button>
  </form>
  </div>
  <div class="col-md-7">
  <div id="show_students"></div>
  </div>

  </div>


</body>
</html>

