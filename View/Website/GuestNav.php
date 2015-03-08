<header>
    <nav>
        <div class="nav-left-container">
            <div class="nav-button-container nav-button-container--notification">
                <a href="<?php echo $_SITE_INDEX_; ?>">
                    <img src="<?php echo $_SITE_INDEX_; ?>assets/img/logo.png" />
                </a>
            </div>
            <div class="nav-button-container <?php isSelected("accueil"); ?>">
                <a class="nav-button" href="<?php echo $_LINK_CHALLENGE_; ?>">Challenges</a>
            </div>
            <?php /*
            <div class="nav-button-container <?php isSelected("forum"); ?>">
                <a class="nav-button" href="trades">Forum</a>
            </div>
            <div class="nav-button-container <?php isSelected("support"); ?>">
                <a class="nav-button" href="support">Support</a>
            </div>
            */ ?>
            <div class="nav-button-container <?php isSelected("faq"); ?>">
                <a class="nav-button" href="<?php echo $_LINK_ABOUT_; ?>">FAQ</a>
            </div>
        </div>
        <div class="nav-right-container">
            <div class="nav-button-container">
                <a href="<?php echo $_LINK_LOGIN_; ?>" class="nav-sits"><i class="fa fa-arrow-circle-right"></i> Join Challenge Wars</a>
            </div>
        </div>
    </nav>
</header>