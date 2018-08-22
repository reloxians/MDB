	
//submit.js

$(document).ready(function() {
	
	
	$("#ajax_form").submit(function(event) {
		
	//stop form from submitting normally ================================
		
	event.preventDefault();	
	
		
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
	
	
	// here we will handle errors and validation messages 
	
	if ( ! data.success) { // handle errors for name ---------------
		
		 if (data.errors.name) { 
				
				$('#name-group').addClass('has-error'); // add the error class to show red input 
				$('#name-group').append('<div class="help-block">' + data.errors.name + '</div>'); // add the actual error message under our input 
				
			} // handle errors for email --------------- 
		
		if (data.errors.email) { 
			
			$('#email-group').addClass('has-error'); // add the error class to show red input 
			$('#email-group').append('<div class="help-block">' + data.errors.email + '</div>'); // add the actual error message under our input 
			
			} // handle errors for superhero alias --------------- 
		
		if (data.errors.superheroAlias) { 
			
			$('#superhero-group').addClass('has-error'); // add the error class to show red input 
			$('#superhero-group').append('<div class="help-block">' + data.errors.superheroAlias + '</div>'); // add the actual error message under our input 
			
			} } else { // ALL GOOD! just show the success message! 
			
			$('form').append('<div class="alert alert-success">' + data.message + '</div>'); 
			// usually after form submission, you'll want to redirect 
			// window.location = '/thank-you'; 
			// redirect a user to another page
			
			 alert('success'); // for now we'll just alert the user
			 }
	
		});
	
	});
	
	//stop form from submitting normally ================================
	
	

});


	
	