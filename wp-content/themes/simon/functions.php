<?php
require("foundation4-topbar-menu.php");
require("foundation4-topbar-walker.php");

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('READ MORE', 'your-text-domain') . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function filter_post_type_link($link, $post)
{
    if ($post->post_type != 'people')
        return $link;

    if ($cats = get_the_terms($post->ID, 'staff_roles'))
        $link = str_replace('%staff_roles%', array_pop($cats)->slug, $link);
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);

add_filter('show_admin_bar', '__return_false');

function caseStudy() {
	$labels = array(
	  'name'               => _x( 'Case Studies', 'post type general name' ),
	  'singular_name'      => _x( 'Case Study', 'post type singular name' ),
	  'add_new'            => _x( 'Add New', 'Case Study' ),
	  'add_new_item'       => __( 'Add New Case Study' ),
	  'edit_item'          => __( 'Edit Case Study' ),
	  'new_item'           => __( 'New Case Study' ),
	  'all_items'          => __( 'All Case Studies' ),
	  'view_item'          => __( 'View Case Studies' ),
	  'search_items'       => __( 'Search Case Studies' ),
	  'not_found'          => __( 'No Case Studies found' ),
	  'not_found_in_trash' => __( 'No Case Studies found in the Trash' ), 
	  'parent_item_colon'  => '',
	  'menu_name'          => 'Case Studies'
	);
	$args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Articles',
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'post-formats', 'custom-fields' ),
        'taxonomies' => array( 'post_tag','recipe_types'),
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 2,
        //'menu_icon' => get_stylesheet_directory_uri() . '/images/icons/Article_icon.png',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'query_var' => true,
        'can_export' => true,
        //'rewrite' => array('slug' => 'themes/','with_front' => FALSE),
        'public' => true,
        'has_archive' => 'themes',
        'capability_type' => 'post'
    );
	register_post_type( 'caseStudy', $args );

}
add_action( 'init', 'caseStudy' );


//Example Taxonomy and Custom Post type


//function recipe_Taxonomy() {  
//    register_taxonomy(  
//        'recipe_types',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
//        'recipe',        //post type name
//        array(  
//            'hierarchical' => true,  
//            'label' => 'Recipe Types',  //Display name
//            'query_var' => true,
//            'rewrite' => array(
//                'slug' => 'recipe_types', // This controls the base slug that will display before each term
//                'with_front' => false // Don't display the category base before 
//            )
//        )  
//    );  
//}  
//add_action( 'init', 'recipe_Taxonomy');
//
//
//function recipes() {
//	$labels = array(
//	  'name'               => _x( 'Recipe', 'post type general name' ),
//	  'singular_name'      => _x( 'Recipe', 'post type singular name' ),
//	  'add_new'            => _x( 'Add New', 'Recipe' ),
//	  'add_new_item'       => __( 'Add New Recipe' ),
//	  'edit_item'          => __( 'Edit recipe' ),
//	  'new_item'           => __( 'New recipe' ),
//	  'all_items'          => __( 'All recipes' ),
//	  'view_item'          => __( 'View recipes' ),
//	  'search_items'       => __( 'Search recipes' ),
//	  'not_found'          => __( 'No recipes found' ),
//	  'not_found_in_trash' => __( 'No recipes found in the Trash' ), 
//	  'parent_item_colon'  => '',
//	  'menu_name'          => 'Recipes'
//	);
//	$args = array(
//        'labels' => $labels,
//        'hierarchical' => false,
//        'description' => 'Articles',
//        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'post-formats', 'custom-fields' ),
//        'taxonomies' => array( 'post_tag','recipe_types'),
//        'show_ui' => true,
//        'show_in_menu' => true,
//        'menu_position' => 2,
//        //'menu_icon' => get_stylesheet_directory_uri() . '/images/icons/Article_icon.png',
//        'show_in_nav_menus' => true,
//        'publicly_queryable' => true,
//        'exclude_from_search' => false,
//        'query_var' => true,
//        'can_export' => true,
//        //'rewrite' => array('slug' => 'themes/','with_front' => FALSE),
//        'public' => true,
//        'has_archive' => 'themes',
//        'capability_type' => 'post'
//    );
//	register_post_type( 'recipe', $args );
//
//}
//add_action( 'init', 'recipes' );
