<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


class SetupBlockGen {

    public function setup_block_gen_details() {

        return array(

        // DO NOT GO BEFORE THIS LINE
        // ################################

            // COPY FROM THE LINE BELOW ----------------------
            'info-block' => array(
                
                'block' => array(
                    'name'                              => 'info_block',
                    'title'                             => __('Info Block'),
                    'icon'                              => 'block-default', // https://developer.wordpress.org/resource/dashicons/
                    'keywords'                          => array( 'setup', 'information', 'info' ),
                    'template'                          => 'setup-blocks.php',
                ),

                'fields' => array(
                    // change the following to you exact fields
                    'title'                             => 'blocks-title',
                    'summary'                           => 'blocks-summary',
                    'blocks-show-fields'                => 'blocks-show-fields',
                    'blocks-hide-all-fields'            => 'blocks-hide-all-fields',
                    'wrap_sel'                          => 'blocks-section-class',
                    'wrap_sty'                          => 'blocks-section-style',
                    'template'                          => 'blocks-template',
                ),
                
            ),
            // COPY UNTIL THE LINE ABOVE ---------------------

            'info-block-media' => array(
                
                'block' => array(
                    'name'                              => 'info_block_media',
                    'title'                             => __('Info Block Media'),
                    'icon'                              => 'block-default', // https://developer.wordpress.org/resource/dashicons/
                    'keywords'                          => array( 'setup', 'information', 'info', 'media' ),
                    'template'                          => 'setup-blocks.php',
                ),

                'fields' => array(
                    // change the following to you exact fields
                    'title'                             => 'blocks-title',
                    'summary'                           => 'blocks-summary',
                    'blocks-show-fields'                => 'blocks-show-fields',
                    'blocks-hide-all-fields'            => 'blocks-hide-all-fields',
                    'image'                             => 'blocks-image',
                    'image_size'                        => 'blocks-image-size',
                    'video'                             => 'blocks-video',
                    'blocks-show-fields-media'          => 'blocks-show-fields-media',
                    'blocks-hide-all-fields-media'      => 'blocks-hide-all-fields-media',
                    'wrap_sel'                          => 'blocks-section-class',
                    'wrap_sty'                          => 'blocks-section-style',
                    'template'                          => 'blocks-template',
                ),
                
            ),

        // ################################
        // DO NOT GO AFTER THIS LINE

        );

    }

}