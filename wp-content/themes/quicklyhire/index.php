<?php get_header(); ?>

	<main class="template-home">
		<?php $hero = get_field('home__hero'); ?>
		<?php if($hero['enabled'] == true){ ?>
		<section class="home__hero">
			<div class="home__hero__container container">
				<div class="home__hero__row row">
					<div class="col-lg-6 pb-5">
						<?php if(!empty($hero['title'])){ ?><h1><?=$hero['title'];?></h1><?php } ?>
						<?php if(!empty($hero['content'])){ ?>
						<div class="mb-45">
							<?php echo $hero['content']; ?>
						</div>
						<?php } ?>
						<?php if(!empty($hero['cta']['url'])){ ?>
						<a href="<?=$hero['cta']['url'];?>" <?php if(!empty($hero['cta']['target'])){ echo 'target="'.$hero['cta']['targer'].'"'; } ?> class="button bg-color-purple hover-bg-color-dark-gray color-white hover-color-white border-color-purple hover-border-color-dark-gray"><?=$hero['cta']['title']; ?></a>
						<?php } ?>
					</div>
					<?php if(!empty($hero['image'])){ ?>
					<div class="col-lg-6">
						<img src="<?=$hero['image']['sizes']['medium'];?>" alt="<?=$hero['image']['alt'];?>" class="w-100" />
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php } ?>

		<?php $text = get_field('home__text'); ?>
		<?php if($text['enabled'] == true){ ?>
		<section class="home__text">
			<div class="home__text__container container text-lg-center">
				<?php if(!empty($text['title'])){ ?><h2 class="h3"><?=$text['title'];?></h1><?php } ?>
			</div>
		</section>
		<?php } ?>

		<?php $content = get_field('home__content'); ?>
		<?php if($content['enabled'] == true){ ?>
		<section class="home__content">
			<div class="home__content__container container">
				<?php if(!empty($content['title']) && !empty($content['content'])){ ?>
				<div class="home__content__text-wrapper">
					<?php if(!empty($content['title'])){ ?><h3><?=$content['title'];?></h3><?php } ?>
					<?php if(!empty($content['content'])){ echo $content['content']; } ?>
				</div>
				<?php } ?>
				<?php if(!empty($content['image'])){ ?>
				<div class="home__content__image-wrapper">
					<img src="<?=$content['image']['sizes']['medium'];?>" alt="<?=$content['image']['alt'];?>" />
				</div>
				<?php } ?>
			</div>
		</section>
		<?php } ?>

	</main>

<?php get_footer(); ?>