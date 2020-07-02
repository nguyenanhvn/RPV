<?php get_header(); ?>
<!-- Content News Style 1 -->
<!-- News -->
<section class="news">
	<div class="container">
		<h2 class="title"><?= changeLang("Event News","Tin Tức Sự Kiện"); ?></h2>
		<?php 
		$cat = changeLang("Event News","Tin Tức Sự Kiện");
		$catID = changeLang(get_cat_ID("Event News"),get_cat_ID("Tin Tức Sự Kiện"));
		$args = array(
			'post_type'	=> 'post',
			'posts_per_page'	=> 3,
			'cat'		=> $cat,
		);	
		wp_reset_query();
		$query = new WP_Query($args);
		if($query->have_posts()):?>
			<a class="view-all" href="<?= get_category_link($catID); ?>"><?= changeLang("View Event News","Xem Tin Tức Sự Kiện"); ?> <span></span></a>

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
											<span></span> <?= changeLang("Read More","Xem Thêm"); ?>
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
<?php 
if(isset($epv_options['feature-article']) || isset($epv_options['feature-article-vi'])): ?>
	<section class="content-articles">
		<div class="content-articles_box">
			<div class="container">		
				<?php 
				$catID = changeLang(get_cat_ID("Featured Articles"),get_cat_ID("Bài Viết Đặc Biệt"));?>			
				<h2 class="title"><?= changeLang("Featured Articles","Bài Viết Đặc Biệt"); ?></h2>

				<a class="view-all" href="<?= get_category_link($catID); ?>"><?= changeLang("All Featured Articles","Tất Cả Bài Viết Nổi Bật"); ?> <span></span></a>
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
								<span></span> <?= changeLang("Read More","Xem Thêm"); ?>
							</a>						
						</div>	
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</section>
<?php endif; ?>

<div class="clearfix"></div>

<?php 
if(isset($epv_options['pressrelease-post']) || isset($epv_options['pressrelease-post-vi'])): ?>
<section class="content-press">
	<div class="container">
		<div class="content-press_box">
			<?php 
			$catID = changeLang(get_cat_ID("Press Release"),get_cat_ID("Thông Cáo Báo Chí"));?>	
			<h2 class="title"><?= changeLang("Press Release","Thông Cáo Báo Chí"); ?></h2>

			<a class="view-all" href="<?= get_category_link($catID); ?>"><?= changeLang("All Press Release","Tất Cả Thông Cáo Báo Chí"); ?> <span></span></a>

			<div class="clearfix"></div>

			<div class="item">
				<?php
				$postID = changeLang($epv_options['pressrelease-post'],$epv_options['pressrelease-post-vi']);
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
							<?= changeLang("Read More","Xem Thêm"); ?> <span></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- Seminar -->
<section class="seminar" style="background: #002244">
	<?= do_shortcode( '[seminar]' ); ?>
</section> <!-- /Seminar -->

<div class="clearfix"></div>
<!-- News -->
<section class="news">
	<div class="container">
		<?php 
		$cat = changeLang("Industry News","Tin Ngành");
		$catID = changeLang(get_cat_ID("Industry News"),get_cat_ID("Tin Ngành"));
		$args = array(
			'post_type'	=> 'post',
			'posts_per_page'	=> 3,
			'cat'		=> $cat,
		);	
		wp_reset_query();
		$query = new WP_Query($args);
		if($query->have_posts()):?>
			<h2 class="title"><?= changeLang("Industry News","Tin Ngành"); ?></h2>

			<a class="view-all" href="<?= get_category_link( $catID ); ?>"><?= changeLang("All Industry News","Tất Cả Tin Ngành"); ?> <span></span></a>

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
											<span></span> <?= changeLang("Read More","Xem Thêm"); ?>
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
				<?= changeLang("Exhibitor Highlights","Điểm Nổi Bật Của Triển Lãm"); ?>
			</h2>

			<div class="clearfix"></div>

			<?= do_shortcode( '[exhibitor-logo]' ); ?>
		</div>
		<div class="partner-box">
			<h2 class="heading">
				<?= changeLang("Media Parter & Sponsors","Đối Tác Truyền Thông & Nhà Tài Trợ"); ?>
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