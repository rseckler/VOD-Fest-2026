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

.photo-card {
    position: relative;
    overflow: hidden;
    border: 2px solid rgba(212, 175, 55, 0.3);
    border-radius: var(--radius-md);
    transition: all var(--transition-base);
}

.photo-card:hover {
    border-color: var(--color-gold);
    box-shadow: 0 8px 24px rgba(212, 175, 55, 0.2);
    transform: scale(1.02);
}

.photo-card img {
    width: 100%;
    aspect-ratio: 4/3;
    object-fit: cover;
    display: block;
    filter: grayscale(20%) contrast(1.1);
    transition: all var(--transition-slow);
}

.photo-card:hover img {
    filter: grayscale(0%) contrast(1.2);
    transform: scale(1.05);
}

.photo-card__caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: var(--space-md) var(--space-lg);
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.85));
    font-family: var(--font-display);
    font-size: var(--font-size-sm);
    color: var(--color-gold);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    opacity: 0;
    transition: opacity var(--transition-base);
}

.photo-card:hover .photo-card__caption {
    opacity: 1;
}

.photo-card__credit {
    font-family: var(--font-body);
    font-size: var(--font-size-xs);
    color: var(--color-brass);
    text-transform: none;
    letter-spacing: 0;
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

.video-card__embed {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 */
    height: 0;
    overflow: hidden;
}

.video-card__embed iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
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

        <?php
        $img_base = content_url('/uploads/images/fest-2025/');
        $photos = array(
            array('file' => 'Laibach-01-Cheesy.jpg',                       'caption' => 'Laibach'),
            array('file' => 'ClockDVA_0455_E.GabrielEdvy.JPG',             'caption' => 'Clock DVA',                  'credit' => 'E. Gabriel Edvy'),
            array('file' => 'ABC_0414_E.GabrielEdvy.jpg',                  'caption' => 'Absolute Body Control',      'credit' => 'E. Gabriel Edvy'),
            array('file' => 'EsplendorG-03-Cheesy.jpg',                    'caption' => 'Esplendor Geometrico'),
            array('file' => 'SPK-04-Cheesy.jpg',                           'caption' => 'S.P.K.'),
            array('file' => 'LegendaryPD-04-Cheesy.jpg',                   'caption' => 'Legendary Pink Dots'),
            array('file' => 'AsmusTietchens_0123BW_E.GabrielEdvy.jpg',     'caption' => 'Asmus Tietchens',            'credit' => 'E. Gabriel Edvy'),
            array('file' => 'AFergusson-01-Cheesy.jpg',                    'caption' => 'Alex Fergusson'),
            array('file' => 'NocturnalE-01-Cheesy.jpg',                    'caption' => 'Nocturnal Emissions'),
            array('file' => 'PortionC-02-Cheesy.jpg',                      'caption' => 'Portion Control'),
            array('file' => 'GToniutti-01-Cheesy.jpg',                     'caption' => 'Giancarlo Toniutti'),
            array('file' => 'GToniutti-02-Cheesy.jpg',                     'caption' => 'Giancarlo Toniutti'),
            array('file' => 'ZeroK-01-Cheesy.jpg',                         'caption' => 'Zero Kama'),
            array('file' => 'Attrition-01-Cheesy.jpg',                     'caption' => 'Attrition'),
            array('file' => 'Ramleh-04-Cheesy.jpg',                        'caption' => 'Ramleh'),
            array('file' => 'SovietF-02-Cheesy.jpg',                       'caption' => 'Zoviet France'),
            array('file' => 'SeveredH-05-Cheesy.jpg',                      'caption' => 'Severed Heads'),
            array('file' => 'JDuncan-01-Cheesy.jpg',                       'caption' => 'John Duncan'),
            array('file' => 'ClockDVA-03-Cheesy.jpg',                      'caption' => 'Clock DVA'),
            array('file' => 'FinalProgram_0219BW_E.GabrielEdvy.jpg',       'caption' => 'Final Program',              'credit' => 'E. Gabriel Edvy'),
        );
        ?>
        <div class="photo-grid">
            <?php foreach ($photos as $photo) : ?>
                <div class="photo-card">
                    <img src="<?php echo esc_url($img_base . $photo['file']); ?>"
                         alt="<?php echo esc_attr($photo['caption']); ?> - VOD Fest 2025"
                         loading="lazy">
                    <div class="photo-card__caption">
                        <?php echo esc_html($photo['caption']); ?>
                        <?php if (!empty($photo['credit'])) : ?>
                            <br><span class="photo-card__credit"><?php printf(esc_html__('Photo: %s', 'vod-fest'), esc_html($photo['credit'])); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
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
        $videos = array(
            array('id' => 'IEYvPU_mykc', 'title' => 'Laibach',              'type' => 'Teaser'),
            array('id' => 'ixO07d8rHp4', 'title' => 'Attrition',            'type' => 'Outtake'),
            array('id' => 'QHSSItWmtZA', 'title' => 'Ivan Novak (Laibach)', 'type' => 'Roundtable'),
            array('id' => 'TPOZy8lL-To', 'title' => 'Portion Control',      'type' => 'Live Outtake'),
            array('id' => 'z6a5rPcIcIs', 'title' => 'S.P.K.',               'type' => 'Teaser'),
        );
        ?>
        <div class="video-grid">
            <?php foreach ($videos as $video) : ?>
                <div class="video-card">
                    <div class="video-card__embed">
                        <iframe
                            src="https://www.youtube-nocookie.com/embed/<?php echo esc_attr($video['id']); ?>"
                            title="<?php echo esc_attr($video['title']); ?>"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            loading="lazy"
                        ></iframe>
                    </div>
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
