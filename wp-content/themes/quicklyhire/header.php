<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
	<?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

	<header class="header">
		<div class="header__container container">
			<div class="header__logo-wrapper">
				<?php if(!empty(get_theme_mod('header-logo-setting'))){ ?>
				<a href="<?php echo site_url();?>">
					<img src="<?php echo get_theme_mod('header-logo-setting'); ?>" alt="<?php echo get_bloginfo('name'); ?> website header logo" loading="lazy" />
				</a>
				<?php } ?>
			</div>
			<?php
			$header_menu = wp_nav_menu(
				array(
					'theme_location' => 'header-navigation',
					'container_class' => 'header__navigation'
				)
			);
			?>
			<?php if(!empty(get_theme_mod('button-label-setting')) && !empty(get_theme_mod('button-url-setting'))){ ?>
			<a href="<?=get_theme_mod('button-url-setting');?>" class="button outlined color-dark-gray border-color-dark-gray hover-color-white hover-bg-color-dark-gray"><?=get_theme_mod('button-label-setting');?></a>
			<?php } ?>
		</div>
	</header>