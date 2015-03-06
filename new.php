<!DOCTYPE html>
<html>
<?php
    include("Controller/Website.php");
    include("Controller/New.php");
    include("View/Website/Header.php");
?>
<body>
<?php
    getNavBar();
    if (file_exists("View/".$_PAGENAME_."/Featured.php")){include("View/".$_PAGENAME_."/Featured.php");}
?>
<div class="page-outer-wrap">
    <div class="page-inner-wrap page-inner-wrap--narrow">
        <?php if (file_exists("View/".$_PAGENAME_."/Sidebar.php")){include("View/".$_PAGENAME_."/Sidebar.php");} ?>
        <div>
            <?php include("View/".$_PAGENAME_."/Content.php"); ?>
        </div>
    </div>
</div>
<?php include('View/Website/Footer.php'); ?>
</body>
</html>