

	<div class="xfolio-posts">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php
			// Display the post thumbnail (featured image)
			if ( has_post_thumbnail() ) :
				xfolio_post_thumbnail();
			endif;
			?>

			<header class="entry-header">
				<?php
				// Display the title differently for single posts and blog list
				if ( is_singular() ) :
					the_title( '<h1 class="xfolio-single-post-title">', '</h1>' );
				else :
					the_title( '<h2 class="xfolio-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
			</header><!-- .entry-header -->

			<?php if ( is_singular() ) : ?>
				<div class="entry-content">
					<?php
					// Display the full content on single post pages
					the_content(
						sprintf(
							wp_kses(
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'xfolio' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);

					// Pagination for multi-page posts
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'xfolio' ),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->
			<?php endif; ?>
			
		</article><!-- #post-<?php the_ID(); ?> -->
	</div>

