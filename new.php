<!DOCTYPE html>
<html>
<?php
    include("Controller/Website/Utils.php");
    include("Controller/New/Utils.php");
    include "Controller/Website/Display.php";
    include("Controller/".$_PAGENAME_."/Datas.php");
    include("View/Website/Header.php");
?>
<body>
<?php if (isLogged()) {
    include('View/Website/LoggedNav.php');} else {
    include('View/Website/GuestNav.php');} ?>
<?php include("View/".$_PAGENAME_."/Featured.php"); ?>
<div class="page-outer-wrap">
    <div class="page-inner-wrap page-inner-wrap--narrow">
        <?php include("View/".$_PAGENAME_."/Sidebar.php"); ?>
        <div>
            <?php if (file_exists("View/".$_PAGENAME_."/Pinned.php")){include("View/".$_PAGENAME_."/Pinned.php");} ?>
            <?php if(true){ ?>
            <?php include("View/".$_PAGENAME_."/Content.php"); ?>
            <?php } else {
                include("View/".$_PAGENAME_."/Review.php");
            } ?>
        </div>
    </div>
</div>
<?php include('View/Website/Footer.php'); ?>
</body>
</html>