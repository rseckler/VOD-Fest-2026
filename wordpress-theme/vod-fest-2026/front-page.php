<?php
/**
 * The front page template file
 *
 * This template displays the homepage with custom sections.
 * Based on prototypes/pages/home.html
 *
 * @package VOD_Fest_2026
 * @since 1.0.0
 */

get_header();
?>

<style>
/* Page-Specific Styles */
.hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.hero-background {
    position: absolute;
    inset: 0;
    z-index: -1;
}

.hero-background img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(13, 0, 0, 0.7) 0%, rgba(74, 0, 0, 0.8) 100%);
}

.hero-content {
    position: relative;
    z-index: 1;
    text-align: center;
    padding: var(--space-xl);
    max-width: 1200px;
}

.hero-title {
    font-size: clamp(3rem, 8vw, 7rem);
    margin-bottom: var(--space-lg);
    animation: fadeInDown 1s ease 0.5s backwards;
}

.hero-tagline {
    font-size: clamp(1rem, 2vw, 1.25rem);
    color: var(--color-brass);
    text-transform: uppercase;
    letter-spacing: 0.2em;
    margin-bottom: var(--space-md);
    animation: fadeIn 1s ease 1s backwards;
}

.hero-date {
    font-family: var(--font-display);
    font-size: clamp(1.5rem, 3vw, 2.5rem);
    color: var(--color-gold);
    margin-bottom: var(--space-xl);
    animation: fadeIn 1s ease 1.3s backwards;
}

.hero-location {
    font-size: var(--font-size-lg);
    color: var(--color-cream);
    margin-bottom: var(--space-3xl);
    animation: fadeIn 1s ease 1.5s backwards;
}

.hero-cta {
    display: flex;
    gap: var(--space-lg);
    justify-content: center;
    flex-wrap: wrap;
    animation: fadeInUp 1s ease 1.8s backwards;
}

.scroll-indicator {
    position: absolute;
    bottom: var(--space-3xl);
    left: 50%;
    transform: translateX(-50%);
    animation: scrollArrow 2s ease-in-out infinite;
    color: var(--color-gold);
    font-size: var(--font-size-2xl);
}

.about-section {
    background: var(--color-blood-red);
    text-align: center;
}

.section-title {
    font-size: clamp(2rem, 5vw, 4rem);
    margin-bottom: var(--space-lg);
}

.section-title-underline {
    width: 100px;
    height: 3px;
    background: linear-gradient(90deg, var(--color-gold), var(--color-orange));
    margin: 0 auto var(--space-2xl);
}

.about-description {
    max-width: 800px;
    margin: 0 auto var(--space-4xl);
    font-size: var(--font-size-lg);
    line-height: 1.8;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: var(--space-2xl);
    max-width: 900px;
    margin: 0 auto var(--space-3xl);
}

.lineup-section {
    background: var(--color-black);
}

.band-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: var(--space-2xl);
    margin-bottom: var(--space-3xl);
}

.schedule-section {
    background: var(--color-blood-red);
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}

.venue-section {
    background: var(--color-black);
}

.venue-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: var(--space-3xl);
    align-items: center;
}

.venue-image {
    width: 100%;
    height: 400px;
    background: linear-gradient(45deg, var(--color-blood-red), var(--color-crimson));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-brass);
    font-style: italic;
}

.venue-details h3 {
    font-size: var(--font-size-3xl);
    margin-bottom: var(--space-lg);
}

.venue-address {
    font-size: var(--font-size-lg);
    line-height: 1.8;
    margin-bottom: var(--space-xl);
}

.venue-description {
    margin-bottom: var(--space-xl);
}

.venue-buttons {
    display: flex;
    gap: var(--space-lg);
    flex-wrap: wrap;
}

.venue-info-box {
    background: rgba(13, 0, 0, 0.6);
    border: 2px solid rgba(212, 175, 55, 0.3);
    padding: var(--space-lg);
    margin-top: var(--space-xl);
}

.newsletter-section {
    background: var(--color-crimson);
    text-align: center;
}

.newsletter-form {
    max-width: 700px;
    margin: 0 auto;
}

.newsletter-input-group {
    display: flex;
    gap: var(--space-md);
    margin-bottom: var(--space-lg);
}

.newsletter-input-group input {
    flex: 1;
}

.newsletter-disclaimer {
    font-size: var(--font-size-sm);
    color: var(--color-brass);
    font-style: italic;
}

