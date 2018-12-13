<?php
/**
 * Created by Tobias Franz.
 * Date: 13.12.2018
 * Time: 10:28
 * Copyright 2018 Tobias Franz
 */

namespace Tobias\TicTacToe\GameState;


use Tobias\TicTacToe\TTT;

class XTurn implements TTTInterface {

	private $ttt;

	public function __construct( TTT $TTT ) {
		$this->ttt = $TTT;
	}

	function numEntered( int $number ): void {
		$world =$this->ttt->getWorld();
		if ($world->setStone(1, 1, 'X')) {
			if ($world->isWon()) {
				// Ausgabe wer gewonnen hat
			} elseif ($world->isDraw()) {
				// Draw
			}
		}
	}
}