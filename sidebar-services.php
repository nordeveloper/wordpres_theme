<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package basetheme
 */

if ( ! is_active_sidebar( 'sidebar-services' ) ) {
	return;
}
?>
<aside id="sidebar" class="widget-area col-md-3">
	<?php dynamic_sidebar( 'sidebar-services' ); ?>
</aside>
