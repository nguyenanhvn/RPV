<?php 
/**
 * Template Name: Book A Stand
 */
get_header();
global $des_options;
?>
<!-- Content Book A Stand -->
<section class="content-book">
	<div class="container">
		<div class="content-book_box">
			<h1 class="heading"><?= changeLang("Book <span>a Stand</span>","Đăng ký <span>trưng bày</span>"); ?></h1>

			<div class="items book__slider owl-carousel">
				<?php 
				$args = array(
					'post_type' => "bookastand",
				);
				$query = new WP_Query($args);
				if($query->have_posts()):
					while($query->have_posts()): $query->the_post();
						$content = rwmb_meta('prefix_bookastand-paragraph');
						?>
						<div class="item">
							<div class="item__img">
								<img src="<?php the_post_thumbnail_url(); ?>" alt="">
							</div>
							<div class="item__caption">
								<div class="item__name"><?php the_title(); ?></div>

								<div class="item__info">
									<div class="item__rate">
										<?= wpautop( $content ); ?>
									</div>
									<a href="<?= site_url(); ?>/<?= changeLang("application-form-book-a-stand","vi/dang-ky-trung-bay") ?>" class="item__book">
										+ Book now
									</a>
								</div>
							</div>
						</div>
					<?php endwhile;
					wp_reset_postdata();
				endif; ?>
			</div>
		</div>
	</div>
</section> <!-- /Content Book A Stand -->
<?php get_footer(); ?>