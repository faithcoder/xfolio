<?php

get_header();
?>
<div class="xfolio-social-share">
<span>share</span>
        <!-- Facebook -->
        <a href="#<?php echo urlencode( get_permalink() ); ?>" target="_blank" class="social-icon facebook">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/link.png" alt="Share on Facebook" />
        </a>
        <!-- Facebook -->
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" target="_blank" class="social-icon facebook">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook.png" alt="Share on Facebook" />
        </a>

        <!-- Twitter -->
        <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ); ?>&url=<?php echo urlencode( get_permalink() ); ?>" target="_blank" class="social-icon twitter">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter.png" alt="Share on Twitter" />
        </a>

        <!-- LinkedIn -->
        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode( get_permalink() ); ?>" target="_blank" class="social-icon linkedin">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/linkedin.png" alt="Share on LinkedIn" />
        </a>
    </div>
<main id="primary" class="main-wrapper">
<div class="xfolio-post-details">
    <?php
    while ( have_posts() ) :
        the_post();
    ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <!-- Post Date -->
            <div class="xfolio-post-date">
                <?php echo get_the_date(); ?>
            </div>

            <!-- Post Title -->
            <header class="entry-header">
                <?php
                the_title( '<h1 class="xfolio-single-post-title">', '</h1>' );
                ?>
            </header><!-- .entry-header -->

            <!-- Featured Image -->
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="xfolio-post-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>

            <!-- Post Content -->
            <div class="xfolio-entry-content">
                <?php
                the_content();

                // Optional: If the post has multiple pages, show pagination
                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'xfolio' ),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div><!-- .entry-content -->

        </article><!-- #post-<?php the_ID(); ?> -->

    <?php
    endwhile; // End of the loop.
    ?>
</div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
