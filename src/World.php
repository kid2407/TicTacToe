<?php
/**
 * Created by Tobias Franz.
 * Date: 13.12.2018
 * Time: 10:34
 * Copyright 2018 Tobias Franz
 */

declare(strict_types=1);

namespace Tobias\TicTacToe;

class World {

    private $playground = [ [ ' ', ' ', ' ' ], [ ' ', ' ', ' ' ], [ ' ', ' ', ' ' ] ];

    /**
     * Sets a marker at the given position. Returns true if the field is still free, false otherwise.
     *
     * @param int $x
     * @param int $y
     * @param string $player
     *
     * @return bool
     */
    public function setStone( int $x, int $y, string $player ): bool {
        if ( $this->playground[ $x ][ $y ] === ' ' ) {
            $this->playground[ $x ][ $y ] = $player;

            return true;
        }

        return false;
    }

    /**
     * Writes the current board to the output
     */
    public function printPlayground(): void {
        echo "Current Playground:\n";
        echo "|---|---|---|\n";
        for ( $i = 0; $i < 3; $i ++ ) {
            echo sprintf( "| %s | %s | %s |\n", $this->playground[ $i ][0], $this->playground[ $i ][1], $this->playground[ $i ][2] );
        }
        echo "|---|---|---|\n";
    }

    /**
     * Returns true when one player has won, false otherwise. The player which has won will always be the one which made the last move.
     *
     * @return bool
     */
    public function isWon(): bool {
        $playground = $this->playground;

        // horizontal
        for ( $x = 0; $x < 2; $x ++ ) {
            if ( !\in_array(' ', $playground[$x], true) && \count(array_unique($playground[$x ] ) ) === 1 ) {
                return true;
            }
        }

        // vertical
        foreach ( $playground as $key => $row ) {
            if ( !\in_array(' ', [$playground[0][$key], $playground[1][$key], $playground[2][$key]], true) && \count(array_unique([$playground[0][$key ], $playground[1][$key ], $playground[2][$key ] ] ) ) === 1 ) {
                return true;
            }
        }

        // diagonals
        return !\in_array(
                ' ',
                [$playground[0][0], $playground[0][2], $playground[1][1], $playground[2][0], $playground[2][2]],
                true
            ) &&
            (\count(array_unique([$playground[0][0], $playground[1][1], $playground[2][2]])) === 1 ||
                \count(array_unique([$playground[2][0], $playground[1][1], $playground[0][2]])) === 1);
    }

    /**
     * Returns true when the game is a draw, false otherwise.
     *
     * @return bool
     */
    public function isDraw(): bool {
        $playground = $this->playground;

        // horizontal
        for ( $x = 0; $x < 2; $x ++ ) {
            if ( $this->hasNotMoreThanOnePlayerInArray( $playground[ $x ] ) ) {
                return false;
            }
        }

        // vertical
        foreach ( $playground as $key => $row ) {
            if ( $this->hasNotMoreThanOnePlayerInArray( [ $playground[0][ $key ], $playground[1][ $key ], $playground[2][ $key ] ] ) ) {
                return false;
            }
        }

        // diagonals

        //top-left -> bottom-right
        if ( $this->hasNotMoreThanOnePlayerInArray( [ $playground[0][0], $playground[1][1], $playground[2][2] ] ) ) {
            return false;
        }

        //bottom-left -> top-right
        if ( $this->hasNotMoreThanOnePlayerInArray( [ $playground[2][0], $playground[1][1], $playground[0][2] ] ) ) {
            return false;
        }

        return true;
    }

    /**
     * Returns true if the given row can not cause a draw
     *
     * @param array $values
     *
     * @return bool
     */
    private function hasNotMoreThanOnePlayerInArray( array $values ): bool
    {
        $uniqueValues      = array_unique( $values );
        $countUniqueValues = \count($uniqueValues );

        return $countUniqueValues === 1 || ( $countUniqueValues === 2 && \in_array(' ', $uniqueValues, true));
    }

    /**
     * Reset for a new game.
     */
    public function resetPlayground(): void
    {
        $this->playground = [ [ ' ', ' ', ' ' ], [ ' ', ' ', ' ' ], [ ' ', ' ', ' ' ] ];
        echo "The game has been reset\n";
    }

}