<?php
/**
 * The template for displaying single portfolio items
 */

get_header();
?>

<div class="portfolio-single">
    <div class="portfolio-panel">
        <div class="portfolio-panel-inner">
            <button class="close-panel">&times;</button>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="portfolio-featured-image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    the_content();
                    
                    // Display portfolio categories
                    $terms = get_the_terms(get_the_ID(), 'portfolio-category');
                    if ($terms && !is_wp_error($terms)) :
                        echo '<div class="portfolio-categories">';
                        echo '<span class="cat-label">' . esc_html__('Categories:', 'xfolio') . '</span>';
                        foreach ($terms as $term) {
                            echo '<span class="portfolio-category">' . esc_html($term->name) . '</span>';
                        }
                        echo '</div>';
                    endif;
                    ?>
                </div>
            </article>
        </div>
    </div>
</div>

<?php
get_footer(); 