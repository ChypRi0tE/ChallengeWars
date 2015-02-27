// JavaScript Document
$('#sidebar-advanced').popover({
    container: 'body',
    html: true,
    content: function () {
        return $(this).next('.popper-content').html();
    }
});
$("#sidebar-join").click(function(){
  $("#formJoin" ).submit();
});
$("#sidebar-leave").click(function(){
  $("#formLeave" ).submit();
});
$(".comment-collapse-button").click(function(){
  var prt = $(this).closest(".comment-parent");
  prt.find(".comment-summary").addClass("is-hidden");
  prt.find(".comment-summed").removeClass("is-hidden");
  prt.find(".comment-expand-button").show();
  $(this).hide();
});
$(".comment-expand-button").click(function(){
  var prt = $(this).closest(".comment-parent");
  prt.closest(".comment-parent").find(".comment-summary").removeClass("is-hidden");
  prt.closest(".comment-parent").find(".comment-summed").addClass("is-hidden");
  prt.find(".comment-collapse-button").show();
  $(this).hide();
});
$(".js-submit-form").click(function(e){
  $("#formComment").submit();
  e.preventDefault();
})