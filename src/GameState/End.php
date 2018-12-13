<?php
/**
 * Created by Tobias Franz.
 * Date: 13.12.2018
 * Time: 10:28
 * Copyright 2018 Tobias Franz
 */

namespace Tobias\TicTacToe\GameState;


use Tobias\TicTacToe\TTT;

class End implements TTTInterface {

	private $ttt;

	public function __construct( TTT $TTT ) {
		$this->ttt = $TTT;
	}

	function numEntered( int $number ): void {
		// TODO: Implement numEntered() method.
	}
}