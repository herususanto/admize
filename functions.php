<?php
require get_template_directory() . '/includes/admize-functions.php';
function admize_theme_setup() { 
	add_theme_support( 'post-thumbnails', array( 'post' ) );
	
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'full-size',  9999, 9999, false );
		add_image_size( 'custom-size', 150, 130 , true );
		add_image_size( 'thumb', 150, 150, true );
		add_image_size( 'small-thumb',  54, 54, true );
	}

    load_theme_textdomain('iwebtheme', get_template_directory() . '/languages');

    add_editor_style();
	register_nav_menus(
		array(
 			'top-menu' => __('Top Menu' , 'iwebtheme' ),
			'topsec-menu' => __('Secondary Menu' , 'iwebtheme' ),
		)		
	);

	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 960;
	}
	// theme support
    add_theme_support('automatic-feed-links');
	add_theme_support( "title-tag" );
	add_theme_support( 'custom-background', apply_filters( 'admize_custom_background_args', array(
		'default-color' => '#ffffff',
		'default-image' => '',
	) ) );
	
}
add_action( 'after_setup_theme', 'admize_theme_setup' );

function admize_scripts() {
	wp_enqueue_script('admize-script', get_template_directory_uri().'/js/script.js', array('jquery'), '1.0', false );
	wp_enqueue_style('admize-style', get_stylesheet_uri() );
	wp_enqueue_style('admize-skin', get_template_directory_uri(). '/skin/default.css', 'style');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	}
add_action( 'wp_enqueue_scripts', 'admize_scripts' );


function admize_menu() {
		echo '<ul>';
		if ('page' != get_option('show_on_front')) {
		if (is_front_page())
			$class = 'class="current_page_item"';
		}
		wp_list_pages('title_li=');
		echo '</ul>';
}

	
function admize_post_meta_data() {
	printf( __( '%2$s  %4$s', 'iwebtheme' ),
	'meta-prep meta-prep-author posted', 
	sprintf( '<span itemprop="datePublished" class="timestamp updated">%3$s</span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_html( get_the_date() )
	),
	'byline',
	sprintf( '<span class="author vcard" itemprop="author" itemtype="http://schema.org/Person"><span class="fn">%3$s</span></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'iwebtheme' ), get_the_author() ),
		esc_attr( get_the_author() )
		)
	);
}
// Widget
    function iwebtheme_widgets_init() {

	register_sidebar(array(
		'name' => __( 'Right Sidebar', 'iwebtheme' ),
		'id'            => 'sidebar-1',
	    'before_widget' => '<div class="box clearfloat"><div class="boxinside clearfloat">',
	    'after_widget' => '</div></div>',
	    'before_title' => '<h4 class="widgettitle">',
	    'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => __( 'Left Sidebar', 'iwebtheme' ),
		'id'            => 'sidebar-2',
	    'before_widget' => '<div class="box clearfloat"><div class="boxinside clearfloat">',
	    'after_widget' => '</div></div>',
	    'before_title' => '<h4 class="widgettitle">',
	    'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => __( 'Footer Widget 1', 'iwebtheme' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Widget 2', 'iwebtheme' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));	

	register_sidebar(array(
		'name' => __( 'Footer Widget 3', 'iwebtheme' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));	

	register_sidebar(array(
		'name' => __( 'Footer Widget 4', 'iwebtheme' ),
		'id'            => 'sidebar-6',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));	

}
add_action('widgets_init', 'iwebtheme_widgets_init');

//paginaton
function admize_pagenavi() {
	global $wp_query;
	$big = 123456789;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<div class="wp-pagenavi">';
	            echo '<span class="pages">'. $paged . ' of ' . $wp_query->max_num_pages .'</span>';
	            foreach ( $page_format as $page ) {
	                    echo "$page";
	            }
	           echo '</div>';
	 }
}
?>