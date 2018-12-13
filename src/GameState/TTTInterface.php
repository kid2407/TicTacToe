<?php
/**
 * Created by Tobias Franz.
 * Date: 13.12.2018
 * Time: 09:56
 * Copyright 2018 Tobias Franz
 */

namespace Tobias\TicTacToe\GameState;


use Tobias\TicTacToe\TTT;

interface TTTInterface {

	public function __construct(TTT $TTT);

	function numEntered( int $number ): void;

}