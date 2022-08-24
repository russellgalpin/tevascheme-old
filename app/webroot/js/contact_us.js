$(function(){
	/*form variables*/
	var contForm = $('#contact-us-form');
	contForm.submit(function(e){
		if(ValidateContactDetails()){
			return true;
		}else{
			e.preventDefault();
			ScrollToTopOfPage();
			return false;
		}
	});
});

/*validate contact details*/
function ValidateContactDetails(){
	var contactArr = [
		$('#first-name'),
		$('#surname'),
		$('#job-position'),
		$('#street-address'),
		$('#town-city'),
		$('#county'),
		$('#postcode'),
		$('#tel'),
		$('#email-address'),
		$('#confirm-email-address')
	];
	var valid = true;

	$(contactArr).each(function(i,e){
		if(!$.trim(e.val()) ||
			(i == 7 && !$.isNumeric(e.val().replace(/\s/g, ""))) ||
			(i == 8 && (e.val().indexOf('@') < 0)) ||
			(i == 9 && e.val() != contactArr[8].val())
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