<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Data Controller
 *
 * @property \App\Model\Table\UsersTable $userTable
 * @method \App\Model\Entity\Data[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    // in src/Controller/UsersController.php
    public function beforeFilter(\Cake\Event\EventInterface $event) {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['login']);
    }

    public function login() {

        $this->viewBuilder()->setLayout('login');

        $result = $this->Authentication->getResult();
        // If the user is logged in send them away.
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/home';

            return $this->redirect($target);
        }
        if ($this->request->is('post')) {
            $this->Flash->error('Invalid username or password');
        }
    }

    public function logout() {
        $this->Authentication->logout();

        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}
