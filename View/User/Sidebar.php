<div class="sidebar">
    <?php if (isLogged() && $_SESSION['currentUser']->getId() == $thisUser->getId() && $thisUser->getIsValidated()) { ?>
        <form id="formSync" action="" method="post">
            <input type="hidden" value="sync" />
            <div class="sidebar-entry-insert" id="submit-form-sync">
                <i class="fa fa-fw fa-refresh"></i> Synchronize
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
        <li class="sidebar-navigation-item <?php isActive("History"); ?>">
            <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_USER_ ."/".$thisUser->getUsername()."/".$_LINK_HISTORY_; ?>">
                <?php addCaret("History"); ?>
                <div class="sidebar-navigation-item-name">Match History</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count"></div>
            </a>
        </li>
    </ul>
</div>
