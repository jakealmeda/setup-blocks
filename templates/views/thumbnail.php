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
	'manual_style'		=> '',
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
		echo '<h4 class="item-title">'.$block_title.'</h4>';
	}

	// SUMMARY
	$block_summary = $mfunc->setup_array_validation( "summary", $bars );
	if( !empty( $block_summary ) ) {
		echo '<div class="item-summary">'.$block_summary.'</div>';
	}

	// THUMBNAIL (IMAGE)
	$block_thumb = $mfunc->setup_array_validation( "thumbnail", $bars );
	if( $block_thumb ) {
		$thumbs = wp_get_attachment_image_src( $block_thumb, $mfunc->setup_array_validation( "thumbnai_size", $bars ) ? $bars[ "thumbnai_size" ] : 'full' );

		echo '<div class="item-thumbnail-1">';
			echo '<img src="'.$thumbs[ 0 ].'" border="0" />';
		echo '</div>';
	}

	/*$inner_blocks = '<InnerBlocks />';
	if( !empty( $inner_blocks ) ) {
		echo '<div class="item-innerblock">'.$inner_blocks.'</div>';
	}*/
	?><InnerBlocks /><?php

// WRAP | CLOSE
echo '</div>';