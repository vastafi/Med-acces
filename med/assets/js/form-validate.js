function valid_datas( f ){
	
	if( f.email.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your Email must not be empty!</span>');
		notice( f.email );
	
	}else{
		 jQuery.ajax({
			url: 'subscribe.php',  
			type: 'post',
			data: jQuery('form#subscribe-form').serialize(),
			complete: function(data) {
				jQuery('#form_status').html(data.responseText);
				jQuery('#subscribe-form').find('input,textarea').attr({value:''});
				jQuery('#subscribe-form').css({opacity:1});
				jQuery('#subscribe-form').remove();
			}
		});
		jQuery('#form_status').html('<span class="loading">Processing...</span>');
		jQuery('#subscribe-form').animate({opacity:0.3});
		jQuery('#subscribe-form').find('input,textarea,button').css('border','none').attr({'disabled':''});
	}
	
	return false;
}

function notice( f ){
	jQuery('#subscribe-form').find('input,textarea').css('border','none');
	f.style.border = '1px solid red';
	f.focus();
}