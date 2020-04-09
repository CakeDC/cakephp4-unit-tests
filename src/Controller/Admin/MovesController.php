<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Moves Controller
 *
 * @property \App\Model\Table\MovesTable $Moves
 *
 * @method \App\Model\Entity\Move[] paginate($object = null, array $settings = [])
 */
class MovesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index(): ?\Cake\Http\Response
    {
        $this->paginate = [
            'contain' => ['Users', 'Games'],
        ];
        $moves = $this->paginate($this->Moves);

        $this->set(compact('moves'));
        $this->set('_serialize', ['moves']);
    }

    /**
     * View method
     *
     * @param string|null $id Move id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view(?string $id = null): ?\Cake\Http\Response
    {
        $move = $this->Moves->get($id, [
            'contain' => ['Users', 'Games'],
        ]);

        $this->set('move', $move);
        $this->set('_serialize', ['move']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
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
        $this->set('_serialize', ['move']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Move id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
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
        $this->set('_serialize', ['move']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Move id.
     * @return \Cake\Http\Response|null Redirects to index.
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
