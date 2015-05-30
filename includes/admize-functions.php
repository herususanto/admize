<?php
function admize_customize_register( $wp_customize ) {
	$wp_customize->add_section(
        'footer_text',
        array(
            'title' => 'Footer Copyright Text',
            'description' => '',
        )
    );
	$wp_customize->add_setting(
		'copyright_text',
		array(
			'default' => 'Copyright 2015 - Admize. All rights reserved',
			'sanitize_callback' => 'admize_sanitize_footer_text'
		)
	);
	$wp_customize->add_control(
    'copyright_text',
		array(
			'label' => 'Footer copyright text',
			'section' => 'footer_text',
			'type' => 'text',
		)
	);
	//ads
	$wp_customize->add_section(
        'ads_section',
        array(
            'title' => 'Ads',
            'description' => '',
			'priority' => 36,
        )
    );
	$wp_customize->add_setting(
		'ad_topheader',
		array(
			'default' => '',
			'sanitize_callback' => 'admize_sanitize_cb'
		)
	);
	$wp_customize->add_control(
    'ad_topheader',
		array(
			'label' => 'Top header ads code',
			'section' => 'ads_section',
			'type' => 'textarea',
		)
	);
	$wp_customize->add_setting(
		'ad_toplink',
		array(
			'default' => '',
			'sanitize_callback' => 'admize_sanitize_cb'
		)
	);
	$wp_customize->add_control(
    'ad_toplink',
		array(
			'label' => 'Top link ads code (under menu)',
			'section' => 'ads_section',
			'type' => 'textarea',
		)
	);
	
	$wp_customize->add_setting(
		'ad_afterfirstpost',
		array(
			'default' => '',
			'sanitize_callback' => 'admize_sanitize_cb'
		)
	);
	$wp_customize->add_control(
    'ad_afterfirstpost',
		array(
			'label' => 'Ads after below #1 post on loop',
			'section' => 'ads_section',
			'type' => 'textarea',
		)
	);
	
	
	$wp_customize->add_setting(
		'ad_singlepost',
		array(
			'default' => '',
			'sanitize_callback' => 'admize_sanitize_cb'
		)
	);
	$wp_customize->add_control(
    'ad_singlepost',
		array(
			'label' => 'Ads in single post paragraph',
			'section' => 'ads_section',
			'type' => 'textarea',
		)
	);
	
	
	$wp_customize->add_setting(
		'ad_bottom',
		array(
			'default' => '',
			'sanitize_callback' => 'admize_sanitize_cb'
		)
	);
	$wp_customize->add_control(
    'ad_bottom',
		array(
			'label' => 'Ads bottom above footer',
			'section' => 'ads_section',
			'type' => 'textarea',
		)
	);
	
	//layout
	$wp_customize->add_section(
        'section_layout',
        array(
            'title' => 'Layout Settings',
            'description' => '',
            'priority' => 35,
        )
    );
	$wp_customize->add_setting(
		'layout_width',
		array(
			'default' => '960px',
			'sanitize_callback' => 'admize_sanitize_layout_width'
		)
	);
	$wp_customize->add_setting(
		'layout_type',
		array(
			'default' => 'rs',
			'sanitize_callback' => 'admize_sanitize_layout_type'
		)
	);
	 
	$wp_customize->add_control(
		'layout_type',
		array(
			'type' => 'select',
			'label' => 'Site Column Layout',
			'section' => 'section_layout',
			'choices' => array(
				'rs' => 'Right Sidebar',
				'ls' => 'Left Sidebar',
				'full' => 'No Sidebar',
				'twos' => 'Right & Left Sidebar',
			),
		)
	);
	
	$wp_customize->add_control(
    'layout_width',
		array(
			'label' => 'Custom site width',
			'section' => 'section_layout',
			'type' => 'text',
		)
	);
	
	//logo
	$wp_customize->add_section(
        'logo_section',
        array(
            'title' => 'Logo',
            'description' => '',
			'priority' => 35,
        )
    );
	$wp_customize->add_setting( 
	'logo-upload',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw'
		)
	); 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'logo-upload',
			array(
				'label' => 'Logo Image Upload',
				'section' => 'logo_section',
				'settings' => 'logo-upload'
			)
		)
	);
	
	$colors = array();
	$colors[] = array(
	  'slug'=>'theme_skin_color', 
	  'default' => '#fa850b',
	  'label' => __('Theme Skin Color', 'iwebtheme')
	);
	$colors[] = array(
	  'slug'=>'topmenu_background', 
	  'default' => '#ffffff',
	  'label' => __('Top Menu Background', 'iwebtheme')
	);
	$colors[] = array(
	  'slug'=>'topmenu_color', 
	  'default' => '#444444',
	  'label' => __('Top Menu Color', 'iwebtheme')
	);
	foreach( $colors as $color ) {
	  // SETTINGS
	  $wp_customize->add_setting(
		$color['slug'], array(
		  'default' => $color['default'],
		  'sanitize_callback' => 'sanitize_hex_color',
		  'type' => 'option', 
		  'capability' => 
		  'edit_theme_options'
		)
	  );
	  // CONTROLS
	  $wp_customize->add_control(
		new WP_Customize_Color_Control(
		  $wp_customize,
		  $color['slug'], 
		  array('label' => $color['label'], 
		  'section' => 'colors',
		  'settings' => $color['slug'])
		)
	  );
	}
}
add_action( 'customize_register', 'admize_customize_register' );

function admize_sanitize_cb( $input ) {	
	return wp_kses_post( $input );	
}


function admize_sanitize_footer_text( $input ) {
    return wp_kses_post( $input );	
}

