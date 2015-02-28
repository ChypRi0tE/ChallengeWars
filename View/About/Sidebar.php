<div class="sidebar">
    <div class="sidebar SGPP-scrollingSidebar" style="position: static;">
        <h3 class="sidebar-heading">About</h3>
        <ul class="sidebar-navigation">
            <li class="sidebar-navigation-item <?php isActive("FAQ"); ?>">
                <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_ABOUT_ . "/" . $_LINK_FAQ_; ?>">
                    <?php addCaret("FAQ"); ?>
                    <div class="sidebar-navigation-item-name">FAQ</div>
                    <div class="sidebar-navigation-item-underline"></div>
                </a>
            </li>
            <li class="sidebar-navigation-item <?php isActive("Users"); ?>">
                <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_ABOUT_ . "/" . $_LINK_USERS_; ?>">
                    <?php addCaret("Users"); ?>
                    <div class="sidebar-navigation-item-name">Users</div>
                    <div class="sidebar-navigation-item-underline"></div>
                </a>
            </li>
            <li class="sidebar-navigation-item <?php isActive("Terms"); ?>">
                <a class="sidebar-navigation-item-link" href="<?php echo $_LINK_ABOUT_ . "/" . $_LINK_TERMS_; ?>">
                    <?php addCaret("Terms"); ?>
                    <div class="sidebar-navigation-item-name">Terms of Service</div>
                    <div class="sidebar-navigation-item-underline"></div>
                </a>
            </li>
        </ul>
    </div>
</div>