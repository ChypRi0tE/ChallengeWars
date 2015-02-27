<div class="page-heading">
    <div class="page-heading-breadcrumbs">
        <a href="<?php echo $_LINK_CHALLENGE_ . "/challenge-" . $thisChallenge->getId(). "/".$_LINK_ENTRIES_; ?>"><?php echo $EntryManager->getNbForChallenge($thisChallenge->getId())[0]; ?> Entries</a>
    </div>
</div>
<div class="table">
<div class="table-heading">
    <div class="table-column--width-fill">User</div>
    <div class="table-column--width-small text-center">Date</div>
</div>
<div class="table-rows">
<?php for ($i = 0; $i != $_LIST_NB && !empty($listEntry[$i]); $i++) {
    $user = $UserManager->get($listEntry[$i]->getIdUser());?>
    <div class="table-row-outer-wrap">
        <div class="table-row-inner-wrap">
            <div>
                <a class="global-image-outer-wrap global-image-outer-wrap--avatar-small" href="user.php?id=<?php echo $user->getId(); ?>">
                    <div class="global-image-inner-wrap" style="background-image:url(/assets/img/<?php echo $user->getAvatar(); ?>);"></div></a></div>
            <div class="table-column--width-fill">
                <a href="user.php?id=<?php echo $user->getId(); ?>" class="table-column-heading"><?php echo $user->getUsername(); ?></a></div>
            <div class="table-column--width-small text-center"><?php echo strftime("%d %B at %H:%M",strtotime($listEntry[$i]->getDateEntry())); ?></div>
        </div>
    </div>
<?php } ?>
</div>
</div>
<div class="pagination">
    <?php if ($i) { ?>
        <div class="pagination-results">Displaying <strong><?php echo $i; ?></strong> of <strong><?php echo $EntryManager->getNbForChallenge($thisChallenge->getId())[0]; ?></strong> results</div>
    <?php } else { ?>
        <div class="pagination-results">No results</div>
    <?php } ?>
</div>