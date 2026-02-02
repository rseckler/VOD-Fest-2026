<?php
/**
 * Template Name: 2025 Festival Recap
 *
 * @package VOD_Fest_2026
 * @since 1.0.0
 */

get_header();
?>

<style>
.recap-hero {
    min-height: 60vh;
    background: linear-gradient(135deg, var(--color-blood-red) 0%, var(--color-black) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: var(--space-5xl) var(--space-xl);
    position: relative;
    overflow: hidden;
}

.recap-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><text y="50" font-size="80" fill="%23D4AF37" opacity="0.1">2025</text></svg>');
    background-size: 400px;
    background-position: center;
    background-repeat: no-repeat;
    opacity: 0.3;
}

.recap-hero h1 {
    font-size: clamp(3rem, 8vw, 6rem);
    margin-bottom: var(--space-lg);
    position: relative;
    z-index: 1;
}

.recap-subtitle {
    font-size: var(--font-size-xl);
    color: var(--color-brass);
    max-width: 600px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

.recap-section {
    padding: var(--space-5xl) 0;
    background: var(--color-black);
}

.recap-section:nth-child(even) {
    background: var(--color-blood-red);
}

.photo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: var(--space-lg);
    margin-top: var(--space-3xl);
}

.photo-placeholder {
    aspect-ratio: 4/3;
    background: linear-gradient(135deg, rgba(212, 175, 55, 0.1) 0%, rgba(13, 0, 0, 0.5) 100%);
    border: 2px dashed var(--color-brass);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: var(--radius-md);
    transition: all var(--transition-base);
    position: relative;
    overflow: hidden;
}

.photo-placeholder:hover {
    border-color: var(--color-gold);
    transform: scale(1.02);
}

.photo-placeholder::before {
    content: '📷';
    font-size: 3rem;
    opacity: 0.3;
}

.photo-placeholder span {
    position: absolute;
    bottom: var(--space-md);
    left: var(--space-md);
    right: var(--space-md);
    font-size: var(--font-size-sm);
    color: var(--color-brass);
    text-align: center;
}

.video-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: var(--space-2xl);
    margin-top: var(--space-3xl);
}

.video-placeholder {
    aspect-ratio: 16/9;
    background: linear-gradient(135deg, rgba(212, 175, 55, 0.1) 0%, rgba(13, 0, 0, 0.5) 100%);
    border: 2px dashed var(--color-brass);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    border-radius: var(--radius-md);
    transition: all var(--transition-base);
    position: relative;
    overflow: hidden;
}

.video-placeholder:hover {
    border-color: var(--color-gold);
    transform: scale(1.02);
}

.video-placeholder::before {
    content: '▶';
    font-size: 4rem;
    color: var(--color-gold);
    opacity: 0.3;
}

.video-placeholder span {
    margin-top: var(--space-md);
    font-size: var(--font-size-sm);
    color: var(--color-brass);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: var(--space-2xl);
    margin-top: var(--space-3xl);
}

.stat-card {
    text-align: center;
    padding: var(--space-2xl);
    background: rgba(212, 175, 55, 0.05);
    border: 1px solid var(--color-brass);
    border-radius: var(--radius-md);
}

.stat-number {
    font-size: 4rem;
    font-weight: var(--font-weight-black);
    color: var(--color-gold);
    font-family: var(--font-display);
    line-height: 1;
    margin-bottom: var(--space-sm);
}

.stat-label {
    font-size: var(--font-size-lg);
    color: var(--color-brass);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}
</style>

<!-- HERO -->
<section class="recap-hero">
    <div class="container" style="width: 100%;">
        <h1><?php esc_html_e('VOD FEST 2025', 'vod-fest'); ?></h1>
        <p class="recap-subtitle">
            <?php esc_html_e('Three unforgettable nights of underground music. Relive the moments.', 'vod-fest'); ?>
        </p>
    </div>
</section>

<!-- FESTIVAL STATS -->
<section class="recap-section">
    <div class="container">
        <h2 style="text-align: center; font-size: var(--font-size-4xl); margin-bottom: var(--space-3xl);">
            <?php esc_html_e('By the Numbers', 'vod-fest'); ?>
        </h2>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">19</div>
                <div class="stat-label"><?php esc_html_e('Bands', 'vod-fest'); ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-number">3</div>
                <div class="stat-label"><?php esc_html_e('Days', 'vod-fest'); ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-number">2</div>
                <div class="stat-label"><?php esc_html_e('Stages', 'vod-fest'); ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-number">100+</div>
                <div class="stat-label"><?php esc_html_e('Attendees', 'vod-fest'); ?></div>
            </div>
        </div>
    </div>
</section>

