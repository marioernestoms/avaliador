<?php
	$avaliacoes = get_posts(
		array(
			'post_type'  => 'avaliacoes',
			'meta_query' => array(
				array(
					'key'     => 'profissional',
					'value'   => '"' . get_the_ID() . '"',
					'compare' => 'LIKE',
				),
			),
		)
	);

	$total_prof = 0;
	$count_prof = 0;
	$total_comp = 0;
	$count_comp = 0;
	?>


	<!-- Calculo do total de avaliações profissionais e comportamentais -->
	<?php
	foreach ( $avaliacoes as $post ) : ?>

		<?php
		if ( get_field( 'avaliacao_profissional' ) ) {
			$total_prof += get_field( 'avaliacao_profissional' );
			$count_prof++;
		}
		?>

		<?php
		if ( get_field( 'avaliacao_comportamental' ) ) {
			$total_comp += get_field( 'avaliacao_comportamental' );
			$count_comp++;
		}
		?>

	<?php endforeach; ?>

	<!-- Exibe com estrelas o total de avaliações -->
	<?php
	// Avaliações profissionais.
	if ( 0 !== $total_prof ) {
		$average_prof = ( $total_prof / $count_prof );

		echo '<td scope="col" width="150">';

		$star_prof = $average_prof;

		if ( ! empty( $star_prof ) ) {
			for ( $x = 1; $x <= $star_prof; $x++ ) {
				echo '<i class="fa fa-star text-warning" aria-hidden="true"></i>';
			}
			if ( strpos( $star_prof, '.' ) ) {
				echo '<i class="far fa-star"></i>';
				$x++;
			}
			while ( $x <= 5 ) {
				echo '<i class="far fa-star text-warning"></i>';
				$x++;
			}
		}
		echo '</td>';
	} else {
		echo '<td scope="col" width="150"><small>sem avaliação</small></td>';
	}

	// Avaliações Comportamentais.

	if ( 0 !== $total_comp ) {
		$average_comp = ( $total_comp / $count_comp );

		echo '<td scope="col" width="150">';
		$star_comp = $average_comp;

		if ( ! empty( $star_comp ) ) {
			for ( $x = 1; $x <= $star_comp; $x++ ) {
				echo '<i class="fa fa-star text-warning" aria-hidden="true"></i>';
			}
			if ( strpos( $star_comp, '.' ) ) {
				echo '<i class="far fa-star"></i>';
				$x++;
			}
			while ( $x <= 5 ) {
				echo '<i class="far fa-star text-warning"></i>';
				$x++;
			}
		}
		echo '</td>';
	} else {
		echo '<td scope="col" width="150"><small>sem avaliação</small></td>';
	}

