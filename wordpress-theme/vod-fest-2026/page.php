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
    min-height: 40vh;
    background: var(--color-blood-red);
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: var(--space-4xl) var(--space-xl);
    position: relative;
}

.page-hero h1 {
    font-size: clamp(2.5rem, 6vw, 5rem);
    margin-bottom: var(--space-lg);
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
<section class="page-hero">
    <div class="container" style="width: 100%;">
        <?php while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php if (has_excerpt()) : ?>
                <p style="font-size: var(--font-size-lg); color: var(--color-brass); max-width: 800px; margin: 0 auto;">
                    <?php echo get_the_excerpt(); ?>
                </p>
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
