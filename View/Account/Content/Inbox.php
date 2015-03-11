<div class="page-heading">
    <div class="page-heading-breadcrumbs">
        <a href="<?php echo $_LINK_ACCOUNT_; ?>">Account</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo $_LINK_ACCOUNT_ . "/" . $_LINK_INBOX_; ?>">Inbox</a>
    </div>
</div>
<div class="table">
    <?php if (!empty($listMessage)) { ?>
    <div class="table-heading">
        <div class="table-column--width-xsmall text-center"></div>
        <div class="table-column--width-small text-center">User</div>
        <div class="table-column--width-fill text-center">Title</div>
        <div class="table-column--width-small text-center">Date</div>
    </div>
    <?php } else { ?>
    <div class="table-rows">
        <div class="table-row-outer-wrap">
            <div class="table-row-inner-wrap"><br />
                Sorry, looks like there are no messages for you !
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="table-rows">
        <?php for ($i = 0; !empty($listMessages[$i]); $i++) {
        $user = $UserManager->get($listMessages[$i]->getIdAuthor());?>
            <div class="table-row-outer-wrap">
                <div class="table-row-inner-wrap">
                    <div class="table-column--width-xsmall text-center"><i class="fa fa-envelope"></i></div>
                    <div class="text-center">
                        <a class="global-image-outer-wrap global-image-outer-wrap--avatar-small" href="<?php echo $_LINK_USER_ . '/' . $user->getUsername(); ?>">
                            <div class="global-image-inner-wrap" style="background-image:url(<?php echo $user->displayAvatar(); ?>);"></div></a></div>
                    <div class="table-column--width-small">
                        <a href="<?php echo $_LINK_USER_ . '/' . $user->getUsername(); ?>" class="table-column-heading"><?php echo $user->getUsername(); ?></a></div>
                    <div class="table-column--width-fill"><?php echo $listMessages[$i]->getTitle(); ?></div>
                    <div class="table-column--width-small text-center"><?php echo strftime("%d %B at %H:%M",strtotime($listMessages[$i]->getDate())); ?></div>
                </div>
            </div>
        <?php }?>
    </div>
</div>
<div class="pagination">
    <?php if ($i) { ?>
        <div class="pagination-results">Displaying <strong><?php echo $i; ?></strong> of <strong><?php echo count($listMessages); ?></strong> results</div>
    <?php } else { ?>
        <div class="pagination-results">No results</div>
    <?php } ?>
</div>
<div class="page-heading">
    <div class="page-heading-breadcrumbs">
        <a href="<?php echo $_LINK_ACCOUNT_; ?>">Send a message</a>
    </div>
</div>
<div class="table">
        <div class="form-row">
            <div class="form-heading">
                <div class="form-heading-number">1.</div>
                <div class="form-heading-text">Receiver</div>
            </div>
            <div class="form-row-indent">
                <a href="<?php echo $_LINK_USER_. "/" . $_SESSION['currentUser']->getUsername(); ?>" class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                    <div class="global-image-inner-wrap" style="background-image:url(<?php echo $_SESSION['currentUser']->displayAvatar(); ?>);"></div>
                </a>
                <select class="form-input-small" name="inputMessage">
                    <?php for ($j = 0; !empty($listUsers[$j]); $j++)  { ?>
                        <option value="<?php echo $listUsers[$j]->getId(); ?>"><?php echo $listUsers[$j]->getUsername(); ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-heading">
                <div class="form-heading-number">2.</div>
                <div class="form-heading-text">Champion</div>
            </div>
            <div class="form-row-indent">
                <div class="form-time-container">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="comment-summary">
                <div class="comment-author">
                    <div class="comment-username"><a href="<?php echo $_LINK_USER_. "/" . $_SESSION['currentUser']->getUsername(); ?>"><?php echo $_SESSION['currentUser']->getUsername(); ?></a></div>
                </div>
                <div class="comment-display-state">
                    <div class="comment-description">
                        <form method="post" id="formComment">
                            <input type="hidden" name="challengeComment" />
                            <textarea name="inputComment"></textarea>
                            <div class="align-button-container">
                                <a href="" class="comment-submit-button js-submit-form">Submit Comment</a>
                                <div class="comment-cancel-button js-comment-reply-cancel"><span>Cancel</span></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>