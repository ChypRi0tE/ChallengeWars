<div class="page-heading">
    <div class="page-heading-breadcrumbs">Description</div>
</div>
<div class="table">
<div class="table-heading">
    <div class="table-column--width-small text-center">Position</div>
    <div class="table-column--width-fill">User</div>
    <div class="table-column--width-small text-center">Points</div>
</div>
<div class="table-rows">
<?php for ($i = 0; !empty($listRank[$i]); $i++) {
    $user = $UserManager->get($listRank[$i]->getUserId()); ?>
    <div class="table-row-outer-wrap">
        <div class="table-row-inner-wrap">
            <div class="table-column--width-small text-center"><?php echo $i + 1; ?></div>
            <div>
                <a class="global-image-outer-wrap global-image-outer-wrap--avatar-small" href="<?php echo $_LINK_USER_ . '/' . $user->getUsername(); ?>">
                    <div class="global-image-inner-wrap" style="background-image:url(<?php echo $user->displayAvatar(); ?>);"></div></a></div>
            <div class="table-column--width-fill">
                <a href="<?php echo $_LINK_USER_ . '/' . $user->getUsername(); ?>" class="table-column-heading"><?php echo $user->getUsername(); ?></a></div>
            <div class="table-column--width-small text-center"><?php echo $listRank[$i]->getPoints(); ?></div>
        </div>
    </div>
      
<?php } ?>
</div>
</div>
<div class="pagination">
    <?php if ($i) { ?>
        <div class="pagination-results">Displaying <strong><?php echo $i; ?></strong> of <strong><?php echo $CommentManager->getNbForChallenge($thisChallenge->getId())[0]; ?></strong> results</div>
    <?php } else { ?>
        <div class="pagination-results">No results</div>
    <?php } ?>
</div>