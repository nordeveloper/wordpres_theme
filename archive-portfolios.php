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
		
		<div class="portfolios-list row">

			<?php while ( have_posts() ) :?>
				
			<?php the_post();?>
				
			<div class="portfolio-item col-md-4 col-sm-3 col-xs-12">
			
			<?php if ( has_post_thumbnail()) { ?>

			<a class="post-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<div class="image-hover">
			<h3><?php the_title();?></h3>
			</div>	
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
