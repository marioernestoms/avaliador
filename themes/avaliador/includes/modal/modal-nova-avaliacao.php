<style>
.acf-field-5da86588a6c5a {
    height: 300px;
    overflow: hidden;
    overflow-y: scroll;
}

#acf-field_5da86588a6c5a {
    border: 0;
    padding: 10px 0;
}

.selection {
    border: 1px solid #ced4da;
    border-radius: .3rem;
    display: flex;
    margin-top: 11px;
    width: 100%;
}

.choices {
    border-right: 1px solid rgba(0,2,0,.2);
    width: 50%;
}

.values {
    width: 50%;
}
</style>

<div class="modal fade text-left" id="nova-avaliacao" role="dialog" tabindex="-1" aria-labelledby="nova-avaliacao" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title pull-left">Nova Avaliação</h4>
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
								'post_type'   => 'avaliacoes',
								'post_status' => 'publish',
							),
							'return'          => add_query_arg( 'updated', 'true', get_permalink() ), // return url
							'submit_value'    => 'Update', // value for submit field
							'updated_message' => 'avaliação feita com sucesso!', // default updated message. Can be false to show no messag
							'submit_value'    => 'Avaliar',
						)
					);
					?>

				<?php endwhile; ?>

			</div>

		</div>
	</div>
</div>
