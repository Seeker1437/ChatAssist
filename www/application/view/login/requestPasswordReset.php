<div class="container">
    <?php $this->renderFeedbackMessages(); ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Request Password Reset</h1>
            <form method="post" action="<?php echo Config::get('URL'); ?>login/requestPasswordReset_action">
                <div class="form-group">
                    <label for="user_name_or_email">Username or Email</label>
                    <input type="text" tabindex="1" autofocus class="form-control" id="user_name_or_email" name="user_name_or_email" placeholder="Username or Email" required value="">
                </div>
                <div class="form-group" style="text-align: center;">
                    <?php $this->generateAndShowCaptcha(); ?>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="register-submit" id="register-submit" tabindex="2" class="form-control btn btn-register" value="Reset Password">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>