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
			<div class="site-container">
				<div class="site-row">
					<div class="page-header d-block w-100">
						<h1 class="page-title">404</h1>
						<h2 class="page-subtitle">Page Not Found</h2>
						<p><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'upgrowthhr' ); ?></p>
						<p>Return to <a href="<?= home_url();?>"><strong>Home</strong></a>?</p>
					</div>
				</div>
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
