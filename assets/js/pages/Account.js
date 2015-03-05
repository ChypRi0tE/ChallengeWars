/**
 * Created by ChypRiotE on 03/03/2015.
 */
$("#submit-form-verify").click(function(e){
    $("#formVerify").submit();
    e.preventDefault();
});
$("#submit-form-sync").click(function(e){
    $(this).removeClass("form-sync-default").addClass("sidebar-entry-delete").css("margin-left", "5px");
    $(this).html('<i class="fa fa-fw fa-refresh fa-spin"></i> Synchronizing...');
    $("#formSync").submit();
    e.preventDefault();
});