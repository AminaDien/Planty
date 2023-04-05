<?php
/**
** activation theme
**/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 add_theme_support('menu');
}

function register_my_menu(){
    register_nav_menu( 'main-menu', 'Menu Header' );
  }
  add_action( 'after_setup_theme', 'register_my_menu' );

  add_filter( 'wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2 );
  function add_extra_item_to_nav_menu( $items, $args ) {
      if (is_user_logged_in() && $args->menu == 6)
       {
          $items .= '<li><a href="/admin/">Admin</a></li>';
      }
      return $items;
  }