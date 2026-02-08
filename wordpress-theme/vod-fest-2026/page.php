<?php
/**
 * The template for displaying all pages
 *
 * This is the template for standard content pages like About, Info, Travel, etc.
 *
 * @package VOD_Fest_2026
 * @since 1.0.0
 */

get_header();
?>

<style>
.page-hero {
    min-height: 28vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: var(--space-4xl) var(--space-xl);
    position: relative;
    overflow: hidden;
    background: var(--color-blood-red);
}

.page-hero__bg {
    position: absolute;
    inset: 0;
    z-index: 0;
}

.page-hero__bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    animation: heroSlowZoom 20s ease-in-out infinite alternate;
}

.page-hero__overlay {
    position: absolute;
    inset: 0;
    z-index: 1;
    background: linear-gradient(
        to bottom,
        rgba(13, 0, 0, 0.6) 0%,
        rgba(13, 0, 0, 0.75) 50%,
        rgba(13, 0, 0, 0.85) 100%
    );
}

.page-hero__content {
    position: relative;
    z-index: 2;
    width: 100%;
}

.page-hero h1 {
    font-size: clamp(2.5rem, 6vw, 5rem);
    margin-bottom: var(--space-lg);
    opacity: 0;
    animation: fadeInDown 0.8s ease forwards 0.3s;
}

.page-hero__tagline {
    font-size: var(--font-size-lg);
    color: var(--color-brass);
    max-width: 800px;
    margin: 0 auto;
    opacity: 0;
    animation: fadeIn 0.8s ease forwards 0.8s;
}

@media (min-width: 1024px) {
    .page-hero {
        min-height: 30vh;
    }
}

.page-content-section {
    background: var(--color-black);
    padding: var(--space-5xl) 0;
}

.page-content-wrapper {
    max-width: 900px;
    margin: 0 auto;
}

.page-content-wrapper h2 {
    font-size: var(--font-size-3xl);
    color: var(--color-gold);
    margin-top: var(--space-3xl);
    margin-bottom: var(--space-xl);
}

.page-content-wrapper h3 {
    font-size: var(--font-size-2xl);
    color: var(--color-brass);
    margin-top: var(--space-2xl);
    margin-bottom: var(--space-lg);
}

.page-content-wrapper p {
    margin-bottom: var(--space-lg);
    line-height: 1.8;
}

.page-content-wrapper ul,
.page-content-wrapper ol {
    margin-bottom: var(--space-xl);
    padding-left: var(--space-xl);
}

.page-content-wrapper li {
    margin-bottom: var(--space-sm);
    line-height: 1.6;
}

.page-content-wrapper a {
    color: var(--color-gold);
    text-decoration: underline;
    transition: color var(--transition-base);
}

.page-content-wrapper a:hover {
    color: var(--color-orange);
}

.page-content-wrapper blockquote {
    border-left: 4px solid var(--color-gold);
    padding-left: var(--space-lg);
    margin: var(--space-2xl) 0;
    font-style: italic;
    color: var(--color-brass);
}

.page-content-wrapper .wp-block-image {
    margin: var(--space-2xl) 0;
}

.page-content-wrapper .wp-block-image img {
    width: 100%;
    height: auto;
}

.page-sidebar {
    background: rgba(13, 0, 0, 0.6);
    border: 2px solid rgba(212, 175, 55, 0.3);
    padding: var(--space-xl);
    margin-top: var(--space-2xl);
}

.page-sidebar h3 {
    font-size: var(--font-size-xl);
    color: var(--color-gold);
    margin-bottom: var(--space-md);
}

.page-back-link {
    display: inline-block;
    margin-bottom: var(--space-2xl);
}
</style>

<!-- PAGE HERO -->
<?php
// Hero background images & taglines per page slug
$hero_images = array(
    'info'                 => 'finalprogram_0219bw_e.gabrieledvy.jpg',
    'tickets'              => 'laibach-01-cheesy.jpg',
    'contact'              => 'abc_0414_e.gabrieledvy.jpg',
    'travel-accommodation' => 'clockdva_0455_e.gabrieledvy.jpg',
    'venue'                => 'esplendorg-03-cheesy.jpg',
);
$hero_taglines = array(
    'info'                 => __('Everything you need to know about VOD Fest 2026', 'vod-fest'),
    'tickets'              => __('Secure your place at the underground event of 2026', 'vod-fest'),
    'contact'              => __('Get in touch with the VOD Fest team', 'vod-fest'),
    'travel-accommodation' => __('Getting to Friedrichshafen and where to stay', 'vod-fest'),
    'venue'                => __('Kulturhaus Caserne // Friedrichshafen', 'vod-fest'),
);

$current_slug  = get_post_field('post_name', get_post());
$hero_img_file = isset($hero_images[$current_slug]) ? $hero_images[$current_slug] : '';
$hero_tagline  = isset($hero_taglines[$current_slug]) ? $hero_taglines[$current_slug] : '';
$hero_img_url  = $hero_img_file ? content_url('/uploads/images/fest-2025/heroes/' . $hero_img_file) : '';
?>
<section class="page-hero">
    <?php if ($hero_img_url) : ?>
        <div class="page-hero__bg">
            <img src="<?php echo esc_url($hero_img_url); ?>"
                 alt="<?php echo esc_attr(get_the_title()); ?>"
                 loading="eager">
        </div>
        <div class="page-hero__overlay"></div>
    <?php endif; ?>

    <div class="page-hero__content container">
        <?php while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php if ($hero_tagline) : ?>
                <p class="page-hero__tagline"><?php echo esc_html($hero_tagline); ?></p>
            <?php elseif (has_excerpt()) : ?>
                <p class="page-hero__tagline"><?php echo esc_html(get_the_excerpt()); ?></p>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
</section>

<!-- PAGE CONTENT -->
<section class="page-content-section">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>

            <div class="page-content-wrapper">
                <?php
                // Featured image
                if (has_post_thumbnail()) :
                ?>
                    <div style="margin-bottom: var(--space-3xl);">
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto;')); ?>
                    </div>
                <?php endif; ?>

                <!-- Main Content -->
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links" style="margin-top: var(--space-2xl);">' . esc_html__('Pages:', 'vod-fest'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>
                </article>

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </div>

        <?php endwhile; ?>
    </div>
</section>

<?php
get_footer();
