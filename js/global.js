var strlevel;
var strcat;
var topics = [];

var idArray = [];
var cat_arr = [];
var cat_topic = [];
var tmp_arr = [];
// array to store category and topics
var category_topics = [];


	  $('.closediv').click(function(){
		// To close the div and empty it
		$("#response_here").empty();
	});
	
	$('input.chkb').click(function(){
			
			var quest_cat = $(this).val();
			var test_level = $('#testlevel option:selected').val();
			var tst = $(this).closest('label').find('#tsname').text();
			cat_arr.push(quest_cat);
			//alert(quest_cat);
						
			//var wrapper = $('.field_wrapper');
			
			//var data = $('#showtopics').load('../php/show_topics.php?level='+strlevel+'&cat='+quest_cat+'&testname='+tst); // Add field html
			$.ajax({
				type:'POST',
				url:'../php/show_topics.php',
				data: {'level':test_level,'cat':quest_cat,'testname':tst},
				success: function(response)
				{
					//alert(response);
					//$(wrapper).$('#showtopics').append(response);
					$('#showtopics').append(response);
				},
				error: function()
				{}
			});
			
			});
	
	/*$('.quest_topics').change(function()
		{

		var selectedOption = $('#selectedOption option:selected').val;
		//alert(selectedOption);
		$('#selectedOption option:selected').each(function()
		{
			
		var tmp = $(this).val();
		idArray.push(tmp);
		//alert(idArray);
		});

		});*/
	
	$('.scheduledtest').click(function()
	{	
				
		var test_level = $('#testlevel option:selected').val();
		var start_dt = $('#startdate').val();
		var start_tm = $('#starttime').val();
		var end_dt = $('#enddate').val();
		var end_tm = $('#endtime').val();
		
		//category_topics.push({catgory:cat_arr,topics:cat_topic});
		var data = $("form").serialize();
		//alert(data);
		//topics.unique();
		
		
		/*$.post("../php/schedule_test.php", {data} , function() {
			$("#response_here").empty();
			});*/
		
			//$.post('../php/schedule_test.php', {data});
			//$("#response_here").empty();
			
			//var data = $("form").serialize();
			$.post("../php/schedule_test.php", data, function() {
			//console.log(data);
			//$('form').reset();
			//$('#response_here').empty();
			$('#response_here').load('../php/schedule_student_test.php');
			});
		
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


		var uniqueTopics = [];
		$.each(idArray, function(i, el){
			if($.inArray(el, uniqueTopics) === -1) uniqueTopics.push(el);
		});
	


function getLevel(strlevel)
{
	this.strlevel = strlevel;
}

function getTopic(topic)
{
	//alert(topic);
	topics.push(topic);
	//topics.unique();
}