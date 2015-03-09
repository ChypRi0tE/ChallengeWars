<div class="sidebar">
    <div class="sidebar-search-container">
        <input class="sidebar-search-input is-helper" name="search-query" type="text" data-helper-str="Search..." placeholder="Search..." />
        <i class="fa fa-search"></i>
    </div>
    <h3 class="sidebar-heading">Browse</h3>
    <ul class="sidebar-navigation">
        <li class="sidebar-navigation-item is-selected">
            <a class="sidebar-navigation-item-link" id="rank-all"><i class="fa fa-caret-right"></i>
                <div class="sidebar-navigation-item-name">All</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $ChallengeManager->getNbOngoing(); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item">
            <a class="sidebar-navigation-item-link" id="rank-starter">
                <div class="sidebar-navigation-item-name">Starter</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $ChallengeManager->getNbStarter(); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item">
            <a class="sidebar-navigation-item-link" id="rank-advanced">
                <div class="sidebar-navigation-item-name">Advanced</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $ChallengeManager->getNbAdvanced(); ?></div>
            </a>
        </li>
        <?php if (isLogged() && $_ALLOW_FRIENDS_ && false) { ?>
        <li class="sidebar-navigation-item">
            <a class="sidebar-navigation-item-link" href="#">
                <div class="sidebar-navigation-item-name">Friends</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $ChallengeManager->getNbFriends($_SESSION['currentUser']->getId()); ?></div>
            </a>
        </li>
        <?php } ?>
    </ul>
    <h3 class="sidebar-heading">Categories</h3>
    <ul class="sidebar-navigation">
        <li class="sidebar-navigation-item is-selected">
            <a class="sidebar-navigation-item-link" href="#" id="type-all"><i class="fa fa-caret-right"></i>
                <div class="sidebar-navigation-item-name">All</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $ChallengeManager->getNbOngoing(); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item">
            <a class="sidebar-navigation-item-link" href="#" id="type-kill">
                <div class="sidebar-navigation-item-name">Kill</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $ChallengeManager->getNbOngoingForType(3); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item">
            <a class="sidebar-navigation-item-link" href="#" id="type-creep">
                <div class="sidebar-navigation-item-name">Creep</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $ChallengeManager->getNbOngoingForType(1); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item">
            <a class="sidebar-navigation-item-link" href="#" id="type-victory">
                <div class="sidebar-navigation-item-name">Victory</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $ChallengeManager->getNbOngoingForType(2); ?></div>
            </a>
        </li>
    </ul>
    <?php if (isLogged()) { ?>
    <h3 class="sidebar-heading">My Challenges</h3>
    <ul class="sidebar-navigation">
        <li class="sidebar-navigation-item">
            <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_USER_ . "/" . $thisUser->getUsername() . "/" . $_LINK_CREATED_; ?>">
                <div class="sidebar-navigation-item-name">Created</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $thisStats->getChallCreated(); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item">
            <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_USER_ . "/" . $thisUser->getUsername() . "/" . $_LINK_ENTERED_; ?>">
                <div class="sidebar-navigation-item-name">Entered</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $thisStats->getChallEntered() ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item">
            <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_USER_ . "/" . $thisUser->getUsername() . "/" . $_LINK_WON_; ?>">
                <div class="sidebar-navigation-item-name">Won</div>
                <div class="sidebar-navigation-item-underline"></div><div class="sidebar-navigation-item-count"><?php echo $thisStats->getChallWon(); ?></div>
            </a>
        </li>
    </ul>
    <?php } ?>
</div>