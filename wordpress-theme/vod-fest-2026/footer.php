</div><!-- #main-content -->

<footer class="footer" role="contentinfo">
    <!-- Waveform -->
    <div class="footer-waveform waveform" aria-hidden="true">
        <div class="waveform-bar"></div>
        <div class="waveform-bar"></div>
        <div class="waveform-bar"></div>
        <div class="waveform-bar"></div>
        <div class="waveform-bar"></div>
        <div class="waveform-bar"></div>
        <div class="waveform-bar"></div>
        <div class="waveform-bar"></div>
        <div class="waveform-bar"></div>
        <div class="waveform-bar"></div>
    </div>

    <div class="footer-content container">
        <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) : ?>
            <div class="footer-widgets">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div class="footer-section">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php endif; ?>

                <?php if (is_active_sidebar('footer-2')) : ?>
                    <div class="footer-section">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                <?php endif; ?>

                <?php if (is_active_sidebar('footer-3')) : ?>
                    <div class="footer-section">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                <?php endif; ?>

                <?php if (is_active_sidebar('footer-4')) : ?>
                    <div class="footer-section">
                        <?php dynamic_sidebar('footer-4'); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php else : ?>
            <!-- Default Footer Content -->
            <div class="footer-widgets">
                <div class="footer-section">
                    <h4><?php bloginfo('name'); ?></h4>
                    <p>17-19 July 2026<br>Friedrichshafen, Germany</p>
                    <?php
                    $contact_email = get_theme_mod('vod_fest_contact_email', 'info@vodfest.com');
                    if ($contact_email) :
                    ?>
                        <p style="margin-top: var(--space-lg);">
                            <strong><?php esc_html_e('Contact:', 'vod-fest'); ?></strong><br>
                            <a href="mailto:<?php echo esc_attr($contact_email); ?>">
                                <?php echo esc_html($contact_email); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="footer-section">
                    <h4><?php esc_html_e('Quick Links', 'vod-fest'); ?></h4>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => '',
                        'container'      => 'ul',
                        'fallback_cb'    => false,
                    ));
                    ?>
                </div>

                <div class="footer-section">
                    <h4><?php esc_html_e('Legal', 'vod-fest'); ?></h4>
                    <ul>
                        <li><a href="<?php echo esc_url(get_privacy_policy_url()); ?>">
                            <?php esc_html_e('Privacy Policy', 'vod-fest'); ?>
                        </a></li>
                        <li><a href="<?php echo esc_url(home_url('/impressum')); ?>">
                            <?php esc_html_e('Impressum', 'vod-fest'); ?>
                        </a></li>
                        <li><a href="<?php echo esc_url(home_url('/terms')); ?>">
                            <?php esc_html_e('Terms & Conditions', 'vod-fest'); ?>
                        </a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4><?php esc_html_e('Follow Us', 'vod-fest'); ?></h4>
                    <?php
                    $social_links = array(
                        'facebook'  => get_theme_mod('vod_fest_facebook', ''),
                        'instagram' => get_theme_mod('vod_fest_instagram', ''),
                        'youtube'   => get_theme_mod('vod_fest_youtube', ''),
                        'bandcamp'  => get_theme_mod('vod_fest_bandcamp', ''),
                    );

                    if (array_filter($social_links)) :
                    ?>
                        <div class="social-links">
                            <?php foreach ($social_links as $platform => $url) : ?>
                                <?php if ($url) : ?>
                                    <a href="<?php echo esc_url($url); ?>"
                                       class="social-link"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       aria-label="<?php echo esc_attr(ucfirst($platform)); ?>">
                                        <?php echo esc_html(strtoupper(substr($platform, 0, 2))); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <h4 style="margin-top: var(--space-2xl);"><?php esc_html_e('Newsletter', 'vod-fest'); ?></h4>
                    <form class="footer-newsletter-form" method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
                        <input type="hidden" name="action" value="vod_fest_newsletter_subscribe">
                        <?php wp_nonce_field('vod_fest_newsletter', 'newsletter_nonce'); ?>
                        <div style="display: flex; gap: var(--space-sm);">
                            <input type="email"
                                   name="email"
                                   class="form-input"
                                   placeholder="<?php esc_attr_e('Email', 'vod-fest'); ?>"
                                   required
                                   style="flex: 1; padding: 10px;">
                            <button type="submit" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.875rem;">
                                →
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>
                &copy; <?php echo esc_html(date('Y')); ?>
                <?php bloginfo('name'); ?>.
                <?php esc_html_e('All Rights Reserved.', 'vod-fest'); ?>
                <?php if (function_exists('the_privacy_policy_link')) : ?>
                    | <?php the_privacy_policy_link(); ?>
                <?php endif; ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
