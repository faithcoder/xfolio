
	<footer id="colophon" class="xfolio-footer">
		<div class="contact-info">
			<a href="#" class="email-contact">contact@hiemran.com</a>
			<a href="#" class="email-me">Email Me</a>
		</div><!-- .site-info -->
		<div class="xfolio-footer-social-share">
			<ul>
				<li>
					<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode( get_permalink() ); ?>" target="_blank" class="social-icon linkedin">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/linkedin.png" alt="Share on LinkedIn" />
					</a>
				</li>
				<li>
					<a href="javascript:void(0)" onclick="navigator.clipboard.writeText('<?php echo esc_js( esc_url( get_permalink() ) ); ?>'); alert('Post URL copied to clipboard!');" class="social-icon instagram">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/instagram.png" alt="Share on Instagram" />
					</a>

				</li>
				<li>
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" target="_blank" class="social-icon facebook">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook.png" alt="Share on Facebook" />
					</a>
				</li>
				<li>
					<a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ); ?>&url=<?php echo urlencode( get_permalink() ); ?>" target="_blank" class="social-icon twitter">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter.png" alt="Share on Twitter" />
					</a>
				</li>
				<li>
					<a href="https://www.behance.net" target="_blank">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/behance.png" alt="Share on Behance" />
					</a>
				</li>
			</ul>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
