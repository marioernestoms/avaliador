<?php
/**
 * Template Name: Admin Base
 *
 * @package Divi-Child
 * @author marioernestoms
 */

get_header( 'dashboard' ); ?>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php require( 'template-parts/sidebar-left.php' ) ?>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar">
                <div class="container-fluid">
                        <?php require( 'template-parts/navbar-top.php' ) ?>
                </div>     
            </nav>

            <div class="col-lg-12">
                <div class="row">
                    <?php require( 'template-parts/page-title.php' ) ?>
                </div>
                
            </div>

        </div>
        
    </div>

<?php get_footer( 'dashboard' ); ?>
