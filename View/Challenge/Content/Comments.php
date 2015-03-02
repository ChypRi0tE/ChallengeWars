<div class="page-heading">
    <div class="page-heading-breadcrumbs">Description</div>
</div>
<div class="page-description">
    <div class="page-description-display-state">
        <div class="markdown markdown--resize-body"><p><?php echo $thisChallenge->getDescription(); ?></p></div>
    </div>
</div>
<div class="page-heading">
    <div class="page-heading-breadcrumbs">
        <a href="<?php echo $_LINK_CHALLENGE_ . "/challenge-" . $thisChallenge->getId(). "/".$_LINK_COMMENT_; ?>"><?php echo $CommentManager->getNbForChallenge($thisChallenge->getId())[0]; ?> Comments</a>
    </div>
</div>
<div class="comments">
<?php for ($i = 0; $i != $_LIST_NB && !empty($listComments[$i]); $i++) {
    $user = $UserManager->get($listComments[$i]->getIdUser()); ?>
    <div data-comment-id="<?php echo $listComments[$i]->getId(); ?>" class="comment">
        <div class="ajax comment-parent">
            <a href="<?php echo $_LINK_USER_. "/" . $user->getUsername(); ?>" class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                <div class="global-image-inner-wrap" style="background-image:url(<?php echo $user->displayAvatar(); ?>);"></div>
            </a>
            <div class="comment-summary">
                <div class="comment-author">
                    <i class="comment-collapse-button fa fa-minus-square-o"></i>
                    <div class="comment-username"><a href="<?php echo $_LINK_USER_. "/" . $user->getUsername(); ?>"><?php echo $user->getUsername(); ?></a></div>
                </div>
                <div class="comment-display-state">
                    <div class="comment-description markdown markdown--resize-body"><p><?php echo $listComments[$i]->getContent(); ?></p></div>
                </div>
                <div class="comment-actions">
                    <div><?php echo "Posted ".strftime("%d %B at %H:%M",strtotime($listComments[$i]->getDatePost())); ?></div>
                    <div class="comment-collapse-state">
                    <div class="comment-description markdown markdown--resize-body"><p>Comment has been collapsed</p></div>
                </div>
                </div>
            </div>
            <div class="comment-summed is-hidden">
                <div class="comment-author">
                    <i class="comment-expand-button fa fa-plus-square-o"></i>
                    <div class="comment-username"><a href="<?php echo $_LINK_USER_. "/" . $user->getUsername(); ?>"><?php echo $user->getUsername(); ?></a></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>
<div class="pagination">
    <?php if ($i) { ?>
    <div class="pagination-results">Displaying <strong><?php echo $i; ?></strong> of <strong><?php echo $CommentManager->getNbForChallenge($thisChallenge->getId())[0]; ?></strong> results</div>
    <?php } else { ?>
    <div class="pagination-results">No results</div>
<?php } ?>
</div>
<?php if (isLogged()) { ?>
<div class="comment comment--submit">
    <div class="comment-parent">
        <a href="<?php echo $_LINK_USER_. "/" . $_SESSION['currentUser']->getUsername(); ?>" class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
            <div class="global-image-inner-wrap" style="background-image:url(/assets/img/<?php echo $_SESSION['currentUser']->getAvatar(); ?>);"></div>
        </a>
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
<?php } ?>