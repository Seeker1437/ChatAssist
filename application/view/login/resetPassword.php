<div class="container">
    <?php $this->renderFeedbackMessages(); ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Reset Password</h1>
            <form method="post" action="<?php echo Config::get('URL'); ?>login/setNewPassword_action" name="new_password_form">
                <input type='hidden' name='user_name' value='<?php echo $this->user_name; ?>' />
                <input type='hidden' name='user_password_reset_hash' value='<?php echo $this->user_password_reset_hash; ?>' />
                <div class="form-group">
                    <label for="user_password_new">New password</label>
                    <input class="form-control" id="user_password_new" type="password" name="user_password_new" pattern=".{6,}" tabindex="1" autofocus required autocomplete="off" />
                </div>
                <div class="form-group">
                    <label for="user_password_repeat">Repeat new password</label>
                    <input class="form-control" id="user_password_repeat" type="password" name="user_password_repeat" pattern=".{6,}" required tabindex="2" autocomplete="off" />
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                            <input type="submit" tabindex="3" class="form-control btn btn-login" value="Change Password">
                        </div>
                        <div class="col-xs-6">
                            <a href="<?php echo Config::get('URL'); ?>login" tabindex="5" class="form-control btn btn-register" role="button">Back to Login</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>