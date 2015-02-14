<div class="sidebar">
    <?php if (isLogged() && $_SESSION['currentUser']->getId() != $thisUser->getId()) { ?>
        <div class="sidebar-entry-insert">
            <a rel="nofollow" target="_blank" href="http://steamcommunity.com/profiles/76561197990861574" data-tooltip="Add to favorites">
                <i class="fa fa-fw fa-heart"></i> Add to friends
            </a>
        </div>
    <?php } ?>
    <div class="sidebar-search-container">
        <input class="sidebar-search-input is-helper" name="search-query" type="text" data-helper-str="Search..." placeholder="Search..."/>
        <i class="fa fa-search"></i>
    </div>
    <h3 class="sidebar-heading">Activity</h3>
    <ul class="sidebar-navigation">
        <li class="sidebar-navigation-item <?php isActive("Created"); ?>">
            <a class="sidebar-navigation-item-link" href="user.php?id=<?php echo $idUser; ?>&tab=created">
                <?php addCaret("Created"); ?>
                <div class="sidebar-navigation-item-name">Created</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count"><?php echo $thisStats->getChallCreated(); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item <?php isActive("Entries"); ?>">
            <a class="sidebar-navigation-item-link" href="user.php?id=<?php echo $idUser; ?>&tab=entries">
                <?php addCaret("Entries"); ?>
                <div class="sidebar-navigation-item-name">Entered</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count"><?php echo $thisStats->getChallEntered(); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item <?php isActive("Won"); ?>">
            <a class="sidebar-navigation-item-link" href="user.php?id=<?php echo $idUser; ?>&tab=won">
                <?php addCaret("Won"); ?>
                <div class="sidebar-navigation-item-name">Won</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count"><?php echo $thisStats->getChallWon(); ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item <?php isActive("Comments"); ?>">
            <a class="sidebar-navigation-item-link" href="user.php?id=<?php echo $idUser; ?>&tab=comments">
                <?php addCaret("Comments"); ?>
                <div class="sidebar-navigation-item-name">Comments</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count"><?php echo $thisStats->getCommentPosted(); ?></div>
            </a>
        </li>
    </ul>
</div>
