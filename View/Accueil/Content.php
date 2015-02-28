<div class="page-heading">
    <div class="page-heading-breadcrumbs"><a href="<?php echo $_SITE_INDEX_; ?>"><?php echo $_LIST_HEADER; ?></a></div>
    <div class="challenge-show" title="Show all"><i class="fa fa-eye"></i></div>
</div>
<div>
<?php for ($i = 0; !empty($listChallenge[$i]); $i++) {
    $user = $UserManager->get($listChallenge[$i]->getIdCreator()); ?>
    <div class="challenge-row-outer-wrap">
        <div class="challenge-row-inner-wrap">
            <div class="challenge-summary">
                <h2 class="challenge-heading">
                    <a class="challenge-heading-name" href="<?php echo $_LINK_CHALLENGE_ . "/challenge-" . $listChallenge[$i]->getId(); ?>"><?php echo $listChallenge[$i]->getTitle(); ?></a>
                    <?php if ($listChallenge[$i]->getIsAdvanced()) { ?>
                    <span class="challenge-heading-thin">(<?php echo $listChallenge[$i]->getCost(); ?> CP)</span>
                    <?php } ?>
                    <i class="challenge-icon challenge-hide fa fa-eye-slash" title="Hide challenge"></i>
                </h2>
                <div class="challenge-columns">
                    <div>
                      <i class="fa fa-clock-o"></i> 
                      <span title="Ending <?php echo date("j F H:i", strtotime($listChallenge[$i]->getDateEnd())); ?>">
                        <em><?php echo date("j F H:i", strtotime($listChallenge[$i]->getDateEnd())); ?></em>
                      </span>
                    </div>
                    <div class="challenge-column--invite-only">
                      <span title="<?php echo getChallengeType($listChallenge[$i]->getType(), false); ?> Challenge">
                        <?php echo getChallengeType($listChallenge[$i]->getType(), true); ?> Challenge
                      </span>
                    </div>
                    <div class="challenge-column--width-fill text-right"> 
                      <span title="Created <?php echo date("j F Y", strtotime($listChallenge[$i]->getDateCreation())); ?>">
                        <?php echo date("j F Y", strtotime($listChallenge[$i]->getDateCreation())); ?>
                      </span> by <a class="challenge-username" href="<?php echo $_LINK_USER_ . "/" . $user->getUsername(); ?>">
                          <?php echo $user->getUsername(); ?>
                        </a>
                    </div>
                    <?php if ($listChallenge[$i]->getIsAdvanced()) { ?>
                    <div class="challenge-column--contributor-level challenge-column--contributor-level--negative" title="Advanced Challenge">Advanced</div>
                    <?php } ?>
                </div>
                <div class="challenge-links">
                    <a href="<?php echo $_LINK_CHALLENGE_ . "/challenge-" . $listChallenge[$i]->getId() . "/" .$_LINK_ENTRIES_; ?>">
                      <i class="fa fa-tag"></i> 
                      <span>
                        <?php echo $EntryManager->getNbForChallenge($listChallenge[$i]->getId()); ?> entries
                      </span>
                    </a>
                    <a href="<?php echo $_LINK_CHALLENGE_ . "/challenge-" . $listChallenge[$i]->getId() . "/" .$_LINK_COMMENT_; ?>">
                      <i class="fa fa-comment"></i> 
                      <span>
                        <?php echo $CommentManager->getNbForChallenge($listChallenge[$i]->getId()); ?> comments
                      </span>
                    </a>
                    <a href="<?php echo $_LINK_CHALLENGE_ . "/challenge-" . $listChallenge[$i]->getId() . "/" .$_LINK_RANKING_; ?>">
                      <i class="fa fa-trophy"></i> 
                      <span>rankings</span>
                    </a>
                </div>
            </div>
            <a href="<?php echo $_LINK_USER_ . "/" . $user->getUsername(); ?>" class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                <div class="global-image-inner-wrap" style="background-image:url(<?php echo $_SITE_INDEX_; ?>assets/img/<?php echo $user->getAvatar(); ?>);"></div>
            </a>
            <a class="global-image-outer-wrap global-image-outer-wrap--game-medium" href="<?php echo $_LINK_CHALLENGE_ . "/challenge-" . $listChallenge[$i]->getId(); ?>">
                <div class="global-image-inner-wrap" style="background-image:url(<?php echo $_SITE_INDEX_; ?>assets/img/filler500.jpg);"></div>
            </a>
        </div>
    </div>
<?php } ?>
</div>
<div class="pagination">
    <div class="pagination-results">Displaying <strong><?php echo $i; ?></strong> results</div>
<?php /*    <div class="pagination-navigation">
        <a data-page-number="1" class="is-selected" href="/giveaways"><span>1</span></a>
        <a data-page-number="2" href="/giveaways/search?page=2"><span>2</span></a>
        <a data-page-number="3" href="/giveaways/search?page=3"><span>3</span></a>
        <a data-page-number="4" href="/giveaways/search?page=4"><span>4</span></a>
        <a data-page-number="5" href="/giveaways/search?page=5"><span>5</span></a> ...
        <a data-page-number="2" href="/giveaways/search?page=2"><span>Next</span> <i class="fa fa-angle-right"></i></a>
        <a data-page-number="41" href="/giveaways/search?page=41"><span>Last</span> <i class="fa fa-angle-double-right"></i></a>
    </div>*/?>
</div>