function valid_datas( f ){
	
	if( f.product.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your product name must not be empty!</span>');
		notice( f.product );
	}else if( f.brand.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your brand must not be empty and correct format!</span>');
		notice( f.brand );
	}
	else if( f.category.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your category must not be empty and correct format!</span>');
		notice( f.category );
	}
	else if( f.subcategory.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your subcategory must not be empty and correct format!</span>');
		notice( f.subcategory );
	}else if( f.price1.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your price1 must not be empty and correct format!</span>');
		notice( f.price1 );
	}else if( f.price2.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your price1 must not be empty!</span>');
		notice( f.price2 );
	}else if( f.details.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your details must not be empty!</span>');
		notice( f.details );
	}else{
		 jQuery.ajax({
			url: 'saving-product.php',  
			type: 'post',
			data: jQuery('form#fruitkha-contact').serialize(),
			complete: function(data) {
				jQuery('#form_status').html(data.responseText);
				jQuery('#fruitkha-contact').find('input,textarea').attr({value:''});
				jQuery('#fruitkha-contact').css({opacity:1});
				jQuery('#fruitkha-contact').remove();
			}
		});
		jQuery('#form_status').html('<span class="loading">Sending your message...</span>');
		jQuery('#fruitkha-contact').animate({opacity:0.3});
		jQuery('#fruitkha-contact').find('input,textarea,button').css('border','none').attr({'disabled':''});
	}
	
	return false;
}

function notice( f ){
	jQuery('#fruitkha-contact').find('input,textarea').css('border','none');
	f.style.border = '1px solid red';
	f.focus();
}