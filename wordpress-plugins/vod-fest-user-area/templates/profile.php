<?php
$current_user = wp_get_current_user();
$country = get_user_meta($current_user->ID, 'country', true);
$phone = get_user_meta($current_user->ID, 'phone', true);
?>

<div class="vod-user-area">
    <div class="vod-dashboard">
        <div class="vod-dashboard-header">
            <h2><?php esc_html_e('My Profile', 'vod-fest-user'); ?></h2>
            <a href="<?php echo home_url('/dashboard/'); ?>" class="vod-btn vod-btn-secondary">← <?php esc_html_e('Back to Dashboard', 'vod-fest-user'); ?></a>
        </div>

        <div class="vod-dashboard-nav">
            <a href="<?php echo home_url('/dashboard/'); ?>" class="vod-nav-item">
                <?php esc_html_e('Dashboard', 'vod-fest-user'); ?>
            </a>
            <a href="<?php echo home_url('/profile/'); ?>" class="vod-nav-item active">
                <?php esc_html_e('My Profile', 'vod-fest-user'); ?>
            </a>
            <a href="<?php echo home_url('/lineup/'); ?>" class="vod-nav-item">
                <?php esc_html_e('Lineup', 'vod-fest-user'); ?>
            </a>
        </div>

        <div class="vod-dashboard-content">
            <div class="vod-profile-form-container">
                <div id="vod-profile-message" class="vod-message" style="display: none;"></div>

                <form id="vod-profile-form" class="vod-form">
                    <h3><?php esc_html_e('Personal Information', 'vod-fest-user'); ?></h3>

                    <div class="vod-form-row">
                        <div class="vod-form-group">
                            <label for="profile_first_name"><?php esc_html_e('First Name', 'vod-fest-user'); ?></label>
                            <input type="text" id="profile_first_name" name="first_name" class="vod-input" value="<?php echo esc_attr($current_user->first_name); ?>" required>
                        </div>

                        <div class="vod-form-group">
                            <label for="profile_last_name"><?php esc_html_e('Last Name', 'vod-fest-user'); ?></label>
                            <input type="text" id="profile_last_name" name="last_name" class="vod-input" value="<?php echo esc_attr($current_user->last_name); ?>" required>
                        </div>
                    </div>

                    <div class="vod-form-group">
                        <label for="profile_email"><?php esc_html_e('Email Address', 'vod-fest-user'); ?></label>
                        <input type="email" id="profile_email" name="email" class="vod-input" value="<?php echo esc_attr($current_user->user_email); ?>" required>
                    </div>

                    <div class="vod-form-group">
                        <label for="profile_country"><?php esc_html_e('Country', 'vod-fest-user'); ?></label>
                        <input type="text" id="profile_country" name="country" class="vod-input" value="<?php echo esc_attr($country); ?>">
                    </div>

                    <div class="vod-form-group">
                        <label for="profile_phone"><?php esc_html_e('Phone (Optional)', 'vod-fest-user'); ?></label>
                        <input type="tel" id="profile_phone" name="phone" class="vod-input" value="<?php echo esc_attr($phone); ?>">
                        <small><?php esc_html_e('For urgent festival communications', 'vod-fest-user'); ?></small>
                    </div>

                    <hr style="margin: var(--space-2xl) 0; border: 0; border-top: 1px solid var(--color-brass);">

                    <h3><?php esc_html_e('Account Details', 'vod-fest-user'); ?></h3>

                    <div class="vod-form-group">
                        <label><?php esc_html_e('Username', 'vod-fest-user'); ?></label>
                        <input type="text" class="vod-input" value="<?php echo esc_attr($current_user->user_login); ?>" disabled>
                        <small><?php esc_html_e('Username cannot be changed', 'vod-fest-user'); ?></small>
                    </div>

                    <div class="vod-form-group">
                        <label><?php esc_html_e('Member Since', 'vod-fest-user'); ?></label>
                        <input type="text" class="vod-input" value="<?php echo date_i18n(get_option('date_format'), strtotime($current_user->user_registered)); ?>" disabled>
                    </div>

                    <button type="submit" class="vod-btn vod-btn-primary">
                        <?php esc_html_e('Update Profile', 'vod-fest-user'); ?>
                    </button>
                </form>

                <div style="margin-top: var(--space-4xl); padding-top: var(--space-2xl); border-top: 1px solid var(--color-brass);">
                    <h3><?php esc_html_e('Change Password', 'vod-fest-user'); ?></h3>
                    <p><?php esc_html_e('To change your password, please use the standard WordPress password reset.', 'vod-fest-user'); ?></p>
                    <a href="<?php echo wp_lostpassword_url(home_url('/profile/')); ?>" class="vod-btn vod-btn-secondary">
                        <?php esc_html_e('Reset Password', 'vod-fest-user'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
