<?php 
/**
* Template Name: Application Form E Brochure
*/
get_header(); ?>
<section class="content-application">
	<div class="content-application_box">
		<?php 
			$app_bg = rwmb_meta('prefix_appEBrochure-img_banner',array("size" => "full"));
			$app_paragraph = rwmb_meta('prefix_appEBrochure-agree_text');
			$app_blue_title = rwmb_meta('prefix_appEBrochure-blue_title');
			$cf7_shortcode = rwmb_meta('prefix_appEBrochure-cf7_shortcode');
		?>
		<div class="box__right" style="background-image: url(<?= $app_bg['image']; ?>);">
			<div class="box__right__sticky">						
				<img src="<?= $app_bg['url']; ?>" alt="">
			</div>
		</div>
		<div class="box__left">
			<h2 class="heading"><?php the_title(); ?></h2>

			<div class="clearfix"></div>

			<div class="box__blue">
				<div class="text__blue">
					<?= $app_blue_title; ?>
				</div>

				<div class="clearfix"></div>

				<div class="text__black">
					<?= $app_paragraph; ?>
				</div>

				<div class="form">
					<?= do_shortcode( $cf7_shortcode ); ?>
				</div>
			</div>
		</div>
	</div>
</section> <!-- /Content Application Form -->
<?php get_footer(); ?>