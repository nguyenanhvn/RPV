<?php 
/**
 * Template Name: Home Page
 */
get_header(); 
global $epv_options;?>
<!-- Content Banner -->
<?php 
$p = (pll_current_language() == 'en') ? 15 : 70;
$args = array(
	'post_type' => 'slider',
	'p' => $p,
);
wp_reset_query();
$query = new WP_Query($args);
if($query->have_posts()): ?>
	<section class="content-banner">
		<div class="box__text">
			<?php while($query->have_posts()):
				$query->the_post();
				$slide_group = rwmb_meta( 'prefix_slider_group' );
				if ( ! empty( $slide_group ) ):
					foreach ( $slide_group as $slide_value ):
						$post = $slide_value['prefix_slider_post'];
						query_posts( $post );
						?>
						<div class="item">
							<div class="item__box">
								<div class="item__child">
									<div class="item__child__box">
										<h2 class="item__heading"><?php the_title(); ?></h2>

										<div class="item__text">
											<?= excerpt(25); ?>
										</div>

										<a href="<?php the_permalink(); ?>" title="" class="item__more">
											<?= changeLang("FIND OUT MORE","TÌM HIỂU THÊM");?> <span></span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<?php 
					endforeach;
				endif;
			endwhile;
			wp_reset_postdata(); ?>
		</div>
		<?php while($query->have_posts()):
			$query->the_post();
			$slide_group = rwmb_meta( 'prefix_slider_group' );
			if ( ! empty( $slide_group ) ):
				foreach ( $slide_group as $slide_value ):
					$image_id = isset( $slide_value['prefix_slider_image'] ) ? $slide_value['prefix_slider_image'] : '';
					$image = wp_get_attachment_image_url( $image_id, 'full' );
					?>
					<div class="box__images">
						<div class="item">
							<div class="item__box" style="background-image: url(<?= $image; ?>"></div>
						</div>
						<div class="item">
							<div class="item__box" style="background-image: url(<?= $image; ?>);"></div>
						</div>
					</div>
					<?php 
				endforeach;
			endif;
		endwhile;
		wp_reset_postdata(); ?>
		<div class="box__pagenavi__slider">				
			<div class="box__pagenavi">
				<?php while($query->have_posts()):
					$query->the_post();
					$slide_group = rwmb_meta( 'prefix_slider_group' );
					if ( ! empty( $slide_group ) ):
						foreach ( $slide_group as $slide_value ):
							$post = $slide_value['prefix_slider_post'];
							query_posts( $post );?>
							<div class="item">
								<div class="item__box"><?php the_title(); ?></div>
							</div>
							<?php 
						endforeach;
					endif;
				endwhile;
				wp_reset_postdata(); ?>
			</div>
			<div class="box__nav">
				<div class="tw__prev"></div>
				<div class="tw__count"></div>
				<div class="tw__next"></div>					
			</div>
		</div>
	</section> <!-- /Content Banner -->
<?php endif; ?>

