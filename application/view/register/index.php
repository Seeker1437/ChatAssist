<div class="container">
    <?php $this->renderFeedbackMessages(); ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Register Account</h1>
            <form method="post" action="<?php echo Config::get('URL'); ?>register/register_action">
                <div class="form-group">
                    <label for="user_name">Username</label>
                    <input type="text" tabindex="1" autofocus class="form-control" id="user_name" name="user_name" pattern="[a-zA-Z0-9]{2,64}" placeholder="Username" required value="">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="user_email">Email</label>
                            <input type="text" tabindex="2" class="form-control" id="user_email" name="user_email" placeholder="Email" required>
                        </div>
                        <div class="col-xs-6">
                            <label for="user_password_new">Password</label>
                            <input type="password" tabindex="4" class="form-control" id="user_password_new" name="user_password_new" placeholder="Password" pattern=".{6,}" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="user_email_repeat">Repeat Email</label>
                            <input type="text" tabindex="3" class="form-control" id="user_email_repeat" name="user_email_repeat" placeholder="Repeat Email" required>
                        </div>
                        <div class="col-xs-6">
                            <label for="user_password_repeat">Repeat Password</label>
                            <input type="password" tabindex="5" class="form-control" id="user_password_repeat" name="user_password_repeat" placeholder="Repeat Password" pattern=".{6,}" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="form-group" style="text-align: center;">
                    <?php $this->generateAndShowCaptcha(); ?>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="register-submit" id="register-submit" tabindex="6" class="form-control btn btn-register" value="Register Now">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>