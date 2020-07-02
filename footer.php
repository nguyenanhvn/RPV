</main>
<?php global $epv_options; ?>
<div class="clearfix"></div>

<footer id="footer">
	<div class="container">
		<div class="footer-top">
			<div class="text-big"><?= changeLang("Subscribe Now","Nhận Bản Tin"); ?></div>
			<div class="form-subscribe">
				<?= changeLang(do_shortcode( '[contact-form-7 id="5" title="Subscribe"]' ),do_shortcode('[contact-form-7 id="613" title="Subscribe VI"]')); ?>
			</div>
		</div>

		<div class="footer-middle">
			<div class="name"><?= changeLang($epv_options['footer-title'],$epv_options['footer-title-vi']); ?></div>
			<div class="item">
				<b>A.</b> <?= changeLang($epv_options['footer-addr'],$epv_options['footer-addr-vi']); ?>
			</div>
			<a href="tel: <?= $epv_options['footer-phone']; ?>" class="item">
				<b>T.</b> <?= $epv_options['footer-phone']; ?>
			</a>
			<a class="link" href="http://<?= $epv_options['footer-email']; ?>" title="">
				<?= $epv_options['footer-email']; ?>
			</a>
		</div>

		<div class="footer-bottom">
			<div class="follow">
				<?php if($epv_options['url-facebook'] != "" || $epv_options['url-linkedin'] != ""  || $epv_options['url-youtube'] != "" || $epv_options['url-email'] != ""): ?>
					<span><?= changeLang("Follow us on","Theo dõi chúng tôi tại") ?>:</span>
					<ul class="no-style social">
						<?php if($epv_options['url-facebook'] != ""): ?>
							<li>
								<a href="<?= $epv_options['url-facebook']; ?>" title=""><i class="fa fa-facebook"></i></a>
							</li>
						<?php endif;?>
						<?php if($epv_options['url-youtube'] != ""): ?>
							<li>
								<a href="<?= $epv_options['url-youtube']; ?>" title=""><i class="fa fa-youtube-play"></i></a>
							</li>
						<?php endif;?>
					</ul>
				<?php endif; ?>
			</div>

			<div class="menu">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'container'=> false,
					'items_wrap' => '<ul>%3$s</ul>',
				));
				?>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
<div class="groups">
	<div class="groups-top">
		<div class="container">
			<div class="groups-top__box">
				<div class="col-2">
					<img src="<?= get_template_directory_uri(); ?>/images/groups.png" alt="asset">
				</div>
				<div class="col-2">
					<?= $epv_options['copyright']; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="groups-bottom">
		<div class="container">
			<ul class="no-style">
				<li><a target="_blank" href="https://www.informamarkets.com/en/accessibility.html">Accessibility</a></li>
				<li><a target="_blank" href="https://www.informamarkets.com/en/privacy-policy.html">Privacy Policy</a></li>
				<li><a target="_blank" href="http://•https://www.informamarkets.com/en/cookie-policy.html">Cookie Policy</a></li>
				<li><a target="_blank" href="https://www.informamarkets.com/en/terms-of-use.html">Terms of Use</a></li>
				<li><a target="_blank" href="https://www.informamarkets.com/en/visitor-terms-and-conditions.html">Visitor Terms And Conditions</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="action-fixed">
	<div class="item book">
		<a href="<?= get_page_link(102); ?>" title="" class="icon">
		</a>
		<a href="<?= get_page_link(102); ?>" class="text">
			<div class="child">
				<span>Book a stand</span>
			</div>
		</a>
	</div>
	<div class="clearfix"></div>
	<div class="item registration">
		<a href="<?= get_page_link(198); ?>" title="">
			<div class="icon"></div>
		</a>
		<a href="<?= get_page_link(198); ?>" class="text">
			<div class="child">
				<span>Pre-Registration Now</span>
			</div>
		</a>
	</div>
	<div class="clearfix"></div>
	<div class="item facebook">
		<a href="<?= $epv_options['url-facebook'];?>" title="">
			<div class="icon"></div>
		</a>
		<a href="<?= $epv_options['url-facebook'];?>" class="text">
			<div class="child">
				<span><?= changeLang("Folow us","Theo dõi chúng tôi") ?></span>
			</div>
		</a>
	</div>
</div>	

