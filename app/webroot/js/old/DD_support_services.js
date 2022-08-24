$(document).ready(function(){

	$('.slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.slider-for',
	  dots: false,
	  centerMode: true,
	  centerPadding: '120px',
	  focusOnSelect: true
	});


	/*navigation highlight*/
	$('.support-link').addClass('current');
	/*preload images*/
	// var imageOne        = new PreLoadedImage('/img/dd-sup-section-one-image-one.png','Pharmacy support','section-one-image-one','#section-one-image-one-holder');
	// var sectionTwoImage = new PreLoadedImage('/img/dd-gen-image.png','Generics','section-two-image-one','#section-two-image-one-holder');
	// variables
	// var arrow    = $('#grey-arrow-down');
	// var textSnip = $('#section-one-para-two');
	// var servBtn  = $('.scroll-image-cont');
	// event listener
	// servBtn.click(function(){
	// 	var service = $(this).children().attr('alt');
	// 	ScrollText(service);
	// 	MoveArrow(service);
	// });
	// move arrow function
	// function MoveArrow(service){
	// 	var posObj = {
	// 		'Generics' : {img:'121px',text:'41px'},
	// 		'DRUM' : {img:'348px',text:'267px'},
	// 		'Tips' : {img:'577px',text:'496px'},
	// 		'Learning Zone' : {img:'795px',text:'714px'}
	// 	};
	// 	arrow.css({'left':posObj[service]['img']});
	// 	textSnip.css({'left':posObj[service]['text']});
	// }
	// //scroll text function
	// function ScrollText(service){
	// 	var textObj         = {
	// 		'DRUM' : 'Dispensing Review of the Use of Medicines (DRUMs)',
	// 		'Learning Zone' : 'An online learning platform to help staff improve their skills',
	// 		'Tips' : 'Understanding key aspects of the Drug Tariff',
	// 		'Generics' : 'Support tools that help you communicate generic medicine changes to patients'
	// 	};
	// 	textSnip.text(textObj[service]);
	// 	ChangeBody(service);
	// }
	/*change the advantage body text*/
	var advaCont      = $('#section-two-cont');
	var kitCont       = $('#kit-cont');
	var advaImg       = $('#section-two-image-one');
	var advaImgHolder = $('#section-two-image-one-holder');
	var sectionHeight = $('.section-two-height');
	// function ChangeBody(elem){
	// 	var selc = elem;
	// 	if(selc == "DRUM"){
	// 		advaCont.animate({'left':'-978px'});
	// 		kitCont.animate({'left':'-978px'});
	// 		sectionHeight.css({'height':'803px'});
	// 		advaImg.pickyFade("out",false,function(){
	// 			advaImgHolder.addClass('preloader');
	// 			$(this).attr('alt','DRUM').attr('src','/img/dd-drum-image.png');
	// 		});
	// 	}else if(selc == "Learning Zone"){
	// 		advaCont.animate({'left':'-2934px'});
	// 		kitCont.animate({'left':'-2934px'});
	// 		sectionHeight.css({'height':'860px'});
	// 		advaImg.pickyFade("out",false,function(){
	// 			advaImgHolder.addClass('preloader');
	// 			$(this).attr('alt','Learning Zone').attr('src','/img/dd-learning-zone-image.png');
	// 		});
	// 	}else if(selc == "Tips"){
	// 		advaCont.animate({'left':'-1956px'});
	// 		kitCont.animate({'left':'-1956px'});
	// 		sectionHeight.css({'height':'344px'});
	// 		advaImg.pickyFade("out",false,function(){
	// 			advaImgHolder.addClass('preloader');
	// 			$(this).attr('alt','Tips').attr('src','/img/ps-tips-image.png');
	// 		});
	// 	}else if(selc == "Generics"){
	// 		advaCont.animate({'left':'0px'});
	// 		kitCont.animate({'left':'0px'});
	// 		sectionHeight.css({'height':'519px'});
	// 		advaImg.pickyFade("out",false,function(){
	// 			advaImgHolder.addClass('preloader');
	// 			$(this).attr('alt','Generics').attr('src','/img/dd-gen-image.png');
	// 		});
	// 	}
	// }
	/*link to chemist and druggist website*/
	$('#sponsor-link').click(function(){
		window.open('http://www.chemistanddruggist.co.uk/mur-zone');
	});
	/*image links to forms*/
	var imageLink = $('#section-two-image-one-holder');
	imageLink.click(function(){
		var image = imageLink.children('#section-two-image-one').attr('alt');
		var linksObject = {
			'Tips' : '/files/download/11',
			'Generics' : '/dispensing-doctor/generics-patient-comm-kit-form',
			'DRUM' : '/dispensing-doctor/drum-e-learning-sign-up',
			'Learning Zone' : '/dispensing-doctor/teva-learning-zone-sign-up'
		};
		window.location.href = linksObject[image];
	});
	/*show the correct resource option*/
	var resOption = $('.res-option');
	var resHolder = $('#resource-cont');
	var resImage  = $('#resource-img');
	var resText   = $('#resource-text');
	resOption.hover(ShowRes,HideRes);
	function ShowRes(){
		resHolder.show();
		var opt = $(this).attr('data-kit');
		var imageObj = {
			'gen-1' : '/img/res-gen-image-one.jpg',
			'gen-2' : '/img/res-gen-image-two.jpg',
			'inhaler-recycling-1' : '/img/res-inhaler-recycling-image-one.jpg',
			'inhaler-recycling-2' : '/img/res-inhaler-recycling-image-two.jpg',
			'inhaler-recycling-3' : '/img/res-inhaler-recycling-image-three.jpg'
		};
		var textObj = {
			'gen-1' : '<span class="bold">A2 Poster</span><br/>Supports the communication to patients of the reasons behind why medicines may have changed in their appearance when you move them onto a generic version from a brand or from one generic to another.',
			'gen-2' : '<span class="bold">A5 Patient Tear-off Leaflets</span><br/>Patient information leaflets to help explain the change from branded medication to a generic equivalent or from one generic to another. To be placed in the prescription bag or given out as a leaflet.',
			'inhaler-recycling-1' : '<span class="bold">Cardboard recycling bin</span><br/>Recycling bin to display in the Pharmacy to encourage patients to recycle used inhalers',
			'inhaler-recycling-2' : '<span class="bold">A2 Poster</span><br/>To generate patient awareness of the inhaler recycling service available in Pharmacy',
			'inhaler-recycling-3' : '<span class="bold">Sticker sheets</span><br/>To generate patient awareness of the inhaler recycling service available in Pharmacy'
		};
		resImage.attr('src',imageObj[opt]);
		resText.html(textObj[opt]);
	}
	function HideRes(){
		resHolder.hide();
	}
});