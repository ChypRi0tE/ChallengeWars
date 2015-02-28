<div class="featured-container">
    <div class="featured-outer-wrap featured-outer-wrap--home" style="background-color: rgb(46,35,9);">
        <div class="featured-inner-wrap">
            <a href="<?php echo $_LINK_CHALLENGE_ . "/challenge-" . $nextChallenge->getId(); ?>" class="global-image-outer-wrap global-image-outer-wrap--game-xlarge"><img src="<?php echo $_SITE_INDEX_; ?>assets/img/filler460.jpg" /></a>
            <div class="featured-summary">
                <?php   if(isLogged()) { ?>
                <div class="featured-heading">
                    <div class="featured-heading-small">Welcome back, </div>
                    <div class="featured-heading-medium"><?php echo $_SESSION['currentUser']->getUsername(); ?></div>
                </div>
                <?php } else { ?>
                    <div class="featured-heading">
                        <div class="featured-heading-small">Welcome to </div>
                        <div class="featured-heading-large">Challenge Wars</div>
                    </div>
                <?php } ?>
                <div class="featured-columns">
                    <a class="global-image-outer-wrap global-image-outer-wrap--avatar-small" href="<?php echo $_LINK_USER_ . "/" . $nextUser->getUsername(); ?>">
                        <div class="global-image-inner-wrap" style="background-image:url(<?php echo $_SITE_INDEX_; ?>assets/img/<?php echo $nextUser->getAvatar(); ?>);"></div>
                    </a>
                    <div class="featured-column">
                        <i style="color: rgb(230,205,149);" class="fa fa-clock-o"></i> 
                        <span title="Ending <?php echo date("j F H:i", strtotime($nextChallenge->getDateEnd())); ?>">
                        <?php echo date("j F H:i", strtotime($nextChallenge->getDateEnd())); ?>
                        </span>
                    </div>
                    <div class="featured-column featured-column--width-fill"><?php echo $nextChallenge->getTitle(); ?></div>
                    <div class="featured-column">
                        <i style="color: rgb(230,205,149);" class="fa fa-tag"></i> <?php echo $EntryManager->getNbForChallenge($nextChallenge->getId()); ?> entries
                    </div>
                    <a href="<?php echo $_LINK_CHALLENGE_ . "/challenge-" . $nextChallenge->getId(); ?>" class="featured-action-button"><i class="fa fa-arrow-circle-right"></i> View Featured</a>
                </div>
            </div>
        </div>
    </div>
</div>