$(function(){
    /*navigation highlight*/
    $('.sign-up-link').addClass('current');
    /*button variable*/
    var contOne      = $('#cont-one');
    var contTwo      = $('#cont-two');
    var contThree    = $('#cont-three');
    var contFour     = $('#cont-four');
    var contFive     = $('#cont-five');
    var contSix      = $('#cont-six');
    var contSeven    = $('#cont-seven');

    var pipOne       = $('#goto-one');
    var pipTwo       = $('#goto-two');
    var pipThree     = $('#goto-three');
    var pipFour      = $('#goto-four');
    var pipFive      = $('#goto-five');
    var pipSix       = $('#goto-six');
    var pipSeven     = $('#goto-seven');
    var pipEight     = $('#goto-eight');
    var inactivePips = $('.inactive-pip');
    /*section variables*/
    var sections     = $('.section');
    var sectionOne   = $('.section-one');
    var sectionTwo   = $('.section-two');
    var sectionThree = $('.section-three');
    var sectionFour  = $('.section-four');
    var sectionFive  = $('.section-five');
    var sectionSix   = $('.section-six');
    var sectionSeven = $('.section-seven');
    var sectionEight = $('.section-eight');
    var restoreBanking = sectionFive;
    //button actions
    pipOne.click(function(){
        if($(this).hasClass('complete-pip')){
            ShowSlide(sectionOne);
        }
    });
    pipTwo.click(function(){
        if($(this).hasClass('complete-pip')){
            ShowSlide(sectionTwo);
        }
    });
    pipThree.click(function(){
        if($(this).hasClass('complete-pip')){
            ShowSlide(sectionThree);
        }
    });
    pipFour.click(function(){
        if($(this).hasClass('complete-pip')){
            ShowSlide(sectionFour);
        }
    });
    pipFive.click(function(){
        if($(this).hasClass('complete-pip')){
            ShowSlide(sectionFive);
        }
    });
    pipSix.click(function(){
        if($(this).hasClass('complete-pip')){
            ShowSlide(sectionSix);
        }
    });
    pipSeven.click(function(){
        if($(this).hasClass('complete-pip')){
            ShowSlide(sectionSeven);
        }
    });
    pipEight.click(function(){
        if($(this).hasClass('complete-pip')){
            ShowSlide(sectionEight);
        }
    });
    contOne.click(function(){

        if(ValidateSurgeryDetails()){
            pipOne.addClass('complete-pip');
            ShowSlide(sectionTwo);
        }else{
            ScrollToTopOfPage();
            return false;
        }

        
        //ShowSlide(sectionTwo);
    });
    contTwo.click(function(){
        pipTwo.addClass('complete-pip');
        ShowSlide(sectionThree);
    });
    contThree.click(function(){
        pipThree.addClass('complete-pip');
        SkipBankDetails($('#wholesaler-account-name').val());
        ShowSlide(sectionFour);
    });
    contFour.click(function(){

        if(ValidateDiscounts()){
            pipFour.addClass('complete-pip');
            ShowSlide(sectionFive);
        }else{
            ScrollToTopOfPage();
            return false;
        }

    });
    contFive.click(function(){

        if(ValidateBankDetails()){
            pipFive.addClass('complete-pip');
            ShowSlide(sectionSix);
        }else{
            ScrollToTopOfPage();
            return false;
        }

    });
    contSix.click(function(){

        if(ValidateSalesData()){
            pipSix.addClass('complete-pip');
            ShowSlide(sectionSeven);
        }else{
            ScrollToTopOfPage();
            return false;
        }

    });
    contSeven.click(function(){

        if(ValidateTerms()){
            pipSeven.addClass('complete-pip');
            ShowSlide(sectionEight);
            AysncForm();
        }else{
            ScrollToTopOfPage();
            return false;
        }

    });

    function SkipBankDetails(group){
        if(group == 'Phoenix'){
            sectionFive = sectionSix;
        }else{
            sectionFive = restoreBanking;
        }
    }

    function HighlightPip(pip){
        inactivePips.removeClass('active-pip');
        if(pip === sectionOne){
            pipOne.addClass('active-pip');
        }
        else if(pip === sectionTwo){
            pipTwo.addClass('active-pip');
        }
        else if(pip === sectionThree){
            pipThree.addClass('active-pip');
        }
        else if(pip === sectionFour){
            pipFour.addClass('active-pip');
        }
        else if(pip === sectionFive){
            pipFive.addClass('active-pip');
        }
        else if(pip === sectionSix){
            pipSix.addClass('active-pip');
        }
        else if(pip === sectionSeven){
            pipSeven.addClass('active-pip');
        }
        else if(pip === sectionEight){
            pipEight.addClass('active-pip');
        }
    }

    function ShowSlide(slide){
        sections.each(function(){
            if($(this).hasClass('shown')){
                $(this).removeClass('shown').slideUp(function(){
                    slide.addClass('shown').slideDown();
                    HighlightPip(slide);
                    ScrollToTopOfPage();
                });
            }
        });
    }
});

