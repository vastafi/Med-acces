function valid_datas( f ){
	
	if( f.category.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your category name must not be empty!</span>');
		notice( f.category );
	
	}else if( f.description.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your description must not be empty!</span>');
		notice( f.description );
	
	}else{
		 jQuery.ajax({
			url: 'saving-category.php',  
			type: 'post',
			data: jQuery('form#cartegory-form').serialize(),
			complete: function(data) {
				jQuery('#form_status').html(data.responseText);
				jQuery('#cartegory-form').find('input,textarea').attr({value:''});
				jQuery('#cartegory-form').css({opacity:1});
				jQuery('#cartegory-form').remove();
			}
		});
		jQuery('#form_status').html('<span class="loading">Sending your message...</span>');
		jQuery('#cartegory-form').animate({opacity:0.3});
		jQuery('#cartegory-form').find('input,textarea,button').css('border','none').attr({'disabled':''});
	}
	
	return false;
}

function notice( f ){
	jQuery('#cartegory-form').find('input,textarea').css('border','none');
	f.style.border = '1px solid red';
	f.focus();
}