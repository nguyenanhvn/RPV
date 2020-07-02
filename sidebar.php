<?php global $epv_options;?>
<div class="content__sidebar">
	<div class="content__siderbar__sticky">
		<div class="content__widget">
			<h3><?= changeLang("E-BROCHURE","Tài liệu điện tử"); ?></h3>
			<ul class="content__widget__ebrochure">
				<li>                        
					<a href="<?= site_url(); ?>/category/new-media/e-brochures/" title="">
						<img src="<?= $epv_options['e_brochure_image']['url']; ?>">	
						<div class="widget_recent_entry">	             			
							<h4 class="title-post">
								<?= $epv_options['e_brochure_title']; ?>
							</h4>
						</div>
					</a>
				</li>
			</ul>
		</div>

		<div class="content__ads">
			<div class="ads__slider owl-carousel">
				<?php
				if ( isset( $epv_options['sidebar-ads'] ) && !empty( $epv_options['sidebar-ads'] ) ):
					foreach ($epv_options['sidebar-ads'] as $sb_ads_slide): 
						$url = ($sb_ads_slide['url'] != "") ? $sb_ads_slide['url'] : "#";?>
						<a href="<?= $url; ?>" title="">
							<img src="<?= $sb_ads_slide['image']; ?>" alt="">
						</a>
					<?php endforeach;
				endif; ?>
			</div>
			<span><?= changeLang("ADVERTISING","QUẢNG CÁO"); ?></span>
		</div>
	</div>
</div>