.cta-final {
    min-height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative;
    overflow: hidden;
    background: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/poster.png'); ?>') center/cover;
}

.cta-final::before {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(13, 0, 0, 0.85);
}

.cta-content {
    position: relative;
    z-index: 1;
    padding: var(--space-xl);
}

.cta-title {
    font-size: clamp(2rem, 5vw, 4rem);
    margin-bottom: var(--space-lg);
}

.cta-urgency {
    font-size: var(--font-size-xl);
    color: var(--color-orange);
    margin-bottom: var(--space-2xl);
}

@media (max-width: 767px) {
    .hero-cta {
        flex-direction: column;
    }

    .hero-cta .btn {
        width: 100%;
    }

    .venue-grid {
        grid-template-columns: 1fr;
    }

    .newsletter-input-group {
        flex-direction: column;
    }

    .newsletter-input-group .btn {
        width: 100%;
    }
}
</style>

<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-background">
        <?php
        $poster_image = get_template_directory_uri() . '/assets/images/poster.png';
        ?>
        <img src="<?php echo esc_url($poster_image); ?>" alt="<?php bloginfo('name'); ?>" loading="eager">
        <div class="hero-overlay"></div>
    </div>

    <div class="hero-content">
        <h1 class="hero-title"><?php bloginfo('name'); ?></h1>
        <p class="hero-tagline">
            <?php
            $tagline = get_bloginfo('description');
            echo $tagline ? esc_html($tagline) : esc_html__('Industrial • Experimental • Post-Punk • Avant-Garde', 'vod-fest');
            ?>
        </p>
        <p class="hero-date"><?php echo esc_html__('17-19 JULY 2026 // FRIEDRICHSHAFEN', 'vod-fest'); ?></p>
        <p class="hero-location"><?php echo esc_html__('Kulturhaus Caserne, Fallenbrunnen', 'vod-fest'); ?></p>

        <div class="hero-cta">
            <a href="<?php echo esc_url(home_url('/tickets')); ?>" class="btn btn-primary pulse-glow">
                <?php esc_html_e('Get Tickets', 'vod-fest'); ?>
            </a>
            <a href="<?php echo esc_url(get_post_type_archive_link('band')); ?>" class="btn btn-secondary">
                <?php esc_html_e('View Lineup', 'vod-fest'); ?>
            </a>
        </div>
    </div>

    <div class="scroll-indicator" aria-hidden="true">
        ↓
    </div>
</section>

<!-- ABOUT SECTION -->
<section class="about-section section">
    <div class="container">
        <h2 class="section-title scroll-animate"><?php echo esc_html__('IT\'S HAPPENING AGAIN', 'vod-fest'); ?></h2>
        <div class="section-title-underline"></div>

        <div class="about-description scroll-animate delay-200">
            <?php
            $about_page = get_page_by_path('about');
            if ($about_page) {
                echo wp_kses_post(wpautop($about_page->post_content));
            } else {
                ?>
                <p><?php esc_html_e('VOD Fest returns for its second year, bringing together 21 of the most groundbreaking artists from the industrial, experimental, post-punk and avant-garde scenes.', 'vod-fest'); ?></p>
                <p><?php esc_html_e('Three days. Two stages. Seven hours of music each evening. From 5pm to midnight, immerse yourself in the underground sounds that defined a generation and continue to push boundaries today.', 'vod-fest'); ?></p>
                <?php
            }
            ?>
        </div>

        <div class="stats-grid">
            <?php
            $band_count = wp_count_posts('band')->publish;
            ?>
            <div class="stats-card scroll-animate delay-300">
                <span class="stats-number"><?php echo esc_html($band_count ?: '21'); ?></span>
                <span class="stats-label"><?php esc_html_e('Bands', 'vod-fest'); ?></span>
            </div>
            <div class="stats-card scroll-animate delay-400">
                <span class="stats-number">3</span>
                <span class="stats-label"><?php esc_html_e('Days', 'vod-fest'); ?></span>
            </div>
            <div class="stats-card scroll-animate delay-500">
                <span class="stats-number">7</span>
                <span class="stats-label"><?php esc_html_e('Hours/Day', 'vod-fest'); ?></span>
            </div>
        </div>

        <a href="<?php echo esc_url(home_url('/info')); ?>" class="btn btn-secondary scroll-animate delay-600">
            <?php esc_html_e('Learn More', 'vod-fest'); ?>
        </a>
    </div>
</section>

