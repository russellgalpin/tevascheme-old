$(function(){
    /*preload images*/
    var roundelsOne   = new PreLoadedImage("/img/roundels-eight.png","POP!",false,".roundel-type-eight");
    var roundelsTwo   = new PreLoadedImage("/img/roundels-seven.png","POP!",false,".roundel-type-seven");
    var roundelsThree = new PreLoadedImage("/img/roundels-six.png","POP!",false,".roundel-type-six");
    var roundelsFour  = new PreLoadedImage("/img/roundels-five.png","POP!",false,".roundel-type-five");
    /*navigation highlight*/
    $('.sign-up-link').addClass('current');
    /*button variable*/
    var contOne      = $('#cont-one');
    var contTwo      = $('#cont-two');
    var contThree    = $('#cont-three');
    var contFour     = $('#cont-four');
    var contFive     = $('#cont-five');
    var contSix      = $('#cont-six');

    var pipOne       = $('#goto-one');
    var pipTwo       = $('#goto-two');
    var pipThree     = $('#goto-three');
    var pipFour      = $('#goto-four');
    var pipFive      = $('#goto-five');
    var pipSix       = $('#goto-six');
    var pipSeven     = $('#goto-seven');
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
    var restoreBanking = sectionFour;
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
    contOne.click(function(){
        pipOne.addClass('complete-pip');
        ShowSlide(sectionTwo);
    });
    contTwo.click(function(){
        if(ValidateBranchDetails()){
            ShowSlide(sectionThree);
        }else{
            ScrollToTopOfPage();
            return false;
        }
    });
    contThree.click(function(){
        if(ValidateWholesalerDetails()){
            ShowSlide(sectionFour);
        }else{
            ScrollToTopOfPage();
            return false;
        }
    });
    contFour.click(function(){
        if(ValidateBankDetails()){
            ShowSlide(sectionFive);
        }else{
            ScrollToTopOfPage();
            return false;
        }
    });
    contFive.click(function(){
        if(ValidateContactDetails()){
            ShowSlide(sectionSix);
        }else{
            ScrollToTopOfPage();
            return false;
        }
    });
    contSix.click(function(){
        if(ValidateTerms()){
            ShowSlide(sectionSeven);
            AysncForm();
        }else{
            return false;
        }
    });

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

    /*show input based on radio selection for current user*/
    var numberInput = $('#teva-scheme-number-holder');
    $('input:radio[name="current-customer"]').change(function(){
        if($(this).attr('id') =='customer-yes'){
            numberInput.removeClass('hidden');
        }else if ($(this).attr('id') =='customer-no') {
            numberInput.addClass('hidden');
        }
    });
    /*restrict buying group options based on TevaOne or TevaTwo*/
    $('input:radio[name="opt-teva"]').change(function(){
        if($(this).attr('id') == 'opt-teva-one'){
            $("#buying-groups").append('<option value="PSUK">PSUK</option>');
            $("#buying-groups").append('<option value="Numark">Numark</option>');
            $("#buying-groups").append('<option value="St Thomas Court">St Thomas Court</option>');
            allWSArray.splice(3, 0, "Phoenix");
            GetBuyingGroup();
        }else if ($(this).attr('id') == 'opt-teva-two'){
            $("#buying-groups option[value='Numark']").remove();
            $("#buying-groups option[value='PSUK']").remove();
            $("#buying-groups option[value='St Thomas Court']").remove();
            allWSArray.splice($.inArray('Phoenix',allWSArray),1);
            GetBuyingGroup();
        }
    });

    /*restrict wholesalers based on buying group */
    var buyingGroup   = $('#buying-groups');
    var wsList        = $('.wholesale-list');
    var wsThirdOption = $('.w-three-wrapper');

    function SkipBankDetails(group){
        if(group == 'Numark'){
            sectionFour = sectionFive;
        }else{
            sectionFour = restoreBanking;
        }
    }
    /*get the current selected group and run functions*/
    function GetBuyingGroup(){
        var currentGroup = buyingGroup.attr('value');
        SelectArray(currentGroup);
        SkipBankDetails(currentGroup);
    }
    /*get the wholesaler array based on the buying group*/
    function SelectArray(group){
        var arr = {
            'None' : allWSArray,
            'AlbaPharm' : albapharmWSArray,
            'Cambrian' :cambrianWSArray,
            'Numark' : numarkWSArray,
            'PSUK' : psukWSArray,
            'St Thomas Court' : stThomasCourtWSArray,
            'CamRx' : camRxArray
        };
        BuildOptions(arr[group]);
        RestrictInputs(arr[group]);
    }
    /*build a html options string*/
    function BuildOptions(array){
        wsList.empty();
        $(array).each(function(i,v){
            wsList.append($('<option>',{
                value: v,
                text: v
            }));
        });
    }

    function RestrictInputs(amount){
        if(amount.length <= 3){
            wsThirdOption.hide();
        }
        else{
            wsThirdOption.show();
        }
    }
    // wholesaler arrays
    var allWSArray           = ["Please select", "AAH", "Alliance Healthcare", "DE Group", "Cordia", "Sangers-AAH", "Norchem"];
    var albapharmWSArray     = ["Please select", "AAH", "Alliance Healthcare"];
    var cambrianWSArray      = ["Please select", "AAH", "Cordia", "Alliance Healthcare"];
    var stThomasCourtWSArray = ["Please select", "AAH"];
    var numarkWSArray        = ["Please select", "Phoenix", "Sangers/AAH"];
    var camRxArray			 = ["Please select", "AAH", "Alliance Healthcare", "Cordia"];
    /*event listener*/
    buyingGroup.change(GetBuyingGroup);
    /*initial build of options*/
    GetBuyingGroup();

    /*add company details to terms and conditions*/
    //variables
    var inputCompany = $('#company-practice-name');
    var inputName    = $('#contact-name');
    var fieldCompany = $('#terms-company-name');
    var fieldName    = $('#terms-name');
    inputCompany.change(function(){
        fieldCompany.text(inputCompany.attr('value'));
    });
    inputName.change(function(){
        fieldName.text(inputName.attr('value'));
    });
});

