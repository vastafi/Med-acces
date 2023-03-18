function valid_datas( f ){
	
	if( f.subcategoryname.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your sub-category name must not be empty!</span>');
		notice( f.subcategoryname );
	
	}else if( f.category.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your category name must not be empty!</span>');
		notice( f.category );
	
	}else if( f.fulldescription.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your description must not be empty!</span>');
		notice( f.fulldescription );
	
	}
	else{
		 jQuery.ajax({
			url: 'saving-sub-category.php',  
			type: 'post',
			data: jQuery('form#sub-category-form').serialize(),
			complete: function(data) {
				jQuery('#form_status').html(data.responseText);
				jQuery('#sub-category-form').find('input,textarea').attr({value:''});
				jQuery('#sub-category-form').css({opacity:1});
				jQuery('#sub-category-form').remove();
			}
		});
		jQuery('#form_status').html('<span class="loading">Sending your message...</span>');
		jQuery('#sub-category-form').animate({opacity:0.3});
		jQuery('#sub-category-form').find('input,textarea,button').css('border','none').attr({'disabled':''});
	}
	
	return false;
}

function notice( f ){
	jQuery('#sub-category-form').find('input,textarea').css('border','none');
	f.style.border = '1px solid red';
	f.focus();
}