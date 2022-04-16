<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//global $gcounter;

class SetupBlocksMain {

    public function setup_blocks_main( $block ) {

        global $bars;

        $bars = array(
            'title'             => get_field( 'blocks-title' ),
            'summary'           => get_field( 'blocks-summary' ),
            'block_class'       => $this->setup_array_validation( 'className', $block ),
            'wrap_sel'          => get_field( 'blocks-section-class' ),
            'wrap_sty'          => get_field( 'blocks-section-style' ),
        );

        /*
            info_title
            info_summary
            info_innerblock
            info_template
            info_class
            info_style
        */
        echo $this->setup_view_template( get_field( 'blocks-template' ), 'views' );

    }


    /**
     * Get VIEW template
     */
    public function setup_view_template( $layout, $dir_ext ) {

        $o = new SetupBlocksVariables();

        $layout_file = $o->setup_plugin_dir_path().'templates/'.$dir_ext.'/'.$layout;

        if( is_file( $layout_file ) ) {

            ob_start();

            include $layout_file;

            $new_output = ob_get_clean();

            if( !empty( $new_output ) )
                $output = $new_output;

        } else {

            $output = FALSE;

        }

        return $output;

    }


    /**
     * Array validation
     */
    public function setup_array_validation( $needles, $haystacks, $args = FALSE ) {

        if( is_array( $haystacks ) && array_key_exists( $needles, $haystacks ) && !empty( $haystacks[ $needles ] ) ) {

            return $haystacks[ $needles ];

        } else {

            return FALSE;

        }

    }


    /**
     * Combine Classes for the template
     */
    public function setup_combine_classes( $classes ) {

        $block_class = $classes[ 'block_class' ];
        $item_class = $classes[ 'item_class' ];
        $manual_class = $classes[ 'manual_class' ];

        if( !empty( $block_class ) ) {
            // PULL | SINGLE
            if( is_numeric( $block_class ) ) {
                return $manual_class.' '.$item_class;   
            } else {
                return $manual_class.' '.$block_class.' '.$item_class;  
            }
        } else {
            // PULL | MULTI
            return $item_class; 
        }

    }


    /**
     * Combine Classes for the template
     */
    public function setup_combine_styles( $styles ) {

        $manual_style = $styles[ 'manual_style' ];
        $item_style = $styles[ 'item_style' ];

        if( !empty( $manual_style ) && !empty( $item_style ) ) {
                return ' style="'.$manual_style.' '.$item_style.'"';
        } else {

            if( empty( $manual_style ) && !empty( $item_style ) ) {
                return ' style="'.$item_style.'"';
            } else {
                return ' style="'.$manual_style.'"';
            }

        }

    }

}