/*validate branch details*/
function ValidateBranchDetails(){
    var branchArr = [
    $('#company-practice-name'),
    $('#branch-location-name'),
    $('#vat-number'),
    $('#street-address'),
    $('#town-city'),
    $('#county'),
    $('#postcode')
    ];
    var valid = true;

    $(branchArr).each(function(i,e){
        if(!$.trim(e.val())){
            e.addClass('not-valid');
            valid = false;
        }else if(e.hasClass('not-valid')){
            e.removeClass('not-valid');
        }
    });

    if(valid){
        $('#goto-two').addClass('complete-pip');
        $('#error-note').addClass('hidden');
    }else if(!valid){
        $('#error-note').removeClass('hidden');
    }

    return valid;
}

/*validate wholesaler details*/
function ValidateWholesalerDetails(){
    var wholeArr = [
    $('#wholesaler-one'),
    $('#w-account-one'),
    $('#w-depot-one')
    ];
    var valid = true;

    $(wholeArr).each(function(i,e){
        if(!$.trim(e.val()) || e.val() == "Please select"){
            e.addClass('not-valid');
            valid = false;
        }else if(e.hasClass('not-valid')){
            e.removeClass('not-valid');
        }
    });

    if(valid){
        $('#goto-three').addClass('complete-pip');
        $('#error-note').addClass('hidden');
    }else if(!valid){
        $('#error-note').removeClass('hidden');
    }

    return valid;
}

/*validate bank details*/
function ValidateBankDetails(){
    var bankArr = [
    $('#bank-account-name'),
    $('#bank-name'),
    $('#account-number'),
    $('#sort-code')
    ];
    var valid = true;

    $(bankArr).each(function(i,e){
        if(!$.trim(e.val()) ||
            (i == 3 && !$.isNumeric(e.val())) ||
            (i == 3 && e.val().length < 6) ||
            (i == 2 && !$.isNumeric(e.val())) ||
            (i == 2 && e.val().length < 8)
            ){
            e.addClass('not-valid');
            valid = false;
        }else if(e.hasClass('not-valid')){
            e.removeClass('not-valid');
        }
    });

    
    // # Nublue PR-TEV-TXT
    /*if($('#bank-confirmation').attr('checked') != 'checked'){
        $('#bank-confirmation-error').removeClass('hidden');
        valid = false;
    }else if(!$('#bank-confirmation-error').hasClass('hidden')){
        $('#bank-confirmation-error').addClass('hidden');
    }*/
    
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
    if(termsAgree.attr('checked') != 'checked'){
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
        $('#goto-six').addClass('complete-pip');
        $('#error-note').addClass('hidden');
    }else if(!valid){
        $('#error-note').removeClass('hidden');
    }

    return valid;
}

/*Aysnc the form to a url*/
function AysncForm(){
    var formObject = $('#sign-up-form').serializeObject();
    $.ajax({
        type: "POST",
        url: "/forms/sign_up_submit", // Your url here
        data:formObject,
        success:function(_data){
        //alert("Successfully sent!\r\n"+_data);
        },
        error:function(XHR){
        //alert("An error occured - error: "+XHR.status+" "+XHR.statusText);
        }
    });
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
$(function() {
     $(this).bind("contextmenu", function(e) {
         e.preventDefault();
     });
}); 