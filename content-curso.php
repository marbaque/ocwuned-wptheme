<?php
/**
 * The template for displaying single posts.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>

	<div class="inside-article">
		<?php
		/**
		 * generate_before_content hook.
		 *
		 * @since 0.1
		 *
		 * @hooked generate_featured_page_header_inside_single - 10
		 */
		do_action( 'generate_before_content' );
		?>




		<div class="entry-content" itemprop="text">
			<?php
			//the_content();
			?>
			<div class="portada__wrap">
				<?php
				$image = get_field('portada_del_curso');

				if( ($image) ): ?>

				<?php
					$size = 'portada-curso';
					$thumb = $image['sizes'][ $size ];
				?>

					<div class="portada-curso" aria-hideen="true">
						<img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>">
						<span><?php echo $image['description']; ?></span>
					</div>

				<?php else: ?>
					<div class="portada-curso sin-portada" aria-hideen="true"></div>
				<?php endif; ?>

				<div class="curso__info">
					<div class="curso__info-inside">
							<?php the_title( '<h3 class="seccion-title" itemprop="headline">', '</h3>' ); ?>

							<?php
							$codigo = get_field('codigo_del_curso');
							if( $codigo ): ?>
								<p class="curso_codigo">Código de la guía: <?php echo $codigo; ?></p>
							<?php endif; ?>

							<?php 
							$terms = get_field('area_curso');
							if( $terms ): ?>
									<ul class="lista-areas">
									<?php foreach( $terms as $term ): ?>
											<li><?php echo esc_html( $term->name ); ?></li>
									<?php endforeach; ?>
									</ul>
							<?php endif; ?>

							<?php
							$profe = get_field('profe');
							if( $profe ): ?>
								<p class="curso_profe">Por: <?php echo $profe; ?></p>
							<?php endif; ?>

						<?php

						$info = get_field('informacion_adicional');
						if( $info ): ?>
							<div class="curso_info"><?php echo $info; ?></div>
						<?php endif; ?>
					</div>
				</div><!-- curso__info -->
			</div><!-- portada__wrap -->

			
			<?php
				$descG = get_field('descripcion_general');
				if( $descG ): ?>
					<h3>Descripción general</h3>
					<div class="descripcion"><?php echo $info; ?></div>
			<?php endif; ?>


		</div><!-- .entry-content -->

		<?php
		/**
		 * generate_after_entry_content hook.
		 *
		 * @since 0.1
		 *
		 * @hooked generate_footer_meta - 10
		 */
		do_action( 'generate_after_entry_content' );

		/**
		 * generate_after_content hook.
		 *
		 * @since 0.1
		 */
		do_action( 'generate_after_content' );
		?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
