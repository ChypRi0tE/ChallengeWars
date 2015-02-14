<div class="page-heading">
    <div class="page-heading-breadcrumbs"><a href="/ChallengeWars"><?php echo $_LIST_HEADER; ?></a></div>
    <a href="account/settings/challenges"><i class="fa fa-cog"></i></a>
</div>
<div>
<?php for ($i = 0; $i != $_LIST_NB && !empty($listChallenge[$i]); $i++) {
    $user = $UserManager->get($listChallenge[$i]->getIdCreator()); ?>
    <div class="challenge-row-outer-wrap">
        <div class="challenge-row-inner-wrap">
            <div class="challenge-summary">
                <h2 class="challenge-heading">
                    <a class="challenge-heading-name" href="challenge.php?id=<?php echo $listChallenge[$i]->getId(); ?>"><?php echo $listChallenge[$i]->getTitle(); ?></a>
                    <?php if ($listChallenge[$i]->getIsAdvanced()) { ?>
                    <span class="challenge-heading-thin">(20 CP)</span>
                    <?php } ?>
                    <i data-popup="popup--hide-games" data-game-id="1620" class="challenge-icon challenge-hide trigger-popup fa fa-eye-slash"></i>
                </h2>
                <div class="challenge-columns">
                    <div><i class="fa fa-clock-o"></i> <span title="<?php echo $listChallenge[$i]->getDateEnd(); ?>"><?php getTimeFromNow($listChallenge[$i]->getDateEnd()); ?></span></div>
                    <div class="challenge-column--width-fill text-right"><span title="<?php echo $listChallenge[$i]->getDateCreation(); ?>"><?php getTimeFromNow($listChallenge[$i]->getDateCreation()); ?></span> by <a class="challenge-username" href="user.php?id=<?php echo $listChallenge[$i]->getIdCreator(); ?>"><?php echo $user->getUsername(); ?></a></div>
                    <?php if ($listChallenge[$i]->getIsAdvanced()) { ?>
                    <div class="challenge-column--contributor-level challenge-column--contributor-level--advanced" title="Advanced Challenge">Advanced</div>
                    <?php } ?>
                </div>
                <div class="challenge-links">
                    <a href="challenge.php?id=<?php echo $listChallenge[$i]->getId(); ?>&tab=entries"><i class="fa fa-tag"></i> <span><?php echo $EntryManager->getNbForChallenge($listChallenge[$i]->getId()); ?> entries</span></a>
                    <a href="challenge.php?id=<?php echo $listChallenge[$i]->getId(); ?>&tab=comments"><i class="fa fa-comment"></i> <span><?php echo $CommentManager->getNbForChallenge($listChallenge[$i]->getId()); ?> comments</span></a>
                    <a href="challenge.php?id=<?php echo $listChallenge[$i]->getId(); ?>&tab=rankings"><i class="fa fa-trophy"></i> <span>rankings</span></a>
                </div>
            </div>
            <a href="user.php?id=<?php echo $listChallenge[$i]->getIdCreator(); ?>" class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                <div class="global-image-inner-wrap" style="background-image:url(assets/img/<?php echo $user->getAvatar(); ?>);"></div>
            </a>
            <a class="global-image-outer-wrap global-image-outer-wrap--game-medium" href="challenge.php?id=<?php echo $listChallenge[$i]->getId(); ?>">
                <div class="global-image-inner-wrap" style="background-image:url(assets/img/filler500.jpg);"></div>
            </a>
        </div>
    </div>
<?php } ?>
</div>
<div class="pagination">
    <div class="pagination-results">Displaying <strong>1</strong> to <strong><?php echo $i; ?></strong> of <strong><?php echo $ChallengeManager->getNbOngoing(); ?></strong> results</div>
    <div class="pagination-navigation">
        <a data-page-number="1" class="is-selected" href="/giveaways"><span>1</span></a>
        <a data-page-number="2" href="/giveaways/search?page=2"><span>2</span></a>
        <a data-page-number="3" href="/giveaways/search?page=3"><span>3</span></a>
        <a data-page-number="4" href="/giveaways/search?page=4"><span>4</span></a>
        <a data-page-number="5" href="/giveaways/search?page=5"><span>5</span></a> ...
        <a data-page-number="2" href="/giveaways/search?page=2"><span>Next</span> <i class="fa fa-angle-right"></i></a>
        <a data-page-number="41" href="/giveaways/search?page=41"><span>Last</span> <i class="fa fa-angle-double-right"></i></a>
    </div>
</div>