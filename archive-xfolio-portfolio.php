<?php
/**
 * The template for displaying portfolio archive
 */

get_header();
?>

<div class="portfolio-archive">
    <div class="container">
        <div class="portfolio-grid">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-item'); ?>>
                        <div class="portfolio-item-inner">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="portfolio-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('large'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="portfolio-content">
                                <h2 class="portfolio-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="portfolio-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php
                endwhile;
                
                the_posts_navigation();
            endif;
            ?>
        </div>
    </div>
</div>

<?php
get_footer(); 