<!-- Content Breadcrumbs -->
<?php 
$args             = array(
	'type'         => 'post',
	'child_of'     => $cat,
	'orderby'      => 'name',
	'order'        => 'DESC',
	'hide_empty'   => true,
	'hierarchical' => 1,
	'taxonomy'     => 'category',
);
$child_categories = get_categories($args);
if(sizeof($child_categories) > 0):
	?>
	<section class="content-breadcrumbs content-breadcrumbs_have__tabs">
		<div class="container">
			<div class="content-breadcrumbs_box">
				<div class="content-breadcrumbs_box__paragraph">
					<h1 class="paragraph_heading"><?= single_cat_title(); ?></h1>						
				</div>
			</div>

			<div class="clearfix"></div>

			<div class="content-breadcrumbs_tabs">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<?php 
					$check = true;
					foreach ( $child_categories as $child_cat ) {
						?>
						<li class="<?= ($check) ? 'active' : ""; ?>">
							<a href="#<?= $child_cat->slug ?>" aria-controls="<?= $child_cat->slug ?>" role="tab" data-toggle="tab">
								<?= $child_cat->name ?>
							</a>
						</li>
						<?php $check = false;} ?>
					</ul>
				</div>
			</div>
		</section> <!-- /Content Breadcrumbs -->
		<script>
			const container = $('.content-breadcrumbs_tabs');
			const primary = container.find('.nav-tabs');
			const primaryItems = container.find('.nav-tabs > li:not(.-more)');
			container.addClass('--jsfied');

			var html = '<li class="-more"><button type="button" aria-haspopup="true" aria-expanded="false">More <span><i class="fa fa-angle-down"></i></span></button><ul class="-secondary">' + primary[0].innerHTML + '</ul></li>';

			primary.append(html);

			const secondary = container.find('.-secondary');
			const secondaryItems = secondary.find('li');
			const allItems = container.find('li');
			const moreLi = primary.find('.-more');
			const moreBtn = moreLi.find('button');
			moreBtn.on('click', (e) => {
				e.stopPropagation();
				e.preventDefault();
				container.toggleClass('--show-secondary');
				moreBtn[0].setAttribute('aria-expanded', container[0].classList.contains('--show-secondary'));
			})

			const doAdapt = () => {
			  // reveal all items for the calculation
			  for (var i = 0; i < allItems.length; i++) {
			  	allItems[i].classList.remove('hide');
			  }

			  // hide items that won't fit in the Primary
			  let stopWidth = moreBtn.width();
			  let hiddenItems = [];
			  const primaryWidth = primary.width();

			  for (var i = 0; i < primaryItems.length; i++) {
			  	if(primaryWidth >= stopWidth + primaryItems[i].offsetWidth) {
			  		stopWidth += primaryItems[i].offsetWidth;
			  	} else {
			  		primaryItems[i].classList.add('hide');
			  		hiddenItems.push(i);
			  	}
			  }
			  
			  // toggle the visibility of More button and items in Secondary
			  if(!hiddenItems.length) {
			  	moreLi[0].classList.add('hide');
			  	container[0].classList.remove('--show-secondary');
			  	moreBtn[0].setAttribute('aria-expanded', false);
			  }
			  else {  
			  	for (var i = 0; i < secondaryItems.length; i++) {
			  		if(!hiddenItems.includes(i)) {
			  			secondaryItems[i].classList.add('hide');
			  		}
			  	}
			  }
			}

			doAdapt() // adapt immediately on load
			jQuery(window).resize(function(event) {
				doAdapt()
			});

			jQuery(document).on('click', (e) => {
				let el = e.target;
				while(el) {
					if(el === secondary || el === moreBtn) {
						return;
					}
					el = el.parentNode;
				}
				container[0].classList.remove('--show-secondary');
				moreBtn[0].setAttribute('aria-expanded', false);
			})
		</script>

		<!-- Content News -->
		<section class="content-news">
			<div class="container">
				<div class="content-news_box">
					<div class="tab-content">
						<?php  
						$check1 = true;
						foreach ( $child_categories as $child_cat ):?>
							<div role="tabpanel" class="tab-pane <?= ($check1) ? 'active' : ''; ?>" id="<?= $child_cat->slug ?>">
								<?php 
								$args = array(
									'post_type' => 'post',
									'posts_per_page' => 5,
									'cat' => $child_cat->cat_ID,
								);
								$check1 = true;
								wp_reset_query();
								$query = new WP_Query($args);
								if($query->have_posts()):
									while($query->have_posts()):
										$query->the_post();
										if($check1){
											?>
											<div class="news__main__item">
												<a href="<?php the_permalink(); ?>" class="news__item__img">
													<?php the_post_thumbnail(); ?>
												</a>	
												<div class="news__item__box" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">	
													<div class="item__top">
														<a class="item__top__category"><?= get_the_category(get_the_ID())[0]->cat_name; ?></a>
														<div class="item__top__date"><?= get_the_date("F d, Y"); ?></div>
													</div>

													<div class="item__caption">
														<h3 class="item__caption__heading">
															<a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?>
														</a>
													</h3>

													<a href="<?php the_permalink(); ?>" class="item__caption__button"><?= (pll_current_language() == 'en') ? "Read more" : "Xem thêm" ?></a>
												</div>
											</div>
										</div>

										<div class="news__box">
											<?php $check1 = false;
										}else{ ?>
											<div class="news__item">
												<a href="<?php the_permalink(); ?>" class="news__item__img">
													<?php the_post_thumbnail("85x56"); ?>
												</a>	
												<div class="news__item__caption">
													<h3 class="item__caption__heading">
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
													</h3>
													<div class="item__caption__date"><?= get_the_date("F d, Y"); ?></div>
												</div>
											</div>
										<?php }
									endwhile;
									wp_reset_postdata();
								endif;?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section> <!-- /Content News -->

<?php endif; ?>
<div class="clearfix"></div>

<!-- Content Free Style -->
<section class="content-free-style">
	<div class="container">
		<div class="content-free-style_box">
			<div class="col-9">
				<div class="content-free-style_grid__event content-free-style_grid__none__top content-free-style_grid__have__load">
					<div class="content-free-style_grid__items">
						<?php
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 9,
							'offset' => 5,
							'cat' => $cat,
						);
						wp_reset_query();
						$query = new WP_Query($args);
						if($query->have_posts()):
							while($query->have_posts()):
								$query->the_post();
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