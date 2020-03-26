<?php 
		
$licencia = get_field('seleccionar_licencia');
$icono = get_field('icono_licencia', $licencia);
		
if( $licencia && $licencia->slug != 'sin-licencia' ): ?>
	<?php if ( is_singular('recurso') ): ?> 
		<div class="recurso-flexitem licencia"> 
	<?php else: ?>
		<footer class="licencia-block">
	<?php endif; ?>

	<p>
		<strong><?php echo $licencia->name; ?></strong> <span class="tooltip">(?) 
  	
		<span class="tooltiptext"><?php echo $licencia->description; ?></span>
	</span></p>

	<?php if ($icono): ?>
		<img class="cc-icon" src="<?php echo $icono; ?>" alt="<?php echo $licencia->name; ?>">
	<?php endif; ?>

	
	
	
	<?php if ( is_singular('recurso') ): ?> 
		</div> 
		<?php else: ?>
		</footer>
	<?php endif; ?>
<?php endif; ?>