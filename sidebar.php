<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package basetheme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside id="sidebar" class="widget-area col-md-3 col-sm-4 col-xs-12">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
