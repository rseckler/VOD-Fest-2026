<div class="vod-user-area">
    <div class="vod-user-form-container">
        <h2 class="vod-form-title"><?php esc_html_e('Login to Your Account', 'vod-fest-user'); ?></h2>

        <div id="vod-login-message" class="vod-message" style="display: none;"></div>

        <form id="vod-login-form" class="vod-form">
            <div class="vod-form-group">
                <label for="login_username"><?php esc_html_e('Username or Email', 'vod-fest-user'); ?></label>
                <input type="text" id="login_username" name="username" class="vod-input" required>
            </div>

            <div class="vod-form-group">
                <label for="login_password"><?php esc_html_e('Password', 'vod-fest-user'); ?></label>
                <input type="password" id="login_password" name="password" class="vod-input" required>
            </div>

            <div class="vod-form-group vod-checkbox-group">
                <label>
                    <input type="checkbox" name="remember" value="1">
                    <?php esc_html_e('Remember Me', 'vod-fest-user'); ?>
                </label>
            </div>

            <button type="submit" class="vod-btn vod-btn-primary">
                <?php esc_html_e('Login', 'vod-fest-user'); ?>
            </button>
        </form>

        <div class="vod-form-footer">
            <p>
                <?php esc_html_e('Don\'t have an account?', 'vod-fest-user'); ?>
                <a href="<?php echo home_url('/register/'); ?>"><?php esc_html_e('Register', 'vod-fest-user'); ?></a>
            </p>
            <p>
                <a href="<?php echo wp_lostpassword_url(); ?>"><?php esc_html_e('Forgot Password?', 'vod-fest-user'); ?></a>
            </p>
        </div>
    </div>
</div>
