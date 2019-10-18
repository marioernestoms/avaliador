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

function theme_enqueue_styles() {
	$jeitin_version = '1.0.1';

	/* Bootstrap Stylesheet [ REQUIRED ] */
	wp_enqueue_style( 'bootstrap-css', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );

	/* Custom CSS [ REQUIRED ] */
	wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri() . '/dist/css/main.css' );

	/* SCRIPTS */
	/* jQuery [ REQUIRED ] */
	wp_enqueue_script( 'jquery', array(), $jeitin_version, 'all' );

	/* BootstrapJS [ RECOMMENDED ] */
	wp_enqueue_script( 'popper-js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), $jeitin_version, 'all' );

	wp_enqueue_script( 'bootstrap-js', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), $jeitin_version, 'all' );

	/* Font Awesome[ OPTIONAL ] */
	wp_enqueue_script( 'font-awesome-js', '//use.fontawesome.com/releases/v5.0.8/js/all.js', array(), $jeitin_version, 'all' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


/**
 * ------------------------------
 * Function to start ajax login.
 * ------------------------------
 */
function ajax_login_init() {

	wp_register_script( 'ajax-login-script', get_stylesheet_directory_uri() . '/assets/js/ajax-login-script.js', array( 'jquery' ) );
	wp_enqueue_script( 'ajax-login-script' );

	wp_localize_script(
		'ajax-login-script',
		'ajax_login_object',
		array(
			'ajaxurl'        => admin_url( 'admin-ajax.php' ),
			'redirecturl'    => home_url() . '/',
			'loadingmessage' => __( 'Enviando as informações, aguarde ...' ),
		)
	);

	// Enable the user with no privileges to run ajax_login() in AJAX.
	add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in.
if ( ! is_user_logged_in() ) {
	add_action( 'init', 'ajax_login_init' );
}

/**
 * ------------------------------
 * Function to send ajax login.
 * ------------------------------
 */
function ajax_login() {

	// First check the nonce, if it fails the function will break.
	check_ajax_referer( 'ajax-login-nonce', 'security' );

	// Nonce is checked, get the POST data and sign user on.
	$info                  = array();
	$info['user_login']    = filter_input( INPUT_POST, 'username' );
	$info['user_password'] = filter_input( INPUT_POST, 'password' );
	$info['remember']      = true;

	$user_signon = wp_signon( $info, false );
	if ( is_wp_error( $user_signon ) ) {
		echo wp_json_encode(
			array(
				'loggedin' => false,
				'message'  => __( 'Usuário ou senha inválido.' ),
			)
		);
	} else {
		echo wp_json_encode(
			array(
				'loggedin' => true,
				'message'  => __( 'Logado com sucesso, redirecionando ...' ),
			)
		);
	}

	die();
}

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

/**
 * Change first name field label.
 */
function my_acf_prepare_field( $field ) {
	$field['label'] = 'Nome do profissional';
	return $field;
}
add_filter( 'acf/prepare_field/name=_post_title', 'my_acf_prepare_field' );

/**
 * Apply bootstrap 4 styles on acf-forms.
 */
function acf_form_bootstrap_styles( $args ) {

	// Before ACF Form
	if ( ! $args['html_before_fields'] )
		$args['html_before_fields'] = '<div class="row">'; // May be .form-row

	// After ACF Form
	if ( ! $args['html_after_fields'] )
		$args['html_after_fields'] = '</div>';

	// Success Message
	if ( $args['html_updated_message'] == '<div id="message" class="updated"><p>%s</p></div>' )
		$args['html_updated_message'] = '<div id="message" class="updated alert alert-success">%s</div>';

	// Submit button
	if ( $args['html_submit_button'] == '<input type="submit" class="acf-button button button-primary button-large" value="%s" />' )
		$args['html_submit_button'] = '<input type="submit" class="acf-button button button-primary button-large btn btn-primary" value="%s" />';

	return $args;

}

add_filter( 'acf/validate_form', 'acf_form_bootstrap_styles' );


function acf_form_fields_bootstrap_styles( $field ) {

	// Target ACF Form Front only
	if ( is_admin() && ! wp_doing_ajax() )
		return $field;

	// Add .form-group & .col-12 fallback on fields wrappers
	$field['wrapper']['class'] .= ' form-group col-12';

	// Add .form-control on fields
	$field['class'] .= ' form-control';

	return $field;

}

add_filter( 'acf/prepare_field', 'acf_form_fields_bootstrap_styles' );

function acf_form_fields_required_bootstrap_styles( $label ) {

	// Target ACF Form Front only
	if( is_admin() && ! wp_doing_ajax() )
		return $label;

	// Add .text-danger
	$label = str_replace( '<span class="acf-required">*</span>', '<span class="acf-required text-danger">*</span>', $label );

	return $label;

}

add_filter( 'acf/get_field_label', 'acf_form_fields_required_bootstrap_styles' );
