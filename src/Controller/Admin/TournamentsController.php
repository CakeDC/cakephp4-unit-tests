<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Tournaments Controller
 *
 * @property \App\Model\Table\TournamentsTable $Tournaments
 *
 * @method \App\Model\Entity\Tournament[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TournamentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Tournaments->find();
        $this->Authorization->authorize($query);
        $tournaments = $this->paginate($this->Authorization->applyScope($query));

        $this->set(compact('tournaments'));
    }

    /**
     * View method
     *
     * @param string|null $id Tournament id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tournament = $this->Tournaments->get($id, [
            'contain' => ['Games', 'TournamentMemberships'],
        ]);
        $this->Authorization->authorize($tournament);

        $this->set('tournament', $tournament);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tournament = $this->Tournaments->newEmptyEntity();
        $this->Authorization->authorize($tournament);
        if ($this->request->is('post')) {
            $tournament = $this->Tournaments->patchEntity($tournament, $this->request->getData());
            if ($this->Tournaments->save($tournament)) {
                $this->Flash->success(__('The tournament has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tournament could not be saved. Please, try again.'));
        }
        $this->set(compact('tournament'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tournament id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tournament = $this->Tournaments->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($tournament);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tournament = $this->Tournaments->patchEntity($tournament, $this->request->getData());
            if ($this->Tournaments->save($tournament)) {
                $this->Flash->success(__('The tournament has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tournament could not be saved. Please, try again.'));
        }
        $this->set(compact('tournament'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tournament id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tournament = $this->Tournaments->get($id);
        $this->Authorization->authorize($tournament);
        if ($this->Tournaments->delete($tournament)) {
            $this->Flash->success(__('The tournament has been deleted.'));
        } else {
            $this->Flash->error(__('The tournament could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
