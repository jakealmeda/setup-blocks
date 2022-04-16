 <?php

if( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$a = new SetupBlocksMain();
echo $a->setup_blocks_main( $block );
// EOF