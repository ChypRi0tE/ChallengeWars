/**
 * Created by ChypRiotE on 09/02/2015.
 */
$(".nav-button--notification").hover(
    function(){$(this).children().css("text-shadow", "0 0 6px #9ba2b0");},
    function(){$(this).children().css("text-shadow", "0 0 0");}
);
$('body').click(function() {
    $(".nav-relative-dropdown").addClass("is-hidden");
});
$(".nav-button--is-dropdown-arrow").click(function(e){
    var test = $(this).parent().children(".nav-relative-dropdown").toggleClass("is-hidden");
    $(".nav-relative-dropdown").not(test).addClass("is-hidden");
    e.stopPropagation();
});
$(".challenge-hide").click(function(){
    $(this).closest(".challenge-row-outer-wrap").addClass("is-hidden");
});
$(".challenge-show").click(function() {
   $(".challenge-row-outer-wrap").removeClass("is-hidden");
});
$(document).ready(function() {
   if ($('footer').position().top < $(window).height()) {
        $('.page-outer-wrap').css('min-height', ($(window).height() - $('header').height() - $('.featured-container').height() -55) + 'px');
        $('.sidebar').css('min-height', ($(window).height() - $('header').height() - $('.featured-container').height() -105) + 'px');
    }
});
$( window ).resize(function() {
    if ($('footer').position().top < $(window).height()) {
        $('.page-outer-wrap').css('min-height', ($(window).height() - $('header').height() - $('.featured-container').height() -55) + 'px');
        $('.sidebar').css('min-height', ($(window).height() - $('header').height() - $('.featured-container').height() -55-50) + 'px');
    }
});