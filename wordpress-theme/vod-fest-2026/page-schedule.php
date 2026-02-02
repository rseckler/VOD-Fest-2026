<?php
/**
 * Template Name: Schedule
 * Template for displaying the festival schedule/timetable
 *
 * @package VOD_Fest_2026
 * @since 1.0.0
 */

get_header();
?>

<style>
.schedule-hero {
    min-height: 40vh;
    background: var(--color-blood-red);
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: var(--space-4xl) var(--space-xl);
}

.schedule-hero h1 {
    font-size: clamp(3rem, 6vw, 5rem);
    margin-bottom: var(--space-lg);
}

.schedule-section {
    background: var(--color-black);
    padding: var(--space-5xl) 0;
}

.tabs {
    display: flex;
    justify-content: center;
    gap: var(--space-md);
    margin-bottom: var(--space-3xl);
    flex-wrap: wrap;
}

.tab {
    padding: var(--space-md) var(--space-2xl);
    background: transparent;
    border: 2px solid var(--color-gold);
    color: var(--color-gold);
    font-family: var(--font-display);
    font-size: var(--font-size-lg);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    cursor: pointer;
    transition: all var(--transition-base);
}

.tab:hover,
.tab.active {
    background: var(--color-gold);
    color: var(--color-black);
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}

.schedule-item {
    display: grid;
    grid-template-columns: 150px 1fr 100px;
    gap: var(--space-xl);
    padding: var(--space-xl);
    background: rgba(13, 0, 0, 0.6);
    border-left: 4px solid var(--color-gold);
    margin-bottom: var(--space-lg);
    transition: all var(--transition-base);
    align-items: center;
}

.schedule-item:hover {
    background: rgba(74, 0, 0, 0.8);
    border-left-color: var(--color-orange);
    transform: translateX(8px);
}

.schedule-time {
    font-family: var(--font-mono);
    font-size: var(--font-size-lg);
    color: var(--color-gold);
    font-weight: var(--font-weight-bold);
}

.schedule-details {
    display: flex;
    flex-direction: column;
    gap: var(--space-sm);
}

.schedule-band {
    font-family: var(--font-display);
    font-size: var(--font-size-xl);
    color: var(--color-cream);
    margin: 0;
}

.schedule-band a {
    color: var(--color-cream);
    text-decoration: none;
    transition: color var(--transition-base);
}

.schedule-band a:hover {
    color: var(--color-gold);
}

.schedule-stage {
    display: inline-block;
}

.schedule-duration {
    font-size: var(--font-size-sm);
    color: var(--color-brass);
    text-align: right;
}

.stage-divider {
    margin: var(--space-2xl) 0;
    text-align: center;
    color: var(--color-brass);
    font-family: var(--font-display);
    font-size: var(--font-size-lg);
    text-transform: uppercase;
    letter-spacing: 0.1em;
}

@media (max-width: 767px) {
    .schedule-item {
        grid-template-columns: 1fr;
        gap: var(--space-md);
    }

    .schedule-duration {
        text-align: left;
    }

    .tabs {
        flex-direction: column;
    }

    .tab {
        width: 100%;
    }
}
</style>

<!-- SCHEDULE HERO -->
<section class="schedule-hero">
    <div class="container" style="width: 100%;">
        <h1>FESTIVAL SCHEDULE</h1>
        <p style="font-size: var(--font-size-xl); color: var(--color-brass); margin-bottom: var(--space-xl);">
            <?php esc_html_e('17-19 July 2026 // 17:00 - 24:00 Daily', 'vod-fest'); ?>
        </p>
        <p style="font-size: var(--font-size-lg); color: var(--color-cream); max-width: 800px; margin: 0 auto;">
            <?php esc_html_e('Two stages, three days of industrial, experimental and avant-garde music. Times are subject to change.', 'vod-fest'); ?>
        </p>
    </div>
</section>

