<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


class SetupBlockGen {

    public function setup_block_gen_details() {

        return array(

            'info_block' => array( // COPY FROM THIS LINE ----------------------
                
                'block' => array(
                    'name'                  => 'info_block',
                    'title'                 => __('Info Block'),
                    'icon'                  => 'block-default', // https://developer.wordpress.org/resource/dashicons/
                    'keywords'              => array( 'setup', 'information', 'info' ),
                ),

                'fields' => array(
                    'title'                 => 'blocks-title',
                    'summary'               => 'blocks-summary',
                    'thumbnail'             => 'blocks-thumbnail',
                    'thumbnai_size'         => 'blocks-thumbnail-size',
                    'wrap_sel'              => 'blocks-section-class',
                    'wrap_sty'              => 'blocks-section-style',
                ),
            ), // COPY TO THIS LINE ----------------------

        );

    }

}