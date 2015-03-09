<div class="page-heading">
    <div class="page-heading-breadcrumbs">
        <a href="<?php echo $_LINK_USER_ . '/' . $thisUser->getUsername(); ?>"><?php echo $thisUser->getUsername(); ?></a>
        <i class="fa fa-angle-right"></i>
        <?php echo getPageHeading($tabPanel); ?>
    </div>
</div>
<div><br />
    <?php for ($i = 0; !empty($listFriends[$i]); $i++) {
    $friend = $UserManager->get($listFriends[$i]->getFriendId());?>
        <div class="table-heading table-column--width-medium text-center" style="display:inline-block">
        <a href="<?php echo $_LINK_USER_ . '/' . $friend->getUsername(); ?>" title="<?php echo $friend->getUsername(); ?>">
        <div class="global-image-outer-wrap global-image-outer-wrap--avatar-large" style="display:inline-block">
            <div class="global-image-inner-wrap" style="background-image:url(<?php echo $friend->displayAvatar(); ?>);"></div>
        </div>
            <div class="friend-list-box">
                <?php echo $friend->getUsername(); ?><br />
            </div>
        </a>
    </div>
    <?php } ?>
</div>
<div class="pagination">
    <?php if ($i) { ?>
        <div class="pagination-results">Displaying <strong>1</strong> to <strong><?php echo $i; ?></strong> of <strong><?php echo $thisStats->getNbFriends(); ?></strong> results</div>
    <?php } else { ?>
        <div class="pagination-results">No results</div>
    <?php } ?>
</div>