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

.video-card {
    background: linear-gradient(135deg, rgba(13, 0, 0, 0.9) 0%, rgba(74, 0, 0, 0.6) 100%);
    border: 2px solid rgba(212, 175, 55, 0.3);
    border-radius: var(--radius-md);
    overflow: hidden;
    transition: all var(--transition-base);
}

.video-card:hover {
    border-color: var(--color-gold);
    box-shadow: 0 8px 24px rgba(212, 175, 55, 0.2);
}

.video-card video {
    width: 100%;
    display: block;
    background: #000;
}

.video-card__title {
    padding: var(--space-md) var(--space-lg);
    font-family: var(--font-display);
    font-size: var(--font-size-lg);
    color: var(--color-gold);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.video-card__type {
    display: inline-block;
    font-size: var(--font-size-xs);
    color: var(--color-brass);
    font-family: var(--font-body);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-left: var(--space-sm);
    font-weight: var(--font-weight-normal);
}

@media (max-width: 767px) {
    .video-grid {
        grid-template-columns: 1fr;
    }
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

        <?php
        $video_base = content_url('/uploads/videos/fest-2025/');
        $videos = array(
            array('file' => 'vod_fest_teaser_laibach_05aug25.mp4',                       'title' => 'Laibach',                    'type' => 'Teaser'),
            array('file' => 'vod_fest_teaser_esplendor_geometrico_live_18aug23.mp4',      'title' => 'Esplendor Geometrico',        'type' => 'Live'),
            array('file' => 'vod_fest_teaser_clockdva_07aug25.mp4',                       'title' => 'Clock DVA',                   'type' => 'Teaser'),
            array('file' => 'vod_fest_teaser_s_p_k_01aug25.mp4',                          'title' => 'S.P.K.',                      'type' => 'Teaser'),
            array('file' => 'vod_fest_teaser_legendary_pink_dots_28july25.mp4',            'title' => 'Legendary Pink Dots',         'type' => 'Teaser'),
            array('file' => 'vod_fest_teaser_absolute_body_control_31july25.mp4',          'title' => 'Absolute Body Control',       'type' => 'Teaser'),
            array('file' => 'vod_fest_teaser_absolute_body_control_v2_31july25.mp4',       'title' => 'Absolute Body Control',       'type' => 'Teaser V2'),
            array('file' => 'vod_fest_teaser_alex_fergusson_live_23aug25.mp4',             'title' => 'Alex Fergusson',              'type' => 'Live'),
            array('file' => 'vod_fest_teaser_zero_kama_live_29july25.mp4',                 'title' => 'Zero Kama',                   'type' => 'Live'),
            array('file' => 'vod_fest_teser_zoviet_france_uhd_03aug25.mp4',                'title' => 'Zoviet France',               'type' => 'Teaser'),
            array('file' => 'spk_nocturnalemissions_excerp_drummachines_24juli25.mp4',     'title' => 'SPK / Nocturnal Emissions',   'type' => 'Excerpt'),
            array('file' => 'vod_fest_outtake_attrition_01_26july25.mp4',                  'title' => 'Attrition',                   'type' => 'Outtake'),
            array('file' => 'vod_fest_outtake_portion_control_live_27july25.mp4',          'title' => 'Portion Control',             'type' => 'Live Outtake'),
            array('file' => 'roundtable_outtake_ivannovak_laibach_25july25.mp4',           'title' => 'Ivan Novak (Laibach)',        'type' => 'Roundtable'),
        );
        ?>
        <div class="video-grid">
            <?php foreach ($videos as $video) : ?>
                <div class="video-card">
                    <video controls preload="metadata">
                        <source src="<?php echo esc_url($video_base . $video['file']); ?>" type="video/mp4">
                    </video>
                    <div class="video-card__title">
                        <?php echo esc_html($video['title']); ?>
                        <span class="video-card__type"><?php echo esc_html($video['type']); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
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
