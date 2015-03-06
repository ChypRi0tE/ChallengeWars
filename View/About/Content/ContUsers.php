<div>
    <div class="page-heading">
        <div class="page-heading-breadcrumbs"><a href="<?php echo $_LINK_ABOUT_ . "/" . $_LINK_USERS_; ?>">Users</a></div>					</div>
    <div class="table">
        <div class="table-heading">
            <div class="table-column--width-fill">User</div>
            <div class="table-column--width-small text-center">Comments</div>
            <div class="table-column--width-small text-center">Entries</div>
            <div class="table-column--width-small text-center">Won</div>
            <div class="table-column--width-small text-center">Points</div>
            <div class="table-column--width-small text-center">Registered</div>
        </div>
        <div class="table-rows">
            <?php for ($i = 0; !empty($listUsers[$i]); $i++) {
                $stats = $StatManager->getUserStats($listUsers[$i]->getId());?>
                <div class="table-row-outer-wrap">
                    <div class="table-row-inner-wrap">
                        <div>
                            <a class="global-image-outer-wrap global-image-outer-wrap--avatar-small" href="<?php echo $_LINK_USER_ ."/". $listUsers[$i]->getUsername(); ?>">
                                <div class="global-image-inner-wrap" style="background-image:url(<?php echo $listUsers[$i]->displayAvatar(); ?>);"></div>
                            </a>
                        </div>
                        <div class="table-column--width-fill">
                            <a href="<?php echo $_LINK_USER_. "/".$listUsers[$i]->getUsername(); ?>" class="table-column-heading"><?php echo $listUsers[$i]->getUsername(); ?></a>
                        </div>
                        <div class="table-column--width-small text-center"><?php echo $stats->getCommentPosted(); ?></div>
                        <div class="table-column--width-small text-center"><?php echo $stats->getChallEntered(); ?></div>
                        <div class="table-column--width-small text-center"><?php echo $stats->getChallWon(); ?></div>
                        <div class="table-column--width-small text-center"><?php echo $listUsers[$i]->getPoints(); ?></div>
                        <div class="table-column--width-small text-center"><?php echo date("j F Y", strtotime($stats->getDateInscription())); ?></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="pagination">
        <?php if ($i) { ?>
            <div class="pagination-results">Displaying <strong>1</strong> to <strong><?php echo $i; ?></strong> of <strong><?php echo $UserManager->getNbUsers(); ?></strong> results</div>
        <?php } else { ?>
            <div class="pagination-results">No results</div>
        <?php } ?>
    </div>
</div>