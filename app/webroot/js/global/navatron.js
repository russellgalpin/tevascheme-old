/*!
* navatron.js v0.0.6 - A jQuery mobile first, mega menu navigation using the velocity animation library.
* Copyright (c) 2017 Adam Gilmour
* License: MIT
*/
!function(s,i,e,t){"use strict";function n(i,e){this.element=i,this.data=s(this.element).data(o),this.options=s.extend({},a,e,this.data),this._defaults=a,this.init()}var o="navatron",a={offCanvas:!0,accordion:!1,linkPrefix:"Shop all",accordionDuration:300,accordionEasing:"linear",accordionSingle:!1,accordionScroll:!1,accordionScrollOffset:null,navBreakpoint:768,pageDim:!0};s.extend(n.prototype,{init:function(){this.selectors(),this.build(),this.mediaListener()},selectors:function(){this.css={scroll:{overflow:"scroll"},noscroll:{overflow:"hidden"},scrollReset:{overflow:"visible"}},this.classes={nav:o,navActive:o+"--active",offcanvas:o+"--offcanvas",accordion:o+"--accordion",toggle:o+"-toggle",toggleActive:o+"-toggle--active",navMenu:o+"__menu",subLink:o+"__link",subLinkActive:o+"__link--active",hasSub:o+"__link--hassub",openSubMenu:o+"__link--hassub > a",subMenu:o+"__sub",subMenuActive:o+"__sub--active",subMenuInactive:o+"__sub--inactive",firstLink:"."+o+"__menu > ."+o+"__link",firstSub:"."+o+"__menu > ."+o+"__link > ."+o+"__sub",colWrapper:o+"__cols",scroll:o+"--scroll",parentLink:o+"__parentlink",closeSubMenu:o+"__closesub",pageBlock:o+"-pageblock",pageDim:o+"--pagedim",col:"[data-"+o+"-col]",colReset:"[data-"+o+'-col="reset"]',horizontal:"[data-"+o+"-horizontal]",horizontalCol:"[data-"+o+'-col="horizontal"]',horizontalColPanel:o+"__hpanel",horizontalColMenu:o+"__hmenu"}},build:function(){var i=this;if(this.plugin=s(this.element),this.vel=s.fn.velocity,this.accordion=this.options.accordion===!0,this.offcanvas=this.options.offCanvas===!0,this.mobileToggle=s("."+this.classes.toggle),this.plugin.addClass(this.classes.nav),this.navMenu=this.plugin.find("."+this.classes.navMenu),this.navMenu.find("li").addClass(this.classes.subLink),this.navMenu.find("ul").not(this.classes.colReset+" ul").addClass(this.classes.subMenu),this.subLink=this.plugin.find("."+this.classes.subLink),this.subLink.each(function(){var e=s(this);e.children("ul").length&&e.addClass(i.classes.hasSub)}),this.openSubMenu=this.plugin.find("."+this.classes.openSubMenu),this.closeSubMenu=this.plugin.find("."+this.classes.closeSubMenu),this.hasSub=this.plugin.find("."+this.classes.hasSub),this.plugin.find("."+this.classes.horizontalColPanel).each(function(){s(this).find("ul").wrapAll('<div class="'+i.classes.subMenu+'"/>')}),this.subMenu=this.plugin.find("."+this.classes.subMenu),this.firstLink=this.plugin.find(this.classes.firstLink),this.firstSub=this.plugin.find(this.classes.firstSub),this.colWrapper=this.plugin.find("."+this.classes.colWrapper),this.firstSub.addClass(o+"__sub--level1"),this.firstLink.each(function(){var e=s(this),t=e.find("> a").text().replace(/\s/g,"-").replace("&","and");e.addClass(i.classes.subLink+"--"+t.toLowerCase()+" "+i.classes.subLink+"--parent"),e.find(i.classes.col).each(function(){s(this).find("."+i.classes.subMenu).each(function(e){s(this).addClass(i.classes.subMenu+"--level"+(e+2).toString())})})}),this.cols=this.plugin.find(this.classes.col),this.hzt=this.plugin.find(this.classes.horizontal),this.body=s("body"),this.firstLink.filter(function(){return 0==s(this).find(i.classes.col).length}).addClass("navatron__link--nocols"),this.firstLink.is(this.hzt)){var e=this.hzt.find("."+i.classes.horizontalColPanel);e.each(function(){var i=s(this),e=i.find("> a").text().replace(/\s/g,"-").replace(/\s/g,"-").replace("&","and");i.addClass(e.toLowerCase())})}},mobileSetup:function(){this.desktopDestroy(),this.mobileListen(),this.pageBlocker(),this.plugin.show(),this.subMenu.show(),this.accordion&&(this.plugin.addClass(this.classes.accordion),this.subMenu.hide()),this.offcanvas&&(this.plugin.addClass(this.classes.offcanvas),this.setupScroll())},mobileDestroy:function(){this.mobileToggle.off("click").removeClass(this.classes.toggleActive),this.openSubMenu.off("click"),this.plugin.removeClass(this.classes.navActive+" "+this.classes.accordion+" "+this.classes.offcanvas+" "+this.classes.scroll).css(this.css.scrollReset),this.navMenu.removeClass(this.classes.subMenuInactive),this.subMenu.removeClass(this.classes.subMenuActive+" "+this.classes.subMenuInactive+" "+this.classes.scroll).css(this.css.scrollReset),this.subLink.removeClass(this.classes.subLinkActive),s("."+this.classes.pageBlock).remove(),this.body.removeClass("navatron__blocker")},setupScroll:function(){s("."+this.classes.nav+", ."+this.classes.subMenu).addClass(this.classes.scroll)},mobileListen:function(){var i=this;this.mobileToggle.on("click",function(){i.toggleNav()}),this.options.offCanvas&&this.options.accordion?console.error("You can't have both types of menu! -> It won't bloody work!"):(this.offcanvas&&(this.openSubMenu.on("click",function(e){i.openCanvasMenu(s(this)),e.preventDefault()}),this.closeSubMenu.on("click",function(e){i.closeCanvasMenu(s(this))})),this.accordion&&this.openSubMenu.on("click",function(e){i.toggleAccordionMenu(s(this)),e.preventDefault()}))},toggleNav:function(){this.plugin.hasClass(this.classes.navActive)?this.closeNav():this.openNav()},openNav:function(){this.plugin.addClass(this.classes.navActive),this.mobileToggle.addClass(this.classes.toggleActive),this.body.addClass("navatron__blocker")},closeNav:function(){this.plugin.removeClass(this.classes.navActive+" "+this.classes.subMenuInactive),this.mobileToggle.removeClass(this.classes.toggleActive),this.hasSub.removeClass(this.classes.subLinkActive),this.subMenu.removeClass(this.classes.subMenuActive+" "+this.classes.subMenuInactive),this.navMenu.removeClass(this.classes.subMenuInactive),this.body.removeClass("navatron__blocker"),this.options.accordion&&this.subMenu.hide()},openCanvasMenu:function(s){var i=s.next();i.hasClass(this.classes.subMenuActive)?(i.removeClass(this.classes.subMenuActive),s.closest("ul").removeClass(this.classes.subMenuInactive)):(i.addClass(this.classes.subMenuActive).css(this.css.scroll),s.parent().addClass(this.classes.subLinkActive).closest("."+this.classes.scroll).css(this.css.noscroll),s.closest("ul").addClass(this.classes.subMenuInactive),this.plugin.scrollTop(0),this.subMenu.scrollTop(0))},closeCanvasMenu:function(s){var i=s.parent().parent();i.removeClass(this.classes.subLinkActive),i.closest("."+this.classes.scroll).css(this.css.scroll),i.closest("ul").removeClass(this.classes.subMenuInactive),s.parent(this.subMenu).removeClass(this.classes.subMenuActive).css(this.css.noscroll)},parentLinks:function(){var i=this,e=this.parentLink;e.each(function(){var e=s(this),t=e.closest("."+i.classes.hasSub).find("> a").text(),n=e.parent().parent().prev().attr("href");s(this).text(i.options.linkPrefix+" "+t).attr("href",n)})},appendMobileEl:function(){this.parentLink=s('<a class="'+this.classes.parentLink+'">Back</a>').prependTo(this.subMenu),this.parentLink.wrap("<li class="+this.classes.subLink+"></li>"),this.parentLinks(),this.offcanvas&&(this.closeSubMenu=s('<span class="'+this.classes.closeSubMenu+'">Back</a>').prependTo(this.subMenu))},removeMobileEl:function(){this.options.offCanvas&&this.closeSubMenu.remove(),this.parentLink.unwrap("<li></li>"),this.parentLink.remove()},toggleAccordionMenu:function(s){var i=s.next();i.hasClass(this.classes.subMenuActive)?(this.closeParentAccordions(s),this.closeAccordionMenu(s,i)):this.openAccordionMenu(s,i)},openAccordionMenu:function(s,i){var e=this;this.options.accordionSingle===!0&&this.singleAccordion(s,i),s.parent().addClass(this.classes.subLinkActive),i.addClass(this.classes.subMenuActive),this.vel?i.velocity("slideDown",{duration:this.options.duration,easing:this.options.easing,complete:function(){e.scrollAccordion(s)}}):i.slideDown({duration:this.options.duration,complete:function(){e.scrollAccordion(s)}})},closeAccordionMenu:function(s,i){s.parent().removeClass(this.classes.subLinkActive),i.removeClass(this.classes.subMenuActive),this.vel?i.velocity("slideUp",{duration:this.options.duration,easing:this.options.easing}):i.slideUp({duration:this.options.duration})},closeParentAccordions:function(s){var i=s.parent();i.hasClass(this.classes.subLink+"--parent")&&s.next().hasClass(this.classes.subMenuActive)&&(i.find(this.subLink).removeClass(this.classes.subLinkActive),i.find(this.subMenu).slideUp().removeClass(this.classes.subMenuActive))},singleAccordion:function(s,i){var e=s.parent();e.siblings().find("> ."+this.classes.subMenu).is(":visible")&&(this.subMenu.removeClass(this.classes.subMenuActive),this.hasSub.removeClass(this.classes.subLinkActive),this.vel?e.siblings().find("> ."+this.classes.subMenu).velocity("slideUp",{duration:this.options.duration,easing:this.options.easing}):e.siblings().find("> ."+this.classes.subMenu).slideUp({duration:this.options.duration}))},scrollAccordion:function(s){if(this.options.accordionScroll){var i=this.plugin,e=s.position().top+this.plugin.scrollTop(),t=this.options.accordionScrollOffset;this.vel?s.velocity("scroll",{container:this.plugin,duration:this.options.accordionDuration,easing:this.options.accordionEasing,offset:-t}):i.animate({scrollTop:e-t},this.options.accordionDuration)}},desktopSetup:function(){this.desktopAppendEl(),this.mobileDestroy(),this.subMenu.show(),this.desktopListen(),this.horizontalMenu(this.hzt)},desktopDestroy:function(){this.hasSub.off("mouseenter mouseleave"),this.plugin.css(this.css.scroll)},desktopAppendEl:function(){var i=this;this.firstSub.children(this.classes.col)&&this.firstSub.each(function(){s(this).children(i.classes.col).not(i.classes.colReset).wrapAll('<li class="'+o+'__cols"/>')}),this.firstLink.each(function(){var e=s(this);s(this).find(i.classes.col).each(function(s){s+=1,e.find("[data-"+o+'-col="'+s+'"]').wrapAll('<ul class="'+o+"__col "+o+"__col--"+s+'"/>')})})},desktopRemoveEl:function(){this.cols.not(this.classes.colReset).unwrap("ul").unwrap("li"),this.hzt.find(this.classes.colReset).unwrap('<div class="'+o+'-horizontal"/>')},desktopListen:function(){var i=this;this.firstLink.hoverIntent({over:function(){var e=s(this);e.addClass(i.classes.subLinkActive),e.find("> ."+o+"__sub").addClass(i.classes.subMenuActive)},out:function(){var e=s(this);e.removeClass(i.classes.subLinkActive),e.find("> ."+o+"__sub").removeClass(i.classes.subMenuActive)},timeout:200})},horizontalMenu:function(i){if(this.firstLink.is(i)){var e=this,t=i.find("."+e.classes.horizontalColMenu+" ."+e.classes.subLink+":first-child"),n=i.find("."+e.classes.horizontalColMenu+" + ."+e.classes.horizontalColPanel),a=i.find("."+e.classes.horizontalColMenu),l=i.find("."+e.classes.horizontalColPanel),c=e.classes.horizontalColPanel,u=o+"-horizontal";i.hoverIntent({over:function(){var i=n.outerHeight();t.addClass(e.classes.subLink+"--active"),n.addClass(c+"--active"),s(this).find("."+u).css({"min-height":i}).removeClass(u+"--notransition")},out:function(){i.find("."+u).addClass(u+"--notransition"),a.find("."+e.classes.subLink).removeClass(e.classes.subLinkActive),l.removeClass(c+"--active")},timeout:0}),i.find(this.classes.colReset).wrapAll('<div class="'+u+'"/>'),a.find("."+this.classes.subLink).hoverIntent({over:function(){var i=s(this),t=i.index(),n=l.eq(t).outerHeight();a.find("."+e.classes.subLink).removeClass(e.classes.subLinkActive),l.removeClass(c+"--active"),i.addClass(e.classes.subLinkActive),l.eq(t).addClass(c+"--active"),i.closest("."+u).css({"min-height":n})},timeout:0})}},pageBlocker:function(){var i="<div class="+this.classes.pageBlock+"/>";s(i).insertAfter(this.plugin);var e=this,t=s("."+this.classes.pageBlock);t.on("click",function(){e.plugin.hasClass(e.classes.navActive)&&e.closeNav()}),this.options.pageDim&&this.plugin.addClass(this.classes.pageDim)},mediaListener:function(){function s(s){s.matches?(e.desktopRemoveEl(),e.appendMobileEl(),e.mobileSetup()):(e.removeMobileEl(),e.desktopSetup())}var e=this,t=this.options.navBreakpoint.toString(),n=i.matchMedia("(max-width:"+t+"px)");n.addListener(s),i.innerWidth<=this.options.navBreakpoint?(this.appendMobileEl(),this.mobileSetup()):this.desktopSetup()}}),s.fn[o]=function(i){return this.each(function(){s.data(this,"plugin_"+o)||s.data(this,"plugin_"+o,new n(this,i))})}}(jQuery,window,document),$(document).ready(function(){$("[data-navatron]").navatron()}),!function(s){"use strict";"function"==typeof define&&define.amd?define(["jquery"],s):jQuery&&!jQuery.fn.hoverIntent&&s(jQuery)}(function(s){"use strict";var i,e,t={interval:100,sensitivity:6,timeout:0},n=0,o=function(s){i=s.pageX,e=s.pageY},a=function(s,t,n,l){return Math.sqrt((n.pX-i)*(n.pX-i)+(n.pY-e)*(n.pY-e))<l.sensitivity?(t.off(n.event,o),delete n.timeoutId,n.isActive=!0,s.pageX=i,s.pageY=e,delete n.pX,delete n.pY,l.over.apply(t[0],[s])):(n.pX=i,n.pY=e,n.timeoutId=setTimeout(function(){a(s,t,n,l)},l.interval),void 0)},l=function(s,i,e,t){return delete i.data("hoverIntent")[e.id],t.apply(i[0],[s])};s.fn.hoverIntent=function(i,e,c){var u=n++,h=s.extend({},t);s.isPlainObject(i)?(h=s.extend(h,i),s.isFunction(h.out)||(h.out=h.over)):h=s.isFunction(e)?s.extend(h,{over:i,out:e,selector:c}):s.extend(h,{over:i,out:i,selector:e});var r=function(i){var e=s.extend({},i),t=s(this),n=t.data("hoverIntent");n||t.data("hoverIntent",n={});var c=n[u];c||(n[u]=c={id:u}),c.timeoutId&&(c.timeoutId=clearTimeout(c.timeoutId));var r=c.event="mousemove.hoverIntent.hoverIntent"+u;if("mouseenter"===i.type){if(c.isActive)return;c.pX=e.pageX,c.pY=e.pageY,t.off(r,o).on(r,o),c.timeoutId=setTimeout(function(){a(e,t,c,h)},h.interval)}else{if(!c.isActive)return;t.off(r,o),c.timeoutId=setTimeout(function(){l(e,t,c,h.out)},h.timeout)}};return this.on({"mouseenter.hoverIntent":r,"mouseleave.hoverIntent":r},h.selector)}});