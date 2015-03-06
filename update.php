<!DOCTYPE html>
<html>
<?php
include("Controller/Website/Website.php");
include("Controller/Update.php");
//include("Controller/" . $_PAGENAME_ . "/Datas.php");
include("View/Website/Header.php");
?>
<body>
<?php if (isLogged()) {
    include('View/Website/LoggedNav.php');} else {
    include('View/Website/GuestNav.php');} ?>
<div class="page-outer-wrap">
    <div class="page-inner-wrap"  style="margin-top: 39px">
        <div class="widget-container">
            <div>
            <?php 
                //refreshEntries();echo "<hr />";
                //refreshComments();echo "<hr />";
                refreshUser($UserManager->get(1));
            ?>
            </div>
        </div>
    </div>
</div>
<?php include('View/Website/Footer.php'); ?>
</body>
</html>