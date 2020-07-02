<?php 
/**
 * Template Name: New Media
 */
get_header();
?>
<?php get_header(); ?>
<!-- Content News Style 1 -->
<!-- News -->
<section class="news">
	<div class="container">
		<h2 class="title">Event News</h2>
		<?php 
		$cat = "Event News";
		$catID = get_cat_ID("Event News");
		$args = array(
			'post_type'	=> 'post',
			'posts_per_page'	=> 3,
			'cat'		=> $cat,
		);	
		wp_reset_query();
		$query = new WP_Query($args);
		if($query->have_posts()):?>
			<a class="view-all" href="<?= get_category_link($catID); ?>">View Event News <span></span></a>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="home">
					<div class="box-news">
						<ul class="no-style list-news">
							<?php while($query->have_posts()) : $query->the_post();?>
								<li>
									<a href="<?php the_permalink(); ?>" class="box-img">
										<div class="img" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
											<img src="<?php the_post_thumbnail_url(); ?>" alt="Item">
										</div>	
									</a>
									<div class="caption">
										<h3 class="heading">
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h3>

										<div class="time"><?= get_the_date('d M Y'); ?></div>

										<div class="short"><?= excerpt(20); ?></div>

										<div class="clearfix"></div>

										<a class="more" href="<?php the_permalink(); ?>">
											<span></span> Read more
										</a>
									</div>
								</li>
							<?php endwhile;
							wp_reset_postdata();?>
						</ul>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section> <!-- /News -->

<div class="clearfix"></div>

<section class="content-articles">
	<div class="content-articles_box">
		<div class="container">		
			<?php 
			$catID = get_cat_ID("Featured Articles");?>			
			<h2 class="title">Featured Articles</h2>

			<a class="view-all" href="<?= get_category_link($catID); ?>">All Featured Articles <span></span></a>
		</div>

		<div class="clearfix"></div>

		<div class="items">
			<?php 
			wp_reset_query();
			$feature_even_group = $epv_options['feature-article'];
			foreach ($feature_even_group as $feature_even_item):?>
				<div class="item">
					<div class="item__img" style="background-image: url(<?= get_the_post_thumbnail_url($feature_even_item); ?>);">
						<img src="<?= get_the_post_thumbnail_url($feature_even_item); ?>" alt="">
					</div>
					<div class="item__box">
						<h3 class="item__heading">
							<a href="<?= get_the_permalink($feature_even_item); ?>" title="">
								<?= get_the_title($feature_even_item); ?>
							</a>
						</h3>

						<div class="item__time"><?= get_the_date("d M Y",$feature_even_item); ?></div>

						<a href="<?= get_the_permalink($feature_even_item); ?>" class="item__link">
							<span></span> Read More
						</a>						
					</div>	
				</div>
			<?php endforeach;?>
		</div>
	</div>
</section>

<div class="clearfix"></div>

<section class="content-press">
	<div class="container">
		<div class="content-press_box">
			<?php 
			$catID = get_cat_ID("Press Release");?>	
			<h2 class="title">Press Release</h2>

			<a class="view-all" href="<?= get_category_link($catID); ?>">All Press Release <span></span></a>

			<div class="clearfix"></div>

			<div class="item">
				<?php
				$postID = $epv_options['pressrelease-post'];
				?>

				<div class="item__img" style="background-image: url(<?= get_the_post_thumbnail_url($postID); ?>);">
					<img src="<?= get_the_post_thumbnail_url($postID); ?>" alt="">
				</div>
				<div class="item__box">
					<div class="item__box__blue">				  				
						<h3 class="item__heading">
							<a href="<?= get_the_permalink($postID); ?>">
								<?= get_the_title( $postID ); ?>
							</a>
						</h3>

						<div class="item__time"><?= get_the_date('d M Y',$postID); ?></div>

						<div class="item__short">
							<?= excerptWithPostID(20,$postID) ?>
						</div>

						<div class="clearfix"></div>

						<a class="item__more" href="<?= get_the_permalink($postID); ?>">
							Read more <span></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Seminar -->
<section class="seminar" style="background: #002244">
	<?= do_shortcode( '[seminar]' ); ?>
</section> <!-- /Seminar -->

<div class="clearfix"></div>
<!-- News -->
<section class="news">
	<div class="container">
		<?php 
		$cat = "Industry News";
		$catID = get_cat_ID( $cat );
		$args = array(
			'post_type'	=> 'post',
			'posts_per_page'	=> 3,
			'cat'		=> $cat,
		);	
		wp_reset_query();
		$query = new WP_Query($args);
		if($query->have_posts()):?>
			<h2 class="title">Industry News</h2>

			<a class="view-all" href="<?= get_category_link( $catID ); ?>">All Industry News <span></span></a>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="home">
					<div class="box-news">
						<ul class="no-style list-news">
							<?php while($query->have_posts()) : $query->the_post();	?>
								<li>
									<a href="<?php the_permalink(); ?>" class="box-img">
										<div class="img" style="background-image: url(<?= the_post_thumbnail_url(); ?>);">
											<img src="<?= the_post_thumbnail_url(); ?>" alt="Item">
										</div>	
									</a>
									<div class="caption">
										<h3 class="heading">
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h3>

										<div class="time"><?= get_the_date('d M Y'); ?></div>

										<div class="short"><?= excerpt(20); ?></div>

										<div class="clearfix"></div>

										<a class="more" href="<?php the_permalink(); ?>">
											<span></span> Read more
										</a>
									</div>
								</li>
							<?php endwhile;
							wp_reset_postdata();?>
						</ul>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section> <!-- /News -->

<div class="clearfix"></div>

<section class="partner">
	<div class="container">
		<div class="partner-box">
			<h2 class="heading">
				Exhibitor Highlights
			</h2>

			<div class="clearfix"></div>

			<?= do_shortcode( '[exhibitor-logo]' ); ?>
		</div>
		<div class="partner-box">
			<h2 class="heading">
				Media Parter & Sponsors
			</h2>

			<div class="clearfix"></div>

			<?= do_shortcode( '[partner-logo]' ); ?>
		</div>

		<div class="clearfix"></div>

		<div class="partner-other">
			<?= do_shortcode( '[partner-other-logo]' ); ?>

			<?= do_shortcode( '[ads_slide]' ); ?>
		</div>
	</div>
</section>

<div class="clearfix"></div>

<!-- Content Where to Next -->
<?= do_shortcode( '[wheretonext]' ); ?>
<!-- /Content Where to Next -->
<?php get_footer(); ?>
<?php get_footer(); ?>