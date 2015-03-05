/**
 * Created by ChypRiotE on 04/03/2015.
 */
$("#submit-form-sync").click(function(e){
    $(this).addClass("sidebar-entry-delete").removeClass("sidebar-entry-insert");
    $(this).html('<i class="fa fa-fw fa-refresh fa-spin"></i> Synchronizing...');
    $("#formSync").submit();
    e.preventDefault();
});