<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package basetheme
 */

get_header();
?>
<div class="container">

<div id="content-inner" class="content-area col-md-9">
archive.php
	<div id="posts-list" class="posts-content">

		<?php if ( have_posts() ) : ?>

			<?php
			if(get_queried_object()->name){
				echo '<h1 class="section-title">'.get_queried_object()->name.'</h1>';
			}
			?>

		<?php while ( have_posts() ) :?>
			
		<?php the_post();?>
			
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">','</a></h3>');?>

		<?php if ( has_post_thumbnail()) { ?>
		   <a class="post-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
		   <?php the_post_thumbnail('medium_large'); ?>
		   </a>
		 <?php } ?>			
			
			<div class="post-content">
				<?php the_excerpt(); ?>
			</div>

		</div>
		
		<?php endwhile;?>
	
	<? the_posts_navigation();?>

	<?php endif?>
	
	</div>
</div>

<?get_sidebar();?>

</div>

<?php

get_footer();
