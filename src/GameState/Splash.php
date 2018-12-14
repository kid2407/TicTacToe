<?php
/**
 * Created by Tobias Franz.
 * Date: 13.12.2018
 * Time: 10:28
 * Copyright 2018 Tobias Franz
 */

declare(strict_types=1);

namespace Tobias\TicTacToe\GameState;


use Exception;
use Tobias\TicTacToe\TTT;

class Splash implements TTTInterface {

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
        $this->ttt->getWorld()->resetPlayground();
        try {
            $random = random_int( 1, 10 );
            if ( $random % 2 === 0 ) {
                $this->ttt->setCurrentState( $this->ttt->getXturn() );
                echo "X begins to play\n";
            } else {
                $this->ttt->setCurrentState( $this->ttt->getOturn() );
                echo "O begins to play\n";
            }
        } catch ( Exception $e ) {
            echo $e->getMessage();
            echo $e->getTraceAsString();
        }
    }
}