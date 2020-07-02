<?php
if ( ! function_exists( 'destination_return_html_mega_menu' ) ) {
	function destination_return_html_mega_menu( $catID, $row ) {
		$args             = array(
			'type'         => 'post',
			'child_of'     => $catID,
			'orderby'      => 'name',
			'order'        => 'DESC',
			'hide_empty'   => true,
			'hierarchical' => 1,
			'taxonomy'     => 'category',
		);
		$child_categories = get_categories( $args );
		$list_cats = array();

		if( !empty( $child_categories ) ):
			foreach ( $child_categories as $child_cat ) {
				$list_cats[$child_cat->name] = $child_cat->term_id;
			}
		endif;

		/* Check rows to show number posts */
		$row = '1';
		$numbers = 5;

		ob_start();
		?>
		<div class="child__tabs">
			<?php 
			$check = true;
			foreach( $list_cats as $child_name => $child_id ): ?>
				<div class="child__tabs__tab">
					<a class="<?= ($check) ? 'active' : '' ?>" href="<?php echo esc_url( get_category_link( $child_id ) ); ?>" data-id="penci-mega-<?php echo esc_attr( $child_id ); ?>">
						<?php echo sanitize_text_field( $child_name ); ?>
					</a>
					<?php $check = false;?>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="child__contents">
			<?php $j = 1; foreach( $list_cats as $cat_name => $cat_id ): ?>
			<div class="child__contents__content penci-mega-<?php echo esc_attr( $cat_id ); ?> <?= ($j == 1) ? 'active' : '' ?>">
				<?php
				$attr = array(
					'post_type' => 'post',
					'showposts' => $numbers,
					'tax_query' => array(
						array(
							'taxonomy' => 'category',
							'field'    => 'term_id',
							'terms'    =>  (int)$cat_id,
						),
					),
				);
				$latest_mega = new WP_Query( $attr );
				if( $latest_mega->have_posts() ):
					while ( $latest_mega->have_posts() ): $latest_mega->the_post();

						$category = get_the_category( get_the_ID() );
						?>
						<div class="item__grid__5">
							<a href="<?php the_permalink(); ?>" class="item__grid__img">
								<img src="<?php the_post_thumbnail_url(); ?>" alt="">
							</a>
							<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
						</div>
					<?php endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
			<?php $j++; endforeach; ?>
		</div>

		<?php
		$return = ob_get_clean();

		return $return;
	}
}