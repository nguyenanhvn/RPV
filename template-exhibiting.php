<?php 
/**
 * Template Name: Exibiting
 */
get_header();
global $des_options;
wp_reset_query();
$whyExhibitBg = rwmb_meta("prefix_exhibit-whyexhibit_bg",array('size' => 'full'));
$whyExhibitImg = rwmb_meta("prefix_exhibit-whyexhibit_img",array('size' => 'full'));
$whyExhibitTitle = rwmb_meta("prefix_exhibit-whyexhibit_title");
?>
<!-- Content Why -->
<section class="content-why">	
	<div class="box__right" style="background-image: url(<?= $whyExhibitBg['url']; ?>);">
		<img src="<?= $whyExhibitImg['url']; ?>" alt="">
	</div>
	<div class="container">
		<div class="content-why_box"> 
			<div class="box__left">
				<h2 class="heading"><?= $whyExhibitTitle; ?></h2>

				<div class="clearfix"></div>
				<?php
				$whyExhibitGroup = rwmb_meta('prefix_exhibit-group');
				foreach ($whyExhibitGroup as $whyExhibitItem): 
					$whyIconID = $whyExhibitItem['prefix_exhibit-image'];
					$whyIcon = wp_get_attachment_image_url( $whyIconID, 'full');
					$whyTitle = $whyExhibitItem['prefix_exhibit-title'];
					$whyParagraph = $whyExhibitItem['prefix_exhibit-paragraph'];
					?>
					<div class="item">
						<div class="item__img">
							<img src="<?= $whyIcon; ?>" alt="">
						</div>
						<div class="item__caption">
							<div class="item__title"><?= $whyTitle; ?></div>
							<div class="item__parapraph"><?= $whyParagraph; ?></div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>		
</section> <!-- /Content Why -->

<div class="clearfix"></div>

<!-- Projects -->
<?php
	$statisticsHeading = rwmb_meta("prefix-statistics-head-title");
	$statisticsBackground = rwmb_meta("prefix-statistics-background", array( 'size' => 'full' ));
	$statisticsGroup = rwmb_meta("prefix-statistics-statistics_group");
	$statisticsDes = rwmb_meta("prefix-statistics-des");
?>
<section class="projects">
	<div class="projects-top">
		<div class="cover" style="background-image: url(<?= $statisticsBackground['url'];?>);"></div>
		<div class="container">
			<div class="projects-top__title">
				<h2 class="heading"><?= $statisticsHeading; ?></h2>						
			</div>

			<div class="clearfix"></div>

			<div class="project-top__content">
				<div class="box">
					<ul class="no-style">
						<?php foreach ($statisticsGroup as $statisticsItem):
							$statisticsValue = $statisticsItem['prefix-statistics-area'];
							$statisticsIconID = $statisticsItem['prefix-statistics-icon'];
							$statisticsIconID = $statisticsItem['prefix-statistics-icon'];
							if(isset($statisticsItem['prefix-statistics-unit'])){
								$statisticsUnit = $statisticsItem['prefix-statistics-unit_type'];
							}
							$statisticsTitle = $statisticsItem['prefix-statistics-title'];
							$statisticsIcon = wp_get_attachment_image_url( $statisticsIconID, 'full' );

						?>
						<li data-count="<?= $statisticsValue;?>">
							<div class="icon">
								<img src="<?= $statisticsIcon; ?>" alt="">
							</div>
							<div class="number"><span>0</span><?= (isset($statisticsUnit)) ? $statisticsUnit : ""; ?></div>
							<div class="text">
								<span>
									<?= $statisticsTitle; ?>
								</span>
							</div>
						</li>	
						<?php endforeach;?>
					</ul>

					<div class="noted">
						<i class="fa fa-star"></i>
						<?= $statisticsDes; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> 
<!-- /Projects -->

<div class="clearfix"></div>

