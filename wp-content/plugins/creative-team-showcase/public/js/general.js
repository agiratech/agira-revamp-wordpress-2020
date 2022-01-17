//jQuery.fn.ctshowcaseSquareObjectFit = function () {
//    var $ = jQuery;
//    var $this = $(this)
//    setTimeout(function () {
//        var rect = $this[0].getBoundingClientRect();
//        var width;
//        if (rect.width) {
//            width = rect.width;
//        } else {
//            if(rect.right - rect.left){
//            // Calculate width for IE8 and below
//                width = rect.right - rect.left;
//            }
//            else{
//                width = $this.width();
//            }
//        }
//
//        $this.css('height', width);
//    }, 200);
//}
jQuery(document).ready(function ($) {
    var windowWidth = $(window).width();

    setTimeout(function () {

        $('.ctshowcase-layout .ctshowcase-loader-wrapper').hide().fadeOut();
        $('.ctshowcase-layout-main-content').addClass('visible');
    }, 200);

//    if (window.matchMedia('(max-width: 767px)').matches) {
//        $('.ctshowcase-wave-layout .ctshowcase-team-member-profile-image').each(function () {
//            $(this).ctshowcaseSquareObjectFit();
//        })
//    }
//    $('.ctshowcase-team-member-profile-image.square-object-fit').each(function () {
//        $(this).ctshowcaseSquareObjectFit()
//    });
//    $(window).on('resize', function () {
//        if ($(window).width() != windowWidth) {
//
//            windowWidth = $(window).width();
////            $('.ctshowcase-team-member-profile-image.square-object-fit').each(function () {
////                $(this).ctshowcaseSquareObjectFit();
////            })
//            if (window.matchMedia('(max-width: 767px)').matches) {
//                $('.ctshowcase-wave-layout .ctshowcase-team-member-profile-image').each(function () {
//                    $(this).ctshowcaseSquareObjectFit();
//                })
//            } 
//
//        }
//    }).trigger("resize");
    objectFitImages($('.ctshowcase-team-member-profile-image'));
    $.fn.ctshowcaseMediaQueries = function () {
        if (window.matchMedia('(min-width: 1200px)').matches) {
            $(this).css({
                'font-size': $(this).data('xl-font-size') + 'px'
            })
        } else if (window.matchMedia('(min-width: 980px)').matches) {
            $(this).css({
                'font-size': $(this).data('lg-font-size') + 'px'
            })
        } else if (window.matchMedia('(min-width: 768px)').matches) {
            $(this).css({
                'font-size': $(this).data('md-font-size') + 'px'
            })
        } else if (window.matchMedia('(min-width: 481px)').matches) {
            $(this).css({
                'font-size': $(this).data('sm-font-size') + 'px'
            })
        } else {
            $(this).css({
                'font-size': $(this).data('xs-font-size') + 'px'
            })
        }

    }
    $('.ctshowcase-has-media-queries').each(function () {
        $(this).ctshowcaseMediaQueries();
    });
    $(window).on('resize', function () {
        $('.ctshowcase-has-media-queries').each(function () {
            $(this).ctshowcaseMediaQueries();
        });

    })


})
