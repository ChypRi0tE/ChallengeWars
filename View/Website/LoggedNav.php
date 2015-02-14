<header>
    <nav>
        <div class="nav-left-container">
            <div class="nav-button-container nav-button-container--notification">
                <a class="nav-logo-outer-wrap" href="/ChallengeWars">
                    <div class="nav-logo-inner-wrap"></div>
                </a>
            </div>
            <div class="nav-button-container <?php isSelected("accueil"); ?>">
                <div class="nav-relative-dropdown is-hidden">
                    <div class="nav-absolute-dropdown">
                        <a class="nav-row" href="/challenges/new">
                            <i class="icon-green fa fa-fw fa-plus-circle"></i>
                            <div class="nav__row__summary">
                                <p class="nav-row-summary-name">Create a New Challenge</p>
                                <p class="nav-row-summary-description">Get started with a new challenge.</p>
                            </div>
                        </a>
                        <a class="nav-row" href="/challenges/created">
                            <i class="icon-grey fa fa-fw fa-flash"></i>
                            <div class="nav__row__summary">
                                <p class="nav-row-summary-name">View Created</p>
                                <p class="nav-row-summary-description">Check the status of your challenges.</p>
                            </div>
                        </a>
                        <a class="nav-row" href="/challenges/entered">
                            <i class="icon-red fa fa-fw fa-tag"></i>
                            <div class="nav__row__summary">
                                <p class="nav-row-summary-name">View Entered</p>
                                <p class="nav-row-summary-description">Browse your challenge entries.</p>
                            </div>
                        </a>
                        <a class="nav-row" href="/challenges/won">
                            <i class="icon-yellow fa fa-fw fa-trophy"></i>
                            <div class="nav-row-summary">
                                <p class="nav-row-summary-name">View Won</p>
                                <p class="nav-row-summary-description">Leave feedback for challenges you've won.</p>
                            </div>
                        </a>
                    </div>
                </div>
                <a class="nav-button nav-button--is-dropdown" href="/ChallengeWars">Challenges</a>
                <div class="nav-button nav-button--is-dropdown-arrow"><i class="fa fa-angle-down"></i></div>
            </div>
            <div class="nav-button-container <?php isSelected("forum"); ?>">
                <div class="nav-relative-dropdown is-hidden">
                    <div class="nav-absolute-dropdown">
                        <a class="nav-row" href="/forum/new">
                            <i class="icon-green fa fa-fw fa-plus-circle"></i>
                            <div class="nav__row__summary">
                                <p class="nav-row-summary-name">Create a New Discussion</p>
                                <p class="nav-row-summary-description">Start a topic on the forum.</p>
                            </div>
                        </a>
                        <a class="nav-row" href="/forum/created">
                            <i class="icon-grey fa fa-fw fa-edit"></i>
                            <div class="nav__row__summary">
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
                        <a class="nav-row" href="/support/tickets/new">
                            <i class="icon-green fa fa-fw fa-plus-circle"></i>
                            <div class="nav__row__summary">
                                <p class="nav-row-summary-name">Create a New Ticket</p>
                                <p class="nav-row-summary-description">Start a support ticket.</p>
                            </div>
                        </a>
                    </div>
                </div>
                <a class="nav-button nav-button--is-dropdown" href="/support.php">Support</a>
                <div class="nav-button nav-button--is-dropdown-arrow"><i class="fa fa-angle-down"></i></div>
            </div>
            <div class="nav-button-container <?php isSelected("faq"); ?>">
                <a class="nav-button" href="/about/faq.php">FAQ</a>
            </div>
        </div>
        <div class="nav-right-container">
            <div class="nav-button-container">
                <div class="nav-button-container--notification nav-button-container--inactive">
                    <a title="Challenges Created" class="nav-button nav-button--notification" href="/challenges/created"><i class="fa fa-flash"></i></a>
                </div>
                <div class="nav-button-container--notification nav-button-container--inactive">
                    <a title="Challenges Won" class="nav-button nav-button--notification" href="/challenges/won"><i class="fa fa-trophy"></i></a>
                </div>
                <div class="nav-button-container--notification nav-button-container--inactive">
                    <a title="Messages" class="nav-button nav-button--notification" href="/user/inbox"><i class="fa fa-envelope"></i></a>
                </div>
            </div>
            <div class="nav-button-container <?php isSelected("user"); ?>">
                <a class="nav-button nav-button--is-dropdown" href="user.php?id=<?php echo $_SESSION['currentUser']->getId(); ?>"><?php echo $_SESSION['currentUser']->getUsername(); ?> (<?php echo $_SESSION['currentUser']->getPoints(); ?> CP)</a>
                <div class="nav-button nav-button--is-dropdown-arrow"><i class="fa fa-angle-down"></i></div>
                <div class="nav-relative-dropdown is-hidden">
                    <div class="nav-absolute-dropdown">
                        <a class="nav-row" href="/account/profile/sync">
                            <i class="icon-green fa fa-fw fa-refresh"></i>
                            <div class="nav__row__summary">
                                <p class="nav-row-summary-name">Sync with League of Legends</p>
                                <p class="nav-row-summary-description">Last synced <span title="Yesterday, 4:32pm">22 hours ago</span>.</p>
                            </div>
                        </a>
                        <a class="nav-row" href="logout.php">
                            <i class="icon-blue fa fa-fw fa-sign-out"></i>
                            <div class="nav__row__summary">
                                <p class="nav-row-summary-name">Logout</p>
                                <p class="nav-row-summary-description">Sign-out of your account.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="nav-button-container nav-button-container--notification">
                <a href="/user/ChypRiotE" class="nav-avatar-outer-wrap">
                    <div class="nav-avatar-inner-wrap" style="background-image:url(assets/img/<?php echo $_SESSION['currentUser']->getAvatar(); ?>);"></div>
                </a>
            </div>
        </div>
    </nav>
</header>