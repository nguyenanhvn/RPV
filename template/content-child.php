<?php 
$objCurrentCat = get_category( get_queried_object()->term_id );
if(category_has_parent($objCurrentCat)){
	$objParentCat = get_category( $objCurrentCat->parent );
	$parentCatUrl = get_category_link($objParentCat->term_id);
	$parentCatName = $objParentCat->name;
}
?>
<!-- Content -->
<main id="content">
	<!-- Content Breadcrumbs -->
	<section class="content-breadcrumbs content-breadcrumbs_has__parent">
		<div class="container">
			<div class="content-breadcrumbs_box">
				<div class="content-breadcrumbs_box__paragraph">
					<?php if(category_has_parent($objCurrentCat)): ?>
						<a href="<?= $parentCatUrl ?>" class="paragraph_parent"><?= $parentCatName; ?></a>
					<?php endif; ?>
					<h1 class="paragraph_heading"><?= single_cat_title(); ?></h1>						
				</div>
			</div>
		</div>
	</section> <!-- /Content Breadcrumbs -->

	<!-- Content Sub Listing -->
	<section class="content-sublisting">
		<div class="container">
			<div class="content-sublisting_box">
				<?php 
				if(have_posts()):
					while(have_posts()):
						the_post();
						?>
						<div class="box__item item__has__button">
							<a class="box__item__img">
								<?php the_post_thumbnail('380x253'); ?>
							</a>

							<div class="box__item__caption">
								<h3 class="item__caption__heading">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								</h3>
								<span class="item__caption__time"><?php get_the_date("F d, Y"); ?></span>
							</div>
							<?php if(in_category("Resources") || in_category( "TÀI LIỆU" )): 
							$download = rwmb_meta("prefix_resource_download");?>
							<div class="item__button">
								<a class="button__style button__black" href="<?php the_permalink(); ?>"><?= (pll_current_language() == 'en') ? "REPORT OVERVIEW" : "TỔNG QUAN BÁO CÁO" ?></a>
								<a class="button__style md-trigger" data-modal="#md-download-<?= get_the_ID(); ?>"><?= (pll_current_language() == 'en') ? "FREE DOWNLOAD" : "TẢI VỀ MIỄN PHÍ" ?></a>
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
						<?php endif; ?>
					</div>
				<?php endwhile;
				wp_reset_postdata();
			endif; ?>
		</div>

		<div class="clearfix"></div>

		<div class="content-sublisting_load"><?= (pll_current_language() == 'en') ? "Load more articles" : "Xem thêm bài viết" ?></div>
	</div>
</section> <!-- /Content Sub Listing -->
	</main>  <!-- /Content -->