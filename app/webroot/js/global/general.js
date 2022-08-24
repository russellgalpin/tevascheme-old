/*info btn and box rollover*/
function InfoBox(){
	// set variables
	var infoConts = $('.info-cont');
	infoConts.hover(function(){
		$(this).children('.info-box').stop(true, true).slideDown();
	},function(){
		$(this).children('.info-box').stop().slideUp();
	});
}
/*hidden paragraph rollover*/
function HiddenPara(){
	//set variables
	var hidePara = $('.hide-para');
	hidePara.hover(function(){
		$(this).children('.hidden').stop(true,true).slideDown();
	},function(){
		$(this).children('.hidden').stop().slideUp();
	});
}

/*determines if a section is in the view window*/
function IsInView(elem,bottom){
	var win           = $(window);
	var docViewTop    = win.scrollTop();
	var docViewBottom = docViewTop + win.height();
	var docMiddle     = ((docViewBottom - docViewTop)/2) + docViewTop;
	var elemTop       = elem.offset().top;
	var elemBottom    = elemTop + elem.height();
	var elemMiddle    = (((elemBottom - elemTop)/2) + elemTop);
	var inView        = (elemTop <= docMiddle);
	if(bottom){
		inView = (elemTop <= docViewBottom);
	}
	return(inView);
}

/*image preloader class*/
function PreLoadedImage(imgSrc,imgAlt,imgId,appendTo,imgClass)
{
	// set variables
	var self      = this;
	this.imgSrc   = imgSrc;
	this.imgAlt   = imgAlt;
	this.img      = new Image();
	this.appendTo = $(appendTo);
	// add a class if one is attached
	if(imgClass){
		this.imgClass = imgClass;
		$(this.img).addClass(this.imgClass);
	}
	//add an ID if one is attached
	if(imgId){
		this.imgId = imgId;
		$(this.img).attr('id',this.imgId);
	}
	// attach preloader gif to image holder
	this.appendTo.addClass('preloader');
	// attach the attributes to img
	$(this.img).attr('alt',this.imgAlt);
	$(this.img).css({'display':'none'});
	$(this.img).load(function(){
		$(this).pickyFade("in");
		self.appendTo.removeClass('preloader');
	});
	$(this.img).attr('src',this.imgSrc);
	this.appendTo.append(this.img);
}

/*scroll to the top of the page*/
function ScrollToTopOfPage(){
	var body = $('body, html');
	body.animate({'scrollTop':0});
}

$.fn.pickyFade = function(inOut,speed,callback){
	if(inOut == "in"){
		if($.support.opacity){
			this.fadeIn(speed,callback);
		}else{
			this.show(0,'',callback);
		}
	}else if(inOut == "out"){
		if($.support.opacity){
			this.fadeOut(speed,callback);
		}else{
			this.hide(0,'',callback);
		}
	}
};

$(function() {
	$('.service-inner').matchHeight();
});

$(function() {
	$('#agree-continue').click(function() {
		$('.dialog-container').fadeOut('fast', function() {
			$('.main-container').css("filter","unset");
			$('.overlay').css("display","none");
		});
	});
});

// $(function() {
//   $('a.smooth').click(function() {
//     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
//       var target = $(this.hash);
//       target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
//       if (target.length) {
//         $("html, body").animate({
//           scrollTop: target.offset().top
//         }, 500);
//         return false;
//       }
//     }
//   });
// });

// Creare's 'Implied Consent' EU Cookie Law Banner v:2.4
// Conceived by Robert Kent, James Bavington & Tom Foyster
 
// var dropCookie = true;                      // false disables the Cookie, allowing you to style the banner
// var cookieDuration = 14;                    // Number of days before the cookie expires, and the banner reappears
// var cookieName = 'complianceCookie';        // Name of our cookie
// var cookieValue = 'on';                     // Value of cookie
 
// function createDiv(){
//     var bodytag = document.getElementsByTagName('body')[0];
//     var div = document.createElement('div');
//     div.setAttribute('id','cookie-law');
//     div.innerHTML = '<p class="bold">TEVA Scheme Privacy Policy</p><p>Our website uses cookies. By continuing to use this site you agree to our use of cookies detailed in our <a href="/privacy-policy">Privacy Policy</a>. <a class="close-cookie-banner" href="javascript:void(0);" onclick="removeMe();"><span>X</span></a></p>';    
//  // Be advised the Close Banner 'X' link requires jQuery
     
//     // bodytag.appendChild(div); // Adds the Cookie Law Banner just before the closing </body> tag
//     // or
//     bodytag.insertBefore(div,bodytag.firstChild); // Adds the Cookie Law Banner just after the opening <body> tag
     
//     document.getElementsByTagName('body')[0].className+=' cookiebanner'; //Adds a class tothe <body> tag when the banner is visible
     
//     createCookie(window.cookieName,window.cookieValue, window.cookieDuration); // Create the cookie
// }
 
 
// function createCookie(name,value,days) {
//     if (days) {
//         var date = new Date();
//         date.setTime(date.getTime()+(days*24*60*60*1000)); 
//         var expires = "; expires="+date.toGMTString(); 
//     }
//     else var expires = "";
//     if(window.dropCookie) { 
//         document.cookie = name+"="+value+expires+"; path=/"; 
//     }
// }
 
// function checkCookie(name) {
//     var nameEQ = name + "=";
//     var ca = document.cookie.split(';');
//     for(var i=0;i < ca.length;i++) {
//         var c = ca[i];
//         while (c.charAt(0)==' ') c = c.substring(1,c.length);
//         if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
//     }
//     return null;
// }
 
// function eraseCookie(name) {
//     createCookie(name,"",-1);
// }
 
// window.onload = function(){
//     if(checkCookie(window.cookieName) != window.cookieValue){
//         createDiv(); 
//     }
// }

// function removeMe(){
// 	var element = document.getElementById('cookie-law');
// 	element.parentNode.removeChild(element);
// }


//Check to see if the window is top if not then display button
$(window).scroll(function(){
	if ($(this).scrollTop() > 100) {
		$('.scrollToTop').fadeIn();
	} else {
		$('.scrollToTop').fadeOut();
	}
});

//Click event to scroll to top
$('.scrollToTop').click(function(){
	$('html, body').animate({scrollTop : 0},800);
	return false;
});