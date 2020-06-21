<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Doctorial
 */

get_header();
?>

<div class="container">

<div id="content-inner" class="content-area col-md-9 col-sm-8 col-xs-12">
<?if ( is_home() ):?>
<?echo 'is home index.php'; ?>
<?endif?>

<?if ( is_front_page() ):?>
<?echo 'is_front_page index.php'; ?>
<?endif?>
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
