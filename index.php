<?php
/**
 * Created by Tobias Franz.
 * Date: 13.12.2018
 * Time: 10:02
 * Copyright 2018 Tobias Franz
 */

use Tobias\TicTacToe\TTT;

require_once 'vendor/autoload.php';

$gameRunning = true;
$ttt         = new TTT();
$input       = fopen( 'php://stdin', 'r' );

while ( $gameRunning ) {
	$line = fgets( $input );
	// Only integers
	if ( ctype_digit( substr( $line, 0, - 1 ) ) || $ttt->getCurrentState() === $ttt->getSplash() ) {
		$ttt->numEntered( (int) $line );
		$ttt->getWorld()->printPlayground();
	} elseif ( $line == "c\n" ) {
		echo "Thanks for playing!\n";
		break;
	} elseif ( $line == "r\n" ) {
		$ttt->getWorld()->resetPlayground();
	} elseif ( $ttt->getCurrentState() === $ttt->getEnd() ) {
		$ttt->numEntered( 1 );
	} else {
		echo "Empty or invalid input, try again\n";
	}
}

fclose( $input );