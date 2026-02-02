<div class="vod-user-area">
    <div class="vod-user-form-container">
        <h2 class="vod-form-title"><?php esc_html_e('Create Your Account', 'vod-fest-user'); ?></h2>

        <div id="vod-register-message" class="vod-message" style="display: none;"></div>

        <form id="vod-register-form" class="vod-form">
            <div class="vod-form-row">
                <div class="vod-form-group">
                    <label for="register_first_name"><?php esc_html_e('First Name', 'vod-fest-user'); ?> *</label>
                    <input type="text" id="register_first_name" name="first_name" class="vod-input" required>
                </div>

                <div class="vod-form-group">
                    <label for="register_last_name"><?php esc_html_e('Last Name', 'vod-fest-user'); ?> *</label>
                    <input type="text" id="register_last_name" name="last_name" class="vod-input" required>
                </div>
            </div>

            <div class="vod-form-group">
                <label for="register_username"><?php esc_html_e('Username', 'vod-fest-user'); ?> *</label>
                <input type="text" id="register_username" name="username" class="vod-input" required>
            </div>

            <div class="vod-form-group">
                <label for="register_email"><?php esc_html_e('Email Address', 'vod-fest-user'); ?> *</label>
                <input type="email" id="register_email" name="email" class="vod-input" required>
            </div>

            <div class="vod-form-group">
                <label for="register_password"><?php esc_html_e('Password', 'vod-fest-user'); ?> *</label>
                <input type="password" id="register_password" name="password" class="vod-input" minlength="8" required>
                <small><?php esc_html_e('Minimum 8 characters', 'vod-fest-user'); ?></small>
            </div>

            <div class="vod-form-group vod-checkbox-group">
                <label>
                    <input type="checkbox" name="terms" required>
                    <?php printf(
                        esc_html__('I agree to the %sTerms & Conditions%s', 'vod-fest-user'),
                        '<a href="' . home_url('/terms-conditions/') . '" target="_blank">',
                        '</a>'
                    ); ?>
                </label>
            </div>

            <button type="submit" class="vod-btn vod-btn-primary">
                <?php esc_html_e('Create Account', 'vod-fest-user'); ?>
            </button>
        </form>

        <div class="vod-form-footer">
            <p>
                <?php esc_html_e('Already have an account?', 'vod-fest-user'); ?>
                <a href="<?php echo home_url('/login/'); ?>"><?php esc_html_e('Login', 'vod-fest-user'); ?></a>
            </p>
        </div>
    </div>
</div>
