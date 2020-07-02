<?php 
function custom_polylang_languages( $class = '' ) {

  if ( ! function_exists( 'pll_the_languages' ) ) return;

  // Gets the pll_the_languages() raw code
  $languages = pll_the_languages( array(
    'display_names_as'       => 'name',
    'hide_if_no_translation' => 0,
    'raw'                    => true
  ) ); 

  $output = '';

  // Checks if the $languages is not empty
  if ( ! empty( $languages ) ) {
    // Creates the $output variable with languages container
    $first = true;

    $output = '<div class="header-middle__language">';
    $output .= '<span data-toggle="dropdown" class="current-lang"></span>';
    $output .= '<ul class="no-style">';
    // Runs the loop through all languages
    foreach ( $languages as $language ) {

      // Variables containing language data
      $id             = $language['id'];
      $flag           = $language['flag'];
      $name           = $language['name'];
      $slug           = $language['slug'];
      $url            = $language['url'];
      $current        = $language['current_lang'] ? ' languages__item--current' : '';
      $no_translation = $language['no_translation'];
      $output .= "<li>";
      if ( $current ) {
        $output .= "<span class=\"current\">$name</span>";   
      } else {
        $output .= "<span><a href=\"$url\" class=\"dropdown-item\">$name</a></span>";   
      }
      $output .= "</li>";
    }

    $output .= '</ul>';
    $output .= '</div>';

  }

  return $output;
}
function custom_polylang_languages1( $class = '' ) {

  if ( ! function_exists( 'pll_the_languages' ) ) return;

  // Gets the pll_the_languages() raw code
  $languages = pll_the_languages( array(
    'display_names_as'       => 'name',
    'hide_if_no_translation' => 0,
    'raw'                    => true
  ) ); 

  $output = '';

  // Checks if the $languages is not empty
  if ( ! empty( $languages ) ) {
    // Creates the $output variable with languages container
    $output = '<div class="language-mobile">';
    $output .= '<span data-toggle="dropdown" class="current-lang"></span>';
    $output .= '<ul class="no-style">';
    // Runs the loop through all languages
    foreach ( $languages as $language ) {

      // Variables containing language data
      $id             = $language['id'];
      $flag           = $language['flag'];
      $name           = $language['name'];
      $slug           = $language['slug'];
      $url            = $language['url'];
      $current        = $language['current_lang'] ? ' languages__item--current' : '';
      $no_translation = $language['no_translation'];
      $output .= "<li>";
      if ( $current ) {
        $output .= "<span class=\"current\">$name</span>";   
      } else {
        $output .= "<a href=\"$url\" class=\"dropdown-item\">$name</a>";   
      }
      $output .= "</li>";
    }

    $output .= '</ul>';
    $output .= '</div>';

  }

  return $output;
}
function custom_polylang_languages2( $class = '' ) {

  if ( ! function_exists( 'pll_the_languages' ) ) return;

  // Gets the pll_the_languages() raw code
  $languages = pll_the_languages( array(
    'display_names_as'       => 'name',
    'hide_if_no_translation' => 0,
    'raw'                    => true
  ) ); 

  $output = '';

  // Checks if the $languages is not empty
  if ( ! empty( $languages ) ) {
    // Creates the $output variable with languages container
    $first = true;
    $output = '<div class="language-mobiles">';
    $output .= '<span data-toggle="dropdown" class="current-lang"></span>';
    $output .= '<ul class="no-style">';
    // Runs the loop through all languages
    foreach ( $languages as $language ) {

      // Variables containing language data
      $id             = $language['id'];
      $flag           = $language['flag'];
      $name           = $language['name'];
      $slug           = $language['slug'];
      $url            = $language['url'];
      $current        = $language['current_lang'] ? ' languages__item--current' : '';
      $no_translation = $language['no_translation'];
      $output .= "<li>";
      if ( $current ) {
        $output .= "<span class=\"current\">$name</span>";   
      } else {
        $output .= "<a href=\"$url\" class=\"dropdown-item\">$name</a>";   
      }
      $output .= "</li>";
    }

    $output .= '</ul>';
    $output .= '</div>';

  }

  return $output;
}