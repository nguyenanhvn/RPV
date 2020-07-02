<?php get_header(); ?>
<section class="content-breadcrumb">
	<div class="container">
		<?= custom_breadcrumbs(); ?>
	</div>
</section> <!-- /Content Breadcrumb -->

<div class="container">			
	<div class="content__detail">
		<div class="tab__online">
			<h2 class="tab__online__heading"><?= changeLang("Online News","Tin Tức Trực Tuyến"); ?></h2>
			<?php $listYear = get_posts_years_array();?>
			<ul class="nav nav-tabs" role="tablist">
				<?php for ($i = 0; $i < 5 ; $i++):
					?>
					<li role="presentation" <?= ($i == 0) ? 'class="active"' : ''; ?> ><a href="#tab-<?= $listYear[$i]; ?>" aria-controls="tab-<?= $listYear[$i]; ?>" role="tab" data-toggle="tab" aria-expanded="true"><?= $listYear[$i]; ?></a></li>
				<?php endfor; ?>
			</ul>

			<div class="tab__online__content tab-content">
				<?php for ($i = 0; $i < 5 ; $i++):?>
					<div role="tabpanel" class="tab-pane <?= ($i == 0) ? 'active' : ''; ?>" id="tab-<?= $listYear[$i]; ?>">
						<div class="tab__online__scroll" data-mcs-theme="dark">
							<ul class="no-style">
								<?php 
								$args = array(
									'post_type' => 'post',
									'date_query' => array(
										array(
											'year' => $listYear[$i],
										)
									),
								);
								wp_reset_query();
								$query = new WP_Query($args);
								if($query->have_posts()):
									while($query->have_posts()): $query->the_post();
										?>
										<li>
											<div class="scroll__time"><?= get_the_date('d.m.Y'); ?></div>
											<div class="scroll__paragraph"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
										</li>
									<?php endwhile;
									wp_reset_postdata();
								endif ?>
							</ul>
						</div>
					</div>
				<?php endfor;?>
			</div>
		</div>

		<div class="media__listing">
			<h2 class="media__listing__heading"><?= changeLang("Media Coverage","Bảo Hiểm Truyền Thông"); ?></h2>

			<div class="media__listing__items">
				<?php 
				if(have_posts()):
					while(have_posts()) : the_post();
						$verticalThumb = rwmb_meta("prefix_presscoverage_featurethumb-thumb", array("size" => "full")); ?>
						<div class="items__item">
							<div class="item__img">
								<img src="<?= $verticalThumb['url']; ?>" alt="">
							</div>
							<div class="item__caption">
								<h3 class="item__title">
									<a href="<?php the_permalink(); ?>" title="">
										<?php the_title(); ?>
									</a>
								</h3>
								<div class="item__time"><?= get_the_date('d M Y'); ?></div>
							</div>
						</div>
					<?php endwhile;
				endif; ?>
			</div>
		</div>

		<div class="media__pass">
			<?php 
			$term_id = get_queried_object_id();
			$title = rwmb_meta( 'prefix_presscoverage-title', array( 'object_type' => 'term' ), $term_id );
			$content = rwmb_meta( 'prefix_presscoverage-content', array( 'object_type' => 'term' ), $term_id );
			?>
			<h2 class="media__pass__heading"><?= $title; ?></h2>
			<div class="media__pass__paragraph"><?= $content; ?></div>

			<?= do_shortcode( '[coverage_ads]' ); ?>
		</div>
	</div>

	<?php get_sidebar(); ?>
</div>

<div class="clearfix"></div>

<!-- Content Where to Next -->
<?= do_shortcode( '[wheretonext]' ); ?>
<!-- /Content Where to Next -->
<?php get_footer(); ?>