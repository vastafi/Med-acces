function valid_datas( f ){
	
	if( f.brandImage.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your brand image must not be empty!</span>');
		notice( f.brandImage );
	
	}else if( f.brandName.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your brand name must not be empty!</span>');
		notice( f.brandName );
	}else{
		 jQuery.ajax({
			url: 'saving-brand.php',  
			type: 'post',
			data: jQuery('form#brand-form').serialize(),
			complete: function(data) {
				jQuery('#form_status').html(data.responseText);
				jQuery('#brand-form').find('input,textarea').attr({value:''});
				jQuery('#brand-form').css({opacity:1});
				jQuery('#brand-form').remove();
			}
		});
		jQuery('#form_status').html('<span class="loading">Saving your Brand...</span>');
		jQuery('#brand-form').animate({opacity:0.3});
		jQuery('#brand-form').find('input,textarea,button').css('border','none').attr({'disabled':''});
	}
	
	return false;
}

function notice( f ){
	jQuery('#brand-form').find('input,textarea').css('border','none');
	f.style.border = '1px solid red';
	f.focus();
}