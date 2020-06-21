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

	<div id="content-inner" class="content-area col-xs-12">

		<?php
			if(get_queried_object()->label){
				echo '<h1 class="section-title">'.get_queried_object()->label.'</h1>';
			}
		?>	
	
		<?php if ( have_posts() ) : ?>
		
		<div class="certificates-list row">

			<?php while ( have_posts() ) :?>
				
			<?php the_post();?>
				
			<div class="certificate-item col-md-4 col-sm-3 col-xs-12">
			
			<h3><?php the_title();?></h3>

			<?php if ( has_post_thumbnail()) { ?>
			   <a class="post-image" data-lightbox="roadtrip" href="<?php echo get_the_post_thumbnail_url(); ?>" title="<?php the_title_attribute(); ?>">
			   <?php the_post_thumbnail('medium_large'); ?>
			   </a>
			 <?php } ?>	
			 
			</div>
			
			<?php endwhile;?>

		</div>
		
		<? the_posts_navigation();?>
		
		<?php endif?>
	</div>

</div>

<?php

get_footer();
