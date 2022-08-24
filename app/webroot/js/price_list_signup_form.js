$(function(){
	
	/*event listeners*/
	var signupForm = $('#price-list-signup-form');
	signupForm.submit(function(e){
		if(ValidateInputs()){
			return true;                        
		}else{
			e.preventDefault();
			ScrollToTopOfPage();
			return false;
		}
	});
});

/*validate contact details*/
function ValidateInputs(){
	var inputArr = [
		$('#customer-name'),		
		$('#pharm-name-address'),
		$('#pharm-name-address-two'),
		$('#pharm-name-address-three'),
		$('#pharm-town-city'),
		$('#pharm-county'),
		$('#pharm-postcode'),		
		$('#email-address')		
	];
	var valid = true;

	$(inputArr).each(function(i,e){
		if(!$.trim(e.val())
			){
			e.addClass('not-valid');
			valid = false;
		}else if(e.hasClass('not-valid')){
			e.removeClass('not-valid');
		}
	});

	if(valid){
		$('#error-note').addClass('hidden');
	}else if(!valid){
		$('#error-note').removeClass('hidden');
	}

	return valid;
}