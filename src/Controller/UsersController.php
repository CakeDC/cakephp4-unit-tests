<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow(['register']);
    }

    public function register()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user['is_active'] = true;
            $user['is_superuser'] = true;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('User {0} has been registered.', h($user['email'])));

                return $this->redirect('/');
            }
            $this->Flash->error(__('Unable to register the user.'));
        }
        $this->set('user', $user);
    }
}
