<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Upgrowthhr
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class="section-inner">
				<div class="page-header">
					<h1 class="page-title">404</h1>
					<h2 class="page-subtitle">Page Not Found</h2>
					<p><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'upgrowthhr' ); ?></p>
				</div>
				<div class="page-content">
					<?php get_search_form(); ?>
				</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
