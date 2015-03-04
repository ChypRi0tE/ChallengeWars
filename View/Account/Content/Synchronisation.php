<div class="page-heading">
    <div class="page-heading-breadcrumbs">
        <a href="<?php echo $_LINK_ACCOUNT_; ?>">Account</a>
        <i class="fa fa-angle-right"></i>
        <a href="<?php echo $_LINK_ACCOUNT_ . "/" . $_LINK_SYNC_; ?>">Sync</a>
    </div>
</div>
<?php if ($_SESSION['currentUser']->getIsValidated()) { ?>
<form id="formSync" method="post" action="">
    <input type="hidden" name="sync" />
<div class="form-rows">
    <div class="form-row">
        <div class="form-heading">
            <div class="form-heading-number">1.</div>
            <div class="form-heading-text">Sync Account with League of Legends</div>
        </div>
        <div class="form-row-indent">
            <div class="form-sync">
                <div class="form-sync-data">
                    <div class="notification notification--success">
                        <i class="fa fa-check-circle"></i> Last synchronisation: <?php echo date("d F, H:i", strtotime($_SESSION['currentSummoner']->getLastSync())); ?>.
                    </div>
                </div>
                <div class="form-sync-default" id="submit-form-sync" >
                    <i class="fa fa-refresh"></i> Sync Account
                </div>
            </div>
            <div class="form-input-description">League of Legends datas are automatically synchronised every day. Your Summoner Name, Summoner Icon and match history are recorded. However, you can manually force a synchronisation by clicking the button on the right.</div>
        </div>
    </div>
</div>
</form>
<?php } else { ?>
<form id="formVerify" method="post" action="">
    <input type="hidden" name="inputCode" value="<?php echo $verifyCode; ?>" />
    <input type="hidden" name="verify" />
    <div class="form-rows">
        <div class="form-row">
            <div class="form-heading">
                <div class="form-heading-number">1.</div>
                <div class="form-heading-text">Link your League of Legends Account</div>
            </div>
            <div class="form-row-indent">
                <div class="form-sync">
                    <p>In order to verify your summoner name on the EUW server, follow these steps:</p><br /><br />
                </div>
                <div class="markdown">
                    <ol>
                        <li>Open your League of Legends client.</li>
                        <li>Rename one of your <strong>rune</strong> pages to <em><?php echo $verifyCode; ?></em>. Make sure to save the changes.</li>
                        <li>Enter your summoner name below.</li>
                        <li>Click the "Link Account" button</li>
                    </ol>
                </div><br />
                <div class="form-sync">
                    <input class="form-input-small" type="text" name="inputAccount" value="<?php if (isset($_POST['inputAccount'])) {echo $_POST['inputAccount']; } ?>" />
                    <div class="form-sync-default" id="submit-form-verify" style="width:15%">
                        <i class="fa fa-link"></i> Link Account
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php } ?>
<div class="page-heading">
    <div class="page-heading-breadcrumbs">
        <a href="<?php echo $_LINK_ACCOUNT_ . "/" . $_LINK_SYNC_; ?>">Settings</a>
    </div>
</div>
<form method="post">
    <div class="form-rows">
        <div class="form-row">
            <div class="form-heading">
                <div class="form-heading-number">1.</div>
                <div class="form-heading-text">E-mail Address</div>
            </div>
            <div class="form-row-indent">
                <input class="form-input-small" type="text" name="email" value="<?php echo $_SESSION['currentUser']->getMail(); ?>" />
                <div class="form-input-description">Please enter a valid e-mail address.</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-heading">
                <div class="form-heading-number">2.</div>
                <div class="form-heading-text">Username</div>
            </div>
            <div class="form-row-indent">
                <input maxlength="20" class="form-input-small is-disabled" type="text" name="username" value="<?php echo $_SESSION['currentUser']->getUsername(); ?>" />
            </div>
        </div>
        <div class="form-row">
            <div class="form-heading">
                <div class="form-heading-number">3.</div>
                <div class="form-heading-text">Password</div>
            </div>
            <div class="form-row-indent">
                <input class="form-input-small" id="register-password" name="register-password" type="password" placeholder="Password" required>
                <div class="form-input-description form-input-description--no-level is-hidden">Minimum 6 characters, only alphanumeric (a-z, A-Z,0-9).</div>
            </div>
            <div class="form-row-indent">
                <input class="form-input-small" id="register-password-check" name="register-password-check" type="password" placeholder="Enter your password again" required>
                <div class="form-input-description form-input-description--no-level is-hidden">Verify your password</div>
            </div>
        </div>
        <div class="form-submit-button js-submit-form">
            <i class="fa fa-arrow-circle-right"></i> Save Changes
        </div>
    </div>
</form>