<?php
$current_user = wp_get_current_user();
?>

<div class="vod-user-area">
    <div class="vod-dashboard">
        <div class="vod-dashboard-header">
            <h2><?php printf(esc_html__('Welcome, %s!', 'vod-fest-user'), $current_user->first_name ?: $current_user->display_name); ?></h2>
            <a href="<?php echo wp_logout_url(home_url()); ?>" class="vod-btn vod-btn-secondary"><?php esc_html_e('Logout', 'vod-fest-user'); ?></a>
        </div>

        <div class="vod-dashboard-nav">
            <a href="<?php echo home_url('/dashboard/'); ?>" class="vod-nav-item active">
                <?php esc_html_e('Dashboard', 'vod-fest-user'); ?>
            </a>
            <a href="<?php echo home_url('/profile/'); ?>" class="vod-nav-item">
                <?php esc_html_e('My Profile', 'vod-fest-user'); ?>
            </a>
            <a href="<?php echo home_url('/lineup/'); ?>" class="vod-nav-item">
                <?php esc_html_e('Lineup', 'vod-fest-user'); ?>
            </a>
        </div>

        <div class="vod-dashboard-content">
            <div class="vod-dashboard-widgets">
                <!-- Quick Stats -->
                <div class="vod-widget">
                    <h3><?php esc_html_e('Festival Info', 'vod-fest-user'); ?></h3>
                    <div class="vod-widget-content">
                        <p><strong><?php esc_html_e('Date:', 'vod-fest-user'); ?></strong> July 17-19, 2026</p>
                        <p><strong><?php esc_html_e('Location:', 'vod-fest-user'); ?></strong> Kulturhaus Caserne, Friedrichshafen</p>
                        <p><strong><?php esc_html_e('Artists:', 'vod-fest-user'); ?></strong> 21 Bands</p>
                    </div>
                </div>

                <!-- Account Info -->
                <div class="vod-widget">
                    <h3><?php esc_html_e('Your Account', 'vod-fest-user'); ?></h3>
                    <div class="vod-widget-content">
                        <p><strong><?php esc_html_e('Username:', 'vod-fest-user'); ?></strong> <?php echo esc_html($current_user->user_login); ?></p>
                        <p><strong><?php esc_html_e('Email:', 'vod-fest-user'); ?></strong> <?php echo esc_html($current_user->user_email); ?></p>
                        <p><strong><?php esc_html_e('Member Since:', 'vod-fest-user'); ?></strong> <?php echo date_i18n(get_option('date_format'), strtotime($current_user->user_registered)); ?></p>
                        <a href="<?php echo home_url('/profile/'); ?>" class="vod-btn vod-btn-primary"><?php esc_html_e('Edit Profile', 'vod-fest-user'); ?></a>
                    </div>
                </div>

                <!-- Newsletter Status -->
                <div class="vod-widget">
                    <h3><?php esc_html_e('Newsletter', 'vod-fest-user'); ?></h3>
                    <div class="vod-widget-content">
                        <p><?php esc_html_e('Stay updated with festival news, band announcements, and exclusive content.', 'vod-fest-user'); ?></p>
                        <label style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" checked>
                            <?php esc_html_e('Subscribed to newsletter', 'vod-fest-user'); ?>
                        </label>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="vod-widget">
                    <h3><?php esc_html_e('Quick Links', 'vod-fest-user'); ?></h3>
                    <div class="vod-widget-content vod-link-list">
                        <a href="<?php echo home_url('/lineup/'); ?>">→ <?php esc_html_e('View Full Lineup', 'vod-fest-user'); ?></a>
                        <a href="<?php echo home_url('/timetable/'); ?>">→ <?php esc_html_e('Festival Schedule', 'vod-fest-user'); ?></a>
                        <a href="<?php echo home_url('/venue/'); ?>">→ <?php esc_html_e('Venue Information', 'vod-fest-user'); ?></a>
                        <a href="<?php echo home_url('/tickets/'); ?>">→ <?php esc_html_e('Tickets', 'vod-fest-user'); ?></a>
                        <a href="<?php echo home_url('/contact/'); ?>">→ <?php esc_html_e('Contact Us', 'vod-fest-user'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
