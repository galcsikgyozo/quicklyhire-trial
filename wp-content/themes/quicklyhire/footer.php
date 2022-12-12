	<footer class="footer">
		<div class="footer__container container">
			<?php if(!empty(get_theme_mod('footer-logo-setting'))){ ?>
			<div class="footer__logo-wrapper">
				<a href="<?php site_url();?>">
					<img src="<?php echo get_theme_mod('footer-logo-setting'); ?>" alt="<?php echo get_bloginfo('name'); ?> website footer logo" />
				</a>
			</div>
			<?php } ?>
			<?php
			$footer_menu = wp_nav_menu(
				array(
					'echo' => FALSE,
					'theme_location' => 'footer-navigation',
					'container_class' => 'footer__navigation'
				)
			);

			if(!empty(get_theme_mod('copyright-setting')) || !empty($footer_menu)){ ?>
			<div class="footer__policies-wrapper">
				<div class="footer__copyright">
					<?php if(!empty(get_theme_mod('copyright-setting'))){ echo get_theme_mod('copyright-setting'); } ?>
				</div>
				<?php
					if(!empty($footer_menu)){
						echo $footer_menu;
					}
				?>
			</div>
			<?php } ?>
		</div>
	</footer>
	<?php wp_footer(); ?>
  </body>
</html>