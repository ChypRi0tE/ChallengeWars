<div class="featured-container">
    <div class="featured-outer-wrap featured-outer-wrap--home" style="background-color: rgb(46,35,9);">
        <div class="featured-inner-wrap">
            <a href="/challenge/<?php echo $nextChallenge->getId(); ?>" class="global-image-outer-wrap global-image-outer-wrap--game-xlarge"><img src="assets/img/filler460.jpg" /></a>
            <div class="featured-summary">
                <?php   if(isLogged()) { ?>
                <div class="featured-heading">
                    <div class="featured-heading-small">Welcome back, </div>
                    <div class="featured-heading-medium"><?php echo $_SESSION['currentUser']->getUsername(); ?></div>
                </div>
                <?php } else { ?>
                    <div class="featured-heading">
                        <div class="featured-heading-small">Welcome on </div>
                        <div class="featured-heading-large">Challenge Wars</div>
                    </div>
                <?php } ?>
                <div class="featured-columns">
                    <a class="global-image-outer-wrap global-image-outer-wrap--avatar-small" href="/user/SnarkovX">
                        <div class="global-image-inner-wrap" style="background-image:url(assets/img/avatar.jpg);"></div>
                    </a>
                    <div class="featured-column">
                        <i style="color: rgb(230,205,149);" class="fa fa-clock-o"></i> <span title="<?php echo $nextChallenge->getDateEnd(); ?>">46 seconds remaining</span>
                    </div>
                    <div class="featured-column featured-column--width-fill"><?php echo $nextChallenge->getTitle(); ?></div>
                    <div class="featured-column">
                        <i style="color: rgb(230,205,149);" class="fa fa-tag"></i> <?php echo $EntryManager->getNbForChallenge($nextChallenge->getId()); ?> entries
                    </div>
                    <a href="/challenge/<?php echo $nextChallenge->getId(); ?>" class="featured-action-button"><i class="fa fa-arrow-circle-right"></i> View Featured</a>
                </div>
            </div>
        </div>
    </div>
</div>