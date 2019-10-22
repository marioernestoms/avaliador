<div class="modal fade" id="edit-coleta-<?php the_ID(); ?>" role="dialog" tabindex="-1" aria-labelledby="edit-coleta" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title pull-left">Editar Profissional</h4>
				<button type="button" class="close pull-right" data-dismiss="modal"><i class="far fa-times-circle"></i></button>
			</div>

			<!--Modal body-->
			<div class="modal-body">

					<div class="form-off">
						<?php
						acf_form(
							array(
								'post_title'   => true,
								'submit_value' => 'Atualizar',
							)
						);
						?>
					</div>

			</div>

		</div>
	</div>
</div>
