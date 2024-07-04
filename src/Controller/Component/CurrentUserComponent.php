<?php

// src/Controller/Component/CurrentUserComponent.php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class CurrentUserComponent extends Component
{
    public function getCurrentUser() {
        $identity = $this->getController()->request->getAttribute('identity');
        if ($identity) {
            $userId = $identity->getIdentifier();
            $usersTable = TableRegistry::getTableLocator()->get('Users');

            return $usersTable->get($userId);
        }

        return null;
    }
}
