<div class="container">
    <?php $this->renderFeedbackMessages(); ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Login</h1>
            <form action="<?php echo Config::get('URL'); ?>login/login" method="post" >
                <div class="form-group">
                    <label for="user_name">Username</label>
                    <input type="text" tabindex="1" autofocus class="form-control" id="user_name" name="user_name" placeholder="Username or Email" required value="">
                </div>
                <div class="form-group">
                    <label for="user_password">Password</label>
                    <input type="password" tabindex="2" class="form-control" id="user_password" name="user_password" placeholder="Password" autocomplete="off" required>
                </div>
                <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" name="set_remember_me_cookie" id="set_remember_me_cookie">
                    <label for="set_remember_me_cookie"> Remember Me</label>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                        </div>
                        <div class="col-xs-6">
                            <a href="<?php echo Config::get('URL'); ?>register" name="register-submit" id="register-submit" tabindex="5" class="form-control btn btn-register" role="button">Register</a>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>" />
                <?php if (!empty($this->redirect)) { ?>
                    <input type="hidden" name="redirect" value="<?php echo $this->encodeHTML($this->redirect); ?>" />
                <?php } ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <a href="<?php echo Config::get('URL'); ?>login/requestPasswordReset" tabindex="6" class="forgot-password">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
