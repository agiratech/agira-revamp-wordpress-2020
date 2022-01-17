function ctshowcaseIpAdjustHeights() {
    jQuery('.ctshowcase-inline-preview-layout .ctshowcase-all-team-members-details-col').each(function () {

        jQuery(this).css('height', 0);
        var teamListColHeight = jQuery(this).closest('.ctshowcase-inline-preview-layout').find('.ctshowcase-team-members-list-col')[0].getBoundingClientRect().height;
        jQuery(this).css('height', teamListColHeight + 'px');
    });
}
jQuery(document).ready(function ($) {
    setTimeout(function(){
        ctshowcaseIpAdjustHeights();
    },100)
    var adjustHeights;
    $(window).on('resize', function () {
        clearTimeout(adjustHeights);

        adjustHeights = setTimeout(ctshowcaseIpAdjustHeights, 0);
    })
    function renderCustomScrollbarForInlinePreview() {
        $('.ctshowcase-member-details-wrapper .ctshowcase-member-details').each(function () {
            var bgColor = $(this).closest('.ctshowcase-all-team-members-details-col').css('background-color');
            var bgColorTinyObj = tinycolor(bgColor);
            var scrollTheme = 'dark';
            if(bgColorTinyObj.isDark()) {
                scrollTheme = 'light'
            };
            $(this).mCustomScrollbar({
                theme: scrollTheme,
                mouseWheelPixels: 200,
                mouseWheel: {
                    enable: true
                },
                axis: 'y',
            });
        });
    }
    if($(window).width() >= 768 ) {
        renderCustomScrollbarForInlinePreview();
    }
    $(window).resize(function(){
        if($(this).width()>=768){
            renderCustomScrollbarForInlinePreview(); //apply scrollbar with your options 
        }else{
             $('.ctshowcase-member-details-wrapper .ctshowcase-member-details').mCustomScrollbar("destroy"); //destroy scrollbar 
        }
    }).trigger("resize");


    $('.ctshowcase-inline-preview-layout').each(function(){
        $(this).find('.ctshowcase-team-member-skills:first').addClass('active');
    })
    $(" .ctshowcase-team-member-skills .ctshowcase-skill .ctshowcase-skill-bar span").each(function () {
        $(this).animate({
            "width": $(this).parent().attr("data-bar") + "%"
        }, 200);
    });


    $(document).on('click', '.ctshowcase-inline-preview-layout .ctshowcase-team-member-profile-pic', function (e) {
        e.preventDefault();
        $(this).closest('.ctshowcase-inline-preview-layout').find('.ctshowcase-team-member-skills').removeClass('active');
        var thisTeamLayout = $(this).closest('.ctshowcase-inline-preview-layout');
        var allTeamMembers = thisTeamLayout.find('.ctshowcase-team-member-col');
        var thisTeamMember = $(this).closest('.ctshowcase-team-member-col');
        var allTeamMemberDetails = thisTeamLayout.find('.ctshowcase-all-team-members-details-col .ctshowcase-member-details')
        var memberIndex = allTeamMembers.index(thisTeamMember)
        allTeamMembers.removeClass('active');
        thisTeamMember.addClass('active');
        allTeamMemberDetails.removeClass('active');
        $(allTeamMemberDetails[memberIndex]).addClass('active');
        $(allTeamMemberDetails[memberIndex]).find('.ctshowcase-team-member-skills').addClass('active');
        if (window.matchMedia('(max-width: 767px)').matches) {
            var scrollTo = $(this).closest('.ctshowcase-inline-preview-layout').find('.ctshowcase-all-team-members-details-col').offset().top;
            if (parseInt(scrollTo) != $(document).scrollTop()) {
                $('body, html').stop().animate({scrollTop: scrollTo}, 200);
            }
        }
    })

    $(document).on('click', '.ctshowcase-inline-preview-layout .ctshowcase-inlinePreview-nav-up ', function (e) {
        e.preventDefault();
        var scrollTo = $(this).closest('.ctshowcase-inline-preview-layout').find('.ctshowcase-team-member-col.active').offset().top;
        $('body, html').stop().animate({scrollTop: scrollTo}, 200 );

    })
    $(document).on('click', '.ctshowcase-inline-preview-layout .ctshowcase-nav-left', function (e) {
        e.preventDefault();
        var activeTeamMember = $(this).closest('.ctshowcase-inline-preview-layout').find('.ctshowcase-team-member-col.active');
        var prevTeamMember = !activeTeamMember.prev().length ? activeTeamMember.closest('.ctshowcase-row').find('.ctshowcase-team-member-col:last-child') : activeTeamMember.prev();
        prevTeamMember.find('.ctshowcase-team-member-profile-pic').trigger('click');
    })
    $(document).on('click', '.ctshowcase-inline-preview-layout .ctshowcase-nav-right', function (e) {
        e.preventDefault();
        var activeTeamMember = $(this).closest('.ctshowcase-inline-preview-layout').find('.ctshowcase-team-member-col.active');
        var nextTeamMember = !activeTeamMember.next().length ? activeTeamMember.closest('.ctshowcase-row').find('.ctshowcase-team-member-col:first-child') : activeTeamMember.next();
        nextTeamMember.find('.ctshowcase-team-member-profile-pic').trigger('click');

    })

})

