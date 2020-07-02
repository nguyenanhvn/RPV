<section class="content-article2_heading">
	<div class="container">
		<div class="content-article_heading__box">
			<div class="heading__left">
				<div class="heading__category">
					<?php if(get_the_category(get_the_ID())): ?>
						<a href="<?= get_category_link(get_the_category(get_the_ID())[0]->cat_ID); ?>" title=""><?= get_the_category(get_the_ID())[0]->cat_name; ?></a>
					<?php endif; ?>
					<div class="heading__category__publish">
						<?= get_post_time("h:i:s - F d, Y"); ?>
					</div>
				</div>

				<h1 class="heading__name">
					<?php the_title(); ?>
				</h1>

				<div class="heading_more">
					<div class="heading__auth">
						<div class="heading__auth__avatar">
							<?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
								<img src="<?php echo get_avatar_url($avatar); ?>" alt="">
							<?php endif; ?>
						</div>
						<div class="heading__auth__box">
							<div class="heading__auth__name">
								<?php 
								global $post;
								$post_auth = $post->post_author; ?>
								<?= get_the_author_meta( 'display_name', $post_auth); ?>
							</div>
						</div>
					</div>
				</div>	

				<div class="heading__download">
					<div class="button__style button__black md-trigger" data-modal="#md-download-<?= get_the_ID(); ?>"><?= (pll_current_language() == 'en') ? "FREE DOWNLOAD" : "TẢI VỀ MIỄN PHÍ" ?></div>
				</div>				

				<div class="md-modal md-effect-1" id="md-download-<?= get_the_ID();?>">
					<div class="md-content">
						<span class="md-close" title="Close Popup"><img src="<?= get_template_directory_uri();?>/images/icon-close.png" alt=""></span>

						<div class="md-box">
							<h2 class="form__heading"><?= (pll_current_language() == 'en') ? "DOWNLOAD YOUR FREE REPORT" : "TẢI TÀI LIỆU MIỄN PHÍ" ?></h2>
							<i class="form__note"><?= (pll_current_language() == 'en' ) ? "Download your free report by subscribing to our newsletter" : "Tải xuống miễn phí bằng cách đăng ký nhận bản tin với chúng tôi"; ?></i>
							<?= (pll_current_language() == 'en') ? do_shortcode( '[contact-form-7 id="265" title="Download Form"]' ) : do_shortcode( '[contact-form-7 id="266" title="Download Form VI"]' ); ?>

							<div class="clearfix"></div>

							<i class="form__note"><?= (pll_current_language() == 'en') ? "By submitting this form you agree to receive email communication from Destination-review" : "Bằng cách gửi biểu mẫu này, bạn đồng ý nhận liên lạc qua email từ Destination-review"; ?></i>
						</div>
					</div>
				</div>
				<div class="md-darknight"></div><!-- the overlay element -->			
			</div>

			<div class="heading__right">						
				<div class="heading__banner">
					<img src="<?php the_post_thumbnail_url('800x400'); ?>" alt="">
				</div>
			</div>
		</div>
	</div>
</section> <!-- /Content Article Heading -->

<!-- Content Article -->
<section class="content-article style-2">
	<div class="container">
		<div class="content-article_box">

			<div class="article__content">
				<div class="content__share">
					<ul class="no-style">
						<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= the_permalink();  ?>" title=""><i class="fa fa-facebook"></i></a></li>
						<li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?= the_permalink();  ?>" title=""><i class="fa fa-linkedin"></i></a></li>
						<li><a target="_blank" href="javascript:window.print()" title=""><i class="fa fa-print"></i></a></li>
						<li><a target="_blank" href="mailto:?body=<?= the_permalink();?>" title=""><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				<div class="row">
					<div class="col-md-9">
						<div class="content__detail">
							<div class="content__detail__paragraph">
								<?php
								if ( have_posts() ) {
									while ( have_posts() ) {
										the_post();
										the_content();
									}
								}
								?>
							</div>
							<div class="content__detail__download">
								<strong><?= (pll_current_language() == 'en') ? "Get your free report here" : "Nhận ngay báo cáo miễn phí tại đây" ?></strong>
								<div class="button__style button__black md-trigger" data-modal="#md-download-<?= get_the_ID(); ?>"><?= (pll_current_language() == 'en') ? "DOWNLOAD NOW" : "TẢI VỀ NGAY" ?></div>
							</div>
							
							<?php 
							$post_tags = get_the_tags();
							if ( $post_tags ) :?>
								<div class="content__detail__tags">
									<span>Tags:</span>
									<ul class="no-style">
										<?php
										foreach( $post_tags as $tag ) {
											echo '<li><a href="'.get_tag_link($tag->term_taxonomy_id).'" title="">'.$tag->name.'</a></li>'; 
										}
										?>
									</ul>
								</div>
							<?php endif;?>
						</div>
					</div>

					<div class="col-md-3">
						<?php get_sidebar('full'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
		</section> <!-- /Content Article -->