<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package basetheme
 */

get_header();
?>
<div class="container">
<div id="content-inner" class="content-area row">
		<div class="page-content col-xs-12">
		<?php
		while ( have_posts() ) :
			the_post();?>
		<? the_title('<h1>', '</h1>'); ?>
		
		<?php if ( has_post_thumbnail()):?>
			<div class="page-image"><?the_post_thumbnail('medium_large');?></div>
		<?endif?>
		
		<?php the_content()?>
		<? endwhile; ?>
		
		</div>
</div>
</div>
<?php
get_footer();
