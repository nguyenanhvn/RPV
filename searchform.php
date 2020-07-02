<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label if
 * one was passed to get_search_form() in the args array.
 */
// $unique_id = destination_unique_id( 'search-form-' );

$aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr( $args['label'] ) . '"' : '';
?>
<form class="form-search" method="get" accept-charset="utf-8" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" name="s" placeholder="Search">
	<button type="submit"><img src="<?= get_template_directory_uri(); ?>/images/icon-search-blue.png" alt=""></button>
</form>
