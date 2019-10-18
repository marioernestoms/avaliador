<?php if ( ! is_user_logged_in() ) : ?>

	<?php wp_redirect( 'http://avaliador.tri/login/', 307 ); ?>

<?php else : ?>

	<?php wp_redirect( 'http://avaliador.tri/profissionais/', 307 ); ?>

<?php endif; ?>


