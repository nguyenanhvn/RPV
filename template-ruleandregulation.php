<?php 
/**
 * Template Name: Rule & Regulations
 */
get_header();
global $des_options;
?>
<!-- Content -->
<main id="content">
	<!-- Content Breadcrumb -->
	<section class="content-breadcrumb">
		<div class="container">
			<?= custom_breadcrumbs();?>
		</div>
	</section> <!-- /Content Breadcrumb -->

	<!-- Content Rules & Regulations -->
	<section class="content-rules">
		<div class="container">
			<div class="content-rules_box">
				<h2 class="heading"><?php the_title(); ?></h2>
				<?php 
				$rule_image = rwmb_meta('prefix_ruleregulations_img_banner',array("size" => "full"));
				$rule_description = rwmb_meta('prefix_ruleregulations_paragraph');
				$rule_btn_text = rwmb_meta('prefix_ruleregulations_btn_text');
				$rule_btn_link = rwmb_meta('prefix_ruleregulations_btn_link');
				$rule_group = rwmb_meta('prefix_ruleregulations_group');
				?>
				<div class="clearfix"></div>

				<div class="box__left">
					<div class="image">
						<img src="<?= $rule_image['url']; ?>" alt="">
					</div>
					<div class="caption">
						<div class="paragraph"><?= $rule_description; ?></div>
						<a class="download" href="<?= ($rule_btn_link != '') ? $rule_btn_link : changeLang(site_url()."/category/new-media/e-brochures/",site_url()."/vi/category/tin-tuc-truyen-thong/tai-lieu-trien-lam/"); ?>"><?= ($rule_btn_text != "") ? $rule_btn_text : changeLang('DOWNLOAD E-BROCHURE','TẢI TÀI LIỆU'); ?> <span></span></a>
					</div>
				</div>


				<div class="box__right">
					<div class="accordions">
						<?php 
						$id = 0;
						foreach ($rule_group as $rule_item):
							$rule_item_title = $rule_item['prefix_ruleregulations_title'];
							$rule_item_content = $rule_item['prefix_ruleregulations_content'];
						?>
							<div class="accordion">
								<div class="title__accordion collapsed" data-toggle="collapse" data-target="#collapse<?= $id; ?>" aria-expanded="true">
									<span>										
										<?= $rule_item_title; ?>
									</span>
								</div>
								<div class="content__accordion collapse" id="collapse<?= $id; ?>" aria-expanded="true">
									<div class="content__accordion__box"><?= wpautop($rule_item_content); ?></div>
								</div>
							</div>
						<?php $id++;endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section> <!-- /Content Rules & Regulations -->

	<!-- Content Where to Next -->
	<?= do_shortcode( '[wheretonext]' ); ?>
	<!-- /Content Where to Next -->
</main>  <!-- /Content -->
<?php get_footer(); ?>