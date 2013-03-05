<?php
/**
 * @author dogwin 
 * @date 2013-3-1
 * @page contact
 * 
 */
get_header('contact');
?>
<section id="primary" class="site-content">
	<div id="content" role="main">
<?php 
	if(is_search()||is_category()||is_tag()||is_page()):
	//the_post_thumbnail();
	?>
		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
	
			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->
	
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
	
				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );
	
			endwhile;
	
			twentytwelve_content_nav( 'nav-below' );
			?>
	
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	<?php
	endif;
?>
	</div>
</section>
<?php
get_sidebar('page');
get_footer();

