$(function(){
	// variables
	var mainContent = $('.main-content');
	var win         = $(window);
	// wrap the background around the main content
	mainContent.wrap('<div class="background"/>');
	$('.background').append(
		'<div class="roundel-type-one roundel-one-holder"/>',
		'<div class="roundel-type-two roundel-two-holder"/>',
		'<div class="roundel-type-three roundel-three-holder"/>',
		'<div class="roundel-type-one roundel-four-holder"/>',
		'<div class="roundel-type-two roundel-five-holder"/>',
		'<div class="roundel-type-three roundel-six-holder"/>',
		'<div class="roundel-type-one roundel-seven-holder"/>',
		'<div class="roundel-type-three roundel-eight-holder"/>',
		'<div class="roundel-type-two roundel-nine-holder"/>'
		);
	// preload the images
	var backgroundOne = new PreLoadedImage("/img/DD-top-background.jpg","TevaOne","top-background",".background","top-background");
	var backgroundTwo = new PreLoadedImage("/img/DD-bottom-background.jpg","TevaOne","bottom-background",".background","bottom-background");
	var roundelOne    = new PreLoadedImage("/img/roundels-two.png","POP",false,".roundel-type-one");
	var roundelTwo    = new PreLoadedImage("/img/roundels-one.png","POP",false,".roundel-type-two");
	var roundelThree  = new PreLoadedImage("/img/roundels-three.png","POP",false,".roundel-type-three");
	/*attach the paralax function to the scroll event*/
	win.scroll(Parallax);
	/*background movement*/
	// floating roundels
	var setOne   = $('.roundel-one-holder');
	var setTwo   = $('.roundel-two-holder');
	var setThree = $('.roundel-three-holder');
	var setFour  = $('.roundel-four-holder');
	var setFive  = $('.roundel-five-holder');
	var setSix   = $('.roundel-six-holder');
	var setSeven = $('.roundel-seven-holder');
	var setEight = $('.roundel-eight-holder');
	var setNine  = $('.roundel-nine-holder');
	// original positions
	var topOne   = parseInt(setOne.css('top'),10);
	var topTwo   = parseInt(setTwo.css('top'),10);
	var topThree = parseInt(setThree.css('top'),10);
	var topFour  = parseInt(setFour.css('top'),10);
	var topFive  = parseInt(setFive.css('top'),10);
	var topSix   = parseInt(setSix.css('top'),10);
	var topSeven = parseInt(setSeven.css('top'),10);
	var topEight = parseInt(setEight.css('top'),10);
	var topNine  = parseInt(setNine.css('top'),10);

	var leftOne   = parseInt(setOne.css('margin-left'),10);
	var leftTwo   = parseInt(setTwo.css('margin-left'),10);
	var leftThree = parseInt(setThree.css('margin-left'),10);
	var leftFour  = parseInt(setFour.css('margin-left'),10);
	var leftFive  = parseInt(setFive.css('margin-left'),10);
	var leftSix   = parseInt(setSix.css('margin-left'),10);
	var leftSeven = parseInt(setSeven.css('margin-left'),10);
	var leftEight = parseInt(setEight.css('margin-left'),10);
	var leftNine  = parseInt(setNine.css('margin-left'),10);
	// determine when in view
	var viewFour  = (topFour + (setFour.height()/2))- win.height();
	var viewFive  = (topFive + (setFive.height()/2))- win.height();
	var viewSix   = (topSix + (setSix.height()/2))- win.height();
	var viewSeven = (topSeven + (setSeven.height()/2))- win.height();
	var viewEight = (topEight + (setEight.height()/2))- win.height();
	var viewNine  = (topNine + (setNine.height()/2))- win.height();
	// paralax
	function Parallax(){
		var pos  = win.scrollTop();
		var diff = Math.round(pos/10);
		setOne.css({'top':topOne - diff,'margin-left':leftOne + diff});
		setTwo.css({'top':topTwo - diff,'margin-left':leftTwo - diff});
		setThree.css({'top':topThree - diff,'margin-left':leftThree + diff});
		if(IsInView(setFour)){
			var posFour = pos - viewFour;
			var diffFour = Math.round(posFour/10);
			setFour.css({'top':topFour - diffFour,'margin-left':leftFour - diffFour});
		}
		if(IsInView(setFive)){
			var posFive = pos - viewFive;
			var diffFive = Math.round(posFive/10);
			setFive.css({'top':topFive - diffFive,'margin-left':leftFive + diffFive});
		}
		if(IsInView(setSix)){
			var posSix = pos - viewSix;
			var diffSix = Math.round(posSix/10);
			setSix.css({'top':topSix - diffSix,'margin-left':leftSix - diffSix});
		}
		if(IsInView(setSeven)){
			var posSeven = pos - viewSeven;
			var diffSeven = Math.round(posSeven/10);
			setSeven.css({'top':topSeven - diffSeven,'margin-left':leftSeven + diffSeven});
		}
		if(IsInView(setEight)){
			var posEight = pos - viewEight;
			var diffEight = Math.round(posEight/10);
			setEight.css({'top':topEight - diffEight,'margin-left':leftEight + diffEight});
		}
		if(IsInView(setNine)){
			var posNine = pos - viewNine;
			var diffNine = Math.round(posNine/10);
			setNine.css({'top':topNine - diffNine,'margin-left':leftNine - diffNine});
		}
	}
});