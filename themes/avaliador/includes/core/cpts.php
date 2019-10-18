<?php
/**
 * ------------------------------
 * Register post type profissionais
 * ------------------------------
 */
$labels = array(
	'name'          => __( 'Profissionais', 'avaliador' ),
	'singular_name' => __( 'Profissional', 'avaliador' ),
	'menu_name'     => __( 'Profissionais', 'avaliador' ),
	'all_items'     => __( 'Todos os Profissionais', 'avaliador' ),
	'add_new'       => __( 'Adicionar novo', 'avaliador' ),
	'add_new_item'  => __( 'Adicionar novo profissional', 'avaliador' ),
	'edit_item'     => __( 'Editar profissional', 'avaliador' ),
	'new_item'      => __( 'Novo profissional', 'avaliador' ),
	'view_item'     => __( 'Ver Profissional', 'avaliador' ),
	'view_items'    => __( 'Ver Profissionais', 'avaliador' ),
	'search_items'  => __( 'Procurar profissional', 'avaliador' ),
	'not_found'     => __( 'Nenhum profissional encontrado', 'avaliador' ),
);

$args = array(
	'label'                 => __( 'Profissionais', 'avaliador' ),
	'labels'                => $labels,
	'description'           => 'Adiciona profissionais na home.',
	'public'                => true,
	'publicly_queryable'    => true,
	'show_ui'               => true,
	'menu_icon'             => 'dashicons-groups',
	'delete_with_user'      => false,
	'show_in_rest'          => true,
	'rest_base'             => '',
	'rest_controller_class' => 'WP_REST_Posts_Controller',
	'has_archive'           => false,
	'show_in_menu'          => true,
	'show_in_nav_menus'     => true,
	'exclude_from_search'   => true,
	'capability_type'       => 'post',
	'map_meta_cap'          => true,
	'hierarchical'          => false,
	'rewrite'               => array(
		'slug'       => 'profissionais',
		'with_front' => true,
	),
	'query_var'             => true,
	'supports'              => array( 'title', 'editor', 'thumbnail' ),
);

register_post_type( 'profissionais', $args );

/**
 * ------------------------------
 * Register post type avaliações
 * ------------------------------
 */
$singular_name = 'avaliação';
$plural_name   = 'avaliações';

$labels = array(
	'name'          => __( 'Avaliações', 'avaliador' ),
	'singular_name' => __( 'Avaliação', 'avaliador' ),
	'menu_name'     => __( 'Avaliações', 'avaliador' ),
	'all_items'     => __( 'Todos os Avaliações', 'avaliador' ),
	'add_new'       => __( 'Adicionar nova', 'avaliador' ),
	'add_new_item'  => __( 'Adicionar nova avaliação', 'avaliador' ),
	'edit_item'     => __( 'Editar avaliação', 'avaliador' ),
	'new_item'      => __( 'Novo avaliação', 'avaliador' ),
	'view_item'     => __( 'Ver Avaliação', 'avaliador' ),
	'view_items'    => __( 'Ver Avaliações', 'avaliador' ),
	'search_items'  => __( 'Procurar avaliação', 'avaliador' ),
	'not_found'     => __( 'Nenhum avaliação encontrado', 'avaliador' ),
);

$args = array(
	'label'                 => __( 'Avaliações', 'avaliador' ),
	'labels'                => $labels,
	'description'           => 'Adiciona profissionais na home.',
	'public'                => true,
	'publicly_queryable'    => true,
	'show_ui'               => true,
	'menu_icon'             => 'dashicons-chart-line',
	'delete_with_user'      => false,
	'show_in_rest'          => true,
	'rest_base'             => '',
	'rest_controller_class' => 'WP_REST_Posts_Controller',
	'has_archive'           => false,
	'show_in_menu'          => true,
	'show_in_nav_menus'     => true,
	'exclude_from_search'   => true,
	'capability_type'       => 'post',
	'map_meta_cap'          => true,
	'hierarchical'          => false,
	'rewrite'               => array(
		'slug'       => 'avaliacoes',
		'with_front' => true,
	),
	'query_var'             => true,
	'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'author' ),
);

register_post_type( 'avaliacoes', $args );
