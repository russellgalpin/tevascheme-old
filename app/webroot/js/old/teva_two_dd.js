$(function(){
	/*navigation highlight*/
	$('.teva-two-link').addClass('current');
	/*preload images*/
	var preImageOne       = new PreLoadedImage("/img/dd-t2-section-one-image-one.png","Why Teva","section-one-image-one","#section-one-image-one-holder");
	var preImageTwo       = new PreLoadedImage("/img/dd-t2-section-one-image-two.png","Why Teva","section-one-image-two","#section-one-image-two-holder");
	var preImageThree     = new PreLoadedImage("/img/dd-t2-section-one-image-three.png","Why Teva","section-one-image-three","#section-one-image-three-holder");
	var preImagefour      = new PreLoadedImage("/img/dd-t2-section-one-image-four.png","Why Teva","section-one-image-four","#section-one-image-four-holder");
	var preImageFive      = new PreLoadedImage("/img/t2-section-three-image-one.png","Simple","section-three-image-one","#section-three-image-one-holder");
	var preImageSix       = new PreLoadedImage("/img/section-four-image-one.png","Good value gauranteed","section-four-image-one","#section-four-image-one-holder");
	var preImageSeven     = new PreLoadedImage("/img/roundels-four.png","POP!","section-five-image-two","#section-five-image-one-holder");
	var preImageEight     = new PreLoadedImage("/img/section-five-image-one.png","Twice daily deliveries","section-five-image-one","#section-five-image-two-holder");
	var preImageNine      = new PreLoadedImage("/img/section-six-image-one.png","Pack Shot","section-six-image-one","#section-six-image-one-holder");
	var preImageTen       = new PreLoadedImage("/img/section-six-image-two.png","POP!","section-six-image-two","#section-six-image-two-holder");
	var preImageEleven    = new PreLoadedImage("/img/dd-section-seven-image-one.png","DRUM","section-seven-image-one","#section-seven-image-one-holder");
	var preImageTwelve    = new PreLoadedImage("/img/dd-section-seven-image-two.png","Learning Zone","section-seven-image-two","#section-seven-image-two-holder");
	var preImageThirteen  = new PreLoadedImage("/img/roundels-six.png","POP!","section-seven-image-four","#section-seven-image-three-holder");
	var preImageFourteen  = new PreLoadedImage("/img/roundels-seven.png","POP!","section-eight-image-one","#section-eight-image-one-holder");
	var preImageFifteen   = new PreLoadedImage("/img/section-eight-image-one.png","Territory Manager","section-eight-image-two","#section-eight-image-two-holder");
	var preImageSixteen   = new PreLoadedImage("/img/roundels-eight.png","POP!","section-eight-image-three","#section-eight-image-three-holder");
	var preImageSeventeen = new PreLoadedImage("/img/dd-t2-section-nine-image-one.png","TevaOne","section-nine-image-one","#section-nine-image-one-holder");
	/*screen variables*/
	var win  = $(window);
	var doc  = $(document);
	var bod  = $('body');
	var logo = $('#logo');
	/*bouncing ball class's*/
	var signUpOne   = new BouncingIcon("#section-two-sign-up-holder");
	var signUpTwo   = new BouncingIcon("#section-three-sign-up-holder");
	var signUpThree = new BouncingIcon("#section-nine-sign-up-holder");
	/*slamming images*/
	var slamOne = new SlammingImg("#section-three-image-one-holder");
	// set actions to false
	var bounceOne   = false;
	var bounceTwo   = false;
	var bounceThree = false;
	var fadeOne     = false;
	// screen sections
	var sectionOne   = $('.section-one');
	var sectionTwo   = $('.section-two');
	var sectionThree = $('.section-three');
	var sectionSeven = $('.section-seven');
	var sectionNine  = $('.section-nine');
	/*screen actions based on scroll position*/
	function ScrollPosActions(){
		if(IsInView(sectionTwo) && (bounceOne === false)){
			signUpOne.AnimateIcon();
			bounceOne = true;
		}
		if(IsInView(sectionThree) && (bounceTwo === false)){
			signUpTwo.AnimateIcon();
			slamOne.AnimateImg();
			bounceTwo = true;
		}
		if(IsInView(sectionSeven) && (fadeOne === false)){
			FadeCircles();
			fadeOne = true;
		}
		if(IsInView(sectionNine) && (bounceThree === false)){
			signUpThree.AnimateIcon();
			bounceThree = true;
		}
	}

	win.scroll(ScrollPosActions);
	/*blue button actions and animations*/
	// variables
	var blueBtnOne      = $('#blue-box-one');
	var baseRollout      = $('#base-rollout');
	var blueArrowOne    = $('#blue-arrow-one');
	var fadedBlueBoxOne = $('#faded-blue-box-one');
	// animation functions and event listeners
	function ShowBase(){
		baseRollout.stop();
		blueArrowOne.stop();
		blueArrowOne.pickyFade("out",'fast',function(){
			baseRollout.animate({'left':'0px'},'slow');
		});
		fadedBlueBoxOne.pickyFade("in");
		return false;
	}
	function HideBase(){
		baseRollout.stop();
		blueArrowOne.stop();
		baseRollout.animate({'left':"-387px"},'slow',function(){
			blueArrowOne.pickyFade("in",'fast');
		});
		fadedBlueBoxOne.pickyFade("out");
		return false;
	}
	blueBtnOne.mouseover(ShowBase); // hide removed AB 21-03-13
	/*info button animations*/
	InfoBox();
	/*hidden paragraph animations*/
	HiddenPara();
	/*change the packshot image on selecting an option*/
	//event listener
	var selectOpt    = $('.select-option');
	var changePara   = $('#section-six-para-one');
	var changeImg    = $('#section-six-image-one');
	var sixImgHolder = $('#section-six-image-one-holder');
	selectOpt.click(function(){
		ChangeImage(this);
	});
	selectOpt.mouseenter(function(){
		ChangeImage(this);
	}); // added for AB 21-03-12
	function ChangeImage(elem){
		var id = $(elem).attr('id');
		var imageArr = {
			'select-one' : '/img/select-img-one.png',
			'select-two' : '/img/select-img-two.png',
			'select-three' : '/img/select-img-three.png',
			'select-four' : '/img/select-img-four.png'
		};
		var textArr = {
			'select-one' : 'Clear and modern typeface for clarity',
			'select-two' : 'Colours chosen so that multiple products in multi-drug therapies are clearly differentiated and offer clear distinction for patients',
			'select-three' : 'Consistent and clear area for bar coding  for faster customer service',
			'select-four' : 'Logical layout of instruction information in the dispensary label area - helps to reduce the potential patient confusion'
		};
		changePara.text(textArr[id]);
		changeImg.pickyFade("out",false,function(){
			$(this).attr('src',imageArr[id]);
			sixImgHolder.addClass('preloader');
			ReturnToOrig();
		});
	}
	//reset after 5 secs
	var timer;
	function ReturnToOrig(){
		if(timer){
			clearTimeout(timer);
		}
		timer = setTimeout(function(){
			changeImg.pickyFade("out",false,function(){
				$(this).attr('src','/img/section-six-image-one.png');
				changePara.text("");
			});
		},5000);
	}
	/*section seven animations*/
	var DRUM  = $('#DRUM');
	var tips  = $('#tips');
	var TLZ  = $('#TLZ');

	var DRUMLeft  = parseInt(DRUM.css('left'),10);
	var tipsLeft  = parseInt(tips.css('left'),10);
	var TLZLeft  = parseInt(TLZ.css('left'),10);

	DRUM.css({'left':DRUMLeft+200+'px','opacity':0});
	tips.css({'left':tipsLeft-200+'px','opacity':0});
	TLZ.css({'left':TLZLeft+200+'px','opacity':0});

	function TagsIn(){
		DRUM.animate({'left':DRUMLeft+'px','opacity':1});
		tips.animate({'left':tipsLeft+'px','opacity':1});
		TLZ.animate({'left':TLZLeft+'px','opacity':1});
		return true;
	}

	var green  = $('#section-seven-image-one-holder');
	var blue   = $('#section-seven-image-two-holder');

	green.hide();
	blue.hide();

	function FadeCircles(){
		green.pickyFade("in",1000,function(){
			TagsIn();
		});
		blue.delay(200).pickyFade("in",800);
		return true;
	}
	/*support shaking icons and links*/
	var iconClass  = $('.shake');
	var iconOne    = $('#section-seven-image-one-holder');
	var iconTwo    = $('#section-seven-image-two-holder');
	var shakeOne   = new ShakingIcon('#section-seven-image-one-holder');
	var shakeTwo   = new ShakingIcon('#section-seven-image-two-holder');
	iconOne.mouseover(function(){
		shakeOne.shake();
	});
	iconTwo.mouseover(function(){
		shakeTwo.shake();
	});
	iconClass.click(function(){
		window.location.href = "/dispensing-doctor/support";
	});
	/*link for pricewatch image*/
	$('#section-four-image-one').click(function(){
		window.location.href = "/dispensing-doctor/pricewatch";
	});
	/*bubbles out of box*/
	var bubblesOneHolder = $('#section-one-image-three-holder');
	var bubblesTwoHolder = $('#section-one-image-four-holder');
	var bubblesOne       = $('#section-one-image-three');
	var bubblesTwo       = $('#section-one-image-four');
	bubblesOne.load(function(){
		bubblesOneHolder.animate({'top':'285px','left':'597px'},2000,'linear').animate({'top':'251px','left':'607px'},2000,'linear');
	});
	bubblesTwo.load(function(){
		bubblesTwoHolder.animate({'top':'351px','left':'617px'},2000,'linear').animate({'top':'301px'},2000,'linear').animate({'top':'251px','left':'607px'},2000,'linear');
	});
});