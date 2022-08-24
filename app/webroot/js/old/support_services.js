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
	// var imageOne        = new PreLoadedImage('/img/sup-section-one-image-one.png','Pharmacy support','section-one-image-one','#section-one-image-one-holder');
	// //var sectionTwoImage = new PreLoadedImage('/img/ps-nms-image.png','NMS','section-two-image-one','#section-two-image-one-holder');
	// var sectionTwoImage = new PreLoadedImage('/img/ps-cms-image.png','CMS','section-two-image-one','#section-two-image-one-holder');
		
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
			'cms2-1' : '/img/res-cms2-image-one.jpg',
			'cms2-2' : '/img/res-cms2-image-two.jpg',
			'cms2-3' : '/img/res-cms2-image-three.jpg',
			'cms2-4' : '/img/res-cms2-image-four.jpg',
			'cms2-5' : '/img/res-cms2-image-five.jpg',
			'cms2-6' : '/img/res-cms2-image-six.jpg',
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
			'tmur-5' : '/img/res-tmur-image-five.jpg',
			'fluwise-1' : '/img/res-fluwise-booklets.jpg',
			'fluwise-2' : '/img/res-fluwise-poster.jpg',
			'fluwise-3' : '/img/res-fluwise-poster.jpg',
			'fluwise-4' : '/img/res-fluwise-leaflets.jpg',
			'fluwise-5' : '/img/res-fluwise-cards.jpg',
			'fluwise-6' : '/img/res-fluwise-stuffers.jpg',
			'fluwise-7' : '/img/res-fluwise-wobblers.jpg',
			'inhaler-recycling-1' : '/img/res-inhaler-recycling-image-one.jpg',
			'inhaler-recycling-2' : '/img/res-inhaler-recycling-image-two.jpg',
			'inhaler-recycling-3' : '/img/res-inhaler-recycling-image-three.jpg',

		};
		var textObj = {
			'cms-1' : '<span class="bold">10 Medicine Use Support Cards</span><br/>The cards are product specific and provide a summary of key information to assist in delivering an efficient and informative CMS. The cards are laminated and bound with a single ring, also included are some self adhesive hooks to hang up your cards. The medicines covered are: Amlodipine, Aspirin dispersible 75mg, Bendroflumethiazide, Diclofenac, Lansoprazole, Levothyroxine, Metformin, Ramipril, Simvastatin and Warfarin.',
			'cms-2' : '<span class="bold">Patient Self-Assessment Forms</span><br/>Adaptable to ensure patients leave with the individual information they need.',
			'cms-3' : '<span class="bold">CMS Stickers</span><br/>To help you identify suitable patients.',
			'cms-4' : '<span class="bold">Patient Information Follow-On Leaflets</span><br/>Adaptable to ensure patients leave with the individual information they need.',
			'cms2-1' : '<span class="bold">11 Medicine Use Support Cards</span><br/>Medicine specific information to help pharmacists perform effective CMS interventions Includes: A Methotrexate support card for High Risk interventions.',
			'cms2-2' : '<span class="bold">A2 Poster</span><br/>To create patient awareness of the service.',
			'cms2-3' : '<span class="bold">Patient Leaflets</span><br/>Patient information about the Chronic Medication Service. To be displayed in the Strutboard.',
			'cms2-4' : '<span class="bold">Strutboard</span><br/>To place in you Pharmacy to hold the patient leaflets.',
			'cms2-5' : '<span class="bold">Patient Reminder Cards</span><br/>To remind patients of their CMS appointments.',
			'cms2-6' : '<span class="bold">New Medicine Stickers</span><br/>To identify suitable patients.',
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
			'tmur-5' : '<span class="bold">5 Badges</span><br/>To help your staff engage the patient and generate demand for MURs from within the identified target MUR patient groups.',
			'fluwise-1' : '<span class="bold">5R ‘R’s of Flu Jabs Booklet</span><br/>5 Rs of Flu Booklet to assist you in delivering an effective flu service in your pharmacy.',
			'fluwise-2' : '<span class="bold">A3 Poster</span><br/>Large poster to promote flu service to patients',
			'fluwise-3' : '<span class="bold">A4 Poster</span><br/>Small poster to promote flu service to patients',
			'fluwise-4' : '<span class="bold">Patient Information Leaflets</span><br/>Leaflet to explain the flu service and eligibility criteria to patients',
			'fluwise-5' : '<span class="bold">Appointment Cards</span><br/>Appointment cards for patients who have booked a flu vaccination',
			'fluwise-6' : '<span class="bold">Bag Stuffers</span><br/>Bag stuffers to promote the flu service to potential patients',
			'fluwise-7' : '<span class="bold">Shelf Wobblers</span><br/>Shelf wobblers to advertise the flu service in your pharmacy',
			'inhaler-recycling-1' : '<span class="bold">Cardboard recycling bin</span><br/>Recycling bin to display in the Pharmacy to encourage patients to recycle used inhalers',
			'inhaler-recycling-2' : '<span class="bold">A2 Poster</span><br/>To generate patient awareness of the inhaler recycling service available in Pharmacy',
			'inhaler-recycling-3' : '<span class="bold">Sticker sheets</span><br/>To generate patient awareness of the inhaler recycling service available in Pharmacy',
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
	
	
});