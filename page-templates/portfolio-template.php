<?php
/**
 * Template Name: Portfolio Page
 * 
 * This is a custom page template for displaying the portfolio grid
 */

get_header();
?>

<div class="xfolio-portfolio-page">
    <div class="container">
        <?php
        // Display the page content if any
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/content', 'page');
        endwhile;
        ?>

        <div class="xfolio-portfolio-archive">
            <div class="xfolio-portfolio-grid">
                <?php
                // Query portfolio items
                $args = array(
                    'post_type' => 'xfolio-portfolio',
                    'posts_per_page' => -1,
                );
                
                $portfolio_query = new WP_Query($args);

                if ($portfolio_query->have_posts()) :
                    while ($portfolio_query->have_posts()) :
                        $portfolio_query->the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('xfolio-portfolio-item'); ?> data-post-id="<?php echo get_the_ID(); ?>">
                            <div class="xfolio-portfolio-item-inner">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="xfolio-portfolio-thumbnail">
                                        <a href="<?php the_permalink(); ?>" class="xfolio-portfolio-link">
                                            <?php the_post_thumbnail('large'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="xfolio-portfolio-content">
                                    <h2 class="xfolio-portfolio-title">
                                        <a href="<?php the_permalink(); ?>" class="xfolio-portfolio-link"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="portfolio-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    
                    wp_reset_postdata();
                else :
                    echo '<p>' . esc_html__('No portfolio items found.', 'xfolio') . '</p>';
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Panel Structure -->
<div class="xfolio-portfolio-overlay"></div>
<div class="xfolio-portfolio-panel">
    <div class="xfolio-portfolio-panel-inner">
        <!-- Content will be loaded here via AJAX -->
    </div>
</div>

<?php
get_footer(); 