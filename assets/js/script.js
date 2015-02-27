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
$(".form-row--new-challenge-type .form-checkbox").click(function() {
    $(".form-row--new-challenge-type .form-checkbox").addClass("is-disabled").removeClass("is-selected");
    $(this).addClass("is-selected");
    $("#new-type").val($(this).attr("data-checkbox-value"));
});
$(".form-row--new-challenge-who .form-checkbox").click(function() {
    $(".form-row--new-challenge-who .form-checkbox").addClass("is-disabled").removeClass("is-selected");
    $(this).addClass("is-selected");
    $("#new-who").val($(this).attr("data-checkbox-value"));
    if ($(this).attr("data-checkbox-value") == "custom"){
        $(".form-groups").removeClass("is-hidden");
    } else {$(".form-groups").addClass("is-hidden");}
});
$(".form-group--steam").click(function(){
    $(this).toggleClass("is-selected");
});
$(".form-row--new-challenge-level .form-checkbox").click(function() {
    $(".form-row--new-challenge-level .form-checkbox").addClass("is-disabled").removeClass("is-selected");
    $(this).addClass("is-selected");
    $("#new-level").val($(this).attr("data-checkbox-value"));
});
$(document).ready(function() {
   var docHeight = $(window).height();
   var footerHeight = $('footer').height();
   var footerTop = $('footer').position().top;
   if (footerTop < docHeight) {
    $('.page-outer-wrap').css('min-height', (docHeight - $('header').height() - $('.featured-container').height() -55) + 'px');
   }
});
$(document).ready(function() {
   if ($('footer').position().top < $(window).height()) {
    $('.page-outer-wrap').css('min-height', ($(window).height() - $('header').height() - $('.featured-container').height() -55) + 'px');
   }
});
$( window ).resize(function() {
   if ($('footer').position().top < $(window).height()) {
    $('.page-outer-wrap').css('min-height', ($(window).height() - $('header').height() - $('.featured-container').height() -55) + 'px');
   }
});