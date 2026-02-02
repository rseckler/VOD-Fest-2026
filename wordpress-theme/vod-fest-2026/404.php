<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package VOD_Fest_2026
 * @since 1.0.0
 */

get_header();
?>

<style>
.error-404-section {
    min-height: 80vh;
    background: var(--color-black);
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: var(--space-5xl) var(--space-xl);
    position: relative;
    overflow: hidden;
}

.error-404-section::before {
    content: '404';
    position: absolute;
    font-size: clamp(10rem, 30vw, 25rem);
    font-family: var(--font-display);
    color: rgba(212, 175, 55, 0.05);
    z-index: 0;
    animation: glitch 3s infinite;
}

.error-404-content {
    position: relative;
    z-index: 1;
    max-width: 800px;
}

.error-404-title {
    font-size: clamp(3rem, 8vw, 6rem);
    color: var(--color-gold);
    margin-bottom: var(--space-lg);
    animation: fadeInDown 1s ease;
}

.error-404-subtitle {
    font-size: var(--font-size-2xl);
    color: var(--color-brass);
    margin-bottom: var(--space-xl);
    animation: fadeIn 1s ease 0.3s backwards;
}

.error-404-description {
    font-size: var(--font-size-lg);
    color: var(--color-cream);
    margin-bottom: var(--space-3xl);
    line-height: 1.8;
    animation: fadeIn 1s ease 0.6s backwards;
}

.error-404-actions {
    display: flex;
    gap: var(--space-lg);
    justify-content: center;
    flex-wrap: wrap;
    animation: fadeInUp 1s ease 0.9s backwards;
}

.error-404-search {
    max-width: 600px;
    margin: 0 auto var(--space-3xl);
    animation: fadeIn 1s ease 1.2s backwards;
}

.error-404-search form {
    display: flex;
    gap: var(--space-md);
}

.error-404-search input {
    flex: 1;
}

.error-suggestions {
    margin-top: var(--space-4xl);
    animation: fadeIn 1s ease 1.5s backwards;
}

.error-suggestions h2 {
    font-size: var(--font-size-2xl);
    color: var(--color-gold);
    margin-bottom: var(--space-xl);
}

.error-suggestions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--space-xl);
}

.error-suggestion-item {
    background: rgba(13, 0, 0, 0.6);
    border: 2px solid rgba(212, 175, 55, 0.3);
    padding: var(--space-xl);
    transition: all var(--transition-base);
}

.error-suggestion-item:hover {
    border-color: var(--color-gold);
    transform: translateY(-4px);
}

.error-suggestion-item h3 {
    font-size: var(--font-size-xl);
    color: var(--color-gold);
    margin-bottom: var(--space-md);
}

.error-suggestion-item p {
    color: var(--color-brass);
    margin-bottom: var(--space-lg);
}

@media (max-width: 767px) {
    .error-404-actions {
        flex-direction: column;
        align-items: stretch;
    }

    .error-404-actions .btn {
        width: 100%;
    }

    .error-404-search form {
        flex-direction: column;
    }

    .error-404-search .btn {
        width: 100%;
    }
}
</style>

<section class="error-404-section">
    <div class="container" style="width: 100%;">
        <div class="error-404-content">
            <h1 class="error-404-title">
                <?php esc_html_e('404', 'vod-fest'); ?>
            </h1>

            <p class="error-404-subtitle">
                <?php esc_html_e('This Page Has Left The Stage', 'vod-fest'); ?>
            </p>

            <p class="error-404-description">
                <?php esc_html_e('The page you\'re looking for seems to have wandered off into the industrial underground. Don\'t worry though - we\'ll help you find your way back to the music.', 'vod-fest'); ?>
            </p>

            <!-- Search Form -->
            <div class="error-404-search">
                <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="text"
                           name="s"
                           class="form-input"
                           placeholder="<?php esc_attr_e('Search for bands, pages, info...', 'vod-fest'); ?>"
                           value="<?php echo esc_attr(get_search_query()); ?>">
                    <button type="submit" class="btn btn-primary">
                        <?php esc_html_e('Search', 'vod-fest'); ?>
                    </button>
                </form>
            </div>

            <!-- Action Buttons -->
            <div class="error-404-actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                    <?php esc_html_e('← Back to Home', 'vod-fest'); ?>
                </a>
                <a href="<?php echo esc_url(get_post_type_archive_link('band')); ?>" class="btn btn-secondary">
                    <?php esc_html_e('View Lineup', 'vod-fest'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/tickets')); ?>" class="btn btn-secondary">
                    <?php esc_html_e('Get Tickets', 'vod-fest'); ?>
                </a>
            </div>

            <!-- Helpful Suggestions -->
            <div class="error-suggestions">
                <h2><?php esc_html_e('Popular Pages', 'vod-fest'); ?></h2>
                <div class="error-suggestions-grid">
                    <div class="error-suggestion-item">
                        <h3><?php esc_html_e('Lineup', 'vod-fest'); ?></h3>
                        <p><?php esc_html_e('Check out all the bands playing at VOD Fest 2026', 'vod-fest'); ?></p>
                        <a href="<?php echo esc_url(get_post_type_archive_link('band')); ?>" class="link">
                            <?php esc_html_e('View Bands →', 'vod-fest'); ?>
                        </a>
                    </div>

                    <div class="error-suggestion-item">
                        <h3><?php esc_html_e('Festival Info', 'vod-fest'); ?></h3>
                        <p><?php esc_html_e('Everything you need to know about the festival', 'vod-fest'); ?></p>
                        <a href="<?php echo esc_url(home_url('/info')); ?>" class="link">
                            <?php esc_html_e('Get Info →', 'vod-fest'); ?>
                        </a>
                    </div>

                    <div class="error-suggestion-item">
                        <h3><?php esc_html_e('Tickets', 'vod-fest'); ?></h3>
                        <p><?php esc_html_e('Secure your spot - only 100 tickets available', 'vod-fest'); ?></p>
                        <a href="<?php echo esc_url(home_url('/tickets')); ?>" class="link">
                            <?php esc_html_e('Buy Tickets →', 'vod-fest'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
