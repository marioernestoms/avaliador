<?php
/**
 * Template Name: Empresas
 *
 * The template for displaying pages with sidebar.
 *
 * @package marioernestoms
 */

global $current_user;
global $wp_roles;

get_header( 'dashboard' );

?>

<main role="main">
	<div class="container">
		<div class="row py-5">
			<div class="col">
				<form class="form-inline mt-2 mt-md-0">
					<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">

					<select class="custom-select mx-3">
						<option selected>Selecione</option>
						<option value="1">Arquiteto de informação</option>
						<option value="2">Designer</option>
						<option value="3">Desenvolvedor Front-End</option>
						<option value="3">Desenvolvedor Back-End</option>
						<option value="3">Marketing Digital</option>
					</select>

					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
			<div class="col text-right">
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							...
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
						</div>
					</div>
				</div>

				<?php if ( current_user_can( 'administrator' ) ) : ?>

					<a href="#" data-target="#nova-empresa" data-toggle="modal"><i class="far fa-plus-square"></i> cadastrar empresa</a>

					<?php include( 'includes/modal/modal-nova-empresa.php' ); ?>

				<?php endif; ?>
			</div>
		</div>

		<div class="table-responsive">
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
						$c++;
						?>

						<tr>
							<td scope="col" width="20%"><a href="<?php the_permalink(); ?>"><?php echo the_author_meta( 'first_name', $empresa->ID ); ?></a></td>
							<td scope="col" width="300">
								Responsável
							</td>
							<td scope="col" width="100">A</td>
							<td scope="col" width="300">A</td>
							<td scope="col" width="100">
								<a href="#" data-target="#editar-empresa-<?php echo $empresa->ID; ?>" data-toggle="modal" class="text-secondary"><i class="far fa-edit"></i> Editar</a>
								<?php include( 'includes/modal/modal-edit-empresa.php' ); ?>
							</td>

							<?php if ( current_user_can( 'administrator' ) ) : ?>
								<td scope="col" width="100"><a onclick="return confirm('Tem certeza que deseja excluir essa coleta <?php echo get_the_title() ?>?')" href="<?php echo get_delete_post_link( $id ); ?>" class="text-danger"><i class="far fa-trash-alt"></i> Excluir</a></td>
							<?php endif; ?>
						</tr>

					<!-- End Loop Item -->
					<?php endforeach; ?>
				</tbody>
			</table>

		</div>

	</div>
</main>

<?php get_footer( 'dashboard' ); ?>
