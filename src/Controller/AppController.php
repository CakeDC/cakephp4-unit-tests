<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Authentication\Controller\Component\AuthenticationComponent;
use Authorization\Controller\Component\AuthorizationComponent;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Event\EventInterface;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @property AuthenticationComponent $Authentication
 * @property AuthorizationComponent $Authorization
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        $this->loadComponent('Authorization.Authorization');

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    protected function _loadAuth()
    {
        /*
        $authOptions = [
            'authorize' => ['Superuser', 'AdminPrefix'],
        ];

        $this->loadComponent('Auth', $authOptions);
        */
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     */
    public function beforeRender(\Cake\Event\EventInterface $event)
    {
        if ($this->components()->has('Authentication')) {
            $identity = $this->Authentication->getIdentity();
            if ($identity) {
                $this->set('currentUser', $identity->getOriginalData());
            }
        }
    }

    public function beforeFilter(EventInterface $event)
    {
        if (
            $this->components()->has('Authentication') &&
            $this->Authentication->getIdentity()
        ) {
            $this->Authorization->authorize($this->request, 'access');
        }
    }
}
