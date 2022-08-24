$(function(){
	/*navigation highlight*/
	$('.teva-one-link').addClass('current');
	/*preload images*/
	var preImageOne       = new PreLoadedImage("/img/section-one-image-one.png","Why Teva","section-one-image-one","#section-one-image-one-holder");
	var preImageTwo       = new PreLoadedImage("/img/section-one-image-two.png","Why Teva","section-one-image-two","#section-one-image-two-holder");
	var preImageEighteen  = new PreLoadedImage("/img/section-one-image-three.png","Why Teva","section-one-image-three","#section-one-image-three-holder");
	var preImageNineteen  = new PreLoadedImage("/img/section-one-image-four.png","Why Teva","section-one-image-four","#section-one-image-four-holder");
	var preImageThree     = new PreLoadedImage("/img/section-three-image-one.png","Convenience","section-three-image-one","#section-three-image-one-holder");
	var preImageFour      = new PreLoadedImage("/img/section-four-image-one.png","Good value gauranteed","section-four-image-one","#section-four-image-one-holder");
	var preImageFive      = new PreLoadedImage("/img/roundels-four.png","POP!","section-five-image-two","#section-five-image-one-holder");
	var preImageSix       = new PreLoadedImage("/img/section-five-image-one.png","Twice daily deliveries","section-five-image-one","#section-five-image-two-holder");
	var preImageSeven     = new PreLoadedImage("/img/section-six-image-one.png","Pack Shot","section-six-image-one","#section-six-image-one-holder");
	var preImageEight     = new PreLoadedImage("/img/section-six-image-two.png","POP!","section-six-image-two","#section-six-image-two-holder");
	var preImageTen       = new PreLoadedImage("/img/section-seven-image-one.png","tMUR","section-seven-image-one","#section-seven-image-one-holder");
	var preImageEleven    = new PreLoadedImage("/img/section-seven-image-two.png","MUR","section-seven-image-two","#section-seven-image-two-holder");
	var preImageTwelve    = new PreLoadedImage("/img/section-seven-image-three.png","NMS","section-seven-image-three","#section-seven-image-three-holder");
	var preImageThirteen  = new PreLoadedImage("/img/roundels-six.png","POP!","section-seven-image-four","#section-seven-image-four-holder");
	var preImageFourteen  = new PreLoadedImage("/img/roundels-seven.png","POP!","section-eight-image-one","#section-eight-image-one-holder");
	var preImageFifteen   = new PreLoadedImage("/img/section-eight-image-one.png","Territory Manager","section-eight-image-two","#section-eight-image-two-holder");
	var preImageSixteen   = new PreLoadedImage("/img/roundels-eight.png","POP!","section-eight-image-three","#section-eight-image-three-holder");
	var preImageSeventeen = new PreLoadedImage("/img/section-nine-image-one.png","TevaOne","section-nine-image-one","#section-nine-image-one-holder");
	/*bouncing ball class's*/
	var signUpOne   = new BouncingIcon("#section-two-sign-up-holder");
	var signUpTwo   = new BouncingIcon("#section-three-sign-up-holder");
	var signUpThree = new BouncingIcon("#section-nine-sign-up-holder");
	/*slamming images*/
	var slamOne = new SlammingImg("#section-three-image-one-holder");
	/*screen variables*/
	var win  = $(window);
	var doc  = $(document);
	var bod  = $('body');
	var logo = $('#logo');
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
			$('#section-three-sign-up-holder').show();
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

	/*green button actions and animations*/
	// variables
	var greenBtnOne      = $('#green-box-one');
	var greenBtnTwo      = $('#green-box-two');
	var baseRollout      = $('#base-rollout');
	var bonusRolloutOne  = $('#bonus-rollout-one');
	var bonusRolloutTwo  = $('#bonus-rollout-two');
	var greenArrowOne    = $('#green-arrow-one');
	var greenArrowTwo    = $('#green-arrow-two');
	var fadedGreenBoxOne = $('#faded-green-box-one');
	var fadedGreenBoxTwo = $('#faded-green-box-two');
	// animation functions and event listeners
	function ShowBase(){
		baseRollout.stop();
		greenArrowOne.stop();
		greenArrowOne.pickyFade("out",'fast',function(){
			baseRollout.animate({'left':'0px'},'slow');
		});
		fadedGreenBoxOne.pickyFade("in");
		return false;
	}
	function HideBase(){
		baseRollout.stop();
		greenArrowOne.stop();
		baseRollout.animate({'left':"-281px"},'slow',function(){
			greenArrowOne.pickyFade("in",'fast');
		});
		fadedGreenBoxOne.stop().pickyFade("out");
		return false;
	}
	function ShowBonus(){
		bonusRolloutTwo.stop();
		bonusRolloutOne.stop();
		greenArrowTwo.stop();
		greenArrowTwo.pickyFade("out",'fast',function(){
			bonusRolloutOne.animate({'left':'0px'},function(){
				bonusRolloutTwo.animate({'left':'0px'});
			});
		});
		fadedGreenBoxTwo.pickyFade("in",'fast');
		return false;
	}
	function HideBonus(){
		bonusRolloutTwo.stop();
		bonusRolloutOne.stop();
		greenArrowTwo.stop();
		bonusRolloutTwo.animate({'left':'-162px'},function(){
			bonusRolloutOne.animate({'left':'-215px'},function(){
				greenArrowTwo.pickyFade("in",'fast');
			});
		});
		fadedGreenBoxTwo.stop().pickyFade("out",'fast');
		return false;
	}
	greenBtnOne.mouseover(ShowBase); // hide removed AB 21-03-13
	greenBtnTwo.mouseover(ShowBonus); // hide removed AB 21-03-13
	/*info button animations*/
	InfoBox();
	/*hidden paragraph animations*/
	HiddenPara();
	/*section seven animations*/
	var DMR  = $('#DMR');
	var MUR  = $('#MUR');
	var CMS  = $('#CMS');
	var NMS  = $('#NMS');
	var tMUR = $('#tMUR');

	var DMRLeft  = parseInt(DMR.css('left'),10);
	var MURLeft  = parseInt(MUR.css('left'),10);
	var CMSLeft  = parseInt(CMS.css('left'),10);
	var NMSLeft  = parseInt(NMS.css('left'),10);
	var tMURLeft = parseInt(tMUR.css('left'),10);

	DMR.css({'left':DMRLeft-200+'px','opacity':0});
	MUR.css({'left':MURLeft+200+'px','opacity':0});
	CMS.css({'left':CMSLeft+200+'px','opacity':0});
	NMS.css({'left':NMSLeft+200+'px','opacity':0});
	tMUR.css({'left':tMURLeft-200+'px','opacity':0});

	function TagsIn(){
		DMR.animate({'left':DMRLeft+'px','opacity':1});
		MUR.animate({'left':MURLeft+'px','opacity':1});
		CMS.animate({'left':CMSLeft+'px','opacity':1});
		NMS.animate({'left':NMSLeft+'px','opacity':1});
		tMUR.animate({'left':tMURLeft+'px','opacity':1});
		return true;
	}

	var green  = $('#section-seven-image-one-holder');
	var blue   = $('#section-seven-image-two-holder');
	var purple = $('#section-seven-image-three-holder');

	green.hide();
	blue.hide();
	purple.hide();

	function FadeCircles(){
		purple.pickyFade("in",1000,function(){
			TagsIn();
		});
		blue.delay(200).pickyFade("in",800);
		green.delay(400).pickyFade("in",600);
		return true;
	}

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
			'select-three' :'Consistent and clear area for bar coding  for faster customer service',
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

	/*pharmacy support shaking icons and links*/
	var iconClass  = $('.shake');
	var iconOne    = $('#section-seven-image-one-holder');
	var iconTwo    = $('#section-seven-image-two-holder');
	var iconThree  = $('#section-seven-image-three-holder');
	var shakeOne   = new ShakingIcon('#section-seven-image-one-holder');
	var shakeTwo   = new ShakingIcon('#section-seven-image-two-holder');
	var shakeThree = new ShakingIcon('#section-seven-image-three-holder');
	iconOne.mouseover(function(){
		shakeOne.shake();
	});
	iconTwo.mouseover(function(){
		shakeTwo.shake();
	});
	iconThree.mouseover(function(){
		shakeThree.shake();
	});
	iconClass.click(function(){
		window.location.href = "/pharmacy/support";
	});

	/*link for pricewatch image*/
	$('#section-four-image-one').click(function(){
		window.location.href = "/pharmacy/pricewatch";
	});

	/*bubbles out of box*/
	var bubblesOneHolder = $('#section-one-image-three-holder');
	var bubblesTwoHolder = $('#section-one-image-four-holder');
	var bubblesOne       = $('#section-one-image-three');
	var bubblesTwo       = $('#section-one-image-four');
	bubblesOne.load(function(){
		bubblesOneHolder.animate({'top':'253px','left':'557px'},2000,'linear').animate({'top':'223px','left':'551px'},2000,'linear');
	});
	bubblesTwo.load(function(){
		bubblesTwoHolder.animate({'top':'373px','left':'541px'},2000,'linear').animate({'top':'308px'},2000,'linear').animate({'top':'223px','left':'551px'},2000,'linear');
	});
});