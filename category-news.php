<?php
/**
 * @author dogwin
 * @date 2013-03-05
 */
get_header();

global $wp_query;
$big = 99999;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		<ul>
			<?php if(is_category()){$posts = query_posts($query_string.'&posts_per_page=2&paged='.$paged);}?>
			<?php if(have_posts()):while(have_posts()):the_post();?>
			<li>
			<a href="<?php the_permalink();?>" target='_blank'><?php the_title();?></a>
			</li>
			
			<?php endwhile;endif;?>
			<?php 
			echo paginate_links(array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				//'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
				));
			?>
		</ul>
		</div>
	</div><!-- #primary -->
<?php
get_footer();