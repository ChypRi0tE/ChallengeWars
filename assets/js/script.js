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