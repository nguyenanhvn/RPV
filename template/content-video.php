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
						$video_url = rwmb_meta("prefix_video_video");
						?>
						<div class="box__item item__has__button">
							<a class="box__item__img fancybox" href="<?= $video_url; ?>">
								<?php the_post_thumbnail('380x253'); ?>
							</a>

							<div class="box__item__caption">
								<h3 class="item__caption__heading">
									<a href="<?= $video_url; ?>" class="fancybox" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								</h3>
								<span class="item__caption__time"><?php get_the_date("F d, Y"); ?></span>
							</div>
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