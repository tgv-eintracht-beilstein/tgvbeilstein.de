<?php
/**
 * Custom Post Types - Person
 */
add_action( 'init', 'cptui_register_my_cpts_person' );
function cptui_register_my_cpts_person() {
	$labels = array(
		"name" => __( 'Personen', 'sage' ),
		"singular_name" => __( 'Person', 'sage' ),
	);

	$args = array(
		"label" => __( 'Personen', 'sage' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "person",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => false,
		"query_var" => true,
		"menu_position" => 20,
		"menu_icon" => "dashicons-id-alt",
		"supports" => array( "title", "thumbnail" ),
		"taxonomies" => array( "category" ),
	);
	register_post_type( "person", $args );
}

/**
 * Custom Post Types - Abteilung
 */
add_action( 'init', 'cptui_register_my_cpts_abteilung' );
function cptui_register_my_cpts_abteilung() {
	$labels = array(
		"name" => __( 'Abteilungen', 'sage' ),
		"singular_name" => __( 'Abteilung', 'sage' ),
	);

	$args = array(
		"label" => __( 'Abteilung', 'sage' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "abteilung",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => true,
		"query_var" => true,
		"menu_position" => 20,
		"menu_icon" => "dashicons-groups",
		"supports" => array( "title", "editor" ),
		//"taxonomies" => array( "category" ),
	);
	register_post_type( "abteilung", $args );
}

/**
 * Custom Post Types - Download
 */
add_action( 'init', 'cptui_register_my_cpts_download' );
function cptui_register_my_cpts_download() {
	$labels = array(
		"name" => __( 'Downloads', 'sage' ),
		"singular_name" => __( 'Download', 'sage' ),
  );

	$args = array(
		"label" => __( 'Downloads', 'sage' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "download",
		"has_archive" => false,
		"show_in_menu" => true,
    "exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "download", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-paperclip",
		"supports" => array( "title", "editor", "thumbnail" ),
  );
	register_post_type( "download", $args );

// End of cptui_register_my_cpts_download()
}

?>
