<header>
    <nav>
        <div class="nav-left-container">
            <div class="nav-button-container nav-button-container--notification">
                <a class="nav-logo-outer-wrap" href="<?php echo $_SITE_INDEX_; ?>">
                    <div class="nav-logo-inner-wrap"></div>
                </a>
            </div>
            <div class="nav-button-container <?php isSelected("accueil"); ?>">
                <div class="nav-relative-dropdown is-hidden">
                    <div class="nav-absolute-dropdown">
                        <a class="nav-row" href="<?php echo $_LINK_NEW_; ?>">
                            <i class="icon-green fa fa-fw fa-plus-circle"></i>
                            <div class="nav-row-summary">
                                <p class="nav-row-summary-name">Create a New Challenge</p>
                                <p class="nav-row-summary-description">Get started with a new challenge.</p>
                            </div>
                        </a>
                        <a class="nav-row" href="<?php echo $_LINK_USER_ ."/".$_SESSION['currentUser']->getUsername()."/".$_LINK_CREATED_; ?>">
                            <i class="icon-grey fa fa-fw fa-flash"></i>
                            <div class="nav-row-summary">
                                <p class="nav-row-summary-name">View Created</p>
                                <p class="nav-row-summary-description">Check the status of your challenges.</p>
                            </div>
                        </a>
                        <a class="nav-row" href="<?php echo $_LINK_USER_ ."/".$_SESSION['currentUser']->getUsername()."/".$_LINK_ENTERED_; ?>">
                            <i class="icon-red fa fa-fw fa-tag"></i>
                            <div class="nav-row-summary">
                                <p class="nav-row-summary-name">View Entered</p>
                                <p class="nav-row-summary-description">Browse your challenge entries.</p>
                            </div>
                        </a>
                        <a class="nav-row" href="<?php echo $_LINK_USER_ ."/".$_SESSION['currentUser']->getUsername()."/".$_LINK_WON_; ?>">
                            <i class="icon-yellow fa fa-fw fa-trophy"></i>
                            <div class="nav-row-summary">
                                <p class="nav-row-summary-name">View Won</p>
                                <p class="nav-row-summary-description">Leave feedback for challenges you've won.</p>
                            </div>
                        </a>
                    </div>
                </div>
                <a class="nav-button nav-button--is-dropdown" href="<?php echo $_LINK_CHALLENGE_; ?>">Challenges</a>
                <div class="nav-button nav-button--is-dropdown-arrow"><i class="fa fa-angle-down"></i></div>
            </div>
            <?php /*
            <div class="nav-button-container <?php isSelected("forum"); ?>">
                <div class="nav-relative-dropdown is-hidden">
                    <div class="nav-absolute-dropdown">
                        <a class="nav-row" href="/forum/new">
                            <i class="icon-green fa fa-fw fa-plus-circle"></i>
                            <div class="nav-row-summary">
                                <p class="nav-row-summary-name">Create a New Discussion</p>
                                <p class="nav-row-summary-description">Start a topic on the forum.</p>
                            </div>
                        </a>
                        <a class="nav-row" href="/forum/created">
                            <i class="icon-grey fa fa-fw fa-edit"></i>
                            <div class="nav-row-summary">
                                <p class="nav-row-summary-name">View Created</p>
                                <p class="nav-row-summary-description">Check the status of your discussions.</p>
                            </div>
                        </a>
                    </div>
                </div>
                <a class="nav-button nav-button--is-dropdown" href="/forum.php">Forum</a>
                <div class="nav-button nav-button--is-dropdown-arrow"><i class="fa fa-angle-down"></i></div>
            </div>
            <div class="nav-button-container <?php isSelected("support"); ?>">
                <div class="nav-relative-dropdown is-hidden">
                    <div class="nav-absolute-dropdown">
                        <a class="nav-row" href="support/tickets/new">
                            <i class="icon-green fa fa-fw fa-plus-circle"></i>
                            <div class="nav-row-summary">
                                <p class="nav-row-summary-name">Create a New Ticket</p>
                                <p class="nav-row-summary-description">Start a support ticket.</p>
                            </div>
                        </a>
                    </div>
                </div>
                <a class="nav-button nav-button--is-dropdown" href="support.php">Support</a>
                <div class="nav-button nav-button--is-dropdown-arrow"><i class="fa fa-angle-down"></i></div>
            </div>
            */ ?>
            <div class="nav-button-container <?php isSelected("faq"); ?>">
                <a class="nav-button" href="<?php echo $_LINK_ABOUT_ . "/" .$_LINK_FAQ_; ?>">FAQ</a>
            </div>
        </div>
        <div class="nav-right-container">
            <div class="nav-button-container">
                <div class="nav-button-container--notification nav-button-container--inactive">
                    <a title="Challenges Created" class="nav-button nav-button--notification" href="<?php echo $_LINK_USER_ ."/".$_SESSION['currentUser']->getUsername()."/".$_LINK_CREATED_; ?>"><i class="fa fa-flash"></i></a>
                </div>
                <div class="nav-button-container--notification nav-button-container--inactive">
                    <a title="Challenges Won" class="nav-button nav-button--notification" href="<?php echo $_LINK_USER_ ."/".$_SESSION['currentUser']->getUsername()."/".$_LINK_WON_; ?>"><i class="fa fa-trophy"></i></a>
                </div>
                <div class="nav-button-container--notification nav-button-container--inactive">
                    <a title="Messages" class="nav-button nav-button--notification" href="<?php echo $_LINK_ACCOUNT_ . "/" .$_LINK_INBOX_; ?>"><i class="fa fa-envelope"></i></a>
                </div>
            </div>
            <div class="nav-button-container <?php isSelected("user"); ?>">
                <a class="nav-button nav-button--is-dropdown" href="<?php echo $_LINK_USER_ ."/".$_SESSION['currentUser']->getUsername()?>"><?php echo $_SESSION['currentUser']->getUsername(); ?> (<?php echo $_SESSION['currentUser']->getPoints(); ?> CP)</a>
                <div class="nav-button nav-button--is-dropdown-arrow"><i class="fa fa-angle-down"></i></div>
                <div class="nav-relative-dropdown is-hidden">
                    <div class="nav-absolute-dropdown">
                        <a class="nav-row" href="<?php echo $_LINK_ACCOUNT_."/".$_LINK_SYNC_; ?>">
                            <i class="icon-green fa fa-fw fa-refresh"></i>
                            <div class="nav-row-summary">
                                <?php if ($_SESSION['currentUser']->getIsValidated()) { ?>
                                    <p class="nav-row-summary-name">Sync with League of Legends</p>
                                    <p class="nav-row-summary-description">Last synced <?php echo date("d F, H:i", strtotime($_SESSION['currentSummoner']->getLastSync())); ?>.</p>
                                <?php } else { ?>
                                    <p class="nav-row-summary-name">Link your account</p>
                                    <p class="nav-row-summary-description">Link your League of Legends account to be able to join challenges.</p>
                                <?php } ?>
                            </div>
                        </a>
                        <a class="nav-row" href="<?php echo $_LINK_LOGOUT_; ?>">
                            <i class="icon-blue fa fa-fw fa-sign-out"></i>
                            <div class="nav-row-summary">
                                <p class="nav-row-summary-name">Logout</p>
                                <p class="nav-row-summary-description">Sign-out of your account.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="nav-button-container nav-button-container--notification">
                <a href="<?php echo $_LINK_USER_ ."/".$_SESSION['currentUser']->getUsername(); ?>" class="nav-avatar-outer-wrap">
                    <div class="nav-avatar-inner-wrap" style="background-image:url(<?php echo $_SESSION['currentUser']->displayAvatar(); ?>);"></div>
                </a>
            </div>
        </div>
    </nav>
</header>