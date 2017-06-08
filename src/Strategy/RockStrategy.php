<?php

namespace App\Strategy;

use App\Model\Entity\Move;
use Cake\Core\Configure;

class RockStrategy implements StrategyInterface
{
    public function move(Move $move) : string
    {
        return 'R';
    }
}