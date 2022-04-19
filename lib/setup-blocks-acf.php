<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/**
 * Add a block category for "Setup" if it doesn't exist already.
 *
 * @ param array $categories Array of block categories.
 *
 * @ return array
 */
add_filter( 'block_categories_all', 'setup_blocks_categories_fn_pull' );
function setup_blocks_categories_fn_pull( $categories ) {

    $category_slugs = wp_list_pluck( $categories, 'slug' );

    return in_array( 'setup', $category_slugs, TRUE ) ? $categories : array_merge(
        array(
            array(
                'slug'  => 'setup',
                'title' => __( 'Setup', 'mydomain' ),
                'icon'  => null,
            ),
        ),
        $categories
    );

}


/**
 * Register Custom Block(s)
 * 
 */
add_action( 'acf/init', 'setup_blocks_acf_init' );
function setup_blocks_acf_init() {

    $z = new SetupBlocksVariables();

    $blocks = array(

        'info_block' => array(
            'name'                  => 'info_block',
            'title'                 => __('Info Block'),
            'render_template'       => $z->setup_plugin_dir_path().'templates/blocks/setup-blocks.php',
            'category'              => 'setup',
            'icon'                  => 'embed-post',
            'mode'                  => 'edit',
            'keywords'              => array( 'setup', 'information', 'info' ),
            'supports'              => [
                'align'             => false,
                'anchor'            => true,
                'customClassName'   => true,
                'jsx'               => true,
            ],            
        ),

    );

    // Bail out if function doesn’t exist or no blocks available to register.
    if ( !function_exists( 'acf_register_block_type' ) && !$blocks ) {
        return;
    }

	foreach( $blocks as $block ) {
		acf_register_block_type( $block );
	}
  
}


/**
 * Auto fill Select options | ENTRIES
 *
 */
add_filter( 'acf/load_field/name=blocks-template', 'acf_setup_blocks_template_choices' ); // SINGLE
function acf_setup_blocks_template_choices( $field ) {
    
    $z = new SetupBlocksVariables();

    $file_extn = 'php';

    // get all files found in VIEWS folder
    $view_dir = $z->setup_plugin_dir_path().'templates/views/';

    $data_from_dir = setup_pulls_view_files( $view_dir, $file_extn );

    $field['choices'] = array();

    //Loop through whatever data you are using, and assign a key/value
    if( is_array( $data_from_dir ) ) {

        foreach( $data_from_dir as $field_key => $field_value ) {
            $field['choices'][$field_key] = $field_value;
        }

        return $field;

    }
    
}

add_filter( 'acf/load_field/name=blocks-thumbnail-size', 'acf_setup_blocks_img_sizes' );
function acf_setup_blocks_img_sizes( $field ) {

    $field['choices'] = array();

    foreach( get_intermediate_image_sizes() as $value ) {
        $field['choices'][$value] = $value;
    }

    return $field;

}


/**
 * Pull all files found in $directory but get rid of the dots that scandir() picks up in Linux environments
 *
 */
if( !function_exists( 'setup_pulls_view_files' ) ) {

    function setup_pulls_view_files( $directory, $file_extn ) {

        $out = array();
        
        // get all files inside the directory but remove unnecessary directories
        $ss_plug_dir = array_diff( scandir( $directory ), array( '..', '.' ) );

        foreach( $ss_plug_dir as $filename ) {
            
            if( pathinfo( $filename, PATHINFO_EXTENSION ) == $file_extn ) {
                $out[ $filename ] = pathinfo( $filename, PATHINFO_FILENAME );
            }

        }

        /*foreach ($ss_plug_dir as $value) {
            
            // combine directory and filename
            $file = basename( $directory.$value, $file_extn );
            
            // filter files to include
            if( $file ) {
                $out[ $value ] = $file;
            }

        }*/

        // Return an array of files (without the directory)
        return $out;

    }
    
}
