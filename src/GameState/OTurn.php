<?php
/**
 * Created by Tobias Franz.
 * Date: 13.12.2018
 * Time: 10:28
 * Copyright 2018 Tobias Franz
 */

declare(strict_types=1);

namespace Tobias\TicTacToe\GameState;


use Tobias\TicTacToe\TTT;

class OTurn implements TTTInterface {

    private $ttt;

    /**
     * {@inheritdoc}
     */
    public function __construct( TTT $TTT ) {
        $this->ttt = $TTT;
    }

    /**
     * {@inheritdoc}
     */
    public function numEntered( int $number ): void {
        if ( $number <= 9 ) {
            $x     = (int)floor( ( $number - 1 ) / 3 );
            $y     = ( $number - 1 ) % 3;
            $world = $this->ttt->getWorld();
            if ( $world->setStone( $x, $y, 'O' ) ) {
                $this->ttt->setCurrentState( $this->ttt->getXturn() );
                echo "It is Xs turn\n";
            } else {
                echo "Invalid input, try again.\n";
                echo "It is Os turn\n";
            }
        } else {
            echo "The number must be smaller than 10\n";
        }
    }
}