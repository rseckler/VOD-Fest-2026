<?php
/**
 * The main template file
 *
 * This is the most generic template file and is used to display a page when
 * nothing more specific matches a query.
 *
 * @package VOD_Fest_2026
 * @since 1.0.0
 */

get_header();
?>

<main class="site-main section">
    <div class="container">
        <?php
        if (have_posts()) :
            ?>
            <div class="posts-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
                ?>
            </div>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('← Previous', 'vod-fest'),
                'next_text' => __('Next →', 'vod-fest'),
            ));
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
