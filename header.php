<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<link rel="icon" href="<?= get_template_directory_uri(); ?>/images/favicon.png" type="image/x-icon"/>
	<title><?= bloginfo(); ?></title>
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/loading.css">
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/animate.min.css">
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/slick.css">
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/slick-theme.css">
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/style.css">
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/fonts.css">
	<?php wp_head(); ?>
</head>
<body>
	<?php global $epv_options; ?>
	<h1 class="hide"><?= bloginfo(); ?></h1>

	<div class="ads-header">
		<?= do_shortcode( '[top_ads_slide]' ); ?>
	</div>

	<div class="sticky desktop">
		<div class="container">
			<div class="show-sticky" style="display: none;">
				<div class="row">
					<div class="col-sm-6 col-left">
						<p><?= $epv_options['informa-title']; ?></p>
						<div>
							<ul>
								<li><a href="https://informa.com">INFORMA PLC</a></li>
								<li><a href="https://informa.com/about-us">ABOUT US</a></li>
								<li><a href="https://informa.com/investors/">INVESTOR RELATIONS</a></li>
								<li><a href="https://informa.com/talent/">TALENT</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-right">
						<?= $epv_options['informa-text']; ?>
					</div>
				</div>
			</div>
			<div class="btn-informa"><span class="">Informa</span></div>
		</div>
	</div>
	<!-- header -->
	<header id="header">
		<div class="header-left">
			<a href="<?= site_url(); ?>" title="" class="header-left__main__logo">
				<img src="<?= $epv_options['logo']['url']; ?>" alt="">
			</a>
			<?php if ( isset( $epv_options['other-logo'] ) && !empty( $epv_options['other-logo'] ) ) {
				for ($i = 0; $i < count($epv_options['other-logo']); $i++) {?>
					<a href="<?= ($epv_options['other-logo'][$i]['url'] != '') ? $epv_options['other-logo'][$i]['url'] : '#'; ?>" title="" class="header-left__other__logo" target="_blank">
						<img src="<?= $epv_options['other-logo'][$i]['image'];?>" alt="">
					</a>
				<?php }
			} ?>  
		</div>

		<div class="header-right">
			<div class="header-right__box">
				<strong>
					<?php 
					$timestamp_from = strtotime($epv_options['top-head-from-date']);
					$timestamp_to = strtotime($epv_options['top-head-to-date']);
					$top_head_title = changeLang($epv_options['top-head-title'],$epv_options['top-head-title-vi']);
					?>
					<?= (isset($epv_options['top-head-to-date'])) ? date_i18n("d", $timestamp_from)."-".date_i18n("d", $timestamp_to) : $timestamp_from  ?> <?= changeLang(date_i18n("F, Y", $timestamp_from),"Tháng".date_i18n(" m, Y", $timestamp_from));?></strong>
				<span><?= $top_head_title; ?></span>
			</div>
		</div>

		<div class="header-middle">
			<?= custom_polylang_languages(); ?>
			<div class="header-middle__menu">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'=> false,
					'items_wrap' => '<ul>%3$s</ul>',
				));
				?>
			</div>
		</div>
	</header>
	<!-- /header -->

	<div class="clearfix"></div>

	<!-- Content -->
	<main id="content">