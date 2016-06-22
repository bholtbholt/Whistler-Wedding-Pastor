<?php
	// enables wigitized sidebars
	if ( function_exists('register_sidebar') )

	// Footer Widget
	// Location: at the top of the footer, above the copyright
	register_sidebar(array('name'=>'Footer',
		'before_widget' => '<div class="%2$s widget-footer"><ul class="col-sm-4">',
		'after_widget' => '</ul></div>',
		'before_title' => '<h4 class="footer-headline">',
		'after_title' => '</h4>',
	));

	// post thumbnail support
	add_theme_support( 'post-thumbnails' );

	// custom menu support
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  			'header-menu' => 'Header Menu'
	  		)
	  	);
	}

	// Use Bootstrap pager formatting for nav links
	function bootstrap_get_posts_nav_link( $args = array() ) {
		global $wp_query;
		$return = '';

		if ( !is_singular() ) {
			$defaults = array(
				'prelabel' => __('&larr; Previous Page'),
				'nxtlabel' => __('Next Page &rarr;'),
			);
			$args = wp_parse_args( $args, $defaults );
			$max_num_pages = $wp_query->max_num_pages;
			$paged = get_query_var('paged');

			if ( $max_num_pages > 1 ) {
				$return = '<ul class="pager"><li class="previous">';
				$return .= get_previous_posts_link($args['prelabel']);
				$return .= '</li><li class="next">';
				$return .= get_next_posts_link($args['nxtlabel']);
				$return .= '</li></ul>';
			}
		}
		return $return;
	}
	function bootstrap_posts_nav_link( $prelabel = '', $nxtlabel = '' ) {
		$args = array_filter( compact('prelabel', 'nxtlabel') );
		echo bootstrap_get_posts_nav_link($args);
	}

	// removes detailed login error information for security
	add_filter('login_errors',create_function('$a', "return null;"));
	
	// custom excerpt ellipses for 2.9+
	function custom_excerpt_more($more) {
		return 'Read More &raquo;';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');
	// no more jumping for read more link
	function no_more_jumping($post) {
		return '&nbsp;<a href="'.get_permalink($post->ID).'" class="read-more">'.'keep reading &rarr;'.'</a>';
	}
	add_filter('excerpt_more', 'no_more_jumping');
	
	// get the slug
	function the_slug($echo=true){
	  $slug = basename(get_permalink());
	  do_action('before_slug', $slug);
	  $slug = apply_filters('slug_filter', $slug);
	  if( $echo ) echo $slug;
	  do_action('after_slug', $slug);
	  return $slug;
	}

	//Check for last posts
	function more_posts() {
	  global $wp_query;
	  return $wp_query->current_post + 1 < $wp_query->post_count;
	}

	// remove autp <p> from the_content in pages
	add_action('pre_get_posts', 'remove_p_from_pages');
	function remove_p_from_pages() {
		if (is_page()) { remove_filter ('the_content',  'wpautop'); }
	}

	//Shortcodes
	function divider_trees() {return '<div class="divider divider_trees"> </div>';}
	function divider_stripes() {return '<div class="divider divider_stripes"> </div>';}
	function divider_leaves() {return '<div class="divider divider_leaves"> </div>';}
	function divider_glyph() {return '<div class="divider divider_glyph"> </div>';}
	function rings_icon() {return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 86 57" enable-background="new 0 0 86 57" xml:space="preserve"><g><path d="M57.671 0.871c-4.016 0-7.82 0.88-11.266 2.426c2.599 1.9 4.9 4.1 6.8 6.7 c1.433-0.347 2.925-0.551 4.464-0.551c10.512 0 19.1 8.6 19.1 19.062c0 10.512-8.551 19.062-19.062 19.1 c-10.511 0-19.062-8.55-19.062-19.062c0-3.31 0.851-6.425 2.341-9.139c-1.701-2.361-4.035-4.23-6.763-5.345 c-2.61 4.218-4.145 9.169-4.145 14.484c0 15.2 12.4 27.6 27.6 27.629C72.904 56.1 85.3 43.7 85.3 28.5 C85.3 13.3 72.9 0.9 57.7 0.871z" class="rings-icon"/><path d="M32.799 47.01c-1.437 0.348-2.929 0.552-4.47 0.552c-10.512 0-19.062-8.55-19.062-19.062 c0-10.511 8.55-19.062 19.062-19.062S47.391 18 47.4 28.5c0 3.3-0.844 6.405-2.326 9.1 c1.697 2.4 4 4.2 6.8 5.327c2.597-4.21 4.123-9.146 4.123-14.443c0-15.235-12.394-27.629-27.629-27.629 S0.7 13.3 0.7 28.5c0 15.2 12.4 27.6 27.6 27.629c4.016 0 7.822-0.88 11.268-2.426C37 51.8 34.7 49.6 32.8 47 z" class="rings-icon"/></g></svg>';}
	function heart_icon() {return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" x="0px" y="0px" viewBox="0 0 86 57" enable-background="new 0 0 86 57" xml:space="preserve"><g><g><path d="M53.082 15.292c-5.021-14.242-21.939 0.795-24.745 8.83C23.52 17.877-2.379 13.2 1 27.5 c3.135 13.3 22.1 18.6 31.8 26.736C39.336 46.7 57.4 26.4 53.1 15.292z" class="heart-icon"/></g><g><path d="M63.794 17.464l-1.667-2.664c-4.528-8.755-22.193-15.868-23.719-3.972 c6.496-4.051 13.68-4.887 16.6 3.945c2.371 7.156-2.05 15.157-5.828 20.996c-0.162 0.25-0.331 0.493-0.495 0.7 c1.59 3.1 2.8 6.3 3.1 9.929c3.33-0.666 6.66-3.996 9.325-5.66c6.661-4.997 18.316-10.659 21.647-18.651 C90.103 5.8 70.8 12.1 63.8 17.464z" class="heart-icon"/></g></g></svg>';}
	add_shortcode('divider_trees', 'divider_trees');
	add_shortcode('divider_stripes', 'divider_stripes');
	add_shortcode('divider_leaves', 'divider_leaves');
	add_shortcode('divider_glyph', 'divider_glyph');
	add_shortcode('rings_icon', 'rings_icon');
	add_shortcode('heart_icon', 'heart_icon');

?>