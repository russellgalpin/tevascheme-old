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
	// event listeners
	tevaOne.click(NavToTevaOne);
	tevaOneP.click(NavToTevaOne);
	tevaTwo.click(NavToTevaTwo);
	support.click(NavToSupport);
	signUp.click(NavToSignUp);
	signUpP.click(NavToSignUp);
	signUpSmallBtn.click(NavToSignUp);
        signUpBtn.click(NavToSignUp);
});
// redirect functions
function NavToTevaOne(){
	window.location.href = "/pharmacy/teva-one";
}
function NavToTevaTwo(){
	window.location.href = "/pharmacy/contact-us";
}
function NavToSupport(){
	window.location.href = "/pharmacy/support";
}
function NavToSignUp(){
	window.location.href = "/pharmacy/sign-up";
}