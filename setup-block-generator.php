<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


class SetupBlockGen {

    public function setup_block_gen_details() {

        return array(

        // DO NOT GO BEFORE THIS LINE

            // COPY FROM THE LINE BELOW ----------------------
            'info_block' => array(
                
                'block' => array(
                    'name'                      => 'info_block',
                    'title'                     => __('Info Block'),
                    'icon'                      => 'block-default', // https://developer.wordpress.org/resource/dashicons/
                    'keywords'                  => array( 'setup', 'information', 'info' ),
                    'template'                  => 'setup-blocks.php',
                ),

                'fields' => array(
                    // change the following to you exact fields
                    'title'                     => 'blocks-title',
                    'summary'                   => 'blocks-summary',
                    'blocks-show-fields'        => 'blocks-show-fields',
                    'blocks-hide-all-fields'    => 'blocks-hide-all-fields',
                    //'thumbnail'             => 'blocks-thumbnail',
                    //'thumbnai_size'         => 'blocks-thumbnail-size',
                    'wrap_sel'                  => 'blocks-section-class',
                    'wrap_sty'                  => 'blocks-section-style',
                    'template'                  => 'blocks-template',
                ),
                
            ),
            // COPY UNTIL THE LINE ABOVE ---------------------

            /*
            'info_inner' => array(
                
                'block' => array(
                    'name'                  => 'info_innerblock',
                    'title'                 => __('Inner Block'),
                    'icon'                  => 'block-default', // https://developer.wordpress.org/resource/dashicons/
                    'keywords'              => array( 'innerblock', 'inner' ),
                    'template'              => 'setup-blocks.php',
                ),

                'fields' => array(
                    'title'                 => 'blocks-title',
                    'innerblock'            => 'blocks-innerblock',
                    'template'              => 'innerblocker-template',
                ),
            ),
            */
        // DO NOT GO AFTER THIS LINE

        );

    }

}