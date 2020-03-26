<?php
/**
 * The Template for displaying all single posts.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); 
?>
		<?php 
		
		$term = get_field('tipo_recurso');
		
		if( $term && $term->slug == 'video-educativo' ): ?>
		<div class="video-wrap">
			<div class="video-contenedor">
				
				<div class="embed-container">
					<?php the_field('enlace_video'); ?>
				</div>
			
			</div>
			<div class="video-dark-background" aria-hidden></div>
		</div>
		<?php 
		elseif( $term && $term->slug == 'modelo-3d' ): ?>
		<div class="m3d-wrap">
			<div id="3d-contenedor" class="m3d-contenedor">
				
				<?php include('visor3d.php'); ?>
			
			</div>
			<div class="video-dark-background" aria-hidden></div>
		</div>	<!-- 3d-wrap -->
		<?php endif; ?>

	<div id="primary" <?php generate_content_class();?>>
		<main id="main" <?php generate_main_class(); ?>>
			
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'content', 'recurso' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || '0' != get_comments_number() ) : ?>

					<div class="comments-area">
						<?php comments_template(); ?>
					</div>

				<?php endif;

			endwhile;

			/**
			 * generate_after_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_after_main_content' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	/**
	 * generate_after_primary_content_area hook.
	 *
	 * @since 2.0
	 */
	 do_action( 'generate_after_primary_content_area' );

	 generate_construct_sidebars();

get_footer();
