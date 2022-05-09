<?php

global $bars;

$mfunc = new SetupBlocksMain();

// class
$cs = array(
	'manual_class'		=> 'item-blocks',
	'item_class' 		=> $mfunc->setup_array_validation( 'wrap_sel', $bars ),
	'block_class'		=> $mfunc->setup_array_validation( 'block_class', $bars ),
);
$css = $mfunc->setup_combine_classes( $cs );
$classes = !empty( $css ) ? ' class="'.$css.'"' : '';

// styles
$ss = array(
	'manual_style'		=> '',
	'item_style' 		=> $mfunc->setup_array_validation( 'wrap_sty', $bars ),
);
$stayls = $mfunc->setup_combine_styles( $ss );
$inline_style = !empty( $stayls ) ? ' style="'.$stayls.'"' : '';

$bsf = $mfunc->setup_array_validation( "blocks-show-fields", $bars );
$bhf = $mfunc->setup_array_validation( "blocks-hide-all-fields", $bars );

if( $bhf === FALSE ) :

if( is_array( $bsf ) && count( $bsf ) >= 1 ) :

/**
 * CONTENT | START
 */

// WRAP | OPEN
echo '<div'.$classes.$inline_style.'>';
	
	// TITLE
	$block_title = $mfunc->setup_array_validation( "title", $bars );
	if( !empty( $block_title ) && in_array( 'title', $bsf ) ) {
		echo '<h1 class="item-title">'.$block_title.'</h1>';
	}
	
	// SUMMARY
	$block_summary = $mfunc->setup_array_validation( "summary", $bars );
	if( !empty( $block_summary ) && in_array( 'summary', $bsf ) ) {
		echo '<div class="item-summary">'.$block_summary.'</div>';
	}

	?><InnerBlocks /><?php

// WRAP | CLOSE
echo '</div>';


endif;

endif;