<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//global $gcounter;

class SetupBlocksMain {

    public function setup_blocks_main( $block ) {

        $fields_func = new SetupBlockGen();

        global $bars;

        // FILTER THE BLOCK
        $bname = explode( '/', $block[ 'name' ] );
        $arr_structure = $fields_func->setup_block_gen_details();
        $value = $arr_structure[ $bname[ 1 ] ];
        if( is_array( $value ) ) {
            
            $bars = array();
            
            // validate block class
            $blk_css = $this->setup_array_validation( 'className', $block );
            if( !empty( $blk_css ) ) {
                $bars[ 'block_class' ] = $blk_css;
            } else {
                $bars[ 'block_class' ] = '';
            }

            // loop through the fields
            foreach( $value[ 'fields' ] as $k => $v ) {
                
                if( $k == 'template' ) {
                    $template = get_field( $v );
                } else {
                    $bars[ $k ] = get_field( $v );
                }
                
            }
            
            // output
            echo $this->setup_view_template( $template, 'views' );

        }

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

            if( !empty( $new_output ) ) {
                $output = $new_output;
            } else {
                $output = FALSE;
            }


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

        $block_class = !empty( $classes[ 'block_class' ] ) ? $classes[ 'block_class' ] : '';
        $item_class = !empty( $classes[ 'item_class' ] ) ? $classes[ 'item_class' ] : '';
        $manual_class = !empty( $classes[ 'manual_class' ] ) ? $classes[ 'manual_class' ] : '';

        $return = '';
        
        $ar = array( $block_class, $item_class, $manual_class );
        for( $z=0; $z<=( count( $ar ) - 1 ); $z++ ) {

            if( !empty( $ar[ $z ] ) ) {

                $return .= $ar[ $z ];

                if( $z != ( count( $ar ) - 1 ) ) {
                    $return .= ' ';
                }

            }

        }

        return $return;

    }


    /**
     * Combine Classes for the template
     */
    public function setup_combine_styles( $styles ) {

        $manual_style = $styles[ 'manual_style' ];
        $item_style = $styles[ 'item_style' ];

        if( !empty( $manual_style ) && !empty( $item_style ) ) {
                return $manual_style.' '.$item_style;
        } else {

            if( empty( $manual_style ) && !empty( $item_style ) ) {
                return $item_style;
            } else {
                return $manual_style;
            }

        }

    }

}