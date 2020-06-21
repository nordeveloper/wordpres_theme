<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package basetheme
 */

get_header();
?>

<div class="container">
<div id="content-inner" class="content-area col-md-9">single.php
	<div id="post-detail">

		<?php the_post();?>
		<?php the_title('<h1>', '</h1>');?>
		
		<?php if ( has_post_thumbnail()):?>
			<div class="post-image"><?the_post_thumbnail();?></div>
		<?endif?>		
		
	<div class="post-content"><?php the_content()?></div>

	</div><!-- post-detail -->
</div><!-- #content-inner -->
<?get_sidebar();?>
</div>

<?php

get_footer();