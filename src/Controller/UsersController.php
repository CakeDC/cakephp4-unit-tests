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
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->addUnauthenticatedActions(['login', 'register', 'logout']);
        $this->Authorization->skipAuthorization();
    }

    public function register()
    {
        $user = $this->Users->newEmptyEntity();
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

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            //loginRedirect
            $redirect = $this->request->getQuery('redirect', [
                'prefix' => false,
                'controller' => 'Games',
                'action' => 'play',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Authentication->logout());
    }
}
