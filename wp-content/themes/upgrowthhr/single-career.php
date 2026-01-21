<?php
get_header();
?>

	<main class="site-main">
		<div class="primary-content" id="primary">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-template-single', get_post_type() );

		endwhile;
		?>
		</div>
		<?php get_sidebar();?>
	</main>

<?php
get_footer();