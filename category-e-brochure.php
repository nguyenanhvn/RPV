<?php get_header(); ?>
<section class="content-breadcrumb">
	<div class="container">
		<?= custom_breadcrumbs(); ?>
	</div>
</section> <!-- /Content Breadcrumb -->

<!-- Content E Brochure -->
<section class="content-ebrochure">
	<div class="container">
		<div class="content-ebrochure_box">
			<h2 class="heading"><?= changeLang("e-Brochure","Tài liệu triển lãm");?></h2>

			<div class="clearfix"></div>

			<div class="items">
				<?php if(have_posts()):
					while(have_posts()) : the_post(); 
						$verticalThumb = rwmb_meta("prefix_ebrochure_featurethumb-thumb", array("size" => "full"));?>
						<div class="item">
							<div class="item__box">
								<div class="item__img">
									<img src="<?= $verticalThumb['url']; ?>" alt="">
								</div>
								<div class="item__heading dotdotdot"><?php the_title(); ?></div>
								<div class="item__caption">
									<h3 class="item__name dotdotdot"><?php the_title(); ?></h3>
									<div class="item__paragraph dotdotdot"><?= excerpt(20); ?></div>
									<a class="item__download" href="<?= site_url(); ?>/application-form-eb/"><?= changeLang("Download Now","Tải xuống ngay"); ?> <span></span></a>
								</div>								
							</div>
						</div>
					<?php endwhile;
				endif; ?>
			</div>
		</div>
	</div>
</section> <!-- /Content E Brochure -->

<!-- Content Where to Next -->
<?= do_shortcode( '[wheretonext]' ); ?>
<!-- /Content Where to Next -->
<?php get_footer(); ?>