<!-- PHOTO GALLERY -->
<section class="recap-section">
    <div class="container">
        <h2 style="text-align: center; font-size: var(--font-size-4xl); margin-bottom: var(--space-xl);">
            <?php esc_html_e('Photo Gallery', 'vod-fest'); ?>
        </h2>
        <p style="text-align: center; color: var(--color-brass); font-size: var(--font-size-lg); margin-bottom: var(--space-3xl);">
            <?php esc_html_e('Highlights from three nights of industrial beats and experimental sounds', 'vod-fest'); ?>
        </p>

        <div class="photo-grid">
            <?php for ($i = 1; $i <= 12; $i++) : ?>
                <div class="photo-placeholder">
                    <span><?php printf(esc_html__('Photo %d - Coming Soon', 'vod-fest'), $i); ?></span>
                </div>
            <?php endfor; ?>
        </div>

        <div style="text-align: center; margin-top: var(--space-3xl);">
            <p style="color: var(--color-brass); font-size: var(--font-size-md);">
                <?php esc_html_e('📸 Official photos will be added soon. Stay tuned!', 'vod-fest'); ?>
            </p>
        </div>
    </div>
</section>

<!-- VIDEO HIGHLIGHTS -->
<section class="recap-section">
    <div class="container">
        <h2 style="text-align: center; font-size: var(--font-size-4xl); margin-bottom: var(--space-xl);">
            <?php esc_html_e('Video Highlights', 'vod-fest'); ?>
        </h2>
        <p style="text-align: center; color: var(--color-brass); font-size: var(--font-size-lg); margin-bottom: var(--space-3xl);">
            <?php esc_html_e('Full performance videos and behind-the-scenes footage', 'vod-fest'); ?>
        </p>

        <div class="video-grid">
            <?php for ($i = 1; $i <= 6; $i++) : ?>
                <div class="video-placeholder">
                    <span><?php printf(esc_html__('Video %d - Coming Soon', 'vod-fest'), $i); ?></span>
                </div>
            <?php endfor; ?>
        </div>

        <div style="text-align: center; margin-top: var(--space-3xl);">
            <p style="color: var(--color-brass); font-size: var(--font-size-md);">
                <?php esc_html_e('🎥 Performance videos will be uploaded to our YouTube channel soon.', 'vod-fest'); ?>
            </p>
        </div>
    </div>
</section>

<!-- ARTIST TESTIMONIALS -->
<section class="recap-section">
    <div class="container">
        <h2 style="text-align: center; font-size: var(--font-size-4xl); margin-bottom: var(--space-3xl);">
            <?php esc_html_e('What Artists Said', 'vod-fest'); ?>
        </h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: var(--space-2xl);">
            <div class="card" style="padding: var(--space-2xl);">
                <p style="font-size: var(--font-size-lg); font-style: italic; color: var(--color-cream); margin-bottom: var(--space-lg);">
                    "<?php esc_html_e('Incredible atmosphere and audience. One of the best underground festivals in Europe.', 'vod-fest'); ?>"
                </p>
                <p style="color: var(--color-gold); font-weight: bold;">— <?php esc_html_e('Artist Name', 'vod-fest'); ?></p>
                <p style="color: var(--color-brass); font-size: var(--font-size-sm);"><?php esc_html_e('Band Name', 'vod-fest'); ?></p>
            </div>

            <div class="card" style="padding: var(--space-2xl);">
                <p style="font-size: var(--font-size-lg); font-style: italic; color: var(--color-cream); margin-bottom: var(--space-lg);">
                    "<?php esc_html_e('The energy was amazing. Can\'t wait to come back in 2026!', 'vod-fest'); ?>"
                </p>
                <p style="color: var(--color-gold); font-weight: bold;">— <?php esc_html_e('Artist Name', 'vod-fest'); ?></p>
                <p style="color: var(--color-brass); font-size: var(--font-size-sm);"><?php esc_html_e('Band Name', 'vod-fest'); ?></p>
            </div>

            <div class="card" style="padding: var(--space-2xl);">
                <p style="font-size: var(--font-size-lg); font-style: italic; color: var(--color-cream); margin-bottom: var(--space-lg);">
                    "<?php esc_html_e('Perfectly organized festival with a true underground spirit.', 'vod-fest'); ?>"
                </p>
                <p style="color: var(--color-gold); font-weight: bold;">— <?php esc_html_e('Artist Name', 'vod-fest'); ?></p>
                <p style="color: var(--color-brass); font-size: var(--font-size-sm);"><?php esc_html_e('Band Name', 'vod-fest'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- CALL TO ACTION -->
<section class="recap-section">
    <div class="container">
        <?php echo do_shortcode('[newsletter title="Don\'t Miss VOD FEST 2026" subtitle="Be the first to know when tickets go on sale for next year\'s festival."]'); ?>
    </div>
</section>

<?php
get_footer();