<!-- Content Icons -->
<section class="content-icons" style="background-image: url(<?= get_template_directory_uri(); ?>/images/exposure.jpg);">
	<div class="container">
		<div class="content-icons_box">
			<?php $exposureT = rwmb_meta('prefix_exhibit-exposure_title'); ?>
			<h2 class="heading"><?= $exposureT; ?></h2>
			<div class="items">
				<?php 
				$exposureList = rwmb_meta('prefix_exhibit-exposure_group');
				foreach ($exposureList as $exposureItem):
					$exposureIconID = $exposureItem['prefix_exhibit-image'];
					$exposureIcon = wp_get_attachment_image_url( $exposureIconID, 'full');
					$exposureTitle = $exposureItem['prefix_exhibit-title'];
					?>
					<div class="item">
						<div class="item__icon">
							<img src="<?= $exposureIcon; ?>" alt="">
						</div>

						<div class="item__name"><?= $exposureTitle; ?></div>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</section> <!-- /Content Icons -->

<div class="clearfix"></div>

<!-- Content Reviews -->
<section class="content-reviews">
	<div class="container">
		<div class="content-reviews_box">
			<?php $testimonialHeadTitle = rwmb_meta('prefix_testimonial-head_title'); ?>
			<h2 class="heading"><?= $testimonialHeadTitle; ?></h2>
			<div class="items review__avatar__slider owl-carousel">
				<?php 
				$testimonialGroup = rwmb_meta('prefix_testimonial-group');
				foreach ($testimonialGroup as $testimonial):
					$image_id = isset( $testimonial['prefix_testimonial-avt'] ) ? $testimonial['prefix_testimonial-avt'] : '';
					$image = wp_get_attachment_image_url( $image_id, 'full' );?>
					<div class="item">
						<div class="item__avatar">
							<img src="<?= $image; ?>" alt="">
						</div>
					</div>
					<?php 
				endforeach;
				?>
			</div>

			<div class="items review__info__slider owl-carousel">
				<?php 
				$testimonialGroup = rwmb_meta('prefix_testimonial-group');
				foreach ($testimonialGroup as $testimonial):
					$title = $testimonial['prefix_testimonial-title'];
					$pos = $testimonial['prefix_testimonial-pos'];
					$paragraph = $testimonial['prefix_testimonial-paragraph'];
					?>
					<div class="item">
						<div class="item__info">
							<div class="item__name"><?= $title; ?></div>
							<div class="item__position"><?= $pos; ?></div>
							<div class="item__review"><?= $paragraph; ?></div>
						</div>
					</div>
					<?php 
				endforeach;
				?>
			</div>
	</div>
</div>
</section> <!-- /Content Reviews -->

<!-- Seminar -->
<?php 
$semina_image = rwmb_meta("prefix_seminar-seminar_image", array('size' => 'full'));
$semina_text_image = rwmb_meta("prefix_seminar-text_img", array('size' => 'full'));
$semina_vertical_title = rwmb_meta("prefix_seminar-vertical_text");
$semina_cat_title = rwmb_meta("prefix_seminar-cat_title");
$semina_title = rwmb_meta("prefix_seminar-head_title");
$semina_btn_text = rwmb_meta("prefix_seminar-button_text");
$semina_hyperlink = rwmb_meta("prefix_seminar-hyperlink");
?>
<section class="seminar" style="background: #002244">
	<div class="box-hidden" style="background-image: url(<?= $semina_image['url'] ?>);">
		<div class="col-2">
			<?php if($semina_text_image): ?>
				<center><img src="<?= $semina_text_image['url']; ?>" alt=""></center>
			<?php endif; ?>
		</div>
		<div class="col-2">
			<div class="box__gray">
				<div class="text"><?= $semina_vertical_title; ?></div>
				<div class="category"><?= $semina_cat_title; ?></div>
				<div class="title"><?= $semina_title; ?></div>
				<a class="more" href="<?= $semina_hyperlink; ?>"><?= $semina_btn_text; ?> <span></span></a>
			</div>
		</div>
	</div>
</section> <!-- /Seminar -->

<div class="clearfix"></div>