<!-- SCHEDULE CONTENT -->
<section class="schedule-section">
    <div class="container">

        <!-- Tabs -->
        <div class="tabs" role="tablist">
            <button class="tab active" data-tab-target="#friday-schedule" role="tab" aria-selected="true">
                <?php esc_html_e('Friday, July 17', 'vod-fest'); ?>
            </button>
            <button class="tab" data-tab-target="#saturday-schedule" role="tab" aria-selected="false">
                <?php esc_html_e('Saturday, July 18', 'vod-fest'); ?>
            </button>
            <button class="tab" data-tab-target="#sunday-schedule" role="tab" aria-selected="false">
                <?php esc_html_e('Sunday, July 19', 'vod-fest'); ?>
            </button>
        </div>

        <?php
        // Get all festival days
        $days = array(
            'friday' => __('Friday, July 17', 'vod-fest'),
            'saturday' => __('Saturday, July 18', 'vod-fest'),
            'sunday' => __('Sunday, July 19', 'vod-fest')
        );

        foreach ($days as $day_slug => $day_name) :
            // Query bands for this day
            $bands_query = new WP_Query(array(
                'post_type' => 'band',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'festival_day',
                        'field' => 'slug',
                        'terms' => $day_slug,
                    ),
                ),
                'meta_key' => '_band_start_time',
                'orderby' => 'meta_value',
                'order' => 'ASC',
            ));

            $active_class = ($day_slug === 'friday') ? 'active' : '';
        ?>

        <!-- <?php echo ucfirst($day_slug); ?> Tab Content -->
        <div id="<?php echo esc_attr($day_slug); ?>-schedule" class="tab-content <?php echo $active_class; ?>" role="tabpanel">

            <?php if ($bands_query->have_posts()) :
                // Group bands by stage
                $inside_bands = array();
                $outside_bands = array();

                while ($bands_query->have_posts()) : $bands_query->the_post();
                    $stage_terms = get_the_terms(get_the_ID(), 'stage');
                    $band_data = array(
                        'id' => get_the_ID(),
                        'title' => get_the_title(),
                        'permalink' => get_permalink(),
                        'start_time' => get_post_meta(get_the_ID(), '_band_start_time', true),
                        'end_time' => get_post_meta(get_the_ID(), '_band_end_time', true),
                        'stage' => $stage_terms && !is_wp_error($stage_terms) ? $stage_terms[0] : null,
                    );

                    if ($band_data['stage'] && $band_data['stage']->slug === 'inside') {
                        $inside_bands[] = $band_data;
                    } else {
                        $outside_bands[] = $band_data;
                    }
                endwhile;

                // Display Inside Stage
                if (!empty($inside_bands)) : ?>
                    <div class="stage-divider">
                        <span class="badge badge-stage-inside" style="font-size: var(--font-size-xl); padding: var(--space-md) var(--space-xl);">
                            <?php esc_html_e('Inside Stage', 'vod-fest'); ?>
                        </span>
                    </div>

                    <?php foreach ($inside_bands as $band) :
                        $duration = '';
                        if ($band['start_time'] && $band['end_time']) {
                            $start = strtotime($band['start_time']);
                            $end = strtotime($band['end_time']);
                            $diff = ($end - $start) / 60;
                            $duration = $diff . ' min';
                        }
                    ?>
                        <div class="schedule-item">
                            <span class="schedule-time">
                                <?php echo esc_html($band['start_time']); ?>
                                <?php if ($band['end_time']) : ?>
                                    - <?php echo esc_html($band['end_time']); ?>
                                <?php endif; ?>
                            </span>
                            <div class="schedule-details">
                                <h4 class="schedule-band">
                                    <a href="<?php echo esc_url($band['permalink']); ?>">
                                        <?php echo esc_html($band['title']); ?>
                                    </a>
                                </h4>
                                <span class="schedule-stage badge badge-stage-inside">
                                    <?php echo esc_html($band['stage']->name); ?>
                                </span>
                            </div>
                            <?php if ($duration) : ?>
                                <span class="schedule-duration"><?php echo esc_html($duration); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif;

                // Display Outside Stage
                if (!empty($outside_bands)) : ?>
                    <div class="stage-divider" style="margin-top: var(--space-4xl);">
                        <span class="badge badge-stage-outside" style="font-size: var(--font-size-xl); padding: var(--space-md) var(--space-xl);">
                            <?php esc_html_e('Outside Stage', 'vod-fest'); ?>
                        </span>
                    </div>

                    <?php foreach ($outside_bands as $band) :
                        $duration = '';
                        if ($band['start_time'] && $band['end_time']) {
                            $start = strtotime($band['start_time']);
                            $end = strtotime($band['end_time']);
                            $diff = ($end - $start) / 60;
                            $duration = $diff . ' min';
                        }
                    ?>
                        <div class="schedule-item">
                            <span class="schedule-time">
                                <?php echo esc_html($band['start_time']); ?>
                                <?php if ($band['end_time']) : ?>
                                    - <?php echo esc_html($band['end_time']); ?>
                                <?php endif; ?>
                            </span>
                            <div class="schedule-details">
                                <h4 class="schedule-band">
                                    <a href="<?php echo esc_url($band['permalink']); ?>">
                                        <?php echo esc_html($band['title']); ?>
                                    </a>
                                </h4>
                                <span class="schedule-stage badge badge-stage-outside">
                                    <?php echo esc_html($band['stage']->name); ?>
                                </span>
                            </div>
                            <?php if ($duration) : ?>
                                <span class="schedule-duration"><?php echo esc_html($duration); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            <?php else : ?>
                <div style="text-align: center; padding: var(--space-4xl); color: var(--color-brass);">
                    <p><?php esc_html_e('Schedule coming soon...', 'vod-fest'); ?></p>
                </div>
            <?php endif;

            wp_reset_postdata();
            ?>
        </div>

        <?php endforeach; ?>

        <!-- Info Box -->
        <div class="card" style="margin-top: var(--space-4xl); max-width: 800px; margin-left: auto; margin-right: auto;">
            <h3 style="font-size: var(--font-size-2xl); color: var(--color-gold); margin-bottom: var(--space-lg);">
                <?php esc_html_e('Important Information', 'vod-fest'); ?>
            </h3>
            <ul style="list-style: none; padding: 0;">
                <li style="margin-bottom: var(--space-md);">
                    <strong style="color: var(--color-gold);">⏰</strong>
                    <?php esc_html_e('Doors open at 17:00 each day', 'vod-fest'); ?>
                </li>
                <li style="margin-bottom: var(--space-md);">
                    <strong style="color: var(--color-gold);">⚠️</strong>
                    <?php esc_html_e('Times are subject to change - check website day of event', 'vod-fest'); ?>
                </li>
                <li style="margin-bottom: var(--space-md);">
                    <strong style="color: var(--color-gold);">🎵</strong>
                    <?php esc_html_e('Some sets may have overlapping times across stages', 'vod-fest'); ?>
                </li>
                <li>
                    <strong style="color: var(--color-gold);">📱</strong>
                    <?php esc_html_e('Download the full schedule as PDF', 'vod-fest'); ?>
                    <a href="#" class="link" style="margin-left: var(--space-sm);"><?php esc_html_e('(Coming Soon)', 'vod-fest'); ?></a>
                </li>
            </ul>
        </div>

    </div>
</section>

<?php
get_footer();
