<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  BizCare
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) :
					woocommerce_content();
				endif;
				?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar();?>
	</div>
</div>

<?php
get_footer(); 