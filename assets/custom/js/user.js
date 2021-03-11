// 	* submit the create student form
// 		*/
$('#msg').hide();
$('.please_wait').hide();
	     $("#submit-button").on('click',function(event){
		//	$("#messages").html('');
		 $("#submit-button").hide();
		$('.please_wait').show();
		 $('.error').empty();
			$.ajax({
				url: 'login',
				type: 'POST',
				dataType: 'json',
				data: $('#login_form').serializeArray(),
				success:function(response) {
				   	 $("#submit-button").show();
	            	$('.please_wait').hide();
					if(response.response == true) {						
						window.location.replace(response.redirect);
					}	
					else {
					      
    			             $('#email_error').html(response.email);
    			              $('#password_error').html(response.password);
    			             if(response.error !=null && response.error!= ''){ 
    			                   $('#error').show();
    			                   $('#error').html(response.error);
    			                }
					        
													
						
					
												
					} // /else
				} // /success
			}); // /ajax

		
		});
		
		///
		
		//register form 
			     $("#register-button").on('click',function(event){
			         $('#msg').hide();
		//	$("#messages").html('');
		  $('.error').empty();
			$.ajax({
				url: 'register',
				type: 'POST',
				dataType: 'json',
				data: $('#register_form').serializeArray(),
				success:function(response) {
				 
					if(response.response == true) {	
					 $('#form_id').trigger("reset");
					$('#msg').show();
					$('#msg').html(response.msg);
					}	
					else {
    			             $('#register_password').html(response.password);
    			              $('#checkbox_error').html(response.checkbox);
    			              $('#emailaddress_error').html(response.email);
    			               $('#username_error').html(response.username);
    			               if(response.error != ''){ 
    			                $('#error').html(response.error);
    			                }
					        
													
						
					
												
					} // /else
				} // /success
			}); // /ajax

		
		});
		  $("#submit").on('click',function(e){
	
       $("#submit").hide();
       $('.plz_wait').fadeIn();
       $url = "password-recover";
       $.ajax({
         url: $url,
         type: "POST",
         dataType: 'json',
         data: $('#recoverForm').serializeArray(),
         success: function (data) {
            $("#submit").show();
            $('.plz_wait').hide();
        //    $('input[name="csrf_aeonbeds_token"]').val(data.csrf_token);
           if(data.response){
             $('#emailerror').html(data.msg);
           }
           else{
             if(data.msg !=''){
                   $('#emailerror').html(data.msg)
               }
               if(data.email_error !='')
                   $('#emailerror').html(data.email_error)
               
           }
         }
       });
    });
    
		function openmodel(open,close){
		     $('#'+close+'').modal('hide');
		   $('#'+open+'').modal('show');
		}
		