	<footer id="colophon" class="xfolio-footer">
		<div class="contact-info">
			<?php 
			$footer_email = get_theme_mod('xfolio_footer_email', 'contact@yourdomain.com');
			$footer_phone = get_theme_mod('xfolio_footer_phone', '+1234567890');
			?>
			<?php if ($footer_email) : ?>
				<a href="mailto:<?php echo esc_attr($footer_email); ?>" class="email-contact">
					<?php echo esc_html($footer_email); ?>
				</a>
			<?php endif; ?>
			<?php if ($footer_phone) : ?>
				<a href="tel:<?php echo esc_attr($footer_phone); ?>" class="email-me">
					<?php echo esc_html($footer_phone); ?>
				</a>
			<?php endif; ?>
		</div>

		<div class="xfolio-footer-social-share">
			<ul>
				<?php
				$social_profiles = get_theme_mod('xfolio_social_profiles', []);
				if (!empty($social_profiles)) :
					foreach ($social_profiles as $profile) :
						if (!empty($profile['url'])) :
							$platform = $profile['platform'];
							$icon_url = get_template_directory_uri() . '/assets/img/' . $platform . '.png';
							?>
							<li>
								<a href="<?php echo esc_url($profile['url']); ?>" target="_blank" class="social-icon <?php echo esc_attr($platform); ?>">
									<img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr(ucfirst($platform)); ?>" />
								</a>
							</li>
							<?php
						endif;
					endforeach;
				endif;
				?>
			</ul>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
