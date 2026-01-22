<?php
/**
 * Template name: Page - Job Application
 * 
 * 
 */
get_header();
?>
	<main class="site-main">
		<div class="primary-content" id="primary">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-page-template', 'job-application' );

		endwhile;
		?>
		</div>
		<?php get_sidebar();?>
	</main>
<?php
get_footer();