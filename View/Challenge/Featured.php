<div class="featured-container">
    <div class="featured-outer-wrap featured-outer-wrap--challenge" style="background-color:rgb(46,38,38)">
        <div class="featured-inner-wrap">
            <div class="global-image-outer-wrap global-image-outer-wrap--game-large">
                <img src="<?php echo getChampionSplash($thisChallenge->getChampion()); ?>" />
            </div>
            <div class="featured-summary">
                <div class="featured-heading">
                    <div class="featured-heading-medium"><?php echo $thisChallenge->getTitle(); ?></div>
                    <?php if ($thisChallenge->getIsAdvanced()) {?>
                    <div class="featured-heading-small">(<?php echo $thisChallenge->getCost(); ?> CP)</div>
                    <?php } ?>
                </div>
                <div class="featured-columns">
                    <div class="featured-column">
                      <?php if ($thisChallenge->getStatus() == 1) { ?>
                      <i style="color:rgb(230,190,190);" class="fa fa-clock-o"></i> 
                        <span title="Ending <?php echo date("j F H:i", strtotime($thisChallenge->getDateEnd())); ?>">
                        <?php echo date("j F H:i", strtotime($thisChallenge->getDateEnd())); ?>
                        </span>
                        <?php } else if ($thisChallenge->getStatus() == 2) { ?>
                            <div class="challenge-column--positive" title="Ended">
                              <i class="fa fa-check-circle"></i> 
                              <a href="<?php echo $_LINK_USER_ . '/' . $thisUser->getUsername(); ?>">
                                <?php echo $thisUser->getUsername(); ?>
                              </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="featured-column featured-column--width-fill text-right">
                      <span title="Created <?php echo date("j F Y", strtotime($thisChallenge->getDateCreation())); ?>">
                        <?php echo date("j F Y", strtotime($thisChallenge->getDateCreation())); ?>
                      </span>
                      by <a style="color:rgb(230,190,190);" href="<?php echo $_LINK_USER_ . '/' . $thisUser->getUsername(); ?>">
                        <?php echo $thisUser->getUsername(); ?>
                        </a>
                    </div>
                    <a href="<?php echo $_LINK_USER_ . '/' . $thisUser->getUsername(); ?>" class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                        <div class="global-image-inner-wrap" style="background-image:url(<?php echo $thisUser->displayAvatar(); ?>);"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>