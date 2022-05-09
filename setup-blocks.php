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
            'summary'           => 'Summary',
        );

    }

    // list of local default fields to pull
    public function setup_block_default_fields() {
        //return array( 'title', 'content' );
        return array( 'title' );
    }

}

// include files
include_once( 'setup-block-generator.php' );
include_once( 'lib/setup-blocks-acf.php' );
include_once( 'lib/setup-blocks-functions.php' );

/*
	INFO (tab)
	info-title (instead of block-title)
	info-summary (...)

	LAYOUT (tab)
	layout-template
	layout-class
	layout-inline
*/