<div class="page-heading">
    <div class="page-heading-breadcrumbs">
        <a href="<?php echo $_LINK_ACCOUNT_; ?>">Account</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo $_LINK_ACCOUNT_ . "/" . $_LINK_INBOX_; ?>">Inbox</a>
    </div>
</div>
<div class="table">
    <?php if (!empty($listMessages)) { ?>
    <div class="table-heading">
        <div class="table-column--width-xsmall text-center"></div>
        <div class="table-column--width-small text-center">User</div>
        <div class="table-column--width-fill text-center">Message</div>
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
                    <div class="table-column--width-fill"><?php echo $listMessages[$i]->getContent                                             (); ?></div>
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
    <form action="" method="post" id="formSend">
        <div class="form-row">
            <div class="form-heading">
                <div class="form-heading-number">1.</div>
                <div class="form-heading-text">Receiver</div>
            </div>
            <div class="form-row-indent">
                <select class="form-input-small" name="inputTo">
                    <?php for ($j = 0; !empty($listUsers[$j]); $j++)  { ?>
                        <option value="<?php echo $listUsers[$j]->getId(); ?>"><?php echo $listUsers[$j]->getUsername(); ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-heading">
                <div class="form-heading-number">2.</div>
                <div class="form-heading-text">Title</div>
            </div>
            <div class="form-row-indent">
                <input class="form-input-medium" name="inputTitle" type="text" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-heading">
                <div class="form-heading-number">3.</div>
                <div class="form-heading-text">Message</div>
            </div>
            <div class="form-row-indent">
                <textarea name="inputMessage"></textarea>
            </div>
            <button type="submit" class="form-submit-button pull-right" name="do-message">
                <i class="fa fa-arrow-circle-right"></i> Send Message
            </button>
        </div>
    </form>
    </div>