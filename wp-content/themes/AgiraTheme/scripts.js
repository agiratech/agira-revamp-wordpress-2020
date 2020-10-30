(function($) { // Begin jQuery
    $(function() { // DOM ready
      // If a link has a dropdown, add sub menu toggle.
      $('.mobile-header-nav-list a:not(:only-child)').click(function(e) {
        $(this).siblings('.dropdown-menu-mobile-header').toggle();
        // Close one dropdown when selecting another
        $('.dropdown-menu-mobile-header').not($(this).siblings()).hide();
        e.stopPropagation();
      });
      // Clicking away from dropdown will remove the dropdown class
      $('html').click(function() {
        $('.dropdown-menu-mobile-header').hide();
      });
     
    }); // end DOM ready
  })($); // end jQuery


  $(".li-custom-menu-a").click(function() {
 
    $(".nav-dropdown-item").css("display", "none");
   
    
   });
   $(".li-custom-menu-a").mouseleave(function() {
    
     $(".nav-dropdown-item").css("display", "block");
    
     
    });

      



$("#toggle").click(function() {

  $(this).toggleClass("toggle-active");
  $("#overlay").toggleClass("nav-active");
 
  
 });

 $(".mobile-header-drop").click(function(){
     $(".mobile-header-drop-down").toggleClass("active");
 });

 $(".menu-opener").click(function(){
   $(".menu-opener, .menu-opener-inner, .menu").toggleClass("active");
 });

 
 $(document).ready(function(){
   $("#OpenForm").click(function(){
       $(".feedback_form_area").animate({
           width: "toggle"
       });
   });
});
$(document).ready(function(){
 $(".toggleclose").click(function(){
     $(".feedback_form_area").animate({
         width: "toggle"
     });
 });
});


$(window).scroll(function(){
 if ($(window).scrollTop() >= 300) {
   console.log('1');
     $('.scroll-header').addClass('fixed-header');
     $('.scroll-header').addClass('visible-title');
     $(".header-menu-container").css("background-color", "#fff");
     $(".menu__entries__link").css("color", "#0096d7");
     $(".white-logo").css("display", "none");
     $(".black-logo").css("display", "block");
 }
 else {
   console.log('2');
     $('.scroll-header').removeClass('fixed-header');
     $('.scroll-header').removeClass('visible-title');
     $(".header-menu-container").css("background-color", "transparent");
     $(".menu__entries__link").css("color", "#fff");
     $(".white-logo").css("display", "block");
     $(".black-logo").css("display", "none");
 }
});

$(".dropdown-menu-item-top-header").hover(function(){
$(".header-menu-container").css("background-color", "#fff");
$(".white-logo").css("display", "none");
$(".black-logo").css("display", "block");
$(".menu__entries__link").css("color", "#0096d7");
}, function(){
 $(".header-menu-container").css("background-color", "transparent");
 $(".white-logo").css("display", "block");
 $(".black-logo").css("display", "none");
 $(".menu__entries__link").css("color", "#fff");
}
);
$(".dropdown-menu-item-scroll-header").hover(function(){
$(".header-menu-container").css("background-color", "#fff");
$(".white-logo").css("display", "none");
$(".black-logo").css("display", "block");
$(".menu__entries__link").css("color", "#0096d7");
}/*, function(){
 $(".header-menu-container").css("background-color", "transparent");
 $(".white-logo").css("display", "block");
 $(".black-logo").css("display", "none");
 $(".menu__entries__link").css("color", "#fff");
}*/
);
function myFunction(x) {
if (x.matches) { // If media query matches
 $(".scroll-header").css("display", "none");
} 
}
var x = window.matchMedia("(min-width: 320px) and (max-width: 480px)")
myFunction(x) // Call listener function at run time
x.addListener(myFunction)