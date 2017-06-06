<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Tournaments Controller
 *
 * @property \App\Model\Table\TournamentsTable $Tournaments
 *
 * @method \App\Model\Entity\Tournament[] paginate($object = null, array $settings = [])
 */
class TournamentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $tournaments = $this->paginate($this->Tournaments);

        $this->set(compact('tournaments'));
        $this->set('_serialize', ['tournaments']);
    }

    /**
     * View method
     *
     * @param string|null $id Tournament id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tournament = $this->Tournaments->get($id, [
            'contain' => ['Games', 'TournamentMemberships']
        ]);

        $this->set('tournament', $tournament);
        $this->set('_serialize', ['tournament']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tournament = $this->Tournaments->newEntity();
        if ($this->request->is('post')) {
            $tournament = $this->Tournaments->patchEntity($tournament, $this->request->getData());
            if ($this->Tournaments->save($tournament)) {
                $this->Flash->success(__('The tournament has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tournament could not be saved. Please, try again.'));
        }
        $this->set(compact('tournament'));
        $this->set('_serialize', ['tournament']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tournament id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tournament = $this->Tournaments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tournament = $this->Tournaments->patchEntity($tournament, $this->request->getData());
            if ($this->Tournaments->save($tournament)) {
                $this->Flash->success(__('The tournament has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tournament could not be saved. Please, try again.'));
        }
        $this->set(compact('tournament'));
        $this->set('_serialize', ['tournament']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tournament id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tournament = $this->Tournaments->get($id);
        if ($this->Tournaments->delete($tournament)) {
            $this->Flash->success(__('The tournament has been deleted.'));
        } else {
            $this->Flash->error(__('The tournament could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
