<div class="modal fade text-left" id="novo-profissional" role="dialog" tabindex="-1" aria-labelledby="novo-profissional" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title pull-left">Novo Profissional</h4>
				<button type="button" class="close pull-right" data-dismiss="modal"><i class="far fa-times-circle"></i></button>
			</div>

			<!--Modal body-->
			<div class="modal-body">
				<?php
				acf_form_head();

				while ( have_posts() ) :
					the_post();
					?>

					<?php
					acf_form(
						array(
							'post_id'         => 'new_post',
							'label_placement' => 'left',
							'field_groups'    => false,
							'fields'          => false,
							'post_title'      => true,
							'new_post'        => array(
								'post_type'   => 'profissionais',
								'post_status' => 'publish',
							),
							'return'          => add_query_arg( 'updated', 'true', get_permalink() ), // return url
							'submit_value'    => 'Update', // value for submit field
							'updated_message' => 'Profissional cadastrado com sucesso!', // default updated message. Can be false to show no messag
							'submit_value'    => 'Cadastrar',
						)
					);
					?>

				<?php endwhile; ?>

			</div>

		</div>
	</div>
</div>
