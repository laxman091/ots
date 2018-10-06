<?php
//session_start();
include '../db/connect.php';
error_reporting(0);

$limit = 12;

if (isset($_GET["page"] )) 
        {
        $page  = $_GET["page"]; 
        } 
    else 
       {
        $page=1; 
       };  

$record_index = ($page-1) * $limit;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
  <style>
  span{
	  margin: 10px 10px;
	  height: 14px;
  }
  </style>
<script>
  $(document).ready(function(){
	  $('.closediv').click(function(){
		// To close the div and empty it
		$("#response_here").empty();
	});
	$("#tbl").on('click', '#btnUpdateQuestion', function () {
		
		var id1 = $(this).closest('tr').find('#dd').val();
		
		//alert(id1);
		//$(this).closest('tr').remove();
		var url_to_load = "../php/update_question.php?id="+id1;
		//alert(url_to_load);
		$("#response_here").load(url_to_load);
	});
	
	$('.previousQuestList').click(function()
	{
		alert('p');
	});
	$('.nextQuestList').click(function()
	{
		alert('n');
	});
	
});
</script>
</head>
<body>
<div class="row">
<div class="col-sm-6 col-md-8 col-lg-10">
<div class="affix-btn">
                    <button type="button" class="btn pull-right closediv" data-offset-top="0">Close</button>
</div>

<h3>Questions</h3>  
  <table class="table table-striped" id='tbl'>
    <tbody>
      <tr>
        <td><b>Name</b></td><td><b>Category</b></td><td class="pull-center"><b>Update</b></td>
      </tr>
   
    <tbody>
	<?php
	$start = 0;
	$limit = 10;
	$sql = "select * from questions order by question DESC LIMIT $record_index, $limit";
	$result = mysqli_query($con, $sql) or die(mysql_error());

	while($row = mysqli_fetch_array($result))
	{
	?>
      <tr>
        <td><input type='hidden' id='dd' value="<?php echo $row[0]; ?> "><?php echo $row[1]; ?></td>
		<td>
		<?php
		$cat_id = $row[2];
		$sql2 = "select category_name from category where id='$cat_id'";
		$result2 = mysqli_query($con, $sql2) or die(mysql_error());
			$values = mysqli_fetch_object($result2);
			$cat_name = ucwords($values->category_name);
			echo $cat_name;
		?>
		</td>
		<td><button type="button" class="btn btn-info btnregionalinvoice" id="btnUpdateQuestion">Update</button></td>
      </tr>
	  <?php
	  }
	  ?>
	  <tr>
	  <td colspan="2">
	  <?php
	  /*$rows=mysqli_num_rows(mysqli_query($con, "select * from questions"));
		$total=ceil($rows/$limit);

		
			echo "<div><span class='glyphicon glyphicon-circle-arrow-left previousQuestList'></span>";
			echo "<span class='glyphicon glyphicon-circle-arrow-right nextQuestList'></span></div>";*/
	?>
	<div class="pagination1">
<?php
		$sql11 = "SELECT COUNT(id) FROM questions";
 
        $rs_result = mysqli_query($con, $sql11);  
        $row1 = mysqli_fetch_row($rs_result);  
        $total_records = $row1[0];  
        $total_pages = ceil($total_records / $limit);  
        //$pagLink = "<nav><ul class='pagination'>";
		echo "<ul class='pagination'>";
		
		echo "<nav><ul class='pagination'>";
		
		if($page == 1){ 
			echo "<li><a href='admin.php?page=".($page-1)."' class='button' style='pointer-events: none;cursor: default;opacity: 0.6;'>Previous</a></li>";
		}
		else{
			echo "<li><a href='admin.php?page=".($page-1)."' class='button'>Previous</a></li>";
		}
		
		 

		for ($i=1; $i<=$total_pages; $i++) {  
			echo "<li><a href='admin.php?page=".$i."'>".$i."</a></li>";
		}
		
		//$end_limit = $total_pages - 1;

		if($page == $total_pages){
			echo "<li><a href='admin.php?page=".($page+1)."' class='button disabled' style='pointer-events: none;cursor: default;opacity: 0.6;'>NEXT</a></li>";
		}
		else{
			echo "<li><a href='admin.php?page=".($page+1)."' class='button disabled'>NEXT</a></li>";
		}		
	
		echo "</ul></nav></ul>";
		
//echo $total_pages;		
		
		mysqli_close($con);
?>
</div>
	</td></tr>
     
    </tbody>
  </table>
</div>
</div>
</body>
</html>

