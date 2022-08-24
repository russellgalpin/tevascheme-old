$(function(){
	/*event listeners*/
	var advanForm = $('#advantage-form');
	advanForm.submit(function(e){
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
		$('#pharm-full-name'),
		$('#teva-scheme-name'),
		$('#teva-account-number'),
		$('#pharm-name-address'),
		$('#pharm-town-city'),
		$('#pharm-county'),
		$('#pharm-postcode'),
		$('#contact-name'),
		$('#tel'),
		$('#email-address'),
		$('#confirm-email-address')
	];
	var valid = true;

	$(inputArr).each(function(i,e){
		if(!$.trim(e.val()) ||
			(i == 8 && !$.isNumeric(e.val().replace(/\s/g, ""))) ||
			(i == 9 && (e.val().indexOf('@') < 0)) ||
			(i == 10 && e.val() != inputArr[9].val())
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