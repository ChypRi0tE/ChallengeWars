<div class="page-heading">
    <div class="page-heading-breadcrumbs">
        <a href="<?php echo $_LINK_CHALLENGE_ . "/challenge-" . $thisChallenge->getId(). "/".$_LINK_RANKING_; ?>"><?php echo $EntryManager->getNbForChallenge($thisChallenge->getId())[0]; ?> Entries</a>
    </div>
</div>
<div class="table">
<div class="table-heading">
    <div class="table-column--width-xsmall text-center">Position</div>
    <div class="table-column--width-large">User</div>
    <div class="table-column--width-xsmall text-center">Points</div>
    <div class="table-column--width-small text-center">Joined</div>
</div>
<div class="table-rows">
<?php for ($i = 0; !empty($listEntry[$i]); $i++) {
    $user = $UserManager->get($listEntry[$i]->getIdUser()); ?>
    <div class="table-row-outer-wrap">
        <div class="table-row-inner-wrap">
            <div class="table-column--width-xsmall text-center"><?php echo $i + 1; ?></div>
            <div>
                <a class="global-image-outer-wrap global-image-outer-wrap--avatar-small" href="<?php echo $_LINK_USER_ . '/' . $user->getUsername(); ?>">
                    <div class="global-image-inner-wrap" style="background-image:url(<?php echo $user->displayAvatar(); ?>);"></div></a></div>
            <div class="table-column--width-large">
                <a href="<?php echo $_LINK_USER_ . '/' . $user->getUsername(); ?>" class="table-column-heading"><?php echo $user->getUsername(); ?></a></div>
            <div class="table-column--width-xsmall text-center"><?php echo $listEntry[$i]->getPoints(); ?></div>
            <div class="table-column--width-small text-center"><?php echo strftime("%d %B at %H:%M",strtotime($listEntry[$i]->getDateEntry())); ?></div>
        </div>
    </div>
      
<?php } ?>
</div>
</div>
<div class="pagination">
    <?php if ($i) { ?>
        <div class="pagination-results">Displaying <strong><?php echo $i; ?></strong> of <strong><?php echo count($listEntry); ?></strong> results</div>
    <?php } else { ?>
        <div class="pagination-results">No results</div>
    <?php } ?>
</div>