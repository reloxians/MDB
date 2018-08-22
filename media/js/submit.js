
//submit.js

$(document).ready(function() {
	
	//stop form from submitting normally ================================
	
	event.preventDefault();
	
	$('#ajax_form').submit(function(event) {
		
	//get form data ==================================================
	
	var formData		=		{
		
			'name'			:		$("#name").val()		
		};
		
	//proccess the form using ajax ======================================
	
	$.ajax({
		
			type				:			'POST',
			
			url				:			'survey.inc.php',
			
			data			:			formData,
			
			dataType	:			'json',
			
			ecnode		:			true
			
			
		})
		
		
	//using the done promise callback ===================================
	
	.done(function(data){
	
	//log data to console ==============================================
	
	console.log(data);
	
		});
	
	});
	
	//stop form from submitting normally ================================
	
	event.preventDefault();

});

