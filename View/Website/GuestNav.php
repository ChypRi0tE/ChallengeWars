<header>
    <nav>
        <div class="nav-left-container">
            <div class="nav-button-container nav-button-container--notification">
                <a class="nav-logo-outer-wrap" href="<?php echo $_SITE_INDEX_; ?>">
                    <div class="nav-logo-inner-wrap"></div>
                </a>
            </div>
            <div class="nav-button-container <?php isSelected("accueil"); ?>">
                <a class="nav-button" href="">Challenges</a>
            </div>
            <?php /*
            <div class="nav-button-container <?php isSelected("forum"); ?>">
                <a class="nav-button" href="trades">Forum</a>
            </div>
            */ ?>
            <div class="nav-button-container <?php isSelected("support"); ?>">
                <a class="nav-button" href="support">Support</a>
            </div>
            <div class="nav-button-container <?php isSelected("faq"); ?>">
                <a class="nav-button" href="about/faq">FAQ</a>
            </div>
        </div>
        <div class="nav-right-container">
            <div class="nav-button-container">
                <a href="login.php" class="nav-sits"><i class="fa fa-arrow-circle-right"></i> Join Challenge Wars</a>
            </div>
        </div>
    </nav>
</header>