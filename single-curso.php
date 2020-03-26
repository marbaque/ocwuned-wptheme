<?php
/**
 * The Template for displaying all single posts.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
<?php setPostViews(get_the_ID()); ?>
	<header class="entry-header grid-container grid-parent">
		<?php
		/**
		 * generate_before_entry_title hook.
		 *
		 * @since 0.1
		 */
		do_action( 'generate_before_entry_title' );

		if ( generate_show_title() ) {
			the_title( '<h1 class="entry-title" itemprop="headline"><span>Guía </span>', '</h1>' );

		}


		/**
		 * generate_after_entry_title hook.
		 *
		 * @since 0.1
		 *
		 * @hooked generate_post_meta - 10
		 */
		do_action( 'generate_after_entry_title' );
		?>
		<a href="<?php echo get_post_type_archive_link('curso'); ?>" class="back2cursos" title="Volver cursos"><i class="fa fa-undo"></i> Regresar</a>
	</header><!-- .entry-header -->
	<?php
	/**
	 * generate_after_entry_header hook.
	 *
	 * @since 0.1
	 *
	 * @hooked generate_post_image - 10
	 */
	do_action( 'generate_after_entry_header' );
	?>



	<div id="primary" <?php generate_content_class();?>>

		<main id="main" <?php generate_main_class(); ?>>
			<?php
			/**
			 * generate_before_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_before_main_content' );
			?>
			<aside class="curso_sidebar">

				<nav id="responsive-navigation" class="responsive-navigation" role="navigation">
					<button class="submenu-toggle">Contenidos</button>
					<?php
					global $post;

					$args = array(
					    'post_parent' => $post->ID, //id de del curso
					    'posts_per_page' => -1, //todos
					    'orderby' => 'menu_order',
					    'order' => 'ASC', //en orden numerico ascendente, en atributos de página se puede cambiar
					    'post_type' => 'seccion', //you can use also 'any',
					    'post_status' => array('publish', 'pending', 'draft', 'future', 'private') // Mostrar secciones sin publicar
					    );

					$the_query = new WP_Query( $args );

					// The Loop
					if ( $the_query->have_posts() ) :

						echo '<div class="submenu nav-submenu">';
						echo '<h4>Contenidos</h4>';
						echo '<ul>';
						echo '<li class="current-item"><a href="' . get_permalink() . '" title="Inicio del curso">Inicio</a></li>';
						while ( $the_query->have_posts() ) : $the_query->the_post();
							// Do Stuff
							echo '<li><a href="' . get_permalink() . '" rel="bookmark">' . get_the_title() . '</a></li>';
						endwhile;
						echo '</ul>';
						echo '</div><!-- submenu -->';
					endif;
					// Reset Post Data
					wp_reset_postdata();
					?>

					<p class="escondido"><?php echo getPostViews(get_the_ID()); ?></p>
				</nav>

			</aside><!-- aside .curso_sidebar -->

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'content', 'curso' );

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

	 //generate_construct_sidebars();

get_footer();
