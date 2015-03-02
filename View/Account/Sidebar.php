<div class="sidebar">
    <div class="sidebar SGPP-scrollingSidebar" style="position: static;">
        <h3 class="sidebar-heading">About</h3>
        <ul class="sidebar-navigation">
            <li class="sidebar-navigation-item <?php isActive("Inbox"); ?> is-disabled">
                <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_ACCOUNT_ . "/" . $_LINK_INBOX_; ?>">
                    <?php addCaret("Inbox"); ?>
                    <div class="sidebar-navigation-item-name">Inbox</div>
                    <div class="sidebar-navigation-item-underline"></div>
                </a>
            </li>
            <li class="sidebar-navigation-item <?php isActive("Synchronisation"); ?>">
                <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_ACCOUNT_ . "/" . $_LINK_SYNC_; ?>">
                    <?php addCaret("Synchronisation"); ?>
                    <div class="sidebar-navigation-item-name">Synchronisation</div>
                    <div class="sidebar-navigation-item-underline"></div>
                </a>
            </li>
        </ul>
    </div>
</div>