<div class="page-heading">
    <div class="page-heading-breadcrumbs">
        <a href="<?php echo $_LINK_USER_ . '/' . $thisUser->getUsername(); ?>"><?php echo $thisUser->getUsername(); ?></a>
        <i class="fa fa-angle-right"></i>
        <?php echo getPageHeading($tabPanel); ?>
    </div>
</div>
<div>
<?php if ($tabPanel != "Comments") {
    for ($i = 0; $i != $_LIST_NB && !empty($listChallenge[$i]); $i++) {
        $user = $UserManager->get($listChallenge[$i]->getIdCreator()); ?>
        <div class="challenge-row-outer-wrap">
            <div class="challenge-row-inner-wrap">
                <div class="challenge-summary">
                    <h2 class="challenge-heading">
                        <a class="challenge-heading-name"
                           href="<?php echo $_LINK_CHALLENGE_ . "/challenge-".$listChallenge[$i]->getId(); ?>">
                            <?php echo $listChallenge[$i]->getTitle(); ?></a>
                        <?php if ($listChallenge[$i]->getIsAdvanced()) { ?>
                            <span class="challenge-heading-thin">(8 CP)</span>
                        <?php } ?>
                        <?php /* <a class="challenge-icon" rel="nofollow" target="_blank" href="http://store.steampowered.com/app/246360/"><i class="fa fa-steam"></i></a> */?>
                    </h2>

                    <div class="challenge-columns">
                        <?php if ($listChallenge[$i]->getStatus() == 2) { ?>
                            <div class="challenge-column--positive" title="Ended">
                              <i class="fa fa-check-circle"></i> 
                              <a href="<?php echo $_LINK_USER_ . '/' . $thisUser->getUsername(); ?>">
                                <?php echo $user->getUsername(); ?>
                              </a>
                            </div>
                        <?php } else { ?>
                          <div>
                            <i class="fa fa-clock-o"></i> 
                            <span title="Ending <?php echo date("j F H:i", strtotime($listChallenge[$i]->getDateEnd())); ?>">
                              <?php echo date("j F H:i", strtotime($listChallenge[$i]->getDateEnd())); ?>
                              </span>
                          </div>
                        <?php } ?>
                        <div class="challenge-column--invite-only">
                          <span title="<?php echo getChallengeType($listChallenge[$i]->getType(), false); ?> Challenge">
                            <?php echo getChallengeType($listChallenge[$i]->getType(), true); ?> Challenge
                          </span>
                        </div>
                        <div class="challenge-column--width-fill text-right">
                          <span title="Created <?php echo date("j F Y", strtotime($listChallenge[$i]->getDateCreation())); ?>">
                            <?php echo date("j F Y", strtotime($listChallenge[$i]->getDateCreation())); ?>
                          </span>
                        </div>
                    </div>
                    <div class="challenge-links">
                        <a href="<?php echo $_LINK_CHALLENGE_ . "/challenge-".$listChallenge[$i]->getId()."/entries"; ?>">
                          <i class="fa fa-tag"></i>
                          <span>
                            <?php echo $EntryManager->getNbForChallenge($listChallenge[$i]->getId()); ?> entries
                          </span>
                        </a>
                        <a href="<?php echo $_LINK_CHALLENGE_ . "/challenge-".$listChallenge[$i]->getId()."/comments"; ?>"><i
                                class="fa fa-comment"></i>
                            <span><?php echo $CommentManager->getNbForChallenge($listChallenge[$i]->getId()); ?>
                                comments</span></a>
                        <a href="<?php echo $_LINK_CHALLENGE_ . "/challenge-".$listChallenge[$i]->getId()."/rankings"; ?>"><i
                                class="fa fa-trophy"></i> <span>rankings</span></a>
                    </div>
                </div>
                <a class="global-image-outer-wrap global-image-outer-wrap--game-medium"
                   href="<?php echo $_LINK_CHALLENGE_ . "/challenge-".$listChallenge[$i]->getId(); ?>">
                    <div class="global-image-inner-wrap" style="background-image:url(/assets/img/filler500.jpg);"></div>
                </a>
            </div>
        </div>
    <?php }
} else { ?>
<div class="table">
<div class="table-heading">
    <div class="table-column--width-fill">Challenge</div>
    <div class="table-column--width-small text-center">Date</div>
</div>
<div class="table-rows">
<?php for ($i = 0; !empty($listComments[$i]); $i++) {
    $challenge = $ChallengeManager->get($listComments[$i]->getIdChallenge());?>
    <div class="table-row-outer-wrap">
        <div class="table-row-inner-wrap">
            <div>
                <a class="global-image-outer-wrap global-image-outer-wrap--game-small" href="<?php echo $_LINK_CHALLENGE_ . "/challenge-".$listComments[$i]->getIdChallenge(); ?>">
                    <div class="global-image-inner-wrap" style="background-image:url(/assets/img/filler500.jpg);"></div>
                  </a>
                </div>
            <div class="table-column--width-fill">
              <a href="<?php echo $_LINK_CHALLENGE_ . "/challenge-".$listComments[$i]->getIdChallenge(); ?>" class="table-column-heading">
                <?php echo $challenge->getTitle(); ?>
              </a>
            </div>
            <div class="table-column--width-small text-center">
              <span title="<?php echo $listComments[$i]->getDatePost(); ?>">
                <?php echo date("d F H:i", strtotime($listComments[$i]->getDatePost())); ?>
                </span>
                </div>
        </div>
    </div>
<?php } ?>
</div>
</div>
<?php } ?>
</div>
<div class="pagination">
    <?php if ($i) { ?>
        <div class="pagination-results">Displaying <strong>1</strong> to <strong><?php echo $i; ?></strong> of <strong><?php echo getResults($tabPanel); ?></strong> results</div>
    <?php } else { ?>
        <div class="pagination-results">No results</div>
    <?php } ?>
</div>