<!-- header -->
<div id="header-responsive">
	<div class="tops">			
		<div class="sticky desktop">
			<div class="container">
				<div class="show-sticky" style="display: none;">
					<div class="col-left">
						<p><?= $epv_options['informa-title']; ?></p>
						<div>
							<ul>
								<li><a href="https://informa.com">INFORMA PLC</a></li>
								<li><a href="https://informa.com/about-us">ABOUT US</a></li>
								<li><a href="https://informa.com/investors/">INVESTOR RELATIONS</a></li>
								<li><a href="https://informa.com/talent/">TALENT</a></li>
							</ul>
						</div>
					</div>
					<div class="col-right">
						<?= $epv_options['informa-text']; ?>
					</div>
				</div>
				<div class="btn-informa"><span class=""><img src="<?= get_template_directory_uri(); ?>/images/infor.png" alt=""></span></div>
			</div>
		</div>
		<?= custom_polylang_languages1(); ?>

		<div class="clearfix"></div>
	</div>
	<div class="bottoms">
		<div class="menu">
			<div class="toggle-action">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>

		<div class="logo">
			<a href="<?= site_url(); ?>" title=""><img src="<?= $epv_options['logo']['url']; ?>" alt=""></a>
			<?php if ( isset( $epv_options['other-logo'] ) && !empty( $epv_options['other-logo'] ) ) {
				for ($i = 0; $i < count($epv_options['other-logo']); $i++) {?>
					<a href="<?= ($epv_options['other-logo'][$i]['url'] != '') ? $epv_options['other-logo'][$i]['url'] : '#'; ?>" title="" target="_blank">
						<img src="<?= $epv_options['other-logo'][$i]['image'];?>" alt="logo">
					</a>
				<?php }
			} ?>  
		</div>
	</div>
</div><!-- /header -->

<!-- Menu Mobile -->
<div id="menu-mobile">
	<div class="toggle-action">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
	</div>
	<?= custom_polylang_languages2(); ?>

	<div class="clearfix"></div>
	<?php
	wp_nav_menu( array(
		'theme_location' => 'mobile',
		'container'=> false,
		'items_wrap' => '<ul class="no-style fr-menu">%3$s</ul>',
	));
	?>
	<div class="clearfix"></div>

	<div class="box-bottom">
		<ul class="no-style short-link">
			<li class="book"><a href="<?= get_page_link(102); ?>" title="">Book A Stand</a></li>
			<li class="visitor"><a href="<?= get_page_link(104); ?>" title="">Visitor Pre-Registration</a></li>
			<li class="follow"><a href="<?= $epv_options['url-facebook'];?>" title="">Follow us on Facebook</a></li>
		</ul>
	</div>
</div> <!-- /Menu Mobile -->

<div id="dark-shadow"></div>	

<!-- Lightbox  -->
<?php 
if(isset($epv_options['popup-post'])):
$popup_post_ID = $epv_options['popup-post'];?>
	<div class="md-modal md-effect-1 md-show" id="md-lightbox">
		<div class="md-content">
			<span class="md-close" title="Close Popup">&times;</span>

			<div class="md-box">
				<div class="box__right">
					<div class="box__right__note"><?= get_the_title($popup_post_ID); ?></div>
					<div class="box__right__heading">
						<?= get_the_date('d F Y', $popup_post_ID); ?>
					</div>

					<div class="box__right__text"><?= excerptWithPostID(30, $popup_post_ID); ?></div>

					<a class="box__right__more" href="<?= get_the_permalink($popup_post_ID); ?>">Read more <span></span></a>
				</div>
				<div class="box__left" style="background-image: url(<?= $epv_options['popup-image']['url']; ?>);">
					<img src="<?= $epv_options['popup-image']['url']; ?>" alt="">
				</div>
			</div>
		</div>
	</div>

	<div class="md-darknight"></div><!-- the overlay element -->
<?php endif; ?>
<!-- <script src="<?= get_template_directory_uri(); ?>/js/jquery.js"></script> -->
<script src="<?= get_template_directory_uri(); ?>/js/bootstrap.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/dotdotdot.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/jquery.sticky.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/wow.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/jquery.fancybox.min.js"></script> 
<script src="<?= get_template_directory_uri(); ?>/js/jquery.mCustomScrollbar.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/slick.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/script.js"></script>
</body>
</html>