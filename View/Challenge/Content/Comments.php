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
        <a href="/challenge.php?id=<?php echo $thisChallenge->getId(); ?>"><?php //echo $CommentManager->getNbForChallenge($thisChallenge->getId())[0]; ?> Comments</a>
    </div>
</div>
<div class="comments">
<?php for ($i = 0; $i != $_LIST_NB && !empty($listComments[$i]); $i++) {
    $user = $UserManager->get($listComments[$i]->getIdUser()); ?>
    <div data-comment-id="<?php echo $listComments[$i]->getId(); ?>" class="comment">
        <div class="ajax comment-parent">
            <a href="user.php?id=<?php echo $user->getId(); ?>" class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
                <div class="global-image-inner-wrap" style="background-image:url(assets/img/<?php echo $user->getAvatar(); ?>);"></div>
            </a>
            <div id="Et6g9M6" class="comment-summary">
                <div class="comment-author">
                    <i class="comment-collapse-button fa fa-minus-square-o"></i><i class="comment-expand-button fa fa-plus-square-o"></i>
                    <div class="comment-username"><a href="user.php?id=<?php echo $user->getId(); ?>"><?php echo $user->getUsername(); ?></a></div>
                </div>
                <div class="comment-display-state">
                    <div class="comment-description markdown markdown--resize-body"><p><?php echo $listComments[$i]->getContent(); ?></p></div>
                </div>
                <div class="comment-actions">
                    <div><span title="<?php echo $listComments[$i]->getDatePost(); ?>">5 hours ago</span></div>
                    <?php // <div class="comment-actions-button js-comment-reply">Reply</div> ?>
                    <a href="/go/comment/<?php echo $listComments[$i]->getId(); ?>" class="comment-actions-button">Permalink</a>
                    <div class="comment-collapse-state">
                        <div class="comment-description markdown markdown--resize-body"><p>Comment has been collapsed</p></div>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>
<div class="pagination">
    <?php if ($i) { ?>
    <div class="pagination-results">Displaying <strong>1</strong> to <strong></strong> of <strong>11</strong> results</div>
    <?php } else { ?>
    <div class="pagination-results">No results</div>
<?php } ?>
</div>
<?php if (isLogged()) { ?>
<div class="comment comment--submit">
    <div class="comment-parent">
        <a href="user.php?id=<?php echo $_SESSION['currentUser']->getId(); ?>" class="global-image-outer-wrap global-image-outer-wrap--avatar-small">
            <div class="global-image-inner-wrap" style="background-image:url(assets/img/<?php echo $_SESSION['currentUser']->getAvatar(); ?>);"></div>
        </a>
        <div class="comment-summary">
            <div class="comment-author">
                <div class="comment-username"><a href="user.php?id=<?php echo $_SESSION['currentUser']->getId(); ?>"><?php echo $_SESSION['currentUser']->getUsername(); ?></a></div>
            </div>
            <div class="comment-display-state">
                <div class="comment-description">
                    <form method="post">
                        <input type="hidden" name="do" value="comment_new" />
                        <input type="hidden" name="xsrf_token" value="6f188e293c737648170b50135684323e" />
                        <input type="hidden" name="parent_id" value="" />
                        <textarea name="description"></textarea>
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