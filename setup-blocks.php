<?php
/**
 * Plugin Name: Setup Blocks
 * Description: Create our own custom blocks with ACF.
 * Version: 1.0
 * Author: Jake Almeda & Mark Corpuz
 * Author URI: https://smarterwebpackages.com/
 * Network: true
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


// include required functions that needs to be executed in the main directory
class SetupBlocksVariables {

    // simply return this plugin's main directory
    public function setup_plugin_dir_path() {

        return plugin_dir_path( __FILE__ );

    }

    // list of local fields to pull
    public function setup_block_fields() {

        return array(
            'title'             => 'Title',
            'cta'               => 'Call to Action',
            'summary'           => 'Summary',
            'innerblocks'       => 'InnerBlocks'
        );

    }

    // list of local default fields
    public function setup_block_default_fields() {
        //return array( 'title', 'content' );
        return array( 'title' );
    }

    // list of media fields to pull
    public function setup_block_fields_media() {

        return array(
            'image'             => 'Image',
            'video'             => 'Video',
            'svg'               => 'HTML',
        );

    }

    // list of media default fields
    public function setup_block_default_fields_media() {
        //return array( 'title', 'content' );
        return array( 'image' );
    }

    // enqueue
    public function setup_block_enqueue_scripts() {

        // enqueue styles
        wp_enqueue_style( 'setupblocksstyle', plugin_dir_url( __FILE__ ).'css/style.css' );

    }

    // Construct
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'setup_block_enqueue_scripts' ), 2000 );
    }

}

// include files
include_once( 'lib/setup-blocks-generator.php' );
include_once( 'lib/setup-blocks-acf.php' );
include_once( 'lib/setup-blocks-functions.php' );
