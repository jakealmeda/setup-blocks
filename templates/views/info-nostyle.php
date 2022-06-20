<?php

global $bars;

$mfunc = new SetupBlocksMain();

// class
$cs = array(
	'manual_class'		=> 'item-blocks info-nostyle',
	'item_class' 		=> $mfunc->setup_array_validation( 'wrap_sel', $bars ),
	'block_class'		=> $mfunc->setup_array_validation( 'block_class', $bars ),
);
$classes = $mfunc->setup_combine_classes( $cs );

// styles
$ss = array(
	'manual_style'		=> '',
	'item_style' 		=> $mfunc->setup_array_validation( 'wrap_sty', $bars ),
);
$inline_style = $mfunc->setup_combine_styles( $ss );

/**
 * CONTENT | START
 */

// WRAP | OPEN
echo '<div class="'.$classes.'"'.$inline_style.'>';

	echo '<div class="items-info">';

	// TITLE
	$block_title = $mfunc->setup_array_validation( "title", $bars );
	if( !empty( $block_title ) ) {
		echo '<div class="item-title">'.$block_title.'</div>';
	}

	// SUMMARY
	$block_summary = $mfunc->setup_array_validation( "summary", $bars );
	if( !empty( $block_summary ) ) {
		echo '<div class="item-summary">'.$block_summary.'</div>';
	}

	echo '</div>';
	
	echo '<div class="items-block">';
	echo '<InnerBlocks />';
	echo '</div>';

// WRAP | CLOSE
echo '</div>';