<?php get_header(); ?>
<section class="content-breadcrumb">
	<div class="container">
		<?= custom_breadcrumbs(); ?>
	</div>
</section> <!-- /Content Breadcrumb -->
<!-- Content Event News -->
<section class="content-events">
	<div class="container">
		<div class="content-events_box">
			<h2 class="heading"><?php single_cat_title(); ?></h2>
			<div class="clearfix"></div>
			<div class="items">
				<?php
				$category = get_queried_object();
				$cat = $category->term_id;
				$args = array(
					'post_type'		=> 'post',
					'posts_per_page'	=> 3,
					'cat'		=> $cat,
				);
				wp_reset_query();
				$query = new WP_Query($args);
				if($query->have_posts()):
					while($query->have_posts()) : $query->the_post();
						?>
						<div class="item">
							<div class="item__img" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
								<img src="<?php the_post_thumbnail_url(); ?>" alt="">
							</div>
							<div class="item__box">
								<h3 class="item__heading">
									<a href="<?php the_permalink(); ?>" title="">
										<?php the_title(); ?>
									</a>
								</h3>

								<a href="<?php the_permalink(); ?>" class="item__link">
									<span></span> <?= changeLang("Read More","Xem Thêm"); ?>
								</a>						
							</div>	

							<a href="<?php the_permalink(); ?>" class="item__category"><?php single_cat_title(); ?></a>	
						</div>
					<?php endwhile;
					wp_reset_postdata();
				endif;?>
			</div>
		</div>
	</div>
</section> <!-- /Content Event News -->

<section class="news">
	<div class="container">
		<div class="box-news">
			<ul class="no-style list-news">
				<?php
				$args = array(
					'post_type'		=> 'post',
					'offset'		=> 3,
					'posts_per_page'	=> 6,
					'cat'		=> $cat,
				);
				wp_reset_query();
				$query = new WP_Query($args);
				if($query->have_posts()):
					while($query->have_posts()) : $query->the_post();
						?>
						<li>
							<a href="<?php the_permalink(); ?>" class="box-img">
								<div class="img" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
									<img src="<?php the_post_thumbnail_url(); ?>" alt="Item">
								</div>	
							</a>
							<div class="caption">
								<h4 class="heading">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h4>

								<div class="time"><?= get_the_date('d M Y'); ?></div>

								<div class="short"><?= excerpt(20); ?></div>

								<div class="clearfix"></div>

								<a class="more" href="<?php the_permalink(); ?>">
									<span></span> <?= changeLang("Read More","Xem Thêm"); ?>
								</a>
							</div>
						</li>
					<?php endwhile;
					wp_reset_postdata();
				endif;?>
			</ul>

			<?= posts_nav(); ?>
		</div>
	</div>
</section>

<!-- Content Where to Next -->
<?= do_shortcode( '[wheretonext]' ); ?>
<!-- /Content Where to Next -->
<?php get_footer(); ?>