<div class="widget-container">
<div>
    <div class="page-heading">
        <div class="page-heading-breadcrumbs">Login</div>
    </div>
    <?php if (isset($_isLoginError)) { ?>
        <br />
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error :</strong> <?php echo $_loginError->getMessage(); ?>
        </div>
    <?php } ?>
    <form method="post" action="" id="form-login">
        <div class="form-rows">
            <div class="form-row">
                <div class="form-heading">
                    <div class="form-heading-text">Username</div>
                </div>
                <div class="form-row-indent">
                    <input class="is-helper" name="login-username" type="text" placeholder="Username">
                </div>
            </div>
            <div class="form-row">
                <div class="form-heading">
                    <div class="form-heading-text">Password</div>
                </div>
                <div class="form-row-indent">
                    <input class="is-helper" name="login-password" type="password" placeholder="Password">
                </div>
            </div>
            <button type="submit" class="form-submit-button pull-right" name="do-login">
                <i class="fa fa-arrow-circle-right"></i> Login
            </button>
        </div>
    </form>
</div>
<div>
    <div class="page-heading">
        <div class="page-heading-breadcrumbs">Register</div>
    </div>
    <?php if (isset($_isRegisterError)) { ?>
        <br />
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error :</strong> <?php echo $_registerError->getMessage(); ?>
        </div>
    <?php } ?>
    <form method="post" id="form-register">
        <div class="form-rows">
            <div class="form-row">
                <div class="form-heading">
                    <div class="form-heading-text">Username</div>
                </div>
                <div class="form-row-indent">
                    <input class="is-helper" name="register-username" type="text" placeholder="Username" required>
                    <div class="form-input-description form-input-description--no-level is-hidden">Maximum 20 characters.</div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-heading">
                    <div class="form-heading-text">Email Address</div>
                </div>
                <div class="form-row-indent">
                    <input class="is-helper" name="register-mail" type="text" placeholder="Email Address" required>
                    <div class="form-input-description form-input-description--no-level is-hidden">Must be a valid address.</div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-heading">
                    <div class="form-heading-text">Password</div>
                </div>
                <div class="form-row-indent">
                    <input class="" id="register-password" name="register-password" type="password" placeholder="Password" required>
                    <div class="form-input-description form-input-description--no-level is-hidden">Minimum 6 characters, only alphanumeric (a-z, A-Z,0-9).</div>
                </div>
                <div class="form-row-indent">
                    <input class="is-helper" id="register-password-check" name="register-password-check" type="password" placeholder="Enter your password again" required>
                    <div class="form-input-description form-input-description--no-level is-hidden">Verify your password</div>
                </div>
            </div>
            <button type="submit" class="form-submit-button pull-right" name="do-register">
                <i class="fa fa-arrow-circle-right"></i> Register
            </button>
        </div>
    </form>
</div>
</div>