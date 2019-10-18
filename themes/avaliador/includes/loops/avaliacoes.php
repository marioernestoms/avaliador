
	<td scope="col" width="150">
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
		?>

		<?php
		$total = 0;
		$count = 0;
		?>

		<?php
		foreach ( $avaliacoes as $post ) {
			if ( get_field( 'avaliacao_profissional' ) ) {
				$total += get_field( 'avaliacao_profissional' );
				$count++;
			}
		}

		if ( 0 !== $total ) {
			$average_prof = ( $total / $count );
		}

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
		} else {
			echo '<small>sem avaliação</small>';
		}
		?>
	</td>


	<td scope="col" width="150">
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

			$total_comp = 0;
			$count_comp = 0;
			?>

			<?php
			foreach ( $avaliacoes as $post ) {
				if ( get_field( 'avaliacao_comportamental' ) ) {
					$total_comp += get_field( 'avaliacao_comportamental' );
					$count_comp++;
				}
			}

			if ( 0 !== $total_comp ) {
				$average_comp = ( $total_comp / $count_comp );
			}

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
			} else {
				echo '<small>sem avaliação</small>';
			}
			?>
		</td>
