<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();?>

<!-- Content -->
<main id="content">
	<!-- Content Breadcrumb -->
	<section class="content-breadcrumb">
		<div class="container">
			<?= custom_breadcrumbs(); ?>
		</div>
	</section> <!-- /Content Breadcrumb -->

	<!-- Content News Detail -->
	<section class="content-dnews">
		<div class="container">
			<div class="content-dnews_box">					
				<div class="content__detail">
					<div class="content__detail__share">
						<ul class="no-style">
							<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= the_permalink();  ?>" title=""><i class="fa fa-facebook"></i></a></li>
							<li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?= the_permalink();  ?>" title=""><i class="fa fa-linkedin"></i></a></li>
							<li><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" title="" target="_blank"><i class="fa fa-twitter"></i></a></li>
						</ul>
					</div>

					<h1 class="content__detail__heading"><?php the_title(); ?></h1>

					<div class="content__detail__time"><?= get_the_date('d M Y'); ?></div>

					<div class="clearfix"></div>

					<div class="content__detail__paragraph">
						<?php if(have_posts()):
							while(have_posts()): the_post();
								the_content(); 
							endwhile;
						endif;?>
					</div>

					<div class="content__detail__bottom">
						<?php 
						$post_tags = get_the_tags();
						if ( $post_tags ) :?>
							<div class="content__detail__tags">
								<span>Tags</span>
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

				<?php get_sidebar(); ?>
			</div>
		</div>
	</section> <!-- /Content News Detail -->
	<!-- News -->
	<?php $query = get_related_posts(get_the_ID(),3);
	if($query->have_posts()): ?>
		<section class="news news-gray">
			<div class="container">
				<h2 class="title"><?= changeLang("Latest News","Tin Mới Nhất"); ?></h2>

				<a class="view-all"><?= changeLang("View All","Xem Tất Cả"); ?> <span></span></a>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<div class="box-news">
							<ul class="no-style list-news">
								<?php 
								while($query->have_posts()): $query->the_post(); ?>
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

											<div class="short">
												<?= excerpt(25);?>
											</div>

											<div class="clearfix"></div>

											<a class="more" href="<?php the_permalink(); ?>">
												<span></span> <?= changeLang("Read more","Xem thêm"); ?>
											</a>
										</div>
									</li>
								<?php endwhile;?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section> <!-- /News -->
	<?php endif; ?>
</main>  <!-- /Content -->
<?php get_footer(); ?>
