<?php
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
	//$field['class'] .= ' form-control';

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