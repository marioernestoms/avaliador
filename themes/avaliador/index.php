<?php if ( ! is_user_logged_in() ) : ?>

	<?php
	$login = get_page_by_title( 'login' );
	wp_redirect( get_permalink( $login->ID ) );
	exit;
	?>

<?php else : ?>

	<?php
	$page = get_page_by_title( 'dashboard' );
	wp_redirect( get_permalink( $page->ID ) );
	exit;
	?>

	<?php
endif;


