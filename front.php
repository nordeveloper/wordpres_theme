<?php
/**
 * Template Name:Главная страница
 * Template Post Type: page
 */
 
get_header();
?>
<?php echo do_shortcode( '[responsive_slider]' ); ?>


<div class="container">
<?if ( is_home() ):?>
<?echo 'is home front.php'; ?>
<?endif?>

<?if ( is_front_page() ):?>
<?echo 'is_front_page front.php'; ?>
<?endif?>

<?php
	while ( have_posts() ) :
	the_post();
?>
<?php the_content()?>
<? endwhile; ?>

<?php dynamic_sidebar( 'front-widgets' ); ?>
</div>

<?php
get_footer();