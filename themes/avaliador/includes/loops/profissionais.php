<div class="row py-5">
	<div class="col">
		<?php echo do_shortcode( '[my_ajax_filter_search]' ); ?>
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

			<a href="#" data-target="#novo-profissional" data-toggle="modal"><i class="far fa-plus-square"></i> cadastrar profissional</a>

			<?php include( get_template_directory() . '/includes/modal/modal-novo-profissional.php' ); ?>

		<?php endif; ?>
	</div>
</div>

<div class="table-responsive">

	<?php
	$args = [
		'post_type'      => 'profissionais',
		'posts_per_page' => -1,
		'order'          => 'ASC',
		'orderby'        => 'title',
	];

	$list_prof = new WP_Query( $args );
	?>

	<table class="table">
		<thead>
			<tr>
			<th scope="col">Nome</th>
			<th scope="col">Profissão</th>
			<th scope="col">Avaliação Profissional</th>
			<th scope="col">Avaliação Comportamental</th>
			</tr>
		</thead>

		<tbody>
			<?php
			if ( $list_prof->have_posts() ) :
				?>

				<?php
				while ( $list_prof->have_posts() ) :
					$list_prof->the_post();
					?>
				<tr>
					<td scope="col" width="20%"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
					<td scope="col" width="300">
						<?php the_field( 'cargo' ); ?>
					</td>

					<?php include( 'avaliacoes.php' ); ?> 

					<td scope="col" width="100">
						<a href="#" data-target="#edit-coleta-<?php the_ID(); ?>" data-toggle="modal" class="text-secondary"><i class="far fa-edit"></i> Editar</a>
						<?php include( get_template_directory() . '/includes/modal/modal-edit-profissional.php' ); ?>
					</td>

					<?php if ( current_user_can( 'administrator' ) ) : ?>
						<td scope="col" width="100"><a onclick="return confirm('Tem certeza que deseja excluir essa coleta <?php echo get_the_title() ?>?')" href="<?php echo get_delete_post_link( $id ); ?>" class="text-danger"><i class="far fa-trash-alt"></i> Excluir</a></td>
					<?php endif; ?>
				</tr>
			<?php endwhile; ?>

		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
		</tbody>
	</table>
</div>