/*validate surgery details*/
function ValidateSurgeryDetails(){
    var branchArr = [
    $('#surgery-name'),
    $('#street-address'),
    $('#town-city'),
    $('#county'),
    $('#postcode'),
    $('#telephone-number'),
    $('#email-address')
    ];
    var valid = true;

    $(branchArr).each(function(i,e){
        if(!$.trim(e.val())
            ){
            e.addClass('not-valid');
            valid = false;
        }else if(e.hasClass('not-valid')){
            e.removeClass('not-valid');
        }
    });

    if ($('#email-address').val() == $('#confirm-email').val()) {
        if($.trim($('#email-address').val())){
            $('#email-address').removeClass('not-valid');
            $('#confirm-email').removeClass('not-valid');
        }
    } 
    else 
    {
        $('#email-address').addClass('not-valid');
        $('#confirm-email').addClass('not-valid');
        valid = false;
    }

    if($('#email-address').val().indexOf('@') < 0){
        $('#email-address').addClass('not-valid');
        valid = false;
    }

    if (valid){
        $('#email-address').removeClass('not-valid');
    }

    if(valid){
        $('#goto-one').addClass('complete-pip');
        $('#error-note').addClass('hidden');
    }else if(!valid){
        $('#error-note').removeClass('hidden');
    }

    return valid;
}

/*validate discount page, at least one must be clicked*/
function ValidateDiscounts(){

    var discError = $('#disc-error');

    var valid = false;

    if($('.discount:checkbox:checked').length > 0) {
        valid = true;
        discError.addClass('hidden');
    } else {
        discError.removeClass('hidden');
    }

    if(valid){
        $('#goto-four').addClass('complete-pip');
    }

    return valid;

}

/*validate bank details*/
function ValidateBankDetails(){
    var bankArr = [
    $('#vat-number'),
    $('#bank-account-name'),
    $('#bank-name'),
    $('#bank-account-number'),
    $('#sort-code'),
    $('#bank-confirmation')
    ];
    var valid = true;

    $(bankArr).each(function(i,e){

        if(!$.trim(e.val()) ||
            (i == 4 && !$.isNumeric(e.val())) ||
            (i == 4 && e.val().length < 6) ||
            (i == 3 && !$.isNumeric(e.val())) ||
            (i == 3 && e.val().length < 8)
            ){
            e.addClass('not-valid');
            valid = false;
        }else if(e.hasClass('not-valid')){
            e.removeClass('not-valid');
        }

    });
    
    if($('#bank-confirmation:checkbox:checked').length == 0) {
        valid = false;
        $('#bank-conf-error').removeClass('hidden');
    } else {
        $('#bank-conf-error').addClass('hidden');
    }

    if( document.getElementById("upload-documents").files.length == 0 ) {
        valid = false;
        $('#bank-file-error').removeClass('hidden');
    } else {
        $('#bank-file-error').addClass('hidden');
    }

    if(valid){
        $('#goto-four').addClass('complete-pip');
        $('#error-note').addClass('hidden');
    }else if(!valid){
        $('#error-note').removeClass('hidden');
    }

    return valid;
}

/*validate contact details*/
function ValidateContactDetails(){
    var contactArr = [
    $('#contact-name'),
    $('#telephone-number'),
    $('#email-address'),
    $('#confirm-email')
    ];
    var valid = true;
	
	var termsAgree = $('#confirmation');
	var termsError = $('#confirmation-error');
    if(!termsAgree.is(":checked")){
        termsError.removeClass('hidden');
        valid = false;
    }else if(!termsError.hasClass('hidden')){
        termsError.addClass('hidden');
    }

    $(contactArr).each(function(i,e){	
        if(!$.trim(e.val()) ||
            (i == 1 && !$.isNumeric(e.val().replace(/\s/g, ""))) ||
            (i == 2 && (e.val().indexOf('@') < 0))  ||
            (i == 3 && e.val() != contactArr[2].val())
            ){
            e.addClass('not-valid');
            valid = false;
        }else if(e.hasClass('not-valid')){
            e.removeClass('not-valid');
        }
    });

    if(valid){
        $('#goto-five').addClass('complete-pip');
        $('#error-note').addClass('hidden');
    }else if(!valid){
        $('#error-note').removeClass('hidden');
    }

    return valid;
}

/*validate sales data agreement*/
function ValidateSalesData(){

    var valid = true;

    if($('#confirm:checkbox:checked').length == 0) {
        valid = false;
        $('#sales-conf-error').removeClass('hidden');
    } else {
        $('#sales-conf-error').addClass('hidden');
    }

    if(valid){
        $('#goto-six').addClass('complete-pip');
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

    if(!termsAgree.is(":checked")){
        termsError.removeClass('hidden');
        valid = false;
    }else if(!termsError.hasClass('hidden')){
        termsError.addClass('hidden');
    }

    if(valid){
        $('#goto-seven').addClass('complete-pip');
        $('#error-note').addClass('hidden');
    }else if(!valid){
        $('#error-note').removeClass('hidden');
    }

    return valid;
}

/*Aysnc the form to a url*/
function AysncForm(){   
    var form = $("#inhaler-sign-up-form")[0];
    var formData = new FormData(form);
    var file_data = $('#upload-documents').prop('files')[0];  
    formData.append('file', file_data); 
    $.ajax({
        url: "/forms/inhaler_sign_up_submit", // Your url here
        type: 'POST',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,  
        success:function(_data){
            //alert("Successfully sent!\r\n"+_data);
        },
        error:function(XHR){
            //alert("An error occured - error: "+XHR.status+" "+XHR.statusText);
        }
    });


}

function fileValidation(){
    var fileInput = document.getElementById('upload-documents');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.pdf)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload a file with one of the following extensions: .jpeg .jpg .pdf');
        fileInput.value = '';
        return false;
    }
}

$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

/*Remove spaces from email fields*/
function removeSpaces(string) {
 return string.split(' ').join('');
}

/*Disable copy+paste for confirmation email field */
$(function(){
    $('#confirm-email').bind("cut copy paste",function(e) {
        e.preventDefault();
    });
});

/*Disable context menu*/
// $(function() {
//      $(this).bind("contextmenu", function(e) {
//          e.preventDefault();
//      });
// }); 