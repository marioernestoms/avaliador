<?php
/**
 * Custom Functions file for current theme.
 *
 * @package mandabem
 */

/**
 * IMPORT PARENT STYLE.
 */
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Includes
 */
require( 'includes/core/cpts.php' );
require( 'includes/core/ajax-login.php' );
require( 'includes/core/customize-acf-form.php' );

function theme_enqueue_styles() {
	$avaliador_version = '1.0.1';

	/* Bootstrap Stylesheet [ REQUIRED ] */
	wp_enqueue_style( 'bootstrap-css', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );

	/* Custom CSS [ REQUIRED ] */
	wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri() . '/dist/css/main.css' );

	/* SCRIPTS */
	/* jQuery [ REQUIRED ] */
	wp_enqueue_script( 'jquery', array(), $avaliador_version, 'all' );

	/* BootstrapJS [ RECOMMENDED ] */
	wp_enqueue_script( 'popper-js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), $avaliador_version, 'all' );

	wp_enqueue_script( 'bootstrap-js', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), $avaliador_version, 'all' );

	/* Font Awesome[ OPTIONAL ] */
	wp_enqueue_script( 'font-awesome-js', '//use.fontawesome.com/releases/v5.0.8/js/all.js', array(), $avaliador_version, 'all' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// edit user
add_action( 'wp_head', 'javascriptcode' ); // Write our JS below here

function javascriptcode() { ?>
	<script type="text/javascript" >
	jQuery(document).ready(function($) {
		jQuery('.btn-edit-user').on('click', function(){
			//$('#id_user').data("data-userid'");
			$('#id_user').val( $(this).attr( 'data-userid' ) );
		});

		jQuery('#adduser').on('click', function(){
			console.log('starting request...');
			var data = {
				'action': 'mandabem_edit_user',
				'form': jQuery('#form-edituser').serialize(),
			};

			// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
			jQuery.post(ajaxurl, data, function(response) {
			});
		});
	});

	jQuery(document).ready(function($) { 
	$(window).load(function() { 
		$( '.coleta-box' ).each(function() {
			//console.log( $(this).children().find( $('.teste-valor').attr('data-valor') ) );
			console.log( $(this) );
		});

		//insert all your ajax callback code here. 
		//Which will run only after page is fully loaded in background.
		//alert($('.teste-valor').text() );
	});
	});

	</script>
	<?php
}

add_action( 'wp_ajax_nopriv_mandabem_edit_user', 'mandabem_edit_user' );
add_action( 'wp_ajax_mandabem_edit_user', 'mandabem_edit_user' );

function mandabem_edit_user() {
	parse_str( $_POST['form'], $my_array_of_vars );

	update_user_meta( $my_array_of_vars['id_user'], 'first_name', $my_array_of_vars['first_name'] );
	update_user_meta( $my_array_of_vars['id_user'], 'last_name', $my_array_of_vars['last_name'] );
	update_user_meta( $my_array_of_vars['id_user'], 'email', $my_array_of_vars['email'] );
	update_user_meta( $my_array_of_vars['id_user'], 'current_password', $my_array_of_vars['current_password'] );
	update_user_meta( $my_array_of_vars['id_user'], 'pass1', $my_array_of_vars['pass1'] );
	update_user_meta( $my_array_of_vars['id_user'], 'pass2', $my_array_of_vars['pass2'] );

	die();
}

// Scripts for Ajax Filter Search
function my_ajax_filter_search_scripts() {
	wp_enqueue_script( 'my_ajax_filter_search', get_stylesheet_directory_uri() . '/assets/js/ajax-search-script.js', array(), '1.0', true );
	wp_localize_script( 'my_ajax_filter_search', 'ajax_url', admin_url( 'admin-ajax.php' ) );
}

/**
 * Redirect para lading page user not loggedin.
 */
add_action(
	'template_redirect',
	function() {
		// Get global post
		global $post;

		// Prevent access to page with ID of 2 and all children of this page
		$page_id = 5;
		if ( is_page() && ( $post->post_parent == $page_id || is_page( $page_id ) ) ) {

			// Set redirect to true by default
			$redirect = true;

			// If logged in do not redirect
			// You can/should place additional checks here based on user roles or user meta
			if ( is_user_logged_in() ) {
				$redirect = false;
			}

			// Redirect people without access to login page
			if ( $redirect ) {
				wp_redirect( 'http://avaliador.tri/login/', 307 );
			}
		}
	}
);
