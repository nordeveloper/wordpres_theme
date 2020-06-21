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

	<div id="posts-list" class="posts-content row">

		<?php if ( have_posts() ) : ?>

			<?php

			if(get_queried_object()->label){
				echo '<h1 class="section-title">'.get_queried_object()->label.'</h1>';
			}
			?>

		<?php while ( have_posts() ) :?>
			
		<?php the_post();?>
			
		<div class="service-item col-sm-6 col-xs-12">
		
		<?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">','</a></h3>');?>

			<?php if ( has_post_thumbnail()) { ?>
			   <div class="post-image">
			   <?php the_post_thumbnail('medium_large'); ?>
			   </div>
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

<?get_sidebar('services');?>

</div>

<?php

get_footer();
