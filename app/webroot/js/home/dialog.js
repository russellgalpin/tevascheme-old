$(function(){
	// links
	var nhc     = $('#not-a-hcp');
	var ps      = $('#hcp-ps');
	var dd      = $('#hcp-dd');
	var dialog  = $('.dialog');
	var nhcText = $('.nhcp-text');
	ps.click(function(){
		window.location.href = "/pharmacy/home";
	});
	dd.click(function(){
		window.location.href = "/dispensing-doctor/home";
	});
	nhc.click(function(){
		dialog.addClass( "slideout" );
		nhcText.fadeIn();
	});
	//preload images 
	var backOne = new PreLoadedImage("/img/splash-back.jpg","Teva's generics buying schemes","splash-image-back",".splash-back",false);
});