<!DOCTYPE html>
<html>
<?php
include("Controller/Website/Utils.php");
include("Controller/About.php");
//include("Controller/".$_PAGENAME_."/Datas.php");
include('View/Website/Header.php');
?>
<body>
<?php if (isLogged()) {
    include('View/Website/LoggedNav.php');} else {
    include('View/Website/GuestNav.php');} ?>
<?php include("View/".$_PAGENAME_."/Featured.php"); ?>
<div class="page-outer-wrap">
    <div class="page-inner-wrap"  style="margin-top: 39px">
        <div class="widget-container">
            <?php include("View/".$_PAGENAME_."/Sidebar.php"); ?>
            <div>
                <?php if (file_exists("View/".$_PAGENAME_."/Pinned.php")){include("View/".$_PAGENAME_."/Pinned.php");} ?>
                <?php include("View/".$_PAGENAME_."/Content/Cont".$tabPanel.".php"); ?>
            </div>
        </div>
    </div>
</div>
<?php include('View/Website/Footer.php'); ?>
</body>
</html>