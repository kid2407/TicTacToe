<?php
/**
 * Created by Tobias Franz.
 * Date: 13.12.2018
 * Time: 10:30
 * Copyright 2018 Tobias Franz
 */

namespace Tobias\TicTacToe;

use Tobias\TicTacToe\GameState\End;
use Tobias\TicTacToe\GameState\OTurn;
use Tobias\TicTacToe\GameState\Splash;
use Tobias\TicTacToe\GameState\TTTInterface;
use Tobias\TicTacToe\GameState\XTurn;

class TTT {

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
		$this->splash       = new Splash();
		$this->xturn        = new XTurn();
		$this->oturn        = new OTurn();
		$this->end          = new End();
		$this->currentState = $this->splash;
		$this->world        = new World();
	}

	public function numEntered( int $number ): void {
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

}