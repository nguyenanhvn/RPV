<?php 
/**
 * Template Name: E-Brochures
 */
get_header();
global $des_options;
?>
<section class="content-breadcrumb">
	<div class="container">
		<?= custom_breadcrumbs(); ?>
	</div>
</section> <!-- /Content Breadcrumb -->

<!-- Content E Brochure -->
<section class="content-ebrochure">
	<div class="container">
		<div class="content-ebrochure_box">
			<h2 class="heading"><?php the_title(); ?></h2>

			<div class="clearfix"></div>

			<div class="items">
				<?php 
				if(is_page(102) || is_page( 622 )){
					query_posts( array("post_type" => "bookastand"));
				}else{
					query_posts( array("post_type" => "e-brochures"));
				}
				if(have_posts()):
					while(have_posts()):the_post(); 
						?>
						<div class="item">
							<div class="item__box">
								<div class="item__img">
									<img src="<?php the_post_thumbnail_url(); ?>" alt="">
								</div>
								<div class="item__heading dotdotdot"><?php the_title(); ?></div>
								<div class="item__caption">
									<h3 class="item__name dotdotdot"><?php the_title(); ?></h3>
									<div class="item__paragraph dotdotdot"><?= excerpt(20); ?></div>
									<a class="item__download" href="<?= changeLang(site_url()."/application-form/",site_url()."/phieu-dang-ky/"); ?>/"><?= changeLang("Click Here","Nhấp Vào Đây"); ?> <span></span></a>
								</div>								
							</div>
						</div>
					<?php endwhile;
					wp_reset_postdata();
				endif; ?>
			</div>
		</div>
	</div>
</section> <!-- /Content E Brochure -->

<!-- Content Where to Next -->
<section class="content-next">
	<div class="container">
		<div class="content-next_box">
			<h2 class="heading">Where to Next</h2>
			<div class="clearfix"></div>
			<div class="grids">
				<div class="grid__2" style="background-image: url(<?= get_template_directory_uri(); ?>/images/next-1.png);">
					<h3 class="grid__name">At the show</h3>
					<a class="grid__more">Read more <span></span></a>
				</div>
				<div class="grid__2" style="background-image: url(<?= get_template_directory_uri(); ?>/images/next-2.png);">
					<h3 class="grid__name">Exhibit</h3>
					<a class="grid__more">Read more <span></span></a>
				</div>
			</div>
		</div>
	</div>
</section> <!-- /Content Where to Next -->
<?php get_footer(); ?>