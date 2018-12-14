<?php
/**
 * Created by Tobias Franz.
 * Date: 13.12.2018
 * Time: 09:56
 * Copyright 2018 Tobias Franz
 */

declare(strict_types=1);

namespace Tobias\TicTacToe\GameState;


use Tobias\TicTacToe\TTT;

interface TTTInterface {

    /**
     * TTTInterface constructor.
     *
     * @param TTT $TTT
     */
	public function __construct(TTT $TTT);

    /**
     * @param int $number
     */
	public function numEntered( int $number ): void;

}