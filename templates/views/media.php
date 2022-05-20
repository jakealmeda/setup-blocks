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

// info | title, summary
$bsf = $mfunc->setup_array_validation( "blocks-show-fields", $bars );
$bhf = $mfunc->setup_array_validation( "blocks-hide-all-fields", $bars );

// media | image, video
$bsf_m = $mfunc->setup_array_validation( "blocks-show-fields-media", $bars );
$bhf_m = $mfunc->setup_array_validation( "blocks-hide-all-fields-media", $bars );

if( $bhf === FALSE || $bhf_m === FALSE ) :

/**
 * CONTENT | START
 */

// WRAP | OPEN
echo '<div'.$classes.$inline_style.'>';

	// INFO
	if( $bhf === FALSE ) :
	?><div class="items-info"><?php

		// TITLE
		$block_title = $mfunc->setup_array_validation( "title", $bars );
		if( !empty( $block_title ) && is_array( $bsf ) && in_array( 'title', $bsf ) ) {
			echo '<h4 class="item-title">'.$block_title.'</h4>';
		}

		// SUMMARY
		$block_summary = $mfunc->setup_array_validation( "summary", $bars );
		if( !empty( $block_summary ) && is_array( $bsf ) && in_array( 'summary', $bsf ) ) {
			echo '<div class="item-summary">'.$block_summary.'</div>';
		}

	?></div><?php
	endif;

	// MEDIA
	if( $bhf_m === FALSE ) :
	?><div class="items-infomedia"><?php

		// IMAGE
		$block_img = $mfunc->setup_array_validation( "image", $bars );
		if( !empty( $block_img ) && is_array( $bsf_m ) && in_array( 'image', $bsf_m ) ) {
			$img = wp_get_attachment_image_src( $block_img, $mfunc->setup_array_validation( "image_size", $bars ) ? $bars[ "image_size" ] : 'full' );

			echo '<div class="item-image">';
				echo '<img src="'.$img[ 0 ].'" border="0" />';
			echo '</div>';
		}

		// VIDEO
		$video = $mfunc->setup_array_validation( 'video', $bars );
		if( !empty( $video ) && is_array( $bsf_m ) && in_array( 'video', $bsf_m ) ) {
			echo '<div class="item-oembed">'.$video.'</div>';
		}

	?></div><?php
	endif;

	?><InnerBlocks /><?php
	
// WRAP | CLOSE
echo '</div>';

endif;
