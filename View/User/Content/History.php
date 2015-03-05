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
        <div class="table-column--width-fill">Champion</div>
        <div class="table-column--width-fill text-center">K/D/A</div>
        <div class="table-column--width-fill text-center">Creeps</div>
        <div class="table-column--width-medium text-center">Ally Team</div>
        <div class="table-column--width-medium text-center">Enemy Team</div>
        <div class="table-column--width-small text-center">Victoire ?</div>
        <div class="table-column--width-small text-center">Date</div>
    </div>
    <div class="table-rows">
        <?php for ($i = 0; !empty($listMatches[$i]); $i++) { ?>
            <div class="table-row-outer-wrap">
                <div class="table-row-inner-wrap">
                    <div class="table-column--width-fill">
                        <div class="global-image-outer-wrap global-image-outer-wrap--avatar-medium" title="<?php echo $api->getStatic('champion', $listMatches[$i]->getChampionId())['name']; ?>">
                        <div class="global-image-inner-wrap" style="background-image:url(<?php echo getChampionPic($listMatches[$i]->getChampionId()); ?>)"></div>
                        </div>
                    </div>
                    <div class="table-column--width-fill text-center">
                        <?php echo $listMatches[$i]->getKills() . "/" . $listMatches[$i]->getAssists() . "/" . $listMatches[$i]->getDeaths(); ?>
                    </div>
                    <div class="table-column--width-fill text-center">
                        <?php echo $listMatches[$i]->getCreeps(); ?>
                    </div>
                    <div class="table-column--width-medium text-center">
                        <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small global-image-outer-wrap--champion">
                            <div class="global-image-inner-wrap" style="background-image:url(<?php echo getChampionPic($listMatches[$i]->getAlly1()); ?>)"></div>
                        </div>
                        <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small global-image-outer-wrap--champion">
                            <div class="global-image-inner-wrap" style="background-image:url(<?php echo getChampionPic($listMatches[$i]->getAlly2()); ?>)"></div>
                        </div>
                        <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small global-image-outer-wrap--champion">
                            <div class="global-image-inner-wrap" style="background-image:url(<?php echo getChampionPic($listMatches[$i]->getAlly3()); ?>)"></div>
                        </div>
                        <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small global-image-outer-wrap--champion">
                            <div class="global-image-inner-wrap" style="background-image:url(<?php echo getChampionPic($listMatches[$i]->getAlly4()); ?>)"></div>
                        </div>
                    </div>
                    <div class="table-column--width-medium text-center">
                        <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small global-image-outer-wrap--champion">
                            <div class="global-image-inner-wrap" style="background-image:url(<?php echo getChampionPic($listMatches[$i]->getEnemy1()); ?>)"></div>
                        </div>
                        <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small global-image-outer-wrap--champion">
                            <div class="global-image-inner-wrap" style="background-image:url(<?php echo getChampionPic($listMatches[$i]->getEnemy2()); ?>)"></div>
                        </div>
                        <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small global-image-outer-wrap--champion">
                            <div class="global-image-inner-wrap" style="background-image:url(<?php echo getChampionPic($listMatches[$i]->getEnemy3()); ?>)"></div>
                        </div>
                        <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small global-image-outer-wrap--champion">
                            <div class="global-image-inner-wrap" style="background-image:url(<?php echo getChampionPic($listMatches[$i]->getEnemy4()); ?>)"></div>
                        </div>
                        <div class="global-image-outer-wrap global-image-outer-wrap--avatar-small global-image-outer-wrap--champion">
                            <div class="global-image-inner-wrap" style="background-image:url(<?php echo getChampionPic($listMatches[$i]->getEnemy5()); ?>)"></div>
                        </div>
                    </div>
                    <div class="table-column--width-small text-center">
                        <?php if ($listMatches[$i]->getVictory()) { ?>
                            <span style="color:green">
                                <i class="fa fa-check-circle" style="font-size:2em"></i>
                            </span>
                        <?php } else { ?>
                            <span style="color:red">
                                <i class="fa fa-times-circle" style="font-size:2em"></i>
                            </span>
                        <?php } ?>
                    </div>
                    <div class="table-column--width-small text-center">
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