<?php
/**
 * Created by Tobias Franz.
 * Date: 13.12.2018
 * Time: 10:02
 * Copyright 2018 Tobias Franz
 */

use Tobias\TicTacToe\World;

require_once 'vendor/autoload.php';

$world = new World();
$world->printPlayground();
echo "Is the game won?\n";
echo ( $world->isWon() ? 'Yes' : 'no' ) . "\n\n";

echo "Is the game a draw?\n";
echo ( $world->isDraw() ? 'Yes' : 'no' ) . "\n\n";