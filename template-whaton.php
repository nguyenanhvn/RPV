<?php 
/**
 * Template Name: What On
 */
get_header();
?>
<!-- Content Breadcrumb -->
<section class="content-breadcrumb">
	<div class="container">
		<?= custom_breadcrumbs(); ?>
	</div>
</section> <!-- /Content Breadcrumb -->

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

<!-- Content History -->
<?php 
$history_content_title = rwmb_meta("prefix_history_event-heading");
?>
<section class="content-history">
	<div class="container">
		<div class="content-history_box">
			<h2 class="heading"><?= $history_content_title; ?></h2>

			<div class="clearfix"></div>

			<div class="items history__slider owl-carousel">
				<?php 
				$history_eventPost = rwmb_meta('prefix_history_event-post');
				foreach ($history_eventPost as $history_eventPostID):?>
					<div class="item">
						<div class="item__img" style="background-image: url(<?= get_the_post_thumbnail_url($history_eventPostID,'full'); ?>);">
							<img src="<?= get_the_post_thumbnail_url($history_eventPostID,'full'); ?>" alt="">
						</div>
						<div class="item__caption">
							<a class="item__category"><?= get_the_category( $history_eventPostID )[0]->name; ?></a>
							<h3 class="item__heading">
								<a href="<?php the_title($history_eventPostID); ?>" title=""><?php the_title($history_eventPostID); ?></a>
							</h3>
							<div class="item__time"><?= get_the_date('d M Y',$history_eventPostID); ?></div>
							<div class="item__text"><?= excerptWithPostID(20,$history_eventPostID); ?>
						</div>
						<a class="item__more" href="<?php the_permalink($history_eventPostID); ?>"><?= changeLang("Find out more","Tìm hiểu thêm"); ?> <span></span></a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
</section> <!-- /Content History -->

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
<!-- News -->
<section class="news">
	<div class="container">
		<h2 class="title"><?= changeLang("Events News","Tin Tức Sự Kiện"); ?></h2>

		<a class="view-all"><?= changeLang("All Events News","Tất Cả Tin Sự Kiện"); ?><span></span></a>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="home">
				<div class="box-news">
					<ul class="no-style list-news">
						<?php 
						$cat = changeLang("Event News","Tin Tức Sự Kiện");
						$catID = changeLang(get_cat_ID("Event News"),get_cat_ID("Tin Tức Sự Kiện"));
						$args = array(
							'post_type'	=> 'post',
							'posts_per_page'	=> 3,
							'cat'		=> $catID,
						);	
						wp_reset_query();
						$query = new WP_Query($args);
						if($query->have_posts()):
							while($query->have_posts()) : $query->the_post();?>
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
											<span></span> <?= changeLang("Read more","Xem Thêm");?>
										</a>
									</div>
								</li>
							<?php endwhile;
							wp_reset_postdata();
						endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section> <!-- /News -->

<div class="clearfix"></div>

<!-- Content Where to Next -->
<?= do_shortcode( '[wheretonext]' ); ?>
<!-- /Content Where to Next -->
<?php get_footer(); ?>