<!-- FEATURED LINEUP SECTION -->
<section class="lineup-section section">
    <div class="container">
        <h2 class="section-title text-center scroll-animate"><?php esc_html_e('FEATURED ARTISTS', 'vod-fest'); ?></h2>
        <div class="section-title-underline"></div>

        <div class="band-grid">
            <?php
            $featured_bands = new WP_Query(array(
                'post_type'      => 'band',
                'posts_per_page' => 6,
                'orderby'        => 'rand',
            ));

            $delay = 100;
            if ($featured_bands->have_posts()) :
                while ($featured_bands->have_posts()) : $featured_bands->the_post();
                    ?>
                    <div class="band-card scroll-animate delay-<?php echo esc_attr($delay); ?>">
                        <div class="band-card-image">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('vod-fest-card', array('alt' => get_the_title()));
                            } else {
                                echo '<img src="https://via.placeholder.com/400x400/4A0000/D4AF37?text=' . urlencode(get_the_title()) . '" alt="' . esc_attr(get_the_title()) . '">';
                            }
                            ?>
                        </div>
                        <h3 class="band-name"><?php the_title(); ?></h3>
                        <?php
                        $start_time = get_post_meta(get_the_ID(), '_band_start_time', true);
                        $end_time = get_post_meta(get_the_ID(), '_band_end_time', true);
                        $day_terms = get_the_terms(get_the_ID(), 'festival_day');
                        $stage_terms = get_the_terms(get_the_ID(), 'stage');

                        if ($start_time && $end_time) :
                        ?>
                            <p class="band-time"><?php echo esc_html($start_time . ' - ' . $end_time); ?></p>
                        <?php endif; ?>

                        <?php if ($stage_terms && !is_wp_error($stage_terms)) : ?>
                            <p class="band-stage"><?php echo esc_html($stage_terms[0]->name); ?></p>
                        <?php endif; ?>

                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary" style="margin-top: var(--space-lg); font-size: 0.875rem; padding: 8px 24px;">
                            <?php esc_html_e('More Info', 'vod-fest'); ?>
                        </a>
                    </div>
                    <?php
                    $delay += 100;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <div class="text-center">
            <a href="<?php echo esc_url(get_post_type_archive_link('band')); ?>" class="btn btn-primary">
                <?php esc_html_e('View All Bands →', 'vod-fest'); ?>
            </a>
        </div>
    </div>
</section>

<!-- NEWSLETTER SECTION -->
<section class="newsletter-section section">
    <div class="container">
        <h2 class="section-title scroll-animate"><?php esc_html_e('STAY IN THE LOOP', 'vod-fest'); ?></h2>
        <p class="scroll-animate delay-200" style="font-size: var(--font-size-lg); margin-bottom: var(--space-3xl);">
            <?php esc_html_e('Get lineup updates, ticket information, and exclusive content straight to your inbox.', 'vod-fest'); ?>
        </p>

        <form class="newsletter-form scroll-animate delay-400" method="post">
            <input type="hidden" name="action" value="vod_fest_newsletter_subscribe">
            <?php wp_nonce_field('vod_fest_newsletter', 'newsletter_nonce'); ?>
            <div class="newsletter-input-group">
                <input type="email" name="email" class="form-input" placeholder="<?php esc_attr_e('Your Email Address', 'vod-fest'); ?>" required>
                <button type="submit" class="btn btn-primary"><?php esc_html_e('Subscribe', 'vod-fest'); ?></button>
            </div>
            <p class="newsletter-disclaimer"><?php esc_html_e('No spam, just underground music news.', 'vod-fest'); ?></p>
        </form>
    </div>
</section>

<!-- FINAL CTA SECTION -->
<section class="cta-final">
    <div class="cta-content">
        <h2 class="cta-title">
            <?php esc_html_e('JULY 17-19, 2026', 'vod-fest'); ?><br>
            <?php esc_html_e('DON\'T MISS OUT', 'vod-fest'); ?>
        </h2>
        <p class="cta-urgency"><?php esc_html_e('Only 100 tickets available', 'vod-fest'); ?></p>
        <a href="<?php echo esc_url(home_url('/tickets')); ?>" class="btn btn-primary pulse-glow" style="font-size: var(--font-size-xl); padding: 20px 60px;">
            <?php esc_html_e('Get Your Ticket', 'vod-fest'); ?>
        </a>
    </div>
</section>

<script>
// Scroll Animations (Intersection Observer)
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.scroll-animate').forEach(el => {
        observer.observe(el);
    });
});
</script>

<?php
get_footer();
