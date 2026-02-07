<?php
/**
 * Cookie Consent Banner Template
 *
 * @package VOD_Fest_2026
 * @since 1.0.1
 */

if (!defined('ABSPATH')) {
    exit;
}

$privacy_url = home_url('/datenschutzerklaerung/');
?>

<!-- Cookie Consent Banner -->
<div id="cookie-consent-banner" class="cookie-banner" role="dialog" aria-label="<?php esc_attr_e('Cookie consent', 'vod-fest'); ?>" hidden>
    <div class="cookie-banner__inner">
        <div class="cookie-banner__text">
            <h2 class="cookie-banner__title"><?php esc_html_e('We value your privacy', 'vod-fest'); ?></h2>
            <p class="cookie-banner__description">
                <?php
                printf(
                    /* translators: %s: link to privacy policy */
                    esc_html__('We use cookies to ensure the website functions correctly and to improve your experience. You can manage your preferences at any time. Read our %s for more details.', 'vod-fest'),
                    '<a href="' . esc_url($privacy_url) . '">' . esc_html__('Privacy Policy', 'vod-fest') . '</a>'
                );
                ?>
            </p>
        </div>
        <div class="cookie-banner__actions">
            <button type="button" class="btn btn-primary" data-cookie-action="accept-all">
                <?php esc_html_e('Accept All', 'vod-fest'); ?>
            </button>
            <button type="button" class="btn btn-secondary" data-cookie-action="settings">
                <?php esc_html_e('Cookie Settings', 'vod-fest'); ?>
            </button>
            <button type="button" class="btn btn-secondary" data-cookie-action="decline-all">
                <?php esc_html_e('Decline All', 'vod-fest'); ?>
            </button>
        </div>
    </div>
</div>

<!-- Cookie Settings Overlay -->
<div id="cookie-settings-overlay" class="cookie-settings-overlay" role="dialog" aria-label="<?php esc_attr_e('Cookie settings', 'vod-fest'); ?>" hidden>
    <div class="cookie-settings">
        <div class="cookie-settings__header">
            <h2 class="cookie-settings__title"><?php esc_html_e('Cookie Settings', 'vod-fest'); ?></h2>
            <button type="button" class="cookie-settings__close" data-cookie-action="close-settings" aria-label="<?php esc_attr_e('Close', 'vod-fest'); ?>">&times;</button>
        </div>

        <p class="cookie-settings__description">
            <?php esc_html_e('Choose which cookies you want to allow. Necessary cookies are always enabled as they are required for the website to function properly.', 'vod-fest'); ?>
        </p>

        <!-- Necessary -->
        <div class="cookie-category">
            <div class="cookie-category__header">
                <div class="cookie-category__info">
                    <h3 class="cookie-category__name"><?php esc_html_e('Necessary', 'vod-fest'); ?></h3>
                    <p class="cookie-category__desc"><?php esc_html_e('Essential for the website to function. These cannot be disabled.', 'vod-fest'); ?></p>
                </div>
                <span class="cookie-toggle__always-on"><?php esc_html_e('Always on', 'vod-fest'); ?></span>
            </div>
        </div>

        <!-- Analytics -->
        <div class="cookie-category">
            <div class="cookie-category__header">
                <div class="cookie-category__info">
                    <h3 class="cookie-category__name"><?php esc_html_e('Analytics', 'vod-fest'); ?></h3>
                    <p class="cookie-category__desc"><?php esc_html_e('Help us understand how visitors use our site so we can improve it.', 'vod-fest'); ?></p>
                </div>
                <label class="cookie-toggle">
                    <input type="checkbox" id="cookie-toggle-analytics">
                    <span class="cookie-toggle__slider"></span>
                </label>
            </div>
        </div>

        <!-- Marketing -->
        <div class="cookie-category">
            <div class="cookie-category__header">
                <div class="cookie-category__info">
                    <h3 class="cookie-category__name"><?php esc_html_e('Marketing', 'vod-fest'); ?></h3>
                    <p class="cookie-category__desc"><?php esc_html_e('Used to deliver relevant advertisements and track campaign effectiveness.', 'vod-fest'); ?></p>
                </div>
                <label class="cookie-toggle">
                    <input type="checkbox" id="cookie-toggle-marketing">
                    <span class="cookie-toggle__slider"></span>
                </label>
            </div>
        </div>

        <div class="cookie-settings__actions">
            <button type="button" class="btn btn-primary" data-cookie-action="save-preferences">
                <?php esc_html_e('Save Preferences', 'vod-fest'); ?>
            </button>
        </div>
    </div>
</div>
