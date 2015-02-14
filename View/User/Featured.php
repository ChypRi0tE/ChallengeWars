<div class="featured-container">
    <div class="featured-outer-wrap featured-outer-wrap--user" style="background-color: rgb(31,37,46);">
        <div class="featured-inner-wrap">
            <div class="global-image-outer-wrap global-image-outer-wrap--avatar-large">
                <div class="global-image-inner-wrap" style="background-image:url(assets/img/<?php echo $thisUser->getAvatar(); ?>);"></div>
            </div>
            <div class="featured-summary">
                <div class="featured-heading">
                    <div class="featured-heading-large"><?php echo $thisUser->getUsername(); ?></div>
                </div>
                <div class="featured-table">
                    <div class="featured-table-column">
                        <div class="featured-table-row">
                            <div class="featured-table-row-left">Role</div>
                            <div class="featured-table-row-right"><a style="color: rgb(156,184,230);" href="/ChallengeWars/about.php?tab=roles"><?php echo getUserRole($thisUser->getRank()); ?></a></div>
                        </div>
                        <div class="featured-table-row">
                            <div class="featured-table-row-left">LoL Username</div>
                            <div class="featured-table-row-right"><span class="featured-online-now">Chypriote</span></div>
                        </div>
                        <div class="featured-table-row">
                            <div class="featured-table-row-left">Registered</div>
                            <div class="featured-table-row-right"><span title="April 3, 2013, 12:16pm">1 year ago</span></div>
                        </div>
                        <div class="featured-table-row">
                            <div class="featured-table-row-left">&nbsp;</div>
                            <div class="featured-table-row-right"></div>
                        </div>
                    </div>
                    <div class="featured-table-column">
                        <div class="featured-table-row">
                            <div class="featured-table-row-left">Challenge Created</div>
                            <div class="featured-table-row-right"><a style="color: rgb(156,184,230);" href="user.php?id=<?php echo $idUser; ?>&tab=created"><?php echo $thisStats->getChallCreated(); ?></a></div>
                        </div>
                        <div class="featured-table-row">
                            <div class="featured-table-row-left">Challenge Entered</div>
                            <div class="featured-table-row-right"><a style="color: rgb(156,184,230);" href="user.php?id=<?php echo $idUser; ?>&tab=entries"><?php echo $thisStats->getChallEntered(); ?></a></div>
                        </div>
                        <div class="featured-table-row">
                            <div class="featured-table-row-left">Challenge Won</div>
                            <div class="featured-table-row-right"><a style="color: rgb(156,184,230);" href="user.php?id=<?php echo $idUser; ?>&tab=won"><?php echo $thisStats->getChallWon(); ?></a> (3%)</div>
                        </div>
                        <div class="featured-table-row">
                            <div class="featured-table-row-left">Comments Posted</div>
                            <div class="featured-table-row-right"><a style="color: rgb(156,184,230);" href="user.php?id=<?php echo $idUser; ?>&tab=comments"><?php echo $thisStats->getCommentPosted(); ?></a></div>
                        </div>
                        <div class="featured-table-row">
                            <div class="featured-table-row-left">&nbsp;</div>
                            <div class="featured-table-row-right"></div>
                        </div>
                        <?php /*<div class="featured-table-row">
                            <div class="featured-table-row-left">User Level</div>
                            <div class="featured-table-row-right">
                                <span title="5800/10000">
                                    <i class="fa fa-circle"></i>
                                    <i class="fa fa-circle"></i>
                                    <i class="fa fa-circle"></i>
                                    <i class="fa fa-circle"></i>
                                    <i class="fa fa-circle"></i>
                                    <i class="fa fa-circle-o"></i>
                                    <i class="fa fa-circle-o"></i>
                                    <i class="fa fa-circle-o"></i>
                                    <i class="fa fa-circle-o"></i>
                                    <i class="fa fa-circle-o"></i>
                                </span>
                                <span title="0 Awaiting Feedback, 0 Not Received"><a style="color: rgb(156,184,230);" href="#"> <i class="fa fa-question" style="font-size: 10px;"></i></a></span>
                            </div>
                        </div>
                        */ ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>