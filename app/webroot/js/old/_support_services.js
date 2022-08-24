$(function(){
	/*navigation highlight*/
	$('.support-link').addClass('current');
	/*preload images*/
	var imageOne        = new PreLoadedImage('/img/sup-section-one-image-one.png','Pharmacy support','section-one-image-one','#section-one-image-one-holder');
	var sectionTwoImage = new PreLoadedImage('/img/ps-nms-image.png','NMS','section-two-image-one','#section-two-image-one-holder');
	/*scroll box*/
	var scrollLeft  = $('#scroll-left');
	var scrollRight = $('#scroll-right');
	var scrollCont  = $('#sup-scroll-cont');
	//move last element to the first position
	$('.scroll-image-cont:first').before($('.scroll-image-cont:last'));
	//scroll function
	function MoveScroll(direc){
		direc = direc.data;
		if(direc == "left"){
			scrollCont.animate({'left':'0px'},function(){
				$('.scroll-image-cont:first').before($('.scroll-image-cont:last'));
				scrollCont.css({'left':'-168px'});
				ScrollText();
			});
		}else if(direc == "right"){
			scrollCont.animate({'left':'-336px'},function(){
				$('.scroll-image-cont:last').after($('.scroll-image-cont:first'));
				scrollCont.css({'left':'-168px'});
				ScrollText();
			});
		}else{
			return false;
		}
	}
	var repeatMove = false;
	//scroll text function
	function ScrollText(){
		var centerImgHolder = $('.scroll-image-cont:nth-child(4)');
		var centerImg       = centerImgHolder.children().attr('alt');
		var centerText      = $('#section-one-para-two');
		var textObj         = {
			'MUR' : 'Providing pharmacists with a range of innovative medicine use review (MUR) resources',
			'tMUR' : 'Tools to help pharmacists target the right patients for targeted MURs',
			'CMS' : 'Chronic Medication Service resources for pharmacists in Scotland',
			'NMS' : 'Resources designed to help pharmacists in England develop the New Medicine Service',
			'DMR' : 'Essential resources which aim to support pharmacists in Wales deliver the Discharge Medicines Review service',
			'Learning Zone' : 'An online learning platform to help staff improve their skills',
			'Tips' : 'Understanding key aspects of the Drug Tariff',
			'Generics' : 'Support tools that help you communicate generic medicine changes to patients',
			'360 Planning Tool' : 'A personalised online portal to help calculate and model different business scenarios'
		};
		centerText.text(textObj[centerImg]);
		ChangeBody(centerImg);
	}
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
			'cms-1' : '/img/res-cms-image-two.jpg',
			'cms-2' : '/img/res-cms-image-one.jpg',
			'cms-3' : '/img/res-cms-image-three.jpg',
			'cms-4' : '/img/res-cms-image-four.jpg',
			'nms-1' : '/img/res-nms-image-one.jpg',
			'nms-2' : '/img/res-nms-image-two.jpg',
			'nms-3' : '/img/res-nms-image-three.jpg',
			'nms-4' : '/img/res-nms-image-four.jpg',
			'nms-5' : '/img/res-nms-image-five.jpg',
			'nms-6' : '/img/res-nms-image-six.jpg',
			'nms-7' : '/img/res-nms-image-seven.jpg',
			'nms-8' : '/img/res-nms-image-eight.jpg',
			'nms-9' : '/img/res-nms-image-nine.jpg',
			'dmr-1' : '/img/res-dmr-image-one.jpg',
			'dmr-2' : '/img/res-dmr-image-two.jpg',
			'dmr-3' : '/img/res-dmr-image-three.jpg',
			'dmr-4' : '/img/res-dmr-image-four.jpg',
			'dmr-5' : '/img/res-dmr-image-five.jpg',
			'dmr-6' : '/img/res-dmr-image-six.jpg',
			'dmr-7' : '/img/res-dmr-image-seven.jpg',
			'dmr-8' : '/img/res-dmr-image-eight.jpg',
			'gen-1' : '/img/res-gen-image-one.jpg',
			'gen-2' : '/img/res-gen-image-two.jpg',
			'mur-1' : '/img/res-mur-image-one.jpg',
			'mur-2' : '/img/res-mur-image-two.jpg',
			'mur-3' : '/img/res-mur-image-three.jpg',
			'mur-4' : '/img/res-mur-image-four.jpg',
			'mur-5' : '/img/res-mur-image-five.jpg',
			'mur-6' : '/img/res-mur-image-six.jpg',
			'mur-7' : '/img/res-mur-image-seven.jpg',
			'mur-8' : '/img/res-mur-image-eight.jpg',
			'mur-9' : '/img/res-mur-image-nine.jpg',
			'tmur-1' : '/img/res-tmur-image-one.jpg',
			'tmur-2' : '/img/res-tmur-image-two.jpg',
			'tmur-3' : '/img/res-tmur-image-three.jpg',
			'tmur-4' : '/img/res-tmur-image-four.jpg',
			'tmur-5' : '/img/res-tmur-image-five.jpg'
		};
		var textObj = {
			'cms-1' : '<span class="bold">10 Medicine Use Support Cards</span><br/>The cards are product specific and provide a summary of key information to assist in delivering an efficient and informative CMS. The cards are laminated and bound with a single ring, also included are some self adhesive hooks to hang up your cards. The medicines covered are: Amlodipine, Aspirin dispersible 75mg, Bendroflumethiazide, Diclofenac, Lansoprazole, Levothyroxine, Metformin, Ramipril, Simvastatin and Warfarin.',
			'cms-2' : '<span class="bold">Patient Self-Assessment Forms</span><br/>Adaptable to ensure patients leave with the individual information they need.',
			'cms-3' : '<span class="bold">CMS Stickers</span><br/>To help you identify suitable patients.',
			'cms-4' : '<span class="bold">Patient Information Follow-On Leaflets</span><br/>Adaptable to ensure patients leave with the individual information they need.',
			'nms-1' : '<span class="bold">5 Medicine Use Support Cards</span><br/>Medicine specific information aligned to the target NMS patient groups to help perform the NMS successfully and efficiently. The medicines covered are: Bisoprolol, Doxazosin, Gliclazide, Lisinopril and Atenolol.',
			'nms-2' : '<span class="bold">An NMS Guide for the whole Pharmacy Team</span><br/>A booklet for the whole team to read to learn about the NMS.',
			'nms-3' : '<span class="bold">GP Referral Cards</span><br/>For you to engage your local GPs so they can help you identify patients on a new medicine.',
			'nms-4' : '<span class="bold">Patient Appointment Cards</span><br/>To remind patients of their NMS appointments.',
			'nms-5' : '<span class="bold">NMS Appointment Diary</span><br/>For you to schedule NMS appointments.',
			'nms-6' : '<span class="bold">NMS Poster</span><br/>To create patient awareness of the NMS.',
			'nms-7' : '<span class="bold">NMS Prescription Bag Stuffers</span><br/>To generate patient demand for the NMS from within the identified target NMS patient groups.',
			'nms-8' : '<span class="bold">NMS Patient Leaflets</span><br/>Patient information about the benefits of the NMS.',
			'nms-9' : '<span class="bold">Strutboard</span><br/>To place in your pharmacy to hold the NMS patient leaflets.',
			'dmr-1' : '<span class="bold">5 Medicine Use Support Cards</span><br/>Medicine specific information that may help assist you to perform a Discharge Medicines Review with your patients.The medicines included covered are: Bisoprolol, Doxazosin, Gliclazide, Lisinopril and Atenolol.',
			'dmr-2' : '<span class="bold">DMR Poster</span><br/>To create patient awareness of the DMR service.',
			'dmr-3' : '<span class="bold">DMR Strutboard</span><br/>To place on top of the counter to hold the DMR patient leaflets.',
			'dmr-4' : '<span class="bold">DMR Patient Leaflets</span><br/>Patient information leaflets about the DMR service. To be displayed in the Strutboard.',
			'dmr-5' : '<span class="bold">DMR Prescription Bag Stuffers</span><br/>To generate patient demand for the DMR service.',
			'dmr-6' : '<span class="bold">DMR Patient Appointment Cards</span><br/>To remind patients of their DMR appointments.',
			'dmr-7' : '<span class="bold">DMR Stickers</span><br/>To help identify suitable patients.',
			'dmr-8' : '<span class="bold">DMR Reminder Pad with tear-off Patient Leaflets*</span><br/>To give to your local hospital pharmacy or other care setting, so they can inform patients that your pharmacy is offering the DMR service.',
			'gen-1' : '<span class="bold">A2 Poster</span><br/>Supports the communication to patients of the reasons behind why medicines may have changed in their appearance when you move them onto a generic version from a brand or from one generic to another.',
			'gen-2' : '<span class="bold">A5 Patient Tear-off Leaflets</span><br/>Patient information leaflets to help explain the change from branded medication to a generic equivalent or from one generic to another. To be placed in the prescription bag or given out as a leaflet.',
			'mur-1' : '<span class="bold">10 Medicine Use Support Cards</span><br/>The cards are product specific and provide a summary of key information to assist in conducting an efficient and informative MUR.The cards are laminated and bound with a single ring, also included are some self adhesive hooks to hang up your cards. The medicines covered are: Amlodipine, Aspirin dispersible 75mg, Bendroflumethiazide, Diclofenac, Lansoprazole, Levothyroxine, Metformin, Ramipril, Simvastatin and Warfarin.',
			'mur-2' : '<span class="bold">MUR Medicine Synchronisation Chart</span><br/>To instruct the GP if a prescription needs changing.',
			'mur-3' : '<span class="bold">MUR QuickStep Guide</span><br/>Hints and tips to successfully approach MURs.',
			'mur-4' : '<span class="bold">Patient Information Follow-On Leaflets</span><br/>Contains healthy lifestyle advice and is adaptable to ensure patients leave with the individual information they need.',
			'mur-5' : '<span class="bold">Pharmacy Posters</span><br/>To generate patient awareness of the MUR service.',
			'mur-6' : '<span class="bold">GP Posters</span><br/>To place at local GPs / Health Centre to advertise the MUR service.',
			'mur-7' : '<span class="bold">MUR Patient Self-Assessment Forms</span><br/>For patients to complete whilst they wait, to demonstrate if an MUR would be of benefit.',
			'mur-8' : '<span class="bold">Prescription Bag Stuffers</span><br/>To generate patient awareness of the MUR Service.',
			'mur-9' : '<span class="bold">MUR Stickers</span><br/>To help identify suitable patients.',
			'tmur-1' : '<span class="bold">5 Medicine Use Support Cards</span><br/>Medicine specific information that helps pharmacists perform successful and efficient Targeted Medicine Use Reviews. The 5 cards provided are aligned to the target patient groups and include Clopidogrel, Furosemide, Ipratropium, Naproxen and Salbutamol.',
			'tmur-2' : '<span class="bold">5 Mini Guides</span><br/>Hints and tips for pharmacists to successfully approach Targeted Medicine Use Reviews.',
			'tmur-3' : '<span class="bold">Pharmacy Poster</span><br/>To generate patient demand for MURs from within the identified target MUR patient groups.',
			'tmur-4' : '<span class="bold"50 Prescription Bag Stuffer</span><br/>To generate patient demand for MURs from within the identified target MUR patient groups.',
			'tmur-5' : '<span class="bold">5 Badges</span><br/>To help your staff engage the patient and generate demand for MURs from within the identified target MUR patient groups.'
		};
		resImage.attr('src',imageObj[opt]);
		resText.html(textObj[opt]);
	}
	function HideRes(){
		resHolder.hide();
	}
	/*link to chemist and druggist website*/
	$('#sponsor-link').click(function(){
		window.open('http://www.chemistanddruggist.co.uk/mur-zone');
	});
	/*change the advantage body text*/
	var advaCont        = $('#section-two-cont');
	var kitCont         = $('#kit-cont');
	var advaImg         = $('#section-two-image-one');
	var advaImgHolder   = $('#section-two-image-one-holder');
	var sectionHeight   = $('.section-two-height');
	var scrollImageCont = $('.scroll-image-cont');
	scrollImageCont.click(function(){
		var alt = $(this).children('img').attr('alt');
		console.log(alt);
		ChangeBody(alt);
	});
	function ChangeBody(elem){
		var selc = elem;
		if(selc == "NMS"){
			advaCont.animate({'left':'-978px'});
			kitCont.animate({'left':'-978px'});
			sectionHeight.css({'height':'653px'});
			advaImg.attr('alt','NMS');
			advaImg.pickyFade("out",false,function(){
				advaImgHolder.addClass('preloader');
				$(this).attr('src','/img/ps-nms-image.png');
			});
		}else if(selc == "CMS"){
			advaCont.animate({'left':'0px'});
			kitCont.animate({'left':'0px'});
			sectionHeight.css({'height':'703px'});
			advaImg.attr('alt','CMS');
			advaImg.pickyFade("out",false,function(){
				advaImgHolder.addClass('preloader');
				$(this).attr('src','/img/ps-cms-image.png');
			});
		}else if(selc == "DMR"){
			advaCont.animate({'left':'-1956px'});
			kitCont.animate({'left':'-1956px'});
			sectionHeight.css({'height':'803px'});
			advaImg.attr('alt','DMR');
			advaImg.pickyFade("out",false,function(){
				advaImgHolder.addClass('preloader');
				$(this).attr('src','/img/ps-dmr-image.png');
			});
		}else if(selc == "Learning Zone"){
			advaCont.animate({'left':'-2934px'});
			kitCont.animate({'left':'-2934px'});
			sectionHeight.css({'height':'753px'});
			advaImg.attr('alt','Learning Zone');
			advaImg.pickyFade("out",false,function(){
				advaImgHolder.addClass('preloader');
				$(this).attr('src','/img/ps-learning-zone-image.png');
			});
		}else if(selc == "Tips"){
			advaCont.animate({'left':'-3912px'});
			kitCont.animate({'left':'-3912px'});
			sectionHeight.css({'height':'344px'});
			advaImg.attr('alt','Tips');
			advaImg.pickyFade("out",false,function(){
				advaImgHolder.addClass('preloader');
				$(this).attr('src','/img/ps-tips-image.png');
			});
		}else if(selc == "Generics"){
			advaCont.animate({'left':'-4890px'});
			kitCont.animate({'left':'-4890px'});
			sectionHeight.css({'height':'519px'});
			advaImg.attr('alt','Generics');
			advaImg.pickyFade("out",false,function(){
				advaImgHolder.addClass('preloader');
				$(this).attr('src','/img/ps-gen-image.png');
			});
		}else if(selc == "360 Planning Tool"){
			advaCont.animate({'left':'-5868px'});
			kitCont.animate({'left':'-5868px'});
			sectionHeight.css({'height':'853px'});
			advaImg.attr('alt','360 Planning Tool');
			advaImg.pickyFade("out",false,function(){
				advaImgHolder.addClass('preloader');
				$(this).attr('src','/img/360-image.png');
			});				
		}else if(selc == "MUR"){
			advaCont.animate({'left':'-6846px'});
			kitCont.animate({'left':'-6846px'});
			sectionHeight.css({'height':'519px'});
			advaImg.attr('alt','MUR');
			advaImg.pickyFade("out",false,function(){
				advaImgHolder.addClass('preloader');
				$(this).attr('src','/img/ps-mur-image.png');
			});
		}
		else if(selc == "tMUR"){
			advaCont.animate({'left':'-7824px'});
			kitCont.animate({'left':'-7824px'});
			sectionHeight.css({'height':'703px'});
			advaImg.attr('alt','tMUR');
			advaImg.pickyFade("out",false,function(){
				advaImgHolder.addClass('preloader');
				$(this).attr('src','/img/ps-tmur-image.png');
			});
		}		
	}
	/*image links to forms*/
	var imageLink = $('#section-two-image-one-holder');
	imageLink.click(function(){
		var image = imageLink.children('#section-two-image-one').attr('alt');
		var linksObject = {
			'Tips' : '/files/download/11',
			'Generics' : '/pharmacy/generics-patient-comm-kit-form',
			'MUR' : '/pharmacy/mur-advantage-form',
			'tMUR' : '/pharmacy/tmur-advantage-form',
			'CMS' : '/pharmacy/cms-advantage-form',
			'NMS' : '/pharmacy/nms-advantage-form',
			'DMR' : '/pharmacy/dmr-advantage-form',
			'Learning Zone' : '/pharmacy/teva-learning-zone-sign-up',
			'360 Planning Tool' : '/pharmacy/360-order-form'
		};
		window.location.href = linksObject[image];
	});
	
	/* Touch functionality added 1st July 2013 */
	/* test for touch device */
	if(('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
		/* move scroll on click only for touch devices */
		scrollLeft.click('left',MoveScroll);
		scrollRight.click('right',MoveScroll);
	}
	else{
		/* continues scrolling on hover, none touch device only*/
		/* left movement */
		scrollLeft.hover(function(){
			MoveScroll({data : 'left'});
			repeatMove = setInterval(function(){
				MoveScroll({data : 'left'});
			},1000);
		},function(){
			clearInterval(repeatMove);
		});
		/* right movement */
		scrollRight.hover(function(){
			MoveScroll({data : 'right'});
			repeatMove = setInterval(function(){
				MoveScroll({data : 'right'});
			},1000);
		},function(){
			clearInterval(repeatMove);
		});
	}
});