<?php
	$args = [
		'role'    => 'Empresa',
		'orderby' => 'user_nicename',
		'order'   => 'ASC',
	];
	$empresas = get_users( $args );
	?>

<table class="table">
	<tbody>
		<?php
		foreach ( $empresas as $empresa ) :
			?>

			<tr>
				<td scope="col" width="20%"><a href="<?php the_permalink(); ?>"><?php echo esc_html( $empresa->display_name, 'avaliador' ); ?></a></td>
				<td scope="col" width="300">
					Responsável
				</td>
				<td scope="col" width="100">A</td>
				<td scope="col" width="300">A</td>
				<td scope="col" width="100">
					<a href="#" data-target="#editar-empresa-<?php the_ID(); ?>" data-toggle="modal" class="text-secondary"><i class="far fa-edit"></i> Editar</a>
					<?php include( '../../../includes/modal/modal-edit-empresa.php' ); ?>
				</td>

				<?php if ( current_user_can( 'administrator' ) ) : ?>
					<td scope="col" width="100"><a onclick="return confirm('Tem certeza que deseja excluir essa coleta <?php echo get_the_title() ?>?')" href="<?php echo get_delete_post_link( $id ); ?>" class="text-danger"><i class="far fa-trash-alt"></i> Excluir</a></td>
				<?php endif; ?>
			</tr>

		<!-- End Loop Item -->
		<?php endforeach; ?>
	</tbody>
</table>
