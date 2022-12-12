<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi">
	<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
	<?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

	<header class="header">
		<div class="header__container container">
			<div class="header__logo-wrapper">
				<a href="<?php site_url();?>">LOGO</a>
			</div>
			<div class="header__navigation">
				<ul>
					<li>
						<a href="#">Pulvinar</a>
					</li>
					<li>
						<a href="#">Fusce</a>
					</li>
					<li>
						<a href="#">Lectus</a>
					</li>
				</ul>
			</div>
			<a href="#" class="button outlined color-dark-gray border-color-dark-gray hover-color-white hover-bg-color-dark-gray">Button</a>
		</div>
	</header>