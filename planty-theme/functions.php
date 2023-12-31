<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
	$parenthandle = 'parent-style'; 
	$theme        = wp_get_theme();
	wp_enqueue_style( $parenthandle,
		get_template_directory_uri() . '/style.css',
		array(),  // If the parent theme code has a dependency, copy it to here.
		$theme->parent()->get( 'Version' )
	);
	wp_enqueue_style( 'child-style',
		get_stylesheet_uri(),
		array( $parenthandle ),
		$theme->get( 'Version' ) // This only works if you have Version defined in the style header.
	);

}

	add_filter( 'wp_nav_menu_items','add_admin_link', 10, 2 );
    function add_admin_link( $items, $args ) {
         if (is_user_logged_in()) { 
            $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a class="menu-link" href="'.get_admin_url().'">Admin</a></li>';
    
    
    }
     return $items; 
    

}
?>