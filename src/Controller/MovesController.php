<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;

/**
 * Moves Controller
 *
 * @property \App\Model\Table\MovesTable $Moves
 *
 * @method \App\Model\Entity\Move[] paginate($object = null, array $settings = [])
 */
class MovesController extends AppController
{
    public function playerMove()
    {
        $this->request->allowMethod(['post']);
        $gameId = $this->request->getData('game_id');
        $playerMove = $this->request->getData('player_move');
        if (!$gameId) {
            throw new \OutOfBoundsException('Missing game_id');
        }
        $move = $this->Moves->playerMove($this->Authentication->getIdentityData('id'), $gameId, $playerMove);
        if ($move->getErrors()) {
            $this->Flash->error(Text::toList($move->getErrors()));
        }
        if ($game = $move->get('game')) {
            $who = __('Computer');
            if ($game->get('is_player_winner')) {
                $who = __('You');
            }
            $this->Flash->success(__('{0} Won the game', $who));
        }

        return $this->redirect([
            'controller' => 'Games',
            'action' => 'play'
        ]);
    }
}
