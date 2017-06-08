<?php

namespace App\Strategy;

use App\Model\Entity\Move;
use Cake\Core\Configure;

class RandomStrategy implements StrategyInterface
{
    public function move(Move $move) : string
    {
        $availableMoves = Configure::read('Moves.PlayerMoves');
        return collection($availableMoves)->shuffle()->first();
    }
}