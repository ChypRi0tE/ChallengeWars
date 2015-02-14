<div class="page-heading">
    <div class="page-heading-breadcrumbs"><a href="/"><?php echo $_PINNED_HEADER; ?></a></div>
</div>
<br />
<div class="pinned-challenges">
    <?php for ($i = 0; $i != $_PINNED_NB && !empty($listFeaturedChallenge[$i]); $i++) {
    $user = $UserManager->get($listFeaturedChallenge[$i]->getIdCreator()); ?>
    <div class="challenge-row-outer-wrap">
        <div class="challenge-row-inner-wrap">
            <div class="challenge-summary">
                <h2 class="challenge-heading">
                    <a class="challenge-heading-name" href="challenge.php?id=<?php echo $listFeaturedChallenge[$i]->getId(); ?>"><?php echo $listFeaturedChallenge[$i]->getTitle(); ?></a>
                    <?php //<span class="challenge-heading-thin">(20P)</span>; ?>
                    <i data-popup="popup--hide-games" data-game-id="1620" class="challenge-icon challenge-hide trigger-popup fa fa-eye-slash"></i>
                </h2>
                <div class="challenge-columns">
                    <div><i class="fa fa-clock-o"></i> <span title="<?php echo $listFeaturedChallenge[$i]->getDateEnd(); ?>">3 days left</span></div>
                    <div class="challenge-column--width-fill text-right"><span title="<?php echo $listFeaturedChallenge[$i]->getDateCreation(); ?>">23 hours ago</span> by <a class="challenge-username" href="user.php?id=<?php echo $listFeaturedChallenge[$i]->getIdCreator(); ?>"><?php echo $user->getUsername(); ?></a></div>
                    <?php //<div class="challenge-column--contributor-level challenge-column--contributor-level--positive" title="User Level">Level 1+</div>;  ?>
                </div>
                <div class="challenge-links">
                    <a href="challenge.php?id=<?php echo $listFeaturedChallenge[$i]->getId(); ?>&tab=entries"><i class="fa fa-tag"></i> <span><?php echo $EntryManager->getNbForChallenge($listFeaturedChallenge[$i]->getId()); ?> entries</span></a>
                    <a href="challenge.php?id=<?php echo $listFeaturedChallenge[$i]->getId(); ?>&tab=comments"><i class="fa fa-comment"></i> <span><?php echo $CommentManager->getNbForChallenge($listFeaturedChallenge[$i]->getId()); ?> comments</span></a>
                    <a href="challenge.php?id=<?php echo $listFeaturedChallenge[$i]->getId(); ?>&tab=rankings"><i class="fa fa-trophy"></i> <span>rankings</span></a>
                </div>
            </div>
            <a href="user.php?id=<?php echo $listFeaturedChallenge[$i]->getIdCreator(); ?>" class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                <div class="global-image-inner-wrap" style="background-image:url(assets/img/<?php echo $user->getAvatar(); ?>);"></div>
            </a>
            <a class="global-image-outer-wrap global-image-outer-wrap--game-medium" href="challenge.php?id=<?php echo $listFeaturedChallenge[$i]->getId(); ?>">
                <div class="global-image-inner-wrap" style="background-image:url(assets/img/filler500.jpg);"></div>
            </a>
        </div>
    </div>
<?php } ?>
</div>