<?php get_header(); ?>
<!-- Content -->
<main id="content">
	<!-- Content Breadcrumb -->
	<section class="content-breadcrumb">
		<div class="container">
			<?= custom_breadcrumbs(); ?>
		</div>
	</section> <!-- /Content Breadcrumb -->

	<!-- Content News Detail -->
	<section class="content-dnews">
		<div class="container">
			<div class="content-dnews_box">					
				<div class="content__detail">

					<h1 class="content__detail__heading"><?php the_title(); ?></h1>

					<div class="content__detail__time"><?= get_the_date('d M Y'); ?></div>

					<div class="clearfix"></div>

					<div class="content__detail__paragraph">
						<?php if(have_posts()):
							while(have_posts()): the_post();
								the_content(); 
							endwhile;
						endif;?>
					</div>

				</div>

				<?php get_sidebar(); ?>
			</div>
		</div>
	</section> <!-- /Content News Detail -->
	<!-- News -->
</main>  <!-- /Content -->
<?php get_footer(); ?>