function valid_datas( f ){
	if( f.firstName.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your First name must not be empty!</span>');
		notice( f.firstName );
	}else if( f.lastName.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your Last name must not be empty!</span>');
		notice( f.lastName );
	}else if( f.username.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your username must not be empty!</span>');
		notice( f.username );
	}
	else if( f.staffid.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your staff id must not be empty!</span>');
		notice( f.staffid );
	}
	else if( f.email.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your Email must not be empty!</span>');
		notice( f.email );
	}
	else if( f.Birthday.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your Birthday must not be empty!</span>');
		notice( f.Birthday );
	}else if( f.mobileno.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your mobile no must not be empty!</span>');
		notice( f.mobileno );
	}else if( f.dignity.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your dignity must not be empty!</span>');
		notice( f.dignity );
	}else if( f.password.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your password must not be empty!</span>');
		notice( f.password );
	}else{
		jQuery.ajax({
			url: 'saving-user.php',  
			type: 'post',
			data: jQuery('form#user-contact').serialize(),
			complete: function(data) {
				jQuery('#form_status').html(data.responseText);
				jQuery('#user-contact').find('input,textarea').attr({value:''});
				jQuery('#user-contact').css({opacity:1});
				jQuery('#user-contact').remove();
			}
		});
		jQuery('#form_status').html('<span class="loading">Sending your message...</span>');
		jQuery('#user-contact').animate({opacity:0.3});
		jQuery('#user-contact').find('input,textarea,button').css('border','none').attr({'disabled':''});
	}
	
	return false;
}

function notice( f ){
	jQuery('#user-contact').find('input,textarea').css('border','none');
	f.style.border = '1px solid red';
	f.focus();
}