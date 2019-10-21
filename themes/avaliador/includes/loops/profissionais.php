<div class="row py-5">
	<div class="col">
		<div id="my-ajax-filter-search">
			<form class="form-inline mt-2 mt-md-0" action="" method="get">
				<input class="form-control mr-sm-2" type="text" name="profissional" id="profissional" value="" placeholder="Search" aria-label="Search">

				<select class="custom-select mx-3" name="cargos" id="cargos">
					<option selected>Selecione</option>
					<option value="arquiteto-de-informacao">Arquiteto de informação</option>
					<option value="designer">Designer</option>
					<option value="dev-frontend">Desenvolvedor Front-End</option>
					<option value="dev-backend">Desenvolvedor Back-End</option>
					<option value="mkt-digita">Marketing Digital</option>
				</select>

				<input class="btn btn-outline-success my-2 my-sm-0" type="submit" id="submit" name="submit" value="Search">
			</form>
		</div>
	</div>

	<div class="col text-right">
		<?php if ( current_user_can( 'administrator' ) ) : ?>

			<a href="#" data-target="#novo-profissional" data-toggle="modal"><i class="far fa-plus-square"></i> cadastrar profissional</a>

			<?php include( get_template_directory() . '/includes/modal/modal-novo-profissional.php' ); ?>

		<?php endif; ?>
	</div>
</div>

<div class="table-responsive">

	<?php
	$profissional = $_GET['profissional'];
	$cargos       = $_GET['cargos'];

	if ( ! empty( $cargos ) ) {
		$cargo = $cargos;
	} else {
		$cargo = '';
	}

	$args = [
		'post_type'      => 'profissionais',
		'posts_per_page' => -1,
		'order'          => 'ASC',
		'orderby'        => 'title',
		's'              => $profissional,
		'meta_query' => array(
			array(
				'key'     => 'cargo',
				'value'   => $cargo,
				'compare' => 'LIKE',
			),
		),
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
						<?php
						$profissao = get_field_object( 'cargo' );
						$value     = $profissao['value'];
						$label     = $profissao['choices'][ $value ];

						echo $label;
						?>
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
