$(function(){
	/*form variables*/
	var contBtn     = $('#cont-preview-reg-form');
	var previewForm = $('#preview-reg-form');
	var sectionOne  = $('.section-one');
	var sectionTwo  = $('.section-two');
	/*event listeners*/
	contBtn.click(function(e){
		if(ValidatePreviewDetails()){
			sectionOne.slideUp(function(){
				ScrollToTopOfPage();
				sectionTwo.slideDown();
			});
		}else{
			ScrollToTopOfPage();
			return false;
		}
	});
	previewForm.submit(function(e){
		if(ValidatePreviewDetails() && ValidateTerms()){
			return true;
		}else{
			e.preventDefault();
			ScrollToTopOfPage();
			return false;
		}
	});
});

/*validate contact details*/
function ValidatePreviewDetails(){
	var contactArr = [
		$('#first-name'),
		$('#surname'),
		$('#company-practice-name'),
		$('#street-address'),
		$('#town-city'),
		$('#county'),
		$('#postcode'),
		$('#mobile-number'),
		$('#email-address'),
		$('#confirm-email')
	];
	var valid = true;

	var emailOnly = $('input:radio[name="opt-text-email"]:checked').attr('value');
	var mobNeeded = (emailOnly === "opt-email-no-text" ? true : false);

	$(contactArr).each(function(i,e){
		if(!$.trim(e.val()) ||
			(i == 7 && !$.isNumeric(e.val().replace(/\s/g, "")) ||
			(i == 8 && (e.val().indexOf('@') < 0)) ||
			(i == 9 && e.val() != contactArr[8].val())
			)){
			e.addClass('not-valid');
		valid = false;
		if(i == 7 && mobNeeded === true){
			valid = true;
			e.removeClass('not-valid');
		}
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

/*validate terms agree too*/
function ValidateTerms(){
	var termsAgree = $('#terms-agree');
	var termsError = $('#terms-error');
	var valid = true;

	if(termsAgree.attr('checked') != 'checked'){
		termsError.removeClass('hidden');
		valid = false;
	}else if(!termsError.hasClass('hidden')){
		termsError.addClass('hidden');
	}

	if(valid){
		$('#error-note').addClass('hidden');
	}else if(!valid){
		$('#error-note').removeClass('hidden');
	}

	return valid;
}