<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Games Controller
 *
 * @property \App\Model\Table\GamesTable $Games
 *
 * @method \App\Model\Entity\Game[] paginate($object = null, array $settings = [])
 */
class GamesController extends AppController
{
    public function play()
    {
        $currentGame = $this->Games->current($this->Authentication->getIdentityData('id'));
        if (!$currentGame) {
            return $this->redirect(['action' => 'create']);
        }
        $this->set(compact('currentGame'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function create()
    {
        $game = $this->Games->newEmptyEntity();
        if ($this->request->is('post')) {
            $game = $this->Games->patchEntity($game, $this->request->getData());
            $game['user_id'] = $this->Authentication->getIdentityData('id');
            if ($this->Games->save($game)) {
                $this->Flash->success(__('The game has been saved.'));

                return $this->redirect(['action' => 'play']);
            }
            $this->Flash->error(__('The game could not be saved. Please, try again.'));
        }
        $this->set(compact('game'));
        $this->set('_serialize', ['game']);
    }
}
