<div class="page-heading">
    <div class="page-heading-breadcrumbs">
        <a href="<?php echo $_LINK_USER_ . '/' . $thisUser->getUsername(); ?>"><?php echo $thisUser->getUsername(); ?></a>
        <i class="fa fa-angle-right"></i>
        <?php echo getPageHeading($tabPanel); ?>
    </div>
</div>
<div>
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
</div>
<div class="pagination">
    <?php if ($i) { ?>
        <div class="pagination-results">Displaying <strong>1</strong> to <strong><?php echo $i; ?></strong> of <strong><?php echo getResults($tabPanel); ?></strong> results</div>
    <?php } else { ?>
        <div class="pagination-results">No results</div>
    <?php } ?>
</div>