<!-- Content Breadcrumb -->
<section class="content-breadcrumb">
	<div class="container">
		<?= custom_breadcrumbs(); ?>
	</div>
</section> <!-- /Content Breadcrumb -->

<!-- Content News Style 1 -->
<section class="content-news-style1">
	<div class="container">
		<div class="content-news_box">
			<h2 class="heading">
				<?php 
				$pieces = explode(" ",single_cat_title("",false));
				for ($i = 0; $i <= count($pieces) - 1; $i++) {
					if($i == (count($pieces) - 1))
						printf(" <span>%s</span>",$pieces[$i]);
					else
						echo $pieces[$i];
				}
				?>
			</h2>

			<a class="view__all" href="<?= site_url();?>/category/new-media/industry-news/">View All Industry News</a>

			<div class="clearfix"></div>

			<div class="items">
				<?php if(have_posts()):
					while(have_posts()): the_post(); ?>
						<div class="item">
							<div class="item__img" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
								<img src="<?php the_post_thumbnail_url('270x350'); ?>" alt="">
							</div>
							<div class="item__box">
								<div class="item__date">
									<strong><?= get_the_date('d'); ?></strong> <span><?= get_the_date('M Y'); ?></span>
								</div>
								<div class="item__caption">
									<h3 class="item__heading">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_title(); ?>
										</a>
									</h3>
									<div class="item__paragraph">
										<?= excerpt(15); ?>
									</div>

									<a href="<?php the_permalink(); ?>" class="item__more">
										Learn more <span>→</span>
									</a>
								</div>
							</div>
						</div>
					<?php endwhile;
				endif; ?>
			</div>

			<?= posts_nav(); ?>

			<?= do_shortcode( '[ads_slide]' ); ?>
		</div>
	</div>
	</section> <!-- /Content News Style 1 -->