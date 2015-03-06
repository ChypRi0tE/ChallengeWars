<!DOCTYPE html>
<html>
<?php
    include("Controller/Website/Utils.php");
    include("Controller/Login.php");
    include('View/Website/Header.php');
?>
<body>
<?php include('View/Website/GuestNav.php'); ?>
<?php include("View/".$_PAGENAME_."/Featured.php"); ?>
<div class="page-outer-wrap">
    <div class="page-inner-wrap page-inner-wrap--narrow">
            <?php include("View/".$_PAGENAME_."/Sidebar.php"); ?>
            <div>
                <?php if (file_exists("View/".$_PAGENAME_."/Pinned.php")){include("View/".$_PAGENAME_."/Pinned.php");} ?>
                <?php include("View/".$_PAGENAME_."/Content.php"); ?>
            </div>
    </div>
</div>
<?php include('View/Website/Footer.php'); ?>
</body>
</html>