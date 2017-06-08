<?php

namespace App\Strategy;

use App\Model\Entity\Move;

interface StrategyInterface
{
    public function move(Move $move) : string;
}