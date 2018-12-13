<?php
/**
 * Created by Tobias Franz.
 * Date: 13.12.2018
 * Time: 10:02
 * Copyright 2018 Tobias Franz
 */

use Tobias\TicTacToe\GameState\XTurn;
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

        if ( $ttt->getWorld()->isWon() ) {
            $currentState = $ttt->getCurrentState();
            // Because the state changed the moment the move was made, we have to flip the resultr
            $winner = $currentState instanceof XTurn ? 'O' : 'X';
            echo "The winner is " . $winner . "!\n\n";
            $ttt->setCurrentState( $ttt->getEnd() );
        } elseif ( $ttt->getWorld()->isDraw() ) {
            echo "It's a draw!\n\n";
            $ttt->setCurrentState( $ttt->getEnd() );
        }
    } elseif ( preg_match( '/^\d\d+$/', $line ) === 1 ) {
        /** two-digit or more numbers */
        echo "The number has to be smaller than 10.\n";
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