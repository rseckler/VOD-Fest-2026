<?php
/**
 * The template for displaying the band archive (lineup page)
 *
 * @package VOD_Fest_2026
 * @since 1.0.0
 */

get_header();
?>

<style>
.lineup-hero {
    min-height: 25vh;
    background: var(--color-blood-red);
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: var(--space-5xl) var(--space-xl);
}

.lineup-hero h1 {
    font-size: clamp(3rem, 6vw, 5rem);
    margin-bottom: var(--space-lg);
}

.lineup-subtitle {
    font-size: var(--font-size-xl);
    color: var(--color-brass);
    margin-bottom: var(--space-3xl);
}

.lineup-search {
    max-width: 600px;
    margin: 0 auto var(--space-2xl);
}

.lineup-search input {
    width: 100%;
    padding: 16px 24px;
    font-size: var(--font-size-lg);
}

.lineup-filters {
    display: flex;
    gap: var(--space-md);
    justify-content: center;
    flex-wrap: wrap;
}

.filter-btn {
    padding: var(--space-sm) var(--space-lg);
    background: transparent;
    border: 2px solid var(--color-gold);
    color: var(--color-gold);
    font-family: var(--font-display);
    font-size: var(--font-size-sm);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    cursor: pointer;
    transition: all var(--transition-base);
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--color-gold);
    color: var(--color-black);
}

.lineup-content {
    background: var(--color-black);
    padding: var(--space-5xl) 0;
}

.band-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: var(--space-2xl);
}

.no-results {
    text-align: center;
    padding: var(--space-5xl) var(--space-xl);
    color: var(--color-brass);
}
</style>

<!-- LINEUP HERO -->
<section class="lineup-hero">
    <div class="container" style="width: 100%;">
        <h1><?php esc_html_e('THE LINEUP', 'vod-fest'); ?></h1>
        <p class="lineup-subtitle">
            <?php
            $band_count = wp_count_posts('band')->publish;
            printf(
                esc_html__('%s Artists // 3 Days // 2 Stages', 'vod-fest'),
                '<strong>' . esc_html($band_count ?: '21') . '</strong>'
            );
            ?>
        </p>

        <!-- Search Bar -->
        <form class="lineup-search" method="get" action="<?php echo esc_url(get_post_type_archive_link('band')); ?>">
            <input type="text"
                   name="s"
                   class="form-input"
                   placeholder="<?php esc_attr_e('Search bands...', 'vod-fest'); ?>"
                   value="<?php echo esc_attr(get_search_query()); ?>">
        </form>

        <!-- Filters -->
        <div class="lineup-filters">
            <a href="<?php echo esc_url(get_post_type_archive_link('band')); ?>"
               class="filter-btn <?php echo !is_tax() ? 'active' : ''; ?>">
                <?php esc_html_e('All', 'vod-fest'); ?>
            </a>

            <?php
            // Festival Days
            $days = get_terms(array(
                'taxonomy' => 'festival_day',
                'hide_empty' => true,
            ));

            if ($days && !is_wp_error($days)) :
                foreach ($days as $day) :
                    $is_active = is_tax('festival_day', $day->slug);
                    ?>
                    <a href="<?php echo esc_url(get_term_link($day)); ?>"
                       class="filter-btn <?php echo $is_active ? 'active' : ''; ?>">
                        <?php echo esc_html($day->name); ?>
                    </a>
                    <?php
                endforeach;
            endif;

            // Stages
            $stages = get_terms(array(
                'taxonomy' => 'stage',
                'hide_empty' => true,
            ));

            if ($stages && !is_wp_error($stages)) :
                foreach ($stages as $stage) :
                    $is_active = is_tax('stage', $stage->slug);
                    ?>
                    <a href="<?php echo esc_url(get_term_link($stage)); ?>"
                       class="filter-btn <?php echo $is_active ? 'active' : ''; ?>">
                        <?php echo esc_html($stage->name); ?>
                    </a>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- LINEUP CONTENT -->
<section class="lineup-content">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="band-grid">
                <?php
                while (have_posts()) : the_post();
                    $start_time = get_post_meta(get_the_ID(), '_band_start_time', true);
                    $end_time = get_post_meta(get_the_ID(), '_band_end_time', true);
                    $day_terms = get_the_terms(get_the_ID(), 'festival_day');
                    $stage_terms = get_the_terms(get_the_ID(), 'stage');
                    $genre_terms = get_the_terms(get_the_ID(), 'band_genre');
                    ?>
                    <article class="band-card">
                        <div class="band-card-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('vod-fest-card', array('alt' => get_the_title()));
                                } else {
                                    echo '<img src="https://via.placeholder.com/400x400/4A0000/D4AF37?text=' . urlencode(get_the_title()) . '" alt="' . esc_attr(get_the_title()) . '">';
                                }
                                ?>
                            </a>
                        </div>

                        <h3 class="band-name">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>

                        <?php if ($genre_terms && !is_wp_error($genre_terms)) : ?>
                            <div style="margin-bottom: var(--space-sm);">
                                <?php foreach ($genre_terms as $genre) : ?>
                                    <span class="badge badge-day" style="font-size: 0.75rem;">
                                        <?php echo esc_html($genre->name); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($day_terms && !is_wp_error($day_terms)) : ?>
                            <p class="band-time" style="margin-bottom: var(--space-xs);">
                                <?php echo esc_html($day_terms[0]->name); ?>
                                <?php if ($start_time && $end_time) : ?>
                                    <br><?php echo esc_html($start_time . ' - ' . $end_time); ?>
                                <?php endif; ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($stage_terms && !is_wp_error($stage_terms)) : ?>
                            <span class="badge <?php echo $stage_terms[0]->slug === 'inside' ? 'badge-stage-inside' : 'badge-stage-outside'; ?>">
                                <?php echo esc_html($stage_terms[0]->name); ?>
                            </span>
                        <?php endif; ?>

                        <?php if (has_excerpt()) : ?>
                            <p style="margin-top: var(--space-md); font-size: var(--font-size-sm); color: var(--color-brass);">
                                <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                            </p>
                        <?php endif; ?>

                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary" style="margin-top: var(--space-lg); font-size: 0.875rem; padding: 8px 24px; width: 100%;">
                            <?php esc_html_e('View Band', 'vod-fest'); ?> →
                        </a>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('← Previous', 'vod-fest'),
                'next_text' => __('Next →', 'vod-fest'),
                'before_page_number' => '<span class="screen-reader-text">' . __('Page', 'vod-fest') . ' </span>',
            ));
            ?>

        <?php else : ?>
            <div class="no-results">
                <h2><?php esc_html_e('No bands found', 'vod-fest'); ?></h2>
                <p><?php esc_html_e('Try adjusting your search or filters.', 'vod-fest'); ?></p>
                <a href="<?php echo esc_url(get_post_type_archive_link('band')); ?>" class="btn btn-primary" style="margin-top: var(--space-xl);">
                    <?php esc_html_e('View All Bands', 'vod-fest'); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
