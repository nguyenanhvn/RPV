<?php
// Custom pagination
function posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/** Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/** Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="pagenavi">' . "\n";
	/** Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '%s', get_previous_posts_link("<img src=\"" . get_template_directory_uri() . "/images/arrow-prev.png\" alt=\"\">") );

	/** Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) { 
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<a href="%s" class="number">%s</a>' . "\n", esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<a title="" class="number">...</a>';
	}

	/** Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<a href="%s" class="number">%s</a>' . "\n", esc_url( get_pagenum_link( $link ) ), $link );
	}

	/** Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<a title="" class="number">...</a>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<a href="%s" class="number">%s</a>' . "\n", esc_url( get_pagenum_link( $max ) ), $max );
	}

	/** Next Post Link */
	if ( get_next_posts_link() )
		printf( '%s', get_next_posts_link("<img src='" . get_template_directory_uri() . "/images/arrow-next.png' alt=''>") );

	echo '</div>' . "\n";

}
add_filter('next_posts_link_attributes', 'next_link_attributes');
add_filter('previous_posts_link_attributes', 'prev_link_attributes');

function prev_link_attributes() {
    return 'class="prev"';
}
function next_link_attributes() {
    return 'class="next"';
}
?>