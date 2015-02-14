<div class="sidebar sidebar--wide">
    <form>
        <input type="hidden" name="xsrf_token" value="6f188e293c737648170b50135684323e">
        <input type="hidden" name="do" value="">
        <input type="hidden" name="code" value="Fz9Fn">
        <div class="sidebar-entry-insert"><i class="fa fa-plus-circle"></i> Enter Challenge<span class="sidebar-entry-points">(6P)</span></div>
        <div class="sidebar-entry-delete is-hidden"><i class="fa fa-minus-circle"></i> Remove Entry<span class="sidebar-entry-points">(6P)</span></div>
        <div class="sidebar-entry-loading is-disabled is-hidden"><i class="fa fa-refresh fa-spin"></i> Please wait...</div>
    </form>
    <div class="sidebar-search-container">
        <input class="sidebar-search-input is-helper" name="search-query" type="text" data-helper-str="Search..." value="Search..." />
        <i class="fa fa-search"></i>
    </div>
    <h3 class="sidebar-heading">Challenge</h3>
    <ul class="sidebar-navigation">
        <li class="sidebar-navigation-item <?php isActive("Comments"); ?>">
            <a class="sidebar-navigation-item-link" href="challenge.php?id=<?php echo $thisChallenge->getId(); ?>&tab=comments">
                <?php addCaret("Comments"); ?>
                <div class="sidebar-navigation-item-name">Comments</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count"><?php echo $CommentManager->getNbForChallenge($thisChallenge->getId())[0]; ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item <?php isActive("Entries"); ?>">
            <a class="sidebar-navigation-item-link" href="challenge.php?id=<?php echo $thisChallenge->getId(); ?>&tab=entries">
                <?php addCaret("Entries"); ?>
                <div class="sidebar-navigation-item-name">Participants</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count live-entry-count"><?php echo $EntryManager->getNbForChallenge($thisChallenge->getId())[0]; ?></div>
            </a>
        </li>
        <li class="sidebar-navigation-item <?php isActive("Rankings"); ?>">
            <a class="sidebar-navigation-item-link" href="challenge.php?id=<?php echo $thisChallenge->getId(); ?>&tab=rankings">
                <?php addCaret("Rankings"); ?>
                <div class="sidebar-navigation-item-name">Rankings</div>
                <div class="sidebar-navigation-item-underline"></div>
                <div class="sidebar-navigation-item-count">1</div>
            </a>
        </li>
    </ul>
</div>