<?php
class destination_main_menu {

        function __construct() {
                if ( is_admin() ) {
                        add_action( 'wp_update_nav_menu_item', array( $this, 'destination_wp_update_nav_menu_item' ), 10, 3 );
                        add_filter( 'wp_edit_nav_menu_walker', array( $this, 'destination_wp_edit_nav_menu_walker' ) );
                }
                add_filter( 'wp_nav_menu_objects', array( $this, 'hook_wp_nav_menu_objects' ), 10, 2 );
        }

        function destination_wp_edit_nav_menu_walker() {
                include_once( trailingslashit( get_template_directory() ). 'core/nav-menu-callback.php' );

                return 'destination_nav_menu_edit_walker';
        }

        function destination_wp_update_nav_menu_item( $menu_id, $menu_item_id, $args ) {

                // Update meta menu items
                if ( isset( $_POST['penci_cat_mega_menu'][$menu_item_id] ) ) {
                        update_post_meta( $menu_item_id, 'penci_cat_mega_menu', $_POST['penci_cat_mega_menu'][$menu_item_id] );
                }
                if ( isset( $_POST['penci_number_mega_menu'][$menu_item_id] ) ) {
                        update_post_meta( $menu_item_id, 'penci_number_mega_menu', $_POST['penci_number_mega_menu'][$menu_item_id] );
                }

        }

        function hook_wp_nav_menu_objects( $items, $args = '' ) {
                $menu_items = array();

                foreach ( $items as &$item ) {
                        $item->is_mega_menu = false;

                        // if menu is mega menu, render mega menu
                        $penci_catid_mega_menu = get_post_meta( $item->ID, 'penci_cat_mega_menu', true );
                        $penci_number_mega_menu = get_post_meta( $item->ID, 'penci_number_mega_menu', true );
                        if( ! isset( $penci_number_mega_menu ) || empty ( $penci_number_mega_menu ) ): $penci_number_mega_menu = '1';  endif;

                        if ( ! empty( $penci_catid_mega_menu ) ) {

                                $item->classes[] = 'penci-mega-menu';

                                // add the parent menu
                                $menu_items[] = $item;

                                // create mega menu item
                                $post                 = new stdClass;
                                $post->ID             = 0;
                                $post->post_author    = '';
                                $post->post_date      = '';
                                $post->post_date_gmt  = '';
                                $post->post_password  = '';
                                $post->post_type      = 'menu_penci';
                                $post->post_status    = 'draft';
                                $post->to_ping        = '';
                                $post->pinged         = '';
                                $post->comment_status = get_option( 'default_comment_status' );
                                $post->ping_status    = get_option( 'default_ping_status' );
                                $post->post_pingback  = get_option( 'default_pingback_flag' );
                                $post->post_category  = get_option( 'default_category' );
                                $post->page_template  = 'default';
                                $post->post_parent    = 0;
                                $post->menu_order     = 0;
                                $new_item             = new WP_Post( $post );

                                /*
                                 * if this is mega menu
                                 * set the is_mega_menu flag
                                 * render content of this mega menu
                                 */
                                $new_item->is_mega_menu = true; // sent to the menu walkers

                                $new_item->menu_item_parent = $item->ID;

                                $new_item->url   = '';
                                $new_item->title = '';
                                $new_item->title .= destination_return_html_mega_menu( $penci_catid_mega_menu, $penci_number_mega_menu );

                                $menu_items[] = $new_item;

                        }
                        else {
                                $menu_items[] = $item;
                        }
                } //end foreach

                return $menu_items;
        }
}

new destination_main_menu();

class destination_nav_walker extends Walker_Nav_Menu {
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
              $indent = str_repeat("\t", $depth);
              $output .= "<div class=\"box__menu__child\">\n";
              $output .= "\n$indent<ul class=\"sub-menu\">\n";
        }
        public function end_lvl( &$output, $depth = 0, $args = array() ) {
              $indent = str_repeat("\t", $depth);
              $output .= "$indent</ul>\n";
              $output .= "</div>\n";
        }
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
                $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

                $class_names = $value = '';

                $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
                $classes[] = 'menu-item-' . $item->ID;

                $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
                $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

                $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
                $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

                $output .= $indent . '<li' . $id . $value . $class_names . '>';

                $atts           = array();
                $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
                $atts['target'] = ! empty( $item->target ) ? $item->target : '';
                $atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
                $atts['href']   = ! empty( $item->url ) ? $item->url : '';

                $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

                $attributes = '';
                foreach ( $atts as $attr => $value ) {
                        if ( ! empty( $value ) ) {
                                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                                $attributes .= ' ' . $attr . '="' . $value . '"';
                        }
                }

                $item_output = $args->before;

                if ( $item->is_mega_menu == false ) {
                        $item_output .= '<a' . $attributes . '>';
                }

                $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

                if ( $item->is_mega_menu == false ) {
                        $item_output .= '</a>';
                }
                $item_output .= $args->after;

                $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
}

