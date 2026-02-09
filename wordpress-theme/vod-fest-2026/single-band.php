<?php
/**
 * Single Band Template
 *
 * @package VOD_Fest_2026
 * @since 1.0.0
 */

get_header();

while (have_posts()) : the_post();
    $start_time = get_post_meta(get_the_ID(), '_band_start_time', true);
    $end_time = get_post_meta(get_the_ID(), '_band_end_time', true);
    $bandcamp_url = get_post_meta(get_the_ID(), '_band_bandcamp_url', true);
    $day_terms = get_the_terms(get_the_ID(), 'festival_day');
    $stage_terms = get_the_terms(get_the_ID(), 'stage');
    $genre_terms = get_the_terms(get_the_ID(), 'band_genre');
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('section'); ?>>
        <div class="container">
            <a href="<?php echo esc_url(get_post_type_archive_link('band')); ?>" class="link" style="display: inline-block; margin-bottom: var(--space-xl);">
                ← <?php esc_html_e('Back to Lineup', 'vod-fest'); ?>
            </a>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: var(--space-3xl); margin-bottom: var(--space-4xl);">
                <!-- Band Photo -->
                <div>
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto;', 'alt' => get_the_title())); ?>
                    <?php endif; ?>
                </div>

                <!-- Band Info -->
                <div>
                    <h1 style="font-size: var(--font-size-5xl); margin-bottom: var(--space-lg);"><?php the_title(); ?></h1>

                    <?php if ($genre_terms && !is_wp_error($genre_terms)) : ?>
                        <div style="margin-bottom: var(--space-lg);">
                            <?php foreach ($genre_terms as $genre) : ?>
                                <span class="badge badge-day"><?php echo esc_html($genre->name); ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($day_terms || $stage_terms || $start_time) : ?>
                        <div class="card" style="margin-bottom: var(--space-xl);">
                            <h2 style="font-size: var(--font-size-xl); margin-bottom: var(--space-md); color: var(--color-gold);">
                                <?php esc_html_e('Performance Details', 'vod-fest'); ?>
                            </h2>
                            <?php if ($day_terms && !is_wp_error($day_terms)) : ?>
                                <p><strong><?php esc_html_e('Date:', 'vod-fest'); ?></strong> <?php echo esc_html($day_terms[0]->name); ?></p>
                            <?php endif; ?>
                            <?php if ($start_time && $end_time) : ?>
                                <p><strong><?php esc_html_e('Time:', 'vod-fest'); ?></strong> <?php echo esc_html($start_time . ' - ' . $end_time); ?></p>
                            <?php endif; ?>
                            <?php if ($stage_terms && !is_wp_error($stage_terms)) : ?>
                                <p><strong><?php esc_html_e('Stage:', 'vod-fest'); ?></strong> <?php echo esc_html($stage_terms[0]->name); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($bandcamp_url) : ?>
                        <a href="<?php echo esc_url($bandcamp_url); ?>" class="btn btn-primary" target="_blank" rel="noopener">
                            <?php esc_html_e('Listen on Bandcamp ↗', 'vod-fest'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Band Bio -->
            <?php if (get_the_content()) : ?>
                <div style="max-width: 800px; margin-bottom: var(--space-4xl);">
                    <h2 style="font-size: var(--font-size-3xl); margin-bottom: var(--space-xl); color: var(--color-gold);">
                        <?php esc_html_e('About', 'vod-fest'); ?>
                    </h2>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    <?php $website_url = get_post_meta(get_the_ID(), '_band_website_url', true); ?>
                    <?php if ($website_url) : ?>
                        <p style="margin-top: var(--space-xl);">
                            <a href="<?php echo esc_url($website_url); ?>" target="_blank" rel="noopener" class="btn btn-secondary" style="font-size: var(--font-size-base);">
                                <?php esc_html_e('Visit Website', 'vod-fest'); ?> ↗
                            </a>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Media Embeds -->
            <?php
            $bandcamp_embed = get_post_meta(get_the_ID(), '_band_bandcamp_embed', true);
            $youtube_id = get_post_meta(get_the_ID(), '_band_youtube_id', true);

            if ($bandcamp_embed || $youtube_id) : ?>
                <div style="margin-bottom: var(--space-4xl);">
                    <h2 style="font-size: var(--font-size-3xl); margin-bottom: var(--space-xl); color: var(--color-gold);">
                        <?php esc_html_e('Listen & Watch', 'vod-fest'); ?>
                    </h2>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: var(--space-2xl);">
                        <?php if ($bandcamp_embed) : ?>
                            <div class="bandcamp-embed">
                                <?php echo wp_kses($bandcamp_embed, array(
                                    'iframe' => array(
                                        'style'    => true,
                                        'src'      => true,
                                        'seamless' => true,
                                        'width'    => true,
                                        'height'   => true,
                                        'title'    => true,
                                    ),
                                    'a' => array('href' => true),
                                )); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($youtube_id) : ?>
                            <div class="youtube-embed" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; background: var(--color-black);">
                                <iframe
                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                    src="https://www.youtube.com/embed/<?php echo esc_attr($youtube_id); ?>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Newsletter Signup -->
            <div style="margin-top: var(--space-5xl);">
                <?php echo do_shortcode('[newsletter title="Don\'t Miss Any Updates" subtitle="Subscribe to get lineup announcements, festival news, and exclusive content."]'); ?>
            </div>
        </div>
    </article>

    <?php
endwhile;

get_footer();
