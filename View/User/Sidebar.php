<div class="sidebar">
    <?php if (isLogged() && $_SESSION['currentUser']->getId() == $thisUser->getId() && $thisUser->getIsValidated()) { ?>
        <form id="formSync" action="" method="post">
            <input type="hidden" name="sync" />
            <div class="sidebar-entry-insert" id="submit-form-sync">
                <i class="fa fa-fw fa-refresh"></i> Synchronize
            </div>
        </form>
    <?php } else if (isLogged() && $_SESSION['currentUser']->getId() != $thisUser->getId() && !isFriend($_SESSION['currentUser']->getId(), $thisUser->getId())) { ?>
        <form id="formAdd" action="" method="post">
            <input type="hidden" name="add-friend" />
            <div class="sidebar-entry-insert" id="submit-form-add">
                <i class="fa fa-fw fa-heart"></i> Add Friend
            </div>
        </form>
    <?php } else if (isLogged() && $_SESSION['currentUser']->getId() != $thisUser->getId() && isFriend($_SESSION['currentUser']->getId(), $thisUser->getId())) { ?>
        <form id="formRemove" action="" method="post">
            <input type="hidden" name="remove-friend" />
            <div class="sidebar-entry-delete" id="submit-form-remove">
                <i class="fa fa-fw fa-trash"></i> Remove Friend
            </div>
        </form>
    <?php } ?>
    <div class="sidebar-search-container">
        <input class="sidebar-search-input is-helper" name="search-query" type="text" data-helper-str="Search..." placeholder="Search..."/>
        <i class="fa fa-search"></i>
    </div>
    <h3 class="sidebar-heading">Activity</h3>
    <ul class="sidebar-navigation">
        <li class="sidebar-navigation-item <?php isActive("Created"); ?>">
            <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_USER_ ."/".$thisUser->getUsername()."/".$_LINK_CREATED_; ?>">
                <?php addCaret("Created"); ?>
                <div class="sidebar-navigation-item-name">Created</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count"><?php echo $thisStats->getChallCreated(); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item <?php isActive("Entries"); ?>">
            <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_USER_ ."/".$thisUser->getUsername()."/".$_LINK_ENTERED_; ?>">
                <?php addCaret("Entries"); ?>
                <div class="sidebar-navigation-item-name">Entered</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count"><?php echo $thisStats->getChallEntered(); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item <?php isActive("Won"); ?>">
            <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_USER_ ."/".$thisUser->getUsername()."/".$_LINK_WON_; ?>">
                <?php addCaret("Won"); ?>
                <div class="sidebar-navigation-item-name">Won</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count"><?php echo $thisStats->getChallWon(); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item <?php isActive("Comments"); ?>">
            <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_USER_ ."/".$thisUser->getUsername()."/".$_LINK_COMMENT_; ?>">
                <?php addCaret("Comments"); ?>
                <div class="sidebar-navigation-item-name">Comments</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count"><?php echo $thisStats->getCommentPosted(); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item <?php isActive("Friends"); ?>">
            <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_USER_ ."/".$thisUser->getUsername()."/".$_LINK_FRIENDS_; ?>">
                <?php addCaret("Friends"); ?>
                <div class="sidebar-navigation-item-name">Friends</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count"><?php echo $thisStats->getNbFriends(); ?></div>
            </a>
        </li>
        <?php if ($thisUser->getIsValidated()) { ?>
        <li class="sidebar-navigation-item <?php isActive("History"); ?>">
            <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_USER_ ."/".$thisUser->getUsername()."/".$_LINK_HISTORY_; ?>">
                <?php addCaret("History"); ?>
                <div class="sidebar-navigation-item-name">Match History</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count"><?php echo $MatchManager->getNbForUser($idUser); ?></div>
            </a>
        </li>
        <?php } ?>
    </ul>
</div>
