<div class="featured-container">
    <div class="featured-outer-wrap featured-outer-wrap--challenge" style="background-color:rgb(46,38,38)">
        <div class="featured-inner-wrap">
            <div class="global-image-outer-wrap global-image-outer-wrap--game-large">
                <img src="assets/img/filler460.jpg" />
            </div>
            <div class="featured-summary">
                <div class="featured-heading">
                    <div class="featured-heading-medium"><?php echo $thisChallenge->getTitle(); ?></div>
                    <div class="featured-heading-small">(<?php echo $thisChallenge->getIdPrize(); ?> CP)</div>
                </div>
                <div class="featured-columns">
                    <div class="featured-column"><i style="color:rgb(230,190,190);" class="fa fa-clock-o"></i> <span title="<?php echo $thisChallenge->getDateEnd(); ?>">Ended 4 hours ago</span></div>
                    <div class="featured-column featured-column--width-fill text-right"><span title="<?php echo $thisChallenge->getDateCreation(); ?>">6 hours ago</span> by <a style="color:rgb(230,190,190);" href="/user/<?php echo $thisUser->getUsername(); ?>"><?php echo $thisUser->getUsername(); ?></a></div><a href="/user/<?php echo $thisUser->getUsername(); ?>" class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                        <div class="global-image-inner-wrap" style="background-image:url(assets/img/<?php echo $thisUser->getAvatar(); ?>);"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>