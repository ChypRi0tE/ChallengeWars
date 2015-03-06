<footer>
    <div class="footer-outer-wrap">
        <div class="footer-inner-wrap">
            <div>
                <div>Powered by <a target="_blank" rel="nofollow" href="https://developer.riotgames.com/">League of Legends API</a>.</div>
            </div>
            <div>
                <div><i class="fa fa-gavel"></i> <a href="<?php echo $_LINK_ABOUT_."/".$_LINK_TERMS_; ?>">Terms of Service</a></div>
                <div><i class="fa fa-user"></i> <a href="<?php echo $_LINK_ABOUT_."/".$_LINK_USERS_ ?>">Users</a></div>
            </div>
        </div>
    </div>
    <script src="<?php echo $_SITE_INDEX_; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo $_SITE_INDEX_; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $_SITE_INDEX_; ?>assets/js/script.js"></script>
    <?php if (file_exists("assets/js/pages/".$_PAGENAME_.".js")){echo "<script src=\"".$_SITE_INDEX_."assets/js/pages/".$_PAGENAME_.".js\"></script>";} ?>
</footer>