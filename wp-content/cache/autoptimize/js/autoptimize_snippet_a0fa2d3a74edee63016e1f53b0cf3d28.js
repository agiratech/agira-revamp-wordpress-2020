(function($){"use strict";$(window).load(function(){$('.loading, .loading-wrap').delay(100).fadeOut('slow');});jQuery('.mouse-cursor.style1, .mouse-cursor.style2, .mouse-cursor.style3').each(function(){var $this=jQuery(this);jQuery('body').addClass('cursor-disabled');jQuery(window).on('mousemove',function(event){$this.css({'top':event.pageY+'px','left':event.pageX+'px'});});});$("a, .button, .owl-prev, .owl-next").hover(function(){$(".mouse-cursor").toggleClass("bigCursor");});$(".footer_v1, .footer_v2, .footer_v3, .bg-dark, .mo-menu-list > ul > li > ul, .page-404").hover(function(){$(".mouse-cursor").toggleClass("whiteCursor");});VanillaTilt.init(document.querySelectorAll(".img-perspective"),{max:15,speed:400,perspective:600,scale:1.08,});VanillaTilt.init(document.querySelectorAll(".image-box-style5"),{max:10,speed:300,perspective:1000,scale:1,});$('#navigation li a').on('click',function(){if($(window).width()<768){$('.navbar-toggle').on();}});$('.menu-toggle , #menu-close, .sidepanel-left .menu-item a').on('click',function(event){$('.sidepanel').toggleClass('open');$('body').toggleClass('sidepanel-open');});$('.onepage-nav a').on(function(event){if(location.pathname.replace(/^\//,'')==this.pathname.replace(/^\//,'')&&location.hostname==this.hostname){var target=$(this.hash);target=target.length?target:$('[name='+this.hash.slice(1)+']');if(target.length){$('html,body').animate({scrollTop:target.offset().top},700);}}
setTimeout(function(e){$('.menu-toggle').trigger('click');},700)
return false;});$('.sidepanel-overlay').on('click',function(){$('.sidepanel').removeClass('open');$('body').removeClass('sidepanel-open');});$('.nav-menu-icon a').on('click',function(){var $nav=$('nav');if($nav.hasClass('slide-menu')){$nav.removeClass('slide-menu');$(this).removeClass('active');$('.navigation').css({'overflow':'hidden'});}else{$nav.addClass('slide-menu');$(this).addClass('active');setTimeout(function(){$('.navigation').css({'overflow':'initial'});},500);}
return false;});$(document).on('click','.menu-item a , .smooth-scroll a, .one-page-scroll ',function(e){if($(e.target).is('a[href*="#"]:not([href="#"]')){if(location.pathname.replace(/^\//,'')==this.pathname.replace(/^\//,'')||location.hostname==this.hostname){var target=$(this.hash);target=target.length?target:$('[name='+this.hash.slice(1)+']');if(target.length){$('html,body').animate({scrollTop:target.offset().top},1000);return false;}}}});CSSPlugin.defaultTransformPerspective=600;var toggleMenu=$('.menu-toggle');var toggwrapper=$('.menu-sidepanel');var listItems=$('.menu-sidepanel nav ul > li');var timeline=new TimelineMax({paused:true,reversed:true});timeline.staggerFromTo(toggwrapper,0.5,{y:"-100%"},{y:"0%"},0.5);timeline.staggerFromTo(listItems,0.3,{autoAlpha:0,Y:20,transformOrigin:'50% 0%'},{autoAlpha:1,Y:0},0.1);toggleMenu.on('click',function(e){e.preventDefault();$(this).toggleClass('open');$('.menu-sidepanel').toggleClass('menu-open');timeline.reversed()?timeline.play():timeline.reverse()});function RuyaOpenTheHideMenu(){if($('.mo-header-v3 .mo-toggle-menu').length){$('.mo-header-v3 .mo-toggle-menu').on('click',function(){var $menu=$('#mo_header .mo-menu-list');$(this).toggleClass('active');$menu.toggleClass('active');$menu.on({'menu.open':function(e){var $li_items=$(this).find('> ul > li');$li_items.each(function(){var index=$(this).index();btAnimation.slideUp(this,index*80);})},'menu.hidden':function(e){var $li_items=$(this).find('> ul > li');$li_items.each(function(){var index=$(this).index();btAnimation.slideDown(this,index*80);})}})
if($menu.hasClass('active'))
$menu.trigger('menu.open')
else
$menu.trigger('menu.hidden')});}}
RuyaOpenTheHideMenu();if(jQuery('.search-trigger').length){jQuery('.search-trigger').on('click',function(){jQuery('body').toggleClass('search-is-opened');});jQuery('.main-search-overlay , .main-search-close').on('click',function(){jQuery('body').removeClass('search-is-opened');});}
function RuyaOpenMiniSearchSidebar(){$('.box-search > a').on('click',function(){$(this).toggleClass('active');$('.mo-cart-header > a.mo-icon').removeClass('active');$('.mo-header-menu .header_search').toggle();$('.mo-cart-content').hide();});}
RuyaOpenMiniSearchSidebar();function RuyaOpenMiniCartSidebar(){$('.mo-cart-header > a.mo-icon').on('click',function(){$(this).toggleClass('active');$('.mo-search-sidebar > a').removeClass('active');$('.mo-cart-content').toggleClass('active');$('.header_search').hide();});}
RuyaOpenMiniCartSidebar();function RuyaOpenMenu(){$('#mo-header-icon').on('click',function(){$(this).toggleClass('active');$('.mo-menu-list').toggleClass('hidden-xs');$('.mo-menu-list').toggleClass('hidden-sm');});}
RuyaOpenMenu();function RuyaMobileMenuDropdown(){var hasChildren=$('.mo-sidepanel .mo-menu-list ul li.menu-item-has-children, .mo-header-v2 .mo-menu-list ul li.menu-item-has-children, .mo-header-v3 .mo-menu-list ul li.menu-item-has-children , .mo-header-v5 .mo-menu-list ul li.menu-item-has-children , .mo-header-v6 .mo-menu-list ul li.menu-item-has-children, .mo-header-v7 .mo-menu-list ul li.menu-item-has-children');hasChildren.each(function(){var $btnToggle=$('<a class="mb-dropdown-icon hidden-lg hidden-md" href="#"></a>');$(this).append($btnToggle);$btnToggle.on('click',function(e){e.preventDefault();$(this).toggleClass('open');$(this).parent().children('ul').toggle('slow');});});}
RuyaMobileMenuDropdown();function RuyaMenuDropdown(){var hasChildren=$('.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children, .mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children, .mo-header-v7 .mo-menu-list > ul > li.menu-item-has-children');hasChildren.each(function(){var $btnToggle=$('<span class="l-dropdown-icon"></span>');$(this).append($btnToggle);});}
RuyaMenuDropdown();function RuyaLeftNavigationDropdown(){var hasChildren=$('.mo-left-navigation .mo-menu-list ul li.menu-item-has-children, .menu-sidepanel ul li.menu-item-has-children');hasChildren.each(function(){var $btnToggle=$('<a class="mb-dropdown-icon" href="#"></a>');$(this).append($btnToggle);$btnToggle.on('click',function(e){e.preventDefault();$(this).toggleClass('open');$(this).parent().children('ul').toggle('slow');});});}
RuyaLeftNavigationDropdown();function RuyaHeaderStick(){if($('.mo-sidepanel, .mo-header-v2, .mo-header-v3, .mo-header-v4, .mo-header-v5, .mo-header-v6, .mo-header-v7 ').hasClass('mo-header-stick')){var header_offset=$('#mo_header .mo-header-menu').offset();if($(window).scrollTop()>header_offset.top){$('body').addClass('mo-stick-active');}else{$('body').removeClass('mo-stick-active');}
$(window).on('scroll',function(){if($(window).scrollTop()>header_offset.top){$('body').addClass('mo-stick-active');}else{$('body').removeClass('mo-stick-active');}});$(window).on('load',function(){if($(window).scrollTop()>header_offset.top){$('body').addClass('mo-stick-active');}else{$('body').removeClass('mo-stick-active');}});$(window).on('resize',function(){if($(window).scrollTop()>header_offset.top){$('body').addClass('mo-stick-active');}else{$('body').removeClass('mo-stick-active');}});}}
RuyaHeaderStick();$(document).ready(function(){$(function(){$('.scroll-pane').jScrollPane();});$('.counter').counterUp({delay:10,time:2000});function RuyathemesOwlCaousel($elem){$elem.owlCarousel({items:$elem.data("col_lg"),margin:$elem.data("item_space"),loop:$elem.data("loop"),autoplay:$elem.data("autoplay"),smartSpeed:$elem.data("smartspeed"),dots:$elem.data("dots"),nav:$elem.data("nav"),navText:["<span class='prev'><i class='fa fa-long-arrow-left'></i></span>","<span class='next'><i class='fa fa-long-arrow-right'></i></span>"],responsive:{0:{items:$elem.data("col_xs"),nav:false,dots:false,},768:{items:$elem.data("col_sm"),nav:false,dots:false,},992:{items:$elem.data("col_md"),},1200:{items:$elem.data("col_lg"),}}});}
if($('.owl-carousel').length){$('.owl-carousel').each(function(){new RuyathemesOwlCaousel($(this));});}
if($('.testimonial-carousel').length){$('.testimonial-carousel').each(function(){new RuyathemesOwlCaousel($(this));});}
if($('.image-carousel').length){$('.image-carousel').each(function(){new RuyathemesOwlCaousel($(this));});}
$(".carousel-post").owlCarousel({dots:true,items:1,autoplay:false,});$(".search-submit").after('<i class="fa fa-search"></i>');$('.portfolio-filter').on('click','a',function(e){e.preventDefault();var filterValue=$(this).attr('data-filter');$container.isotope({filter:filterValue});$('.portfolio-filter a').removeClass('active');$(this).closest('a').addClass('active');});var $container=$('.masonry');$container.imagesLoaded(function(){$container.isotope({itemSelector:'.masonry-item',layoutMode:'masonry',percentPosition:true,masonry:{columnWidth:'.masonry-img',horizontalOrder:false}});});$('.masonry-posts').isotope({itemSelector:'.masonry-post',masonry:{horizontalOrder:false}});$('.lazy-img').Lazy({effect:'fadeIn'});$container.find('.lazy-img').each(function(){jQuery(this).attr('src',jQuery(this).attr('data-src')).removeAttr('data-src');});$('.pricing').waypoint(function(){$('.pricing-best').addClass('depth');});$(".pricing-item").on("mouseenter",function(){$(this).closest(".vc_row .vc_inner").find(".pricing-item").removeClass("active"),$(this).addClass("active");});jQuery('.lightbox-gallery').each(function(){jQuery(this).magnificPopup({type:'image',image:{titleSrc:'title',verticalFit:true},gallery:{enabled:true,navigateByImgClick:true,preload:[0,1]},});});jQuery('.lightbox-video').each(function(){jQuery(this).magnificPopup({type:'iframe',mainClass:'mfp-fade',removalDelay:160,preloader:false,fixedContentPos:false,iframe:{patterns:{youtube:{index:'youtube.com/',id:'v=',src:'https://www.youtube.com/embed/%id%?autoplay=1'},youtube_short:{index:'youtu.be/',id:'youtu.be/',src:'//www.youtube.com/embed/%id%?autoplay=1'},vimeo:{index:'vimeo.com/',id:'/',src:'//player.vimeo.com/video/%id%?autoplay=1'}}}});});$('body').stickem({item:'.sticky-buttons',container:'.mo-blog',stickClass:'is-sticky',endStickClass:'is-bottom',offset:90,});var footerFixed=$('.footer-fixed').outerHeight();if($(document).width()>991){$('.main-content').css('margin-bottom',footerFixed);}
var offset=300,offset_opacity=1200,scroll_top_duration=700,$back_to_top=$('#back-to-top');$(window).scroll(function(){($(this).scrollTop()>offset)?$back_to_top.addClass('cd-is-visible'):$back_to_top.removeClass('cd-is-visible cd-fade-out');if($(this).scrollTop()>offset_opacity){$back_to_top.addClass('cd-fade-out');}});$back_to_top.on('click',function(event){event.preventDefault();$('body,html').animate({scrollTop:0,},scroll_top_duration);});$('form.cart .quantity, .product-quantity .quantity').each(function(){$(this).prepend('<span class="qty-minus"><i class="fa fa-minus"></i></span>');$(this).append('<span class="qty-plus"><i class="fa fa-plus"></i></span>');});$(document).on('click','.qty-plus',function(){var parent=$(this).parent();$('input.qty',parent).val(parseInt($('input.qty',parent).val())+1);})
$(document).on('click','.qty-minus',function(){var parent=$(this).parent();if(parseInt($('input.qty',parent).val())>1){$('input.qty',parent).val(parseInt($('input.qty',parent).val())-1);}})
if($('.mo-slick-slider').length>0){$('.mo-slick-slider').slick({slidesToShow:1,slidesToScroll:1,arrows:true,prevArrow:'<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',nextArrow:'<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',fade:true,asNavFor:'.mo-slick-slider-nav'});}
if($('.mo-slick-slider-nav').length>0){$('.mo-slick-slider-nav').slick({slidesToShow:3,slidesToScroll:1,arrows:false,asNavFor:'.mo-slick-slider',centerMode:true,focusOnSelect:true});}});})(jQuery);