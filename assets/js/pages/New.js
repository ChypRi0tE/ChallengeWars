/**
 * Created by ChypRiotE on 04/03/2015.
 */

$(".form-row--new-challenge-type .form-checkbox").click(function() {
    $(".form-row--new-challenge-type .form-checkbox").addClass("is-disabled").removeClass("is-selected");
    $(this).addClass("is-selected");
    $("#inputType").val($(this).attr("data-checkbox-value"));
    $(".form-type").addClass("is-hidden");
    $(this).children(".form-input-description").removeClass("is-hidden");
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
    $("#inputLevel").val($(this).attr("data-checkbox-value"));
});