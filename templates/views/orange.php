 <?php

global $bars;

$mfunc = new SetupBlocksMain();

// class
$cs = array(
	'manual_class'		=> 'item-blocks',
	'item_class' 		=> $mfunc->setup_array_validation( 'wrap_sel', $bars ),
	'block_class'		=> $mfunc->setup_array_validation( 'block_class', $bars ),
);
$classes = $mfunc->setup_combine_classes( $cs );

// styles
$ss = array(
	'manual_style'		=> 'color:orange;',
	'item_style' 		=> $mfunc->setup_array_validation( 'wrap_sty', $bars ),
);
$inline_style = $mfunc->setup_combine_styles( $ss );

/**
 * CONTENT | START
 */

// WRAP | OPEN
echo '<div class="'.$classes.'"'.$inline_style.'>';

	// TITLE
	$block_title = $mfunc->setup_array_validation( "title", $bars );
	if( !empty( $block_title ) ) {
		echo '<div class="item-title"><strong>'.$block_title.'</strong></div>';
	}

	// SUMMARY
	$block_summary = $mfunc->setup_array_validation( "summary", $bars );
	if( !empty( $block_summary ) ) {
		echo '<div class="item-summary">'.$block_summary.'</div>';
	}

	$inner_blocks = '<InnerBlocks />';
	if( !empty( $inner_blocks ) ) {
		echo '<div class="item-innerblock">'.$inner_blocks.'</div>';
	}

// WRAP | CLOSE
echo '</div>';