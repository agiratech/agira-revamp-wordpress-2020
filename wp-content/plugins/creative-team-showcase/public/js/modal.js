jQuery(document).ready(function($) {
    $('.ctshowcase-modal-container').appendTo('body');
    function renderCustomScrollbarForModal() {
        $('.ctshowcase-modal-container .ctshowcase-modal-main .ctshowcase-modal-main-content-wrapper').each(function(){
            var modalBgColor = $(this).closest('.ctshowcase-modal').css('background-color');
            var modalBgColorTinyObj = tinycolor(modalBgColor);
            var scrollTheme = 'dark';
            if(modalBgColorTinyObj.isDark()) {
                scrollTheme = 'light'
            };
            $(this).mCustomScrollbar({
                theme: scrollTheme,
                mouseWheelPixels: 250,
                mouseWheel: {
                    enable: true
                },
                axis: 'y',
            });
        });
    }
    if (window.matchMedia('(min-width: 768px)').matches) {
        renderCustomScrollbarForModal();
    }
    $(window).resize(function(){
        if (window.matchMedia('(min-width: 768px)').matches) {
            renderCustomScrollbarForModal(); //apply scrollbar with your options 
        }else{
             $('.ctshowcase-layout.with-modal .ctshowcase-modal-main .ctshowcase-modal-main-content-wrapper').mCustomScrollbar("destroy"); //destroy scrollbar 
        }
    }).trigger("resize");
    
    var modalPlay = function (direction) { 
        var teamMember =  $('.ctshowcase-modal.open');
        $('.ctshowcase-modal').removeClass('open');
        $(".ctshowcase-team-member-skills").removeClass("active")
        if (direction == 'left') {
            var prevTeamMember  = teamMember.prev().hasClass('ctshowcase-modal-header') || !teamMember.prev().length ?  teamMember.closest('.ctshowcase-modal-main').find('.ctshowcase-modal:last-child') : teamMember.prev();
            prevTeamMember.addClass('open');
            prevTeamMember.find('.ctshowcase-team-member-skills').addClass('active');
        }
        else if (direction == 'right') {
            var nextTeamMember  =teamMember.next().hasClass('ctshowcase-modal-header') || !teamMember.next().length ?  teamMember.closest('.ctshowcase-modal-main').find('.ctshowcase-modal:first') : teamMember.next() ;
            nextTeamMember.addClass('open');
            nextTeamMember.find('.ctshowcase-team-member-skills').addClass('active');
        }
    }
    $('.ctshowcase-layout.with-modal .ctshowcase-team-member-entry-link').on('click', function () {
            $(".ctshowcase-modal-container .ctshowcase-team-member-skills").addClass("active")
            var modalId = $(this).data('modal');
            $('.ctshowcase-layout.with-modal .ctshowcase-modal').removeClass('open');
            var shortcodeId = $(this).closest('.ctshowcase-layout').data('shortcode-id');
            $('#ctshowcase-modal-container-' + shortcodeId).addClass('open');
            $('html').addClass('ctshowcase-modal-on');
            var modalObj = $('#ctshowcase-modal-container-' + shortcodeId).find('.' + modalId);
            modalObj.addClass('open');        
    })
    $(document).on('click'  , '.ctshowcase-modal-close' , function(e) {
        e.preventDefault();
        $('html').removeClass('ctshowcase-modal-on');
        $(this).closest('.ctshowcase-modal-container').find(".ctshowcase-team-member-skills").removeClass("active")
        $('.ctshowcase-modal.open').removeClass('open');
        $(this).closest('.ctshowcase-modal-container').removeClass('open');
    })

    $('body').on('click' , '.ctshowcase-modal-container' , function (e) {
        if (!$(e.target).closest('.ctshowcase-modal-main').length && !$(e.target).is('.ctshowcase-modal-main')) {
            $('html').removeClass('ctshowcase-modal-on');
            $(this).closest('.ctshowcase-modal-container').find(".ctshowcase-team-member-skills").removeClass("active")
            $(this).find('.ctshowcase-modal').removeClass('open');
            $(this).removeClass('open');
    
        }
    })
    $(document).on('click' , '.ctshowcase-nav-left' , function(e){
        e.preventDefault();
        modalPlay('left');
    })
    $(document).on('click' , ' .ctshowcase-nav-right' , function(e){
        e.preventDefault();
        modalPlay(  'right');
    })
    $(".ctshowcase-modal-container .ctshowcase-team-member-skills .ctshowcase-skill .ctshowcase-skill-bar span").each(function () {
        $(this).animate({
            "width": $(this).parent().attr("data-bar") + "%"
        }, 1000);
    });
    setTimeout(function () {
        $(".ctshowcase-modal-container .ctshowcase-team-member-skills .ctshowcase-skill .ctshowcase-skill-bar span b").animate({"opacity": "1"}, 1000);
    }, 500);
})
