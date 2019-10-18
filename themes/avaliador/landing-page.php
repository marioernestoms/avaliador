<?php
/**
 * Template Name: Landing Page
 *
 * The template for displaying pages with sidebar.
 *
 * @package marioernestoms
 */

if ( current_user_can( 'e-commerce' ) ) {

	get_header( 'ecommerce' );

} elseif ( current_user_can( 'mandabem' ) ) {

	get_header( 'mandabem' );

} elseif ( current_user_can( 'franquia' ) ) {

	get_header( 'franquia' );

} else {
    get_header();
}

?>
	
	<div id="full-image" class="container-full"><img src="<?php echo get_stylesheet_directory_uri() . '/dist/images/banner.jpg' ?>" /></div>

    <div class="container-full">
		<div class="row">
			<div class="texto-box col-lg-6 col-md-6 col-sm-6">
				<figure class="mb-together">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/mandabem-juntos.jpg' ?>" />
				</figure>
				<div class="mb-text">
					<p>conseguiremos melhores
					condições de frete para
					nossos e-commerces.</p>

					<p>Quer oferecer fretes<br>
					mais baixos para<br>
					seu e-commerce?</p>
				</div>
			</div>
			<div class="newsletter-form col-lg-6 col-md-6 col-sm-6">
				%caralho%
				<?php do_shortcode( '[contact-form-7 id="24952" title="Contact form 1"]' ); ?>
			</div>
		</div>

		<div class="newsletter-box row">
			<div class="newsletter container text-center">
				<span class="newsletter-icon pull-left">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/mb-letter.jpg' ?>" />
				</span>
				<div class="text-newsletter">
					<h3>Receba nossa newsletter</h3>
					<p>Se inscreva para receber nossas novidades.</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="container apoiadores">
				<div class="row text-center">
					<h3>Nossos Queridos</h3>
					<h2>Apoiadores</h2>
				</div>
				<figure class="apoiador"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/mb-faperj.jpg' ?>" /></figure>
				<figure class="apoiador"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/mb-sebrae.jpg' ?>" /></figure>
				<figure class="apoiador"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/mb-aws.jpg' ?>" /></figure>
				<figure class="apoiador"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/mb-startuprio.jpg' ?>" /></figure>
			</div>
		</div>

	</div> <!-- /container -->
	
<?php //get_footer( 'dashboard' ); ?>
