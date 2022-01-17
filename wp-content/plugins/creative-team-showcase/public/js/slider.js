jQuery(document).ready(function ($) {
   $('.ctshowcase-owl-carousel').each(function(){
       var items = $(this).data('no-of-slides');
       var arrowsColor = $(this).data('arrows-color');
       var arrowsBg  = $(this).data('arrows-bg');
       if ($(this).data('offset-enabled') == 'yes') {
          var margin = 20;
       }
       else {
          var margin =0;
       }
       var rtl= $(this).data('is-rtl');
       $(this).owlCarousel({
            'items' : items,
            'dots'  : false,
            'nav': true,
            'rtl' : rtl ? true : false,
            margin: margin,
            navText: ['<i style="color:' + arrowsColor + ';background:transparent;font-size: 22px;"class="fa fa-angle-left"></i>', '<i style="color:' + arrowsColor + ';background:transparent;font-size: 22px;" class="fa fa-angle-right"></i>'],
            responsive: {
                0:{
                    'items' : 1
                },
                480: {
                    'items' : items > 1 ? 2  : 1
                },
                767: {
                    items : items > 3  ? 3 : items
                },
                980: {
                    items: items
                }
            } 
       });
        $(this).find('.owl-nav').css({
                'background': arrowsBg
        })
        
   }); 
});