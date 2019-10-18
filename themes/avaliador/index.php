<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mandabem
 */

get_header( 'dashboard' );

?>

    <div class="container mar-top">

        <?php if ( ! is_user_logged_in() ) : ?>
            
            <div class="wrapper">

                <!-- Page Content Holder -->        
                <div class="container-full img-balloon" >

                    <!-- LOGIN FORM -->
                    <!--===================================================-->
                    <div class="cls-content text-center">
                        <div class="cls-content-sm panel">
                            <div class="panel-body">
                                <div class="login-img mar-ver pad-btm">
                                    <h1 class="h3"><img src="<?php echo get_stylesheet_directory_uri() . '/dist/images/logo_mandabem_tradicional.jpg' ?>" alt="" class="mar-btm"></h1>
                                </div>

                                <form id="login" action="login" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fas fa-user"></i></div>
                                            <input id="username" class="form-control" type="text" name="username" placeholder="E-mail">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                            <input id="password" class="form-control" type="password" name="password" placeholder="Senha">
                                        </div>
                                    </div>
                                    <p class="status"></p>
                                    <input class="btn-login btn btn-success text-uppercase" type="submit" value="Entrar" name="submit">

                                    <div class="pad-ver">
                                        <p>Não tem conta? Crie <a data-target="#nova-conta" data-toggle="modal" href="pages-register.html" class="btn-link">sua conta</a>, é grátis! :)</p>
                                        <p>Esqueceu a senha? Sem problemas, <a class="link" href="<?php echo wp_lostpassword_url(); ?>">clique aqui</a>. </p>
                                    </div>

                                    <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                                </form>

                                <?php include( 'includes/modal-nova-conta.php' ); ?>
                                
                            </div>
                        </div>
                        
                    </div>
                    <!--===================================================-->
                    
                </div>
                <!--===================================================-->
                    
                </div>
                
            </div>

        <?php endif; ?>


    </div> <!-- /container -->

<?php get_footer( 'dashboard' ); ?>