function admize_sanitize_layout_width( $value ) {
    if ( ! in_array( $value, array( '960px') ) )
        $value = '960px';
 
    return $value;
}
function admize_sanitize_layout_type( $value ) {
    if ( ! in_array( $value, array( 'rs', 'ls', 'full', 'twos' ) ) )
        $value = 'rs';
 
    return $value;
}

function admize_breadcrumbs() {
    $delimiter = '&raquo;';
    $home = 'Home'; // text for the 'Home' link
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    echo '<div id="breadcrumbs">';
    global $post;
    $homeLink = esc_url(home_url('/'));
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
    } elseif (is_day()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . $after;
        }
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        //$cat = get_the_category($parent->ID); $cat = $cat[0];
        //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . 'Search results for "' . get_search_query() . '"' . $after;
    } elseif (is_tag()) {
        echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . 'Articles posted by ' . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . 'Error 404' . $after;
    }

    if (get_query_var('paged')) {
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
        echo 'Page' . ' ' . get_query_var('paged');
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ')';
    }

    echo '</div>';
}


//pagination
function pagination($pages = '', $range = 1) {
     $showitems = ($range * 2)+1; 
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }  
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\">";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."' class=\"pagination_button\">&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".esc_url(get_pagenum_link($paged - 1))."' class=\"pagination_button\">&lsaquo;</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<a href=\"#\" class=\"pagination_button current\">".intval($i)."</a>":"<a href='".esc_url(get_pagenum_link($i))."' class=\"pagination_button\">".intval($i)."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".esc_url(get_pagenum_link($paged + 1))."\" class=\"pagination_button\">&rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".esc_url(get_pagenum_link($pages))."' class=\"pagination_button\">&raquo;</a>";
         echo "</div>\n";
     }
}

//avatar
add_filter('get_avatar','change_avatar_css');
function change_avatar_css($class) {
	$class = str_replace("class='avatar", "class='img-responsive", $class) ;
	return $class;
} ?>
<?php
// === custom style === //
function iwebtheme_build_custom_css(){
		$iwebtheme_buildcss = '';
		$iwebtheme_buildcss .= iwebtheme_customize_css();
		//$iwebtheme_buildcss .= iwebtheme_option_css();
		


		if(!empty($iwebtheme_buildcss)){
			$iwebtheme_wrap_buildcss ='';
			$iwebtheme_wrap_buildcss .="<style type=\"text/css\">\n";
			$iwebtheme_wrap_buildcss .= $iwebtheme_buildcss;
			$iwebtheme_wrap_buildcss .="</style>\n";
			echo $iwebtheme_wrap_buildcss;
		}
}
add_action('wp_head','iwebtheme_build_custom_css'); 
// get custom css from customizer
function iwebtheme_customize_css(){	
	$setting_css = '';

	$cust_skin = get_option('theme_skin_color');
	$cust_topmenubg = get_option('topmenu_background');
	$cust_topmenuclr = get_option('topmenu_color');
	
	$cust_lwidth = get_theme_mod('layout_width');

		if($cust_skin != '#fa850b') {
			$setting_css .= "a,h2.entry-title a:hover,.sidebar ul li a:hover,#top-menu ul li.current-menu-item a, #top-menu ul li.current-menu-parent a,#top-menu ul li a:hover {";
			$setting_css .= "color: ".$cust_skin.";";
			$setting_css .= "}";		
		}
		if($cust_skin != '#fa850b') {
			$setting_css .= ".scrollup {";
			$setting_css .= "background: none repeat scroll 0% 0% ".$cust_skin.";";
			$setting_css .= "}";		
		}

		if($cust_skin != '#fa850b') {
			$setting_css .= "#pagenavi a,#pagenavi span {";
			$setting_css .= "background-color: ".$cust_skin.";";
			$setting_css .= "}";		
		}
		if($cust_skin != '#fa850b') {
			$setting_css .= "#secondary-menu.boxed {";
			$setting_css .= "border-left: 1px solid ".$cust_skin.";";
			$setting_css .= "border-right: 1px solid ".$cust_skin.";";
			$setting_css .= "}";		
		}

		if($cust_skin != '#fa850b') {
			$setting_css .= "a.more-link,.pagination a.pagination_button,#secondary-menu,#content table th,.tagcloud a,#commentform #submit,#secondary-menu  ul li.dropme a,#secondary-menu .current_page_item,#searchsubmit,#secondary-menu .first ul li.current-menu-item, #secondary-menu .first >ul >li a:hover {";
			$setting_css .= "background: ".$cust_skin.";";
			$setting_css .= "}";		
		}
		//
		if($cust_topmenubg != '#ffffff') {
			$setting_css .= "#top-menu,#top-menu,#top-menu  ul li.dropme a,#top-menu .current_page_item,.current-menu-item,.current-post-parent,#top-menu .first ul li.current-menu-item, #top-menu .first >ul >li a:hover {";
			$setting_css .= "background: ".$cust_topmenubg.";";
			$setting_css .= "}";
			$setting_css .= "#top-menu.boxed {";
			$setting_css .= "border-left: 1px solid ".$cust_topmenubg.";";
			$setting_css .= "border-right: 1px solid ".$cust_topmenubg.";";
			$setting_css .= "}";				
		}
		//
		if($cust_topmenuclr != '#444444') {
			$setting_css .= "#top-menu ul li a,#top-menu .first ul li a {";
			$setting_css .= "color: ".$cust_topmenuclr.";";
			$setting_css .= "}";				
		}
		if($cust_lwidth != '960px') {
			$setting_css .= "#top-menu.boxed,#footer-wrapper,#wrapper,#secondary-menu.boxed {";
			$setting_css .= "max-width: ".$cust_lwidth." !important;";
			$setting_css .= "}";		
		}

	
	return $setting_css;
}
?>