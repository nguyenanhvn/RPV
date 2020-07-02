<!-- Content Free Style -->
<section class="content-free-style">
	<div class="container">
		<div class="content-free-style_box">
			<div class="col-9">
				<div class="content-free-style_grid__event content-free-style_grid__none__top content-free-style_grid__have__load">
					<div class="content-free-style_grid__items">
						<?php
						if(have_posts()):
							while(have_posts()):
								the_post();
								?>
								<div class="grid__item">
									<a href="<?php the_permalink(); ?>" class="item__img">
										<?php the_post_thumbnail('300x200'); ?>
									</a>
									<div class="item__caption">
										<h3 class="item__caption__heading"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
										<span class="item__caption__time"><?= get_the_date("F d, Y"); ?></span>
										<div class="item__caption__paragraph"><?= excerpt(20); ?></div>
									</div>
								</div>
							<?php endwhile;
							wp_reset_postdata();
						endif; ?>
					</div>

					<div class="clearfix"></div>

					<div class="content-free-style_load">Load more articles</div>
				</div>
			</div>
			<div class="col-3">
				<?php get_sidebar('full'); ?>
			</div>
		</div>
	</div>
</section> <!-- /Content Free Style -->