<!-- Content Upcoming Events -->
<?php 
$upcomingHeadTitle = rwmb_meta("prefix_upcoming-heading");
?>
<section class="content-upcoming">
	<div class="container">
		<div class="content-upcoming_box">
			<h2 class="heading"><?= $upcomingHeadTitle; ?></h2>

			<div class="clearfix"></div>

			<div class="items">
				<?php 
				$upcomingPost = rwmb_meta('prefix_upcoming-post');
				foreach ($upcomingPost as $upcomingPostID):?>
					<div class="item">
						<div class="item__img" style="background-image: url(<?= get_the_post_thumbnail_url( $upcomingPostID, 'full' ); ?>);">
							<img src="<?= get_the_post_thumbnail_url( $upcomingPostID, 'full' ); ?>" alt="">
						</div>
						<div class="item__caption">
							<div class="item__box">
								<h3 class="item__heading">
									<a href="<?= get_the_permalink($upcomingPostID); ?>" title=""><?= get_the_title( $upcomingPostID ); ?></a>
								</h3>
								<a class="item__more" href="<?= get_the_permalink($upcomingPostID); ?>"><?= changeLang("read more","xem thêm"); ?> <span></span></a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section> <!-- /Content Upcoming Events -->

<div class="clearfix"></div>

<!-- Content Grid 2 Exhibit -->
<?php 
wp_reset_query();
$bae_iae_bg = rwmb_meta('prefix_exhibit-bae-iae-bg', array('size' => 'full'));
$bae_iae_group = rwmb_meta('prefix_exhibit-bae-iae');
?>
<section class="content-grid2-exhibit" style="background-image: url(<?= $bae_iae_bg['url']; ?>);">
	<div class="container">
		<div class="content-grid2_box">
			<?php 
			$check = true;
			foreach ($bae_iae_group as $bae_iae_item):
				$whiteText = $bae_iae_item['prefix_exhibit-white_text'];
				$blueText = $bae_iae_item['prefix_exhibit-blue_text'];
				$hyperlinktext1 = $bae_iae_item['prefix_exhibit-hyperlink1_text'];
				$hyperlinktext2 = $bae_iae_item['prefix_exhibit-hyperlink2_text'];
				$hyperlink1 = isset($bae_iae_item['prefix_exhibit-hyperlink1']) ? $bae_iae_item['prefix_exhibit-hyperlink1'] : "";
				$hyperlink2 = isset($bae_iae_item['prefix_exhibit-hyperlink2']) ? $bae_iae_item['prefix_exhibit-hyperlink2'] : "";
				?>
				<div class="grid__2" style="background: <?= ($check) ? '#0a77ba' : '#002244'; ?>;">
					<div class="heading">
						<?= $whiteText; ?> <span style="color: <?= ($check) ? '#002244' : '#0a77ba'; ?>"><?= $blueText; ?></span>
					</div>

					<ul class="no-style">
						<li>
							<a href="<?php
							if($hyperlink1 != ""){
								echo $hyperlink1;
							}
							else{
								echo ($check) ? site_url()."/application-form-bas/" : site_url()."/press-registration/";
							}
							?>" title="">									
							<img src="<?= get_template_directory_uri(); ?>/images/icon-11.png" alt="">
							<span><?= $hyperlinktext1; ?></span>
							<div class="arrow"><img src="<?= get_template_directory_uri(); ?>/images/arrow-next.png" alt=""></div>
						</a>
					</li>
					<li>
						<a href="<?php
						if($hyperlink2 != ""){
							echo $hyperlink2;
						}
						else{
							echo ($check) ? site_url()."/contact/" : site_url()."/media-sponsors/"; 
						}
						?>" title="">									
						<img src="<?= get_template_directory_uri(); ?>/images/icon-12.png" alt="">
						<span><?= $hyperlinktext2; ?></span>
						<div class="arrow"><img src="<?= get_template_directory_uri(); ?>/images/arrow-next.png" alt=""></div>
					</a>
				</li>
			</ul>
		</div>
		<?php 
		$check = false;
	endforeach;?>
</div>
</div>
</section> <!-- /Content Grid 2 Exhibit -->

<div class="clearfix"></div>

<!-- Content Where to Next -->
<?= do_shortcode( '[wheretonext]' ); ?>
<!-- /Content Where to Next -->
<?php get_footer(); ?>