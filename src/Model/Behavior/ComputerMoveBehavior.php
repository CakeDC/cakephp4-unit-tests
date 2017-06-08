<?php

namespace App\Model\Behavior;

use App\Model\Entity\Move;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Table;

/**
 * ComputerMove behavior
 */
class ComputerMoveBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function beforeSave(Event $event, Move $move, $options)
    {
        return $this->computerMove($move);
    }

    public function afterSave(Event $event, Move $move, $options)
    {
        $move->game = $this->_table->Games->checkFinished($move['game_id']);

        return $move;
    }

    public function computerMove(Move $move): Move
    {
        $strategyClass = Configure::read('ComputerMoveBehavior.StrategyClass');
        $strategy = new $strategyClass();
        $computerMove = $strategy->move($move);
        $move->set([
            'computer_move' => $computerMove,
            'is_player_winner' => $this->resolveMove($move['player_move'], $computerMove),
        ]);

        return $move;
    }

    public function resolveMove(string $playerMove, string $computerMove)
    {
        if ($playerMove === $computerMove) {
            //it's a tie
            return null;
        }

        switch ($playerMove) {
            case 'R':
                return in_array($computerMove, ['S', 'L']);
            case 'P':
                return in_array($computerMove, ['R', 'K']);
            case 'S':
                return in_array($computerMove, ['P', 'L']);
            case 'L':
                return in_array($computerMove, ['K', 'P']);
            case 'K':
                return in_array($computerMove, ['S', 'R']);
        }

        throw new \OutOfBoundsException('Invalid move');
    }
}