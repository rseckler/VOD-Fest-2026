<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content">
    <?php esc_html_e('Skip to content', 'vod-fest'); ?>
</a>

<header class="header" role="banner">
    <div class="header-content">
        <div class="logo">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php bloginfo('name'); ?>
                </a>
                <?php
            }
            ?>
        </div>

        <nav class="nav" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'vod-fest'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => 'nav-list',
                'container'      => false,
                'fallback_cb'    => false,
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'walker'         => new VOD_Fest_Walker_Nav_Menu(),
            ));
            ?>
        </nav>

        <div class="header-actions">
            <!-- Language Switcher (WPML/Polylang integration) -->
            <div class="lang-switcher">
                <?php
                // WPML Language Switcher
                if (function_exists('icl_get_languages')) {
                    $languages = icl_get_languages('skip_missing=0');
                    if (!empty($languages)) {
                        foreach ($languages as $lang) {
                            $class = $lang['active'] ? 'lang-btn active' : 'lang-btn';
                            echo '<a href="' . esc_url($lang['url']) . '" class="' . esc_attr($class) . '">';
                            echo esc_html(strtoupper($lang['language_code']));
                            echo '</a>';
                            if ($lang !== end($languages)) {
                                echo '<span style="color: var(--color-brass);">|</span>';
                            }
                        }
                    }
                }
                // Polylang Language Switcher
                else if (function_exists('pll_the_languages')) {
                    pll_the_languages(array(
                        'show_flags' => 0,
                        'show_names' => 1,
                        'display_names_as' => 'slug',
                        'hide_current' => 0,
                    ));
                }
                // Default fallback (no multilingual plugin)
                else {
                    echo '<button class="lang-btn active">EN</button>';
                    echo '<span style="color: var(--color-brass);">|</span>';
                    echo '<button class="lang-btn">DE</button>';
                }
                ?>
            </div>

            <!-- Login/Register or User Menu -->
            <?php if (is_user_logged_in()) : ?>
                <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>" class="btn btn-secondary" style="padding: 8px 24px; font-size: 0.875rem;">
                    <?php esc_html_e('Logout', 'vod-fest'); ?>
                </a>
            <?php else : ?>
                <a href="<?php echo esc_url(wp_login_url()); ?>" class="btn btn-secondary" style="padding: 8px 24px; font-size: 0.875rem;">
                    <?php esc_html_e('Login', 'vod-fest'); ?>
                </a>
            <?php endif; ?>

            <!-- Mobile Menu Toggle -->
            <button class="hamburger" aria-label="<?php esc_attr_e('Toggle menu', 'vod-fest'); ?>" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>

<div id="main-content" class="site-content">
