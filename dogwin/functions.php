<?php
/**
 * @author dogwin
 * @date 2013-03-05
 */

function dogwin_setup(){
	register_nav_menu( 'footer', __( 'Footer Menu', 'twentytwelve' ) );
	//slidebar
	register_sidebar( array(
	'name' => __( 'dogwin Widget Area', 'twentytwelve' ),
	'id' => 'sidebar-4',
	'description' => __( 'dogwin test widget use sidebar', 'twentytwelve' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
	
}
add_action( 'after_setup_theme', 'dogwin_setup',11 );
// Add custom pagination function
// Based on original work at http://www.kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin


function twentytwelve_content_nav()
{
	// Sets how many pages to show (leave it alone)
	$pages = '';
	// Sets how many buttons you want to show in the pagination area
	$range = 3;


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
		echo '<ul class="pagination">';
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<li><a href="'.get_pagenum_link(1).'">&laquo;</a></li>';
		if($paged > 1 && $showitems < $pages) echo '<li>' . previous_posts_link('&laquo; Previous Entries') . '</li>';

		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? '<li class="current">'.$i.'</li>':'<li><a href="'.get_pagenum_link($i).'" class="inactive" >'.$i.'</a></li>';
			}
		}

		if ($paged < $pages && $showitems < $pages) echo '<li>' . next_posts_link('Next &raquo;','') . '</li>';
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<li><a href="'.get_pagenum_link($pages).'">&raquo;</a></li>';
		echo '</ul>';
	}
}

// END pagination