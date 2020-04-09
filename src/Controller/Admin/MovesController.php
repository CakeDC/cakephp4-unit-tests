<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Moves Controller
 *
 * @property \App\Model\Table\MovesTable $Moves
 *
 * @method \App\Model\Entity\Move[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MovesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Games'],
        ];
        $moves = $this->paginate($this->Moves);

        $this->set(compact('moves'));
    }

    /**
     * View method
     *
     * @param string|null $id Move id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $move = $this->Moves->get($id, [
            'contain' => ['Users', 'Games'],
        ]);

        $this->set('move', $move);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $move = $this->Moves->newEmptyEntity();
        if ($this->request->is('post')) {
            $move = $this->Moves->patchEntity($move, $this->request->getData());
            if ($this->Moves->save($move)) {
                $this->Flash->success(__('The move has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The move could not be saved. Please, try again.'));
        }
        $users = $this->Moves->Users->find('list', ['limit' => 200]);
        $games = $this->Moves->Games->find('list', ['limit' => 200]);
        $this->set(compact('move', 'users', 'games'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Move id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $move = $this->Moves->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $move = $this->Moves->patchEntity($move, $this->request->getData());
            if ($this->Moves->save($move)) {
                $this->Flash->success(__('The move has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The move could not be saved. Please, try again.'));
        }
        $users = $this->Moves->Users->find('list', ['limit' => 200]);
        $games = $this->Moves->Games->find('list', ['limit' => 200]);
        $this->set(compact('move', 'users', 'games'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Move id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $move = $this->Moves->get($id);
        if ($this->Moves->delete($move)) {
            $this->Flash->success(__('The move has been deleted.'));
        } else {
            $this->Flash->error(__('The move could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
