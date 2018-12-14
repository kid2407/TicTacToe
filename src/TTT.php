<?php
/**
 * Created by Tobias Franz.
 * Date: 13.12.2018
 * Time: 10:30
 * Copyright 2018 Tobias Franz
 */

declare(strict_types=1);

namespace Tobias\TicTacToe;

use Tobias\TicTacToe\GameState\End;
use Tobias\TicTacToe\GameState\OTurn;
use Tobias\TicTacToe\GameState\Splash;
use Tobias\TicTacToe\GameState\TTTInterface;
use Tobias\TicTacToe\GameState\XTurn;

class TTT {

    /** @var TTT $instance */
    private static $instance;

    /** @var Splash $splash */
    private $splash;
    /** @var XTurn $xturn */
    private $xturn;
    /** @var OTurn $oturn */
    private $oturn;
    /** @var End $end */
    private $end;
    /** @var TTTInterface $currentState */
    private $currentState;
    /** @var World $world */
    private $world;

    public function __construct() {
        $this->splash       = new Splash( $this );
        $this->xturn        = new XTurn( $this );
        $this->oturn        = new OTurn( $this );
        $this->end          = new End( $this );
        $this->currentState = $this->splash;
        $this->world        = new World();
        self::$instance     = $this;
        echo "Welcome to TicTacToe. Type any key to start the game.\n";
        echo "To quit the game, type \"c\"\n";
        echo "To start a new game while a game is active, type \"r\"\n";
    }

    /**
     * Passes an entered number to the currently active state
     *
     * @param int $number
     */
    public function numEntered( int $number ): void {
        $this->currentState->numEntered( $number );
    }

    /**
     * @return Splash
     */
    public function getSplash(): Splash {
        return $this->splash;
    }

    /**
     * @return XTurn
     */
    public function getXturn(): XTurn {
        return $this->xturn;
    }

    /**
     * @return OTurn
     */
    public function getOturn(): OTurn {
        return $this->oturn;
    }

    /**
     * @return End
     */
    public function getEnd(): End {
        return $this->end;
    }

    /**
     * @return World
     */
    public function getWorld(): World {
        return $this->world;
    }

    /**
     * @param TTTInterface $currentState
     */
    public function setCurrentState( TTTInterface $currentState ): void {
        $this->currentState = $currentState;
    }

    /**
     * @return TTTInterface
     */
    public function getCurrentState(): TTTInterface {
        return $this->currentState;
    }

    /**
     * @return TTT
     */
    public static function getInstance(): TTT {
        return self::$instance;
    }

}