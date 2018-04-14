<div
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <div class="box">
        <h2>Set new password</h2>

        <!-- new password form box -->
        <form method="post" action="<?php echo Config::get('URL'); ?>user/changePassword_action" name="new_password_form">
            <label for="change_input_password_current">Enter Current Password:</label>
            <p><input id="change_input_password_current" type='password'
                      name='user_password_current' pattern=".{6,}" required autocomplete="off"  /></p>
            <label for="change_input_password_new">New password (min. 6 characters)</label>
            <p><input id="change_input_password_new" type="password"
                      name="user_password_new" pattern=".{6,}" required autocomplete="off" /></p>
            <label for="change_input_password_repeat">Repeat new password</label>
            <p><input id="change_input_password_repeat" type="password"
                      name="user_password_repeat" pattern=".{6,}" required autocomplete="off" /></p>
            <input type="submit"  name="submit_new_password" value="Submit new password" />
        </form>

    </div>
</div>