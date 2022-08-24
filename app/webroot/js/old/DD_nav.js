$(function(){
	/*page navigation*/
	// button class's
	var tevaOne        = $('.teva-one-link');
	var tevaTwo        = $('.teva-two-link');
	var support        = $('.support-link');
	var signUp         = $('.sign-up-link');
	var signUpP        = $('.sign-up-link-plain');
	var signUpSmallBtn = $('.small-sign-up-btn-holder');
	var tevaOneP       = $('.teva-one-link-plain');
	var signUpBtn      = $('.sign-up-btn');
	var brandedOffers  = $('.branded-inhaler-offers-link');

	// event listeners
	tevaOne.click(NavToTevaOne);
	tevaOneP.click(NavToTevaOne);
	tevaTwo.click(NavToTevaTwo);
	support.click(NavToSupport);
	signUp.click(NavToSignUp);
	signUpP.click(NavToSignUp);
	signUpSmallBtn.click(NavToSignUp);
	signUpBtn.click(NavToSignUp);
	brandedOffers.click(NavToBrandedOffers);
});
// redirect functions
function NavToTevaOne(){
	window.location.href = "/dispensing-doctor/teva-one";
}
function NavToTevaTwo(){
	window.location.href = "/dispensing-doctor/contact-us";
}
function NavToSupport(){
	window.location.href = "/dispensing-doctor/support";
}
function NavToSignUp(){
	window.location.href = "/dispensing-doctor/sign-up";
}
function NavToBrandedOffers(){
	window.location.href = "/dispensing-doctor/branded-inhaler-deals";
}