<!-- What -->
<section class="what">
	<div class="container">
		<div class="what-box">
			<div class="what-box__left">
				<?php 
				wp_reset_query();
				$whatonbg = rwmb_meta('prefix_homepage_whatonbg', array( 'size' => 'full' ));
				$whatondes = rwmb_meta('prefix_homepage_whatondes');
				$whatonbtntext = rwmb_meta('prefix_homepage_whatonbtntext');
				$whatonbtnlink = rwmb_meta('prefix_homepage_whatonbtnlink');
				?>
				<div class="item" style="background-image: url(<?= $whatonbg['url'];?>">
					<h2 class="item__heading"><?= changeLang("What's On","Sự Kiện Triển Lãm"); ?></h2>
					<div class="item__paragraph"><?= $whatondes; ?>
				</div>

				<a class="item__link" href="<?= $whatonbtnlink; ?>">
					<?= $whatonbtntext; ?>
				</a>
			</div>
		</div>

		<div class="what-box__right">
			<?php
			$listwhatonpost = rwmb_meta('prefix_homepage_whaton');
			foreach ($listwhatonpost as $whatonpostID):
				?>
				<div class="item">
					<div class="item__img" style="background-image: url(<?= get_the_post_thumbnail_url($whatonpostID); ?>);">
						<img src="<?= get_the_post_thumbnail_url($whatonpostID); ?>" alt="">
					</div>
					<div class="item__box">
						<h3 class="item__heading">
							<a href="<?= get_the_permalink($whatonpostID); ?>" title="<?= get_the_title($whatonpostID); ?>">
								<?= get_the_title($whatonpostID); ?>
							</a>
						</h3>

						<a href="<?= get_the_permalink($whatonpostID); ?>" class="item__link">
							<span></span> <?= changeLang("Read More","Xem thêm"); ?>
						</a>						
					</div>	

					<a class="item__category">
						<?= get_the_category($whatonpostID)[0]->cat_name; ?>
					</a>	
				</div>
			<?php endforeach;
			?>
		</div>
	</div>
</div>
</section> <!-- /What -->

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

	<div class="clearfix"></div>

	<div class="projects-bottom">
		<div class="container">
			<div class="box">
				<?php 
				$exhibit_group = rwmb_meta('prefix_homepage_exhibit_h_group');
				if(!empty($exhibit_group)):
					foreach ($exhibit_group as $exhibit_value):
						$exhibit_img_id = isset( $exhibit_value['prefix_homepage_exhibit_h_image'] ) ? $exhibit_value['prefix_homepage_exhibit_h_image'] : '';
						$exhibit_image = wp_get_attachment_image_url( $exhibit_img_id, '570x290' );
						$exhibit_tag = $exhibit_value['prefix_homepage_exhibit_h_des'];
						$exhibit_title = $exhibit_value['prefix_homepage_exhibit_h_title'];
						$exhibit_link = isset($exhibit_value['prefix_homepage_exhibit_h_link']) ? $exhibit_value['prefix_homepage_exhibit_h_link'] : '#' ;
						?>
						<div class="col-2">
							<div class="box-img">
								<img src="<?= $exhibit_image; ?>" alt="">
							</div>
							<div class="information">
								<div class="information__left">
									<strong><?= $exhibit_title; ?></strong>
									<a href="<?= $exhibit_link; ?>" class="more hide-ipad">
										<?= changeLang("Read More <span></span>","Xem thêm"); ?>
									</a>
								</div>

								<div class="information__right"><?= $exhibit_tag; ?></div>

								<a href="<?= $exhibit_link; ?>" class="more show-ipad">
									<?= changeLang("Read More <span></span>","Xem thêm"); ?>
								</a>
							</div>
						</div>
					<?php endforeach;
				endif; ?>
			</div>

			<?= do_shortcode( '[bot_ads_slide]' ); ?>
		</div>
	</div>
</section> <!-- /Projects -->

<div class="clearfix"></div>

<!-- Video -->
<section class="video">
	<div class="container">
		<div class="video-box">
			<div class="heading show-ipad">
				An Overview about
				<span>Plastics & Rubber Vietnam 2020</span>
			</div>
			<?php 
			$videoList = $epv_options['video'];
			$index = 0;
			$videoL =  $epv_options['video'][0];?>
			<div class="video-box__left">
				<div class="item">
					<div class="bg" style="background-image: url(<?= $videoL['image'];?>)"></div>
					<a data-fancybox="video" href="<?= $videoL['url']; ?>" class="play">
						<img src="<?= get_template_directory_uri(); ?>/images/icon-play.png" alt=""> Play Video <span></span>
					</a>
				</div>
			</div>
			<div class="video-box__right">
				<div class="heading hide-ipad">
					An Overview about
					<span>Plastics & Rubber Vietnam 2020</span>
				</div>
				<div class="items">
					<?php for ($i = 1; $i < count($epv_options['video']) ; $i++):?>
						<div class="item">
							<div class="bg" style="background-image: url(<?= $epv_options['video'][$i]['image']; ?>)"></div>
							<a data-fancybox="video" href="<?= $epv_options['video'][$i]['url']; ?>" class="play">
								<img src="<?= get_template_directory_uri(); ?>/images/icon-play.png" alt="">
							</a>
						</div>
					<?php endfor; ?>
				</div>
			</div>
		</div>
	</div>
</section> <!-- /Video -->

<div class="clearfix"></div>

<!-- Social Feed -->
<section class="feed">
	<div class="container">
		<h2 class="heading"><?= changeLang("Keep up with us","Đồng hành cùng chúng tôi"); ?></h2>

		<div class="clearfix"></div>

		<div class="short-text">
			<?= changeLang("Follow us on your social networks to get an inside<br>view of our latest exhibition and ideas.","Theo dõi chúng tôi trên trang cá nhân để dễ dàng<br>cập nhật các thông tin mới nhất về triển lãm");?>
		</div>

		<div class="clearfix"></div>

		<div class="feed-box">
			<?= do_shortcode( '[ff id="1"]' ); ?>
		</div>
	</div>
</section>  <!-- /Social Feed-->

<div class="clearfix"></div>

<!-- News -->
<section class="news">
	<div class="container">
		<h2 class="title"><?= changeLang("Latest News","Tin Mới Nhất"); ?></h2>

		<!-- Nav tabs -->
		<ul class="nav nav-tabs hide-mobile" role="tablist">

			<!-- <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?= changeLang("Featured Articles","Bài Viết Đặc Biệt");?></a></li> -->
			<li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?= changeLang("Industry News","Tin Ngành");?></a></li>
			<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><?= changeLang("Event News","Tin Tức Sự Kiện");?></a></li>
			<!-- <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><?= changeLang("Press Release","Thông Cáo Báo Chí");?></a></li> -->
		</ul>

		<div class="show-mobile nav-mobile">
			<span data-toggle="dropdown">
				<!-- Featured Articles -->
				<?= changeLang("Industry News","Tin Ngành");?>
			</span>

			<ul class="nav nav-tabs">
				<!-- <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?= changeLang("Featured Articles","Bài Viết Đặc Biệt");?></a></li> -->
				<li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?= changeLang("Industry News","Tin Ngành");?></a></li>
				<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><?= changeLang("Event News","Tin Tức Sự Kiện");?></a></li>
				<!-- <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><?= changeLang("Press Release","Thông Cáo Báo Chí");?></a></li> -->
			</ul>
		</div>

		<a class="view-all" href="<?= site_url(); ?>/category/new-media"><?= changeLang("View all","Xem tất cả"); ?><span></span></a>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane" id="home">
				<div class="box-news">
					<ul class="no-style list-news">
						<?php 
						wp_reset_query();
						if(isset($epv_options['feature-article'])):
							$feature_even_group = $epv_options['feature-article'];
							foreach ($feature_even_group as $feature_even_item): ?>
								<li>
									<a href="<?= get_the_permalink($feature_even_item); ?>" class="box-img">
										<div class="img" style="background-image: url(<?= get_the_post_thumbnail_url($feature_even_item); ?>);">
											<img src="<?= get_the_post_thumbnail_url($feature_even_item); ?>" alt="Item">
										</div>	
									</a>
									<div class="caption">
										<h4 class="heading">
											<a href="<?= get_the_permalink($feature_even_item); ?>">
												<?= get_the_title($feature_even_item); ?>
											</a>
										</h4>

										<div class="time"><?= get_the_date('d M Y',$feature_even_item); ?></div>

										<div class="short">
											<?= excerptWithPostID(25,$feature_even_item); ?>
										</div>

										<div class="clearfix"></div>

										<a class="more" href="<?= get_the_permalink($feature_even_item); ?>">
											<span></span> <?= changeLang("Read more","Xem thêm"); ?>
										</a>
									</div>
								</li>
								<?php wp_reset_postdata();
							endforeach;
						endif; ?>
					</ul>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane active" id="profile">
				<div class="box-news">
					<ul class="no-style list-news">
						<?php 
						$industry_EN_ID = get_cat_ID("Industry News");
						$industry_VI_ID = get_cat_ID("Tin Ngành");
						$cat = (pll_current_language() == 'en') ? $industry_EN_ID : $industry_VI_ID; 
						$args = array(
							'post_type'	=> 'post',
							'cat'		=> $cat,
							'posts_per_page'	=> 3,
						);
						wp_reset_postdata();
						$query = new WP_Query($args);
						if($query->have_posts()):
							while($query->have_posts()): $query->the_post();?>
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

										<div class="short">
											<?= excerpt(25); ?>
										</div>

										<div class="clearfix"></div>

										<a class="more" href="<?php the_permalink(); ?>">
											<span></span> <?= changeLang("Read more","Xem thêm"); ?>
										</a>
									</div>
								</li>
							<?php endwhile;
							wp_reset_postdata();
						endif; ?>
					</ul>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane" id="messages">
				<div class="box-news">
					<ul class="no-style list-news">
						<?php 
						$eventNews_EN_ID = get_cat_ID("Event News");
						$eventNews_VI_ID = get_cat_ID("Tin Tức Sự kiện");
						$cat = (pll_current_language() == 'en') ? $eventNews_EN_ID : $eventNews_VI_ID; 
						$args = array(
							'post_type'	=> 'post',
							'cat'		=> $cat,
							'posts_per_page'	=> 3,
						);
						wp_reset_postdata();
						$query = new WP_Query($args);
						if($query->have_posts()):
							while($query->have_posts()): $query->the_post();?>
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

										<div class="short">
											<?= excerpt(25); ?>
										</div>

										<div class="clearfix"></div>

										<a class="more" href="<?php the_permalink(); ?>">
											<span></span> <?= changeLang("Read more","Xem thêm"); ?>
										</a>
									</div>
								</li>
							<?php endwhile;
							wp_reset_postdata();
						endif; ?>
					</ul>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane" id="settings">
				<div class="box-news">
					<ul class="no-style list-news">
						<?php 
						$pressRelease_EN_ID = get_cat_ID("Press Release");
						$pressRelease_VI_ID = get_cat_ID("Thông Cáo Báo Chí");
						$cat = (pll_current_language() == 'en') ? $pressRelease_EN_ID : $pressRelease_VI_ID;  
						$args = array(
							'post_type'	=> 'post',
							'cat'		=> $cat,
							'posts_per_page'	=> 3,
						);
						wp_reset_postdata();
						$query = new WP_Query($args);
						if($query->have_posts()):
							while($query->have_posts()): $query->the_post();?>
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

										<div class="short">
											<?= excerpt(25); ?>
										</div>

										<div class="clearfix"></div>

										<a class="more" href="<?php the_permalink(); ?>">
											<span></span> <?= changeLang("Read more","Xem thêm"); ?>
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
<section class="seminar" style="background: #fff">
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

<section class="partner">
	<div class="container">
<!-- 		<div class="partner-box">
			<h2 class="heading">
				Exhibitor Highlights
			</h2>

			<div class="clearfix"></div>

			<?= do_shortcode( '[exhibitor-logo]' ); ?>
		</div>
		<div class="partner-box">
			<h2 class="heading">
				Media Partner & Sponsors
			</h2>

			<div class="clearfix"></div>

			<?= do_shortcode( '[partner-logo]' ); ?>
		</div>

		<div class="clearfix"></div> -->

		<div class="partner-other">
			<!-- <?= do_shortcode( '[partner-other-logo]' ); ?> -->

			<?= do_shortcode( '[ads_slide